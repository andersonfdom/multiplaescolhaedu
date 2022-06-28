<?php global $ncm_options_shop; ?>

<?php if(ncm_isset_and_not_empty($ncm_options_shop["enable_subscribe"]) && $ncm_options_shop["enable_subscribe"] == 1) : ?>
    <div class="span3">
        <div id="newsletter" class="wrapperStuff">
            <div class="stuff">
                <p class="title"><?php _e("SUBSCRIBE TO OUR NEWS", NCM_I18N_DOMAIN); ?></p>
                <p class="text2"><?php _e("Stay updated with our Shop to enjoy our special promotions!", NCM_I18N_DOMAIN); ?></p>
                <input type="text" placeholder="Type your email" />
                <div class="ncm-button patternBGColor"><?php _e("SUBSCRIBE", NCM_I18N_DOMAIN); ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>