<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-url-shortner" id="tab-apss-url-shortner" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Url Shortner Settings', APSS_TEXT_DOMAIN ) ?></h2>
     </div>
     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Enable URL Shortner', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="apsc_url_shortner">
                         <input type="checkbox" id='apsc_url_shortner'  class='apss-check-all' name="apss_share_settings[url_shortner_enable]" value="yes" <?php
                         if ( $options[ 'url_shortner_enable' ] == 'yes' ) {
                              echo "checked='checked'";
                         }
                         ?> />
                         <label class="apsc-general-checkbox" for="apsc_url_shortner">
                              <?php _e( 'Enable', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-check round"></div>
                    </label>
                    <p class="description"> <?php _e( 'Check to enable url shortner for the share links', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Use Url Shortner for', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="apss-radio-url">
                         <input type="radio" id=''  class='' name="apss_share_settings[url_shortner]" value="only" <?php
                         if ( $options[ 'url_shortner' ] == 'only' ) {
                              echo "checked='checked'";
                         }
                         ?> />
                                <?php _e( 'Twitter Only', APSS_TEXT_DOMAIN ); ?>
                    </label>
                    <label class="apss-radio-url">
                         <input type="radio" id='' class='' name="apss_share_settings[url_shortner]" value="all" <?php
                         if ( $options[ 'url_shortner' ] == 'all' ) {
                              echo "checked='checked'";
                         }
                         ?> />
                                <?php _e( 'All Social Networks', APSS_TEXT_DOMAIN ); ?>
                    </label>

                    <p class="description"> <?php _e( 'Select if you want url shortner for all social media\'s share link or only twitter\'s ', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Shortner Type', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <?php
                    $url_shortner_type = array(
                        'WP Function wp_get_shortlink( )' => 'wp_function',
                        // 'goo.gle' => 'google',
                        'bit.ly' => 'bitly',
                        'Rebrandly' => 'rebrandly',
                        'po.st' => 'post'
                    );
                    ?>

                    <label class="">
                         <select name="apss_share_settings[shortner_type]" id="apss-shortner-type" class="apss-display template-dropdown" size="1" >
                              <?php foreach ( $url_shortner_type as $key => $value ) { ?>
                                   <option class="apss-temp" value="<?php echo $value ?>"
                                   <?php
                                   if ( $options[ 'shortner_type' ] == $value ) {
                                        echo "selected='selected'";
                                   }
                                   ?> >
                                                <?php
                                                _e( $key, 'ap-social-pro' );
                                                ?>
                                   </option>
                                   }

                              <?php }
                              ?>
                         </select>
                    </label>

                    <p class="description"> <?php _e( 'Select any one of the above the url shortners to get short url from', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-odd apss-shortner-type-class" id="apss-google" <?php echo(isset( $options[ 'shortner_type' ] ) && $options[ 'shortner_type' ] == 'google') ? "" : "style='display:none;'" ?>>
          <div class="apss-general-div" >
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'goo.gl API key', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <input type="text" name= "apss_share_settings[shortner_google_api]" value= "<?php echo (isset( $options[ 'shortner_google_api' ] ) && $options[ 'shortner_google_api' ] != "" ) ? $options[ 'shortner_google_api' ] : ''; ?>" >
               </div>
          </div>
     </div>

     <div class="apss-row-odd apss-shortner-type-class" id="apss-bitly" <?php echo(isset( $options[ 'shortner_type' ] ) && $options[ 'shortner_type' ] == 'bitly') ? "" : "style='display:none;'" ?>>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3><?php _e( 'Bitly Username:', APSS_TEXT_DOMAIN ); ?></h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' id="apss_bitly_username" name='apss_share_settings[bitly][username]' value="<?php
                         if ( isset( $options[ 'bitly' ][ 'username' ] ) ) {
                              echo $options[ 'bitly' ][ 'username' ];
                         }
                         ?>" />
                    </label>
                    <p class="description"> <?php _e( 'Please enter your bit.ly username here', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3><?php _e( 'Bitly API key:', APSS_TEXT_DOMAIN ); ?></h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' id="apss_bitly_api_key" name='apss_share_settings[bitly][api_key]' value = "<?php
                         if ( isset( $options[ 'bitly' ][ 'api_key' ] ) ) {
                              echo $options[ 'bitly' ][ 'api_key' ];
                         }
                         ?>" />
                    </label>
                    <p class="description"> Please go <a href='https://bitly.com/a/your_api_key' target="_blank">here</a> to get your Bit.ly API details.</p>
               </div>
          </div>
     </div>

     <div class="apss-row-odd apss-shortner-type-class" id="apss-rebrandly" <?php echo(isset( $options[ 'shortner_type' ] ) && $options[ 'shortner_type' ] == 'rebrandly') ? "" : "style='display:none;'" ?>>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3><?php _e( 'Rebrandly API key', APSS_TEXT_DOMAIN ); ?></h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' id="" name='apss_share_settings[rebrandly][api_key]' value="<?php
                         if ( isset( $options[ 'rebrandly' ][ 'api_key' ] ) ) {
                              echo $options[ 'rebrandly' ][ 'api_key' ];
                         }
                         ?>" />
                    </label>
                    <p class="description">Rebrandly service require API key to generate your short URLs. To get such please visit this address <a href="https://www.rebrandly.com/api-settings" target="_blank">Rebrandly API Settings page</a> </p>
               </div>
          </div>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3><?php _e( 'Rebrandly Domain ID', APSS_TEXT_DOMAIN ); ?></h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' id="" name='apss_share_settings[rebrandly][domain_id]' value = "<?php
                         if ( isset( $options[ 'rebrandly' ][ 'domain_id' ] ) ) {
                              echo $options[ 'rebrandly' ][ 'domain_id' ];
                         }
                         ?>" />
                    </label>
                    <p class="description"> If you have your own branded domain name fill in here its ID. To get domian ID visit <a href="https://www.rebrandly.com/domains/all" target="_blank">Rebrandly Domain list page</a>and copy from URL its ID. ID is the bold part marked in here https://www.rebrandly.com/domains/1234334343asda34adsa </p>
               </div>
          </div>
     </div>

     <div class="apss-row-odd apss-shortner-type-class" id="apss-post" <?php echo(isset( $options[ 'shortner_type' ] ) && $options[ 'shortner_type' ] == 'post') ? "" : "style='display:none;'" ?>>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3><?php _e( 'po.st API Access Token', APSS_TEXT_DOMAIN ); ?></h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' id="" name='apss_share_settings[post][access_token]' value="<?php
                         if ( isset( $options[ 'post' ][ 'access_token' ] ) ) {
                              echo $options[ 'post' ][ 'access_token' ];
                         }
                         ?>" />
                    </label>
                    <p class="description">po.st service require API access token to generate your short URLs. To get such please visit this address <a href="http://re.po.st/register" target="_blank">http://re.po.st/register</a> </p>
               </div>
          </div>
     </div>
</div>
