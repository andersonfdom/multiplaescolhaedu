<?php

add_filter( 'woocommerce_payment_gateways', 'jobaria_add_affiliate_wallet_gateway_class');

function jobaria_add_affiliate_wallet_gateway_class($methods) {
    $methods[] = 'WC_Gateway_Affiliate_Wallet'; 
    return $methods;
}

class WC_Gateway_Affiliate_Wallet extends WC_Payment_Gateway {
	/**
	 * Constructor for the gateway.
	 */
	public function __construct() {
		$this->id                 = 'affiliate_wallet';
		$this->icon               = apply_filters( 'woocommerce_cheque_icon', (get_template_directory_uri() . '/images/wallet.png') );
		$this->has_fields         = false;
		$this->method_title       = _x( 'Pagamentos via Saldo do Associado', 'Pagamento via Saldo do Associado', 'woocommerce' );
		$this->method_description = __( 'Método disponível apenas para associados. Um associado pode utilizar esta opção para descontar o valor de seu Saldo do Associado.', 'woocommerce' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables.
		$this->title        = $this->get_option( 'title' );
		$this->description  = $this->get_option( 'description' );
		$this->instructions = $this->get_option( 'instructions' );

		// Actions.
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_thankyou_cheque', array( $this, 'thankyou_page' ) );

		// Customer Emails.
		add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
	}

	/**
	 * Initialise Gateway Settings Form Fields.
	 */
	public function init_form_fields() {

		$this->form_fields = array(
			'enabled'      => array(
				'title'   => __( 'Ativar/Desativar', 'woocommerce' ),
				'type'    => 'checkbox',
				'label'   => __( 'Ativar pagamento via Saldo do Associado', 'woocommerce' ),
				'default' => 'no',
			),
			'title'        => array(
				'title'       => __( 'Título', 'woocommerce' ),
				'type'        => 'text',
				'description' => __( 'Este campo controla o título do método de pagamento que os usuários irão visualizar durante o checkout.', 'woocommerce' ),
				'default'     => _x( 'Pagamentos via Saldo do Associado', 'Pagamento via Saldo do Associado.', 'woocommerce' ),
				'desc_tip'    => true,
			),
			'description'  => array(
				'title'       => __( 'Descrição', 'woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Este campo controla a descrição do método de pagamento que o usuários irão visualizar durante o checkout.', 'woocommerce' ),
				'default'     => __( 'O seu Saldo do Associado será consumido ao prosseguir com a compra. Por favor, atente-se que é necessário ter no mínimo o valor da compra no seu saldo para utilizar este meio de pagamento.', 'woocommerce' ),
				'desc_tip'    => true,
			),
			'instructions' => array(
				'title'       => __( 'Instruções', 'woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Instruções que serão adicionadas na página de "Agradecimento" e nos e-mails.', 'woocommerce' ),
				'default'     => '',
				'desc_tip'    => true,
			),
		);
	}

	/**
	 * Output for the order received page.
	 */
	public function thankyou_page() {
		if ( $this->instructions ) {
			echo wp_kses_post( wpautop( wptexturize( $this->instructions ) ) );
		}
	}

	/**
	 * Add content to the WC emails.
	 *
	 * @access public
	 * @param WC_Order $order Order object.
	 * @param bool     $sent_to_admin Sent to admin.
	 * @param bool     $plain_text Email format: plain text or HTML.
	 */
	public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
		if ( $this->instructions && ! $sent_to_admin && 'affiliate_wallet' === $order->get_payment_method() && $order->has_status( 'on-hold' ) ) {
			echo wp_kses_post( wpautop( wptexturize( $this->instructions ) ) . PHP_EOL );
		}
	}

	/**
	 * Process the payment and return the result.
	 *
	 * @param int $order_id Order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {

		$allowed = current_user_can('wpam_affiliate');
		
		if($allowed) {
			$order = wc_get_order( $order_id );
			
			$db = new WPAM_Data_DataAccess();
			$transactionRepository = $db->getTransactionRepository();
			$affiliateRepository = $db->getAffiliateRepository();
			$associado = $affiliateRepository->loadByUserId(get_current_user_id());
			$account = $transactionRepository->getAccountSummary($associado->affiliateId);
			
			// Saldo inválido
			if($order->get_total() > $account->standing) {
				wp_delete_post($order_id, true);
				throw new Exception(__('Saldo do Associado insuficiente para concluir a compra.', 'woocommerce'));
			}
			
			// Usuário inválido
			if(is_null($associado) || !isset($associado)) {
				wp_delete_post($order_id, true);
				throw new Exception(__('Método de pagamento inválido para esta conta.', 'woocommerce'));
			}
			
			// Prossegue com o pagamento
			global $wpdb;
			$table = WPAM_TRANSACTIONS_TBL;
			$data = array();
			
			$amount = $order->get_total() * -1;
			$data['dateModified'] = date("Y-m-d H:i:s", time());
			$data['dateCreated'] = date("Y-m-d H:i:s", time());
			$data['affiliateId'] = $associado->affiliateId;
			$data['amount'] = number_format($amount, 2, '.', '');
			$data['type'] = 'payout';
			$data['description'] = __('Pagamento pelo pedido #' . $order_id, 'affiliates-manager');
			$wpdb->insert($table, $data);
			
			$order->add_order_note( __( 'Saldo do associado debitado.', 'affiliates-manager' ) );
			$order->payment_complete();
			$order->update_status('completed', __( 'Finalizado pedido.', 'affiliates-manager' ) );
			
			// Remove cart.
			WC()->cart->empty_cart();
			
			// Return thankyou redirect.
			return array(
				'result'   => 'success',
				'redirect' => $this->get_return_url( $order )
			);
		}
		else {
			wp_delete_post($order_id, true);
			throw new Exception(__('Método de pagamento inválido para esta conta.', 'woocommerce'));
		}
		
		
		
		
		
		
		
		
		// $db->getTransactionRepository()->
		
		// buscar o total de saldo
		// se o total for maior que o valor da compra, efetuar automaticamente a compra, debitando o valor
		// caso contrario, mostrar um erro
		
		
		
		/*
		$order = wc_get_order( $order_id );

		if ( $order->get_total() > 0 ) {
			// Mark as on-hold (we're awaiting the cheque).
			$order->update_status( apply_filters( 'woocommerce_cheque_process_payment_order_status', 'on-hold', $order ), _x( 'Awaiting check payment', 'Check payment method', 'woocommerce' ) );
		} else {
			$order->payment_complete();
		}

		// Remove cart.
		WC()->cart->empty_cart();

		// Return thankyou redirect.
		return array(
			'result'   => 'success',
			'redirect' => $this->get_return_url( $order ),
		);
		*/
	}
}
