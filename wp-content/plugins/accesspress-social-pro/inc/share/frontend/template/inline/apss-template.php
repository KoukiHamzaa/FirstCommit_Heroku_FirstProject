<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class='apss-<?php echo $key ?> apss-single-icon <?php echo $animation ?> '>

     <?php if ( $key == 'print' ) { ?>
          <a title="<?php echo $pre_text . ' ' . $network_name; ?> " data-hover="<?php echo ucfirst( $key ) ?>"  href='javascript:void(0);' onclick='window.print();return false;'>
          <?php } else { ?>
               <a rel='nofollow' <?php echo $onclick; ?> data-hover="<?php echo ucfirst( $key ) ?>" title="<?php echo $pre_text . ' ' . $network_name; ?> "  target='<?php echo $apss_link_open_option; ?>' href='<?php echo $link; ?>' >
               <?php } ?>
               <div class='apss-icon-block<?php if ( $icon_set_value != '4' ) { ?> clearfix<?php } ?>' data-hover="<?php echo ucfirst( $key ) ?>">
                    <?php
                    if ( $key == "sms" ) {
                         $socicon = "fa fa-comment-o";
                    } else if ( $key == "print" ) {
                         $socicon = "fa fa-$key";
                    } else if ( $key == "email" ) {
                         $socicon = "fa fa-envelope";
                    } else {
                         $socicon = "socicon-$key";
                    }
                    ?>
                    <i class="<?php echo $socicon; ?> "></i>
                    <span class='apss-social-text'><?php
                         if ( isset( $options[ 'share_texts' ][ 'common-long-text' ] ) && $options[ 'share_texts' ][ 'common-long-text' ] != '' ) {
                              echo $options[ 'share_texts' ][ 'common-long-text' ];
                         } else {
                              echo "Share on";
                         }
                         ?> <?php
                         if ( isset( $options[ 'apss_social_networks_naming' ][ $key ] ) && $options[ 'apss_social_networks_naming' ][ $key ] != '' ) {
                              echo $options[ 'apss_social_networks_naming' ][ $key ];
                         } else {
                              echo ucfirst( $key );
                         }
                         ?></span>
                    <span class='apss-share'><?php
                         if ( isset( $options[ 'share_texts' ][ 'common-short-text' ] ) && $options[ 'share_texts' ][ 'common-short-text' ] != '' ) {
                              echo $options[ 'share_texts' ][ 'common-short-text' ];
                         } else {
                              echo "Share";
                         }
                         ?></span>
               </div>
               <div class="apss-hover-content-wrap">
                    <?php
                    $counter_enable_options = (isset( $options[ 'counter_enable_options' ] ) && $options[ 'counter_enable_options' ] != '') ? $options[ 'counter_enable_options' ] : '0';

                    if ( $counter_enable_options == '1' ) {
                         $no_counter_networks = array( 'digg', 'email', 'messenger', 'print', 'sms', 'tumblr', 'viber', 'weibo', 'whatsapp', 'zing' );

                         if ( ! in_array( $key, $no_counter_networks ) ) {
                              ?>

                              <div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $formatted_count; ?></div>
                              <?php
                         }
                    }
                    ?>
                    <div class="apss-hover-text">
                         <?php echo "Share"; ?>
                    </div>
               </div>
          </a>
</div>
