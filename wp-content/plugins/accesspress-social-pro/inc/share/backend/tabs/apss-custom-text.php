<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<div class="apss-tab-contents apss-miscellaneous" id="tab-apss-custom-text" style='display:none'>
    <div class="apss-subhead">
        <h2><?php _e('Custom Text Settings', APSS_TEXT_DOMAIN) ?></h2>
    </div>
	<div class="apss-row-odd">
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3> <?php _e('Share Text', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <label>
                    <input type="text" name="apss_share_settings[share_text]"  value="<?php
                        if ( isset( $options[ 'share_text' ] ) ) {
                            echo $options[ 'share_text' ];
                        }
                        ?>" />
                </label>
                <p class="description"> <?php _e('Please enter the share text to make it appear above social share icons. Leave blank if you dont want to use share text.', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
    </div>
    <div class="apss-row-even">
        <h4> <?php _e( 'Social share text options:', APSS_TEXT_DOMAIN ); ?> </h4>
        <h5 class="apss-long-short-title" for='apss-share-short-text'><?php _e( 'Short texts:', APSS_TEXT_DOMAIN ); ?></h5>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Common short share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id='apss-share-common-short-text' type='text' name="apss_share_settings[share_texts][common-short-text]" value="<?php
                    if ( isset( $options[ 'share_texts' ][ 'common-short-text' ] ) ) {
                        echo $options[ 'share_texts' ][ 'common-short-text' ];
                    }
                    ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Twitter short share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-twitter-short-text' type='text' name="apss_share_settings[share_texts][twitter-short-text]" value="<?php
                if ( isset( $options[ 'share_texts' ][ 'twitter-short-text' ] ) ) {
                    echo $options[ 'share_texts' ][ 'twitter-short-text' ];
                }
                ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Email short share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-email-short-text' type='text' name="apss_share_settings[share_texts][email-short-text]" value="<?php
                if ( isset( $options[ 'share_texts' ][ 'email-short-text' ] ) ) {
                    echo $options[ 'share_texts' ][ 'email-short-text' ];
                }
                ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Print short share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-print-short-text' type='text' name="apss_share_settings[share_texts][print-short-text]" value="<?php
                if ( isset( $options[ 'share_texts' ][ 'print-short-text' ] ) ) {
                    echo $options[ 'share_texts' ][ 'print-short-text' ];
                }
                ?>" />
                <p class="description"> <?php _e('You can set the custom short share texts here. If you keep blank the default values will be loaded.', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
    </div>
    <div class="apss-row-odd">
        <h4> <?php _e( 'Social share text options:', APSS_TEXT_DOMAIN ); ?> </h4>
        <h5 class="apss-long-short-title" for='apss-share-short-text'><?php _e( 'Long texts:', APSS_TEXT_DOMAIN ); ?> </h5>

        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Common long share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-common-long-text' type='text' name="apss_share_settings[share_texts][common-long-text]" value="<?php
                    if ( isset( $options[ 'share_texts' ][ 'common-long-text' ] ) ) {
                        echo $options[ 'share_texts' ][ 'common-long-text' ];
                    }
                    ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Twitter long share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-twitter-long-text' type='text' name="apss_share_settings[share_texts][twitter-long-text]" value="<?php
        if ( isset( $options[ 'share_texts' ][ 'twitter-long-text' ] ) ) {
            echo $options[ 'share_texts' ][ 'twitter-long-text' ];
        }
        ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Email long share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-email-long-text' type='text' name="apss_share_settings[share_texts][email-long-text]" value="<?php
                if ( isset( $options[ 'share_texts' ][ 'email-long-text' ] ) ) {
                    echo $options[ 'share_texts' ][ 'email-long-text' ];
                }
                ?>" />
                <p class="description"> <?php _e('', APSS_TEXT_DOMAIN) ?> </p>             
            </div>
        </div>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label>
                    <h3>  <?php _e('Print long share text:', APSS_TEXT_DOMAIN); ?> </h3>
                </label>
            </div>
            <div class="apss-option-value">
                <input class="long-short-input" id= 'apss-share-print-long-text' type='text' name="apss_share_settings[share_texts][print-long-text]" value="<?php
                    if ( isset( $options[ 'share_texts' ][ 'print-long-text' ] ) ) {
                        echo $options[ 'share_texts' ][ 'print-long-text' ];
                    }
                    ?>" />
                <p class="description"> <?php _e( 'You can set the custom long share texts here. If you keep blank the default values will be loaded.', APSS_TEXT_DOMAIN ); ?> </p>             
            </div>
        </div>
    </div>
    <!-- <div class="apss-row-even">
        <h3> <?php //_e('Social Networks Custom Names:', APSS_TEXT_DOMAIN); ?> </h3>
        <?php //foreach ( $label_array as $key => $val ) { ?>
        <div class="apss-general-div">
            <div class="apss-title-div">
                <label class="apss-long-short-text apss-social-network-naming" for='apss-share-social-network-naming-<?php //echo $key; ?>'>
                    <h3><?php// _e( ucfirst( $key ), APSS_TEXT_DOMAIN ); ?>:</h3>
                </label>
            </div>
            <div class="apss-option-value">
            	<label>
                	<input class="apss-social-network-naming-input" id='apss-share-social-network-naming-<?php //echo $key; ?>' type='text' name="apss_share_settings[apss_social_networks_naming][<?php// echo $key; ?>]" value="<?php
	                //if ( isset( $options[ 'apss_social_networks_naming' ][ $key ] ) ) {
	                    //echo $options[ 'apss_social_networks_naming' ][ $key ];
	               // }
	                ?>" />
	            </label>
	            <p class="description"><?php //_e( 'abc', APSS_TEXT_DOMAIN ); ?></p> 
            </div>
        </div>
        <?php// } ?>
                    

    </div> -->

</div>