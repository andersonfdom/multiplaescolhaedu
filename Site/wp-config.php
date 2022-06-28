<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'multi292_site' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'multi292_site' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', ')q=-BlqX8a1M' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4W|dIdpxNGdEE%1T`CDY4^=|$g}esn1NI7gv){c`IYYy}Rl$ANw,?Gb~aYe1s#bW' );
define( 'SECURE_AUTH_KEY',  '2q(U)KtaBV86wNKXUG)QtetPpflzA_ AS@)[P0;^+<sfq6QO$J|vSZdK/aWsD8+h' );
define( 'LOGGED_IN_KEY',    'gcUljh}OofYz%4ONPTi?Td[UoVf)2cDL6J#06ttYGG@Y3PZtc,_Zw[]KX$wt!^Al' );
define( 'NONCE_KEY',        '|F?AHgg(NZbX(rG$KTimX:T~BH!x@-5Dz3H!fOGD:S<c7tk}z@60g_z:AFh|+>Bn' );
define( 'AUTH_SALT',        'R7U=bc>~(dG7O@HqX22w^>v#F``zOzL`1Py?Dz5`)y|&G<n_G7pH.7tmxe 1EB!t' );
define( 'SECURE_AUTH_SALT', '+/z{nfsMeN<fE |%L;^;-}EDI)^}pBS=^Gw}?O[NWUAyiijg&}[`,1b#mYh-(Yp=' );
define( 'LOGGED_IN_SALT',   '<8H[X(gT:AN3-PV(,38y~7q.L59d}lNTIC,5<:;.myV{d;HT*hFMN}<fz.Z{FAM3' );
define( 'NONCE_SALT',       '#Q#+F6OR_+88Qa+H_?s~L^0`pUd*Z#zBA*S>{rMY$!N3oL794Mr^M~?+C[UA(H(3' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
