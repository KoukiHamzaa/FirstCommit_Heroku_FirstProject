<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-share-options" id="tab-apss-share-options" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Share Options', APSS_TEXT_DOMAIN ) ?></h2>
     </div>
     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Available Options', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label>
                         <input type="checkbox" id="apss_posts" class="apss-check-all" name="apss_share_settings[share_options][]" value="post" <?php echo (in_array( 'post', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_posts"></label>
                         <?php _e( 'Posts', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_pages" class="apss-check-all" name="apss_share_settings[share_options][]" value="page" <?php echo (in_array( 'page', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_pages"></label>
                         <?php _e( 'Pages', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_front_page" class="apss-check-all" name="apss_share_settings[share_options][]" value="front_page" <?php echo (in_array( 'front_page', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_front_page"></label>
                         <?php _e( 'Front Page', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_archives" class="apss-check-all" name="apss_share_settings[share_options][]" value="archives" <?php echo (in_array( 'archives', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_archives"></label>
                         <?php _e( 'Archives', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_attachement" class="apss-check-all" name="apss_share_settings[share_options][]" value="attachment" <?php echo (in_array( 'attachment', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_attachement"></label>
                         <?php _e( 'Attachment pages', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_categories" class="apss-check-all" name="apss_share_settings[share_options][]" value="categories" <?php echo (in_array( 'categories', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_categories"></label>
                         <?php _e( 'Categories', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <label>
                         <input type="checkbox" id="apss_all" class="apss-check-all" name="apss_share_settings[share_options][]" value="all" <?php echo (in_array( 'all', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                         <label class="apss-general-checkbox" for="apss_all"></label>
                         <?php _e( 'Other (search results, etc)', APSS_TEXT_DOMAIN ); ?>
                         <div class="apss-check round"></div>
                    </label>

                    <p class="description"> <?php _e( 'Select the options where you want your share buttons to be displayed at', APSS_TEXT_DOMAIN ) ?> </p>

               </div>
          </div>
     </div>
     <?php
     $post_types = self::get_registered_post_types();
     if ( ! empty( $post_types ) ) {
          ?>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Custom Post Types', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <?php foreach ( $post_types as $key => $value ) { ?>
                              <?php $objects = get_post_type_object( $value ); ?>
                              <label>
                                   <input type="checkbox" id="apss_<?php echo $key; ?>" class="apss-check-all" name="apss_share_settings[share_options][]" value="<?php echo $value; ?>" <?php echo (in_array( $key, $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                                   <label class="apss-general-checkbox" for="apss_<?php echo $key; ?>"></label>
                                   <?php _e( $objects -> labels -> name, APSS_TEXT_DOMAIN ); ?>
                                   <div class="apss-check round"></div>
                              </label>
                         <?php }
                         ?>
                         <p class="description"> <?php _e( 'Select the custom post type where you want your share buttons to be displayed at', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     <?php } ?>

     <?php
     $taxonomies = self::get_registered_taxonomies();
     if ( ! empty( $taxonomies ) ) {
          ?>
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Available Taxonomies', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <?php foreach ( $taxonomies as $key => $value ) { ?>
                              <?php $required_tax_objects = $value -> labels; ?>
                              <?php $name = $required_tax_objects -> name; ?>
                              <label>
                                   <input type="checkbox" id="apss_<?php echo $value -> name; ?>" class="apss-check-all" name="apss_share_settings[share_options][]" value="<?php echo $value -> name; ?>" <?php echo (in_array( $key, $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>
                                   <label class="apss-general-checkbox" for="apss_<?php echo $value -> name; ?>"></label>
                                   <?php _e( $name, APSS_TEXT_DOMAIN ); ?>
                                   <div class="apss-check round"></div>
                              </label>

                         <?php }
                         ?>
                         <p class="description"> <?php _e( 'Select the taxonomies where you want your share buttons to be displayed at', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     <?php } ?>

     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label for="apsc-buddypress">
                         <h3> <?php _e( 'Share in Buddypress', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type="checkbox" id="apsc-buddypress" class="apss-check-all" name="apss_share_settings[share_options][]" value="buddypress" <?php echo (in_array( 'buddypress', $options[ 'share_options' ] )) ? 'checked="checked"' : ''; ?>/>

                         <label class="apsc-general-checkbox" for="apsc-buddypress">
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <div class="apsc-check round"></div>
                    </label>
                    <label class="">
                    </label>
                    <p class="description"> <?php _e( 'Check to show the social share in buddypress activity and group pages', APSS_TEXT_DOMAIN ); ?> </p>
               </div>
          </div>
     </div>

     <div class="apss-row-even">
          <h2 class='apss-pinterest-options'><?php _e( 'Pinterest Pin It Button Settings:', APSS_TEXT_DOMAIN ); ?> </h2>
          <?php /* ?><span class="social-text"><?php _e( 'Please setup the options for pinterest hover images:', APSS_TEXT_DOMAIN ); ?></span> <?php */ ?>
          <div class='apss-info'><?php _e( "You can disable the pinit hover button by adding the image attributes as data-pin-no-hover='true' or nopin='nopin'", APSS_TEXT_DOMAIN ); ?></div>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Enable the Pin It hover button over images?', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="apss-pinit-label">
                         <input type="radio" id="pinit-enable_no" name="pinit_options[enabled]" value='0' <?php
                         if ( isset( $options[ 'pin_it_button_options' ][ 'enabled' ] ) && $options[ 'pin_it_button_options' ][ 'enabled' ] == '0' ) {
                              echo "checked='checked'";
                         }
                         ?> >
                                <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>

                    </label>
                    <label class="apss-pinit-label">
                         <input type="radio" id="pinit-enable_yes" name="pinit_options[enabled]" value='1'
                         <?php
                         if ( isset( $options[ 'pin_it_button_options' ][ 'enabled' ] ) && $options[ 'pin_it_button_options' ][ 'enabled' ] == '1' ) {
                              echo "checked='checked'";
                         }
                         ?>>
                                <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                    </label>
                    <p class="description"><?php _e( " Select 'Yes' if you want to enable the Pin It hover button over images ", APSS_TEXT_DOMAIN ); ?> </p>
               </div>
          </div>

     </div>

     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Pin it hover Size:', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <select name="pinit_options[icon_size]">
                         <option value='28' <?php
                         if ( $options[ 'pin_it_button_options' ][ 'icon_size' ] == '28' ) {
                              echo "selected='selected'";
                         }
                         ?>>
                                      <?php _e( 'Small', APSS_TEXT_DOMAIN ); ?>
                         </option>
                         <option value='32' <?php
                         if ( $options[ 'pin_it_button_options' ][ 'icon_size' ] == '32' ) {
                              echo "selected='selected'";
                         }
                         ?>>
                                      <?php _e( 'Large', APSS_TEXT_DOMAIN ); ?>
                         </option>
                    </select>
                    <p class="description"> <?php _e( 'Select pin it hover size', APSS_TEXT_DOMAIN ); ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3>  <?php _e( 'Pin it hover Shape:', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <select name="pinit_options[icon_shape]">
                         <option value="round" <?php
                         if ( $options[ 'pin_it_button_options' ][ 'icon_shape' ] == 'round' ) {
                              echo "selected='selected'";
                         }
                         ?>>
                                      <?php _e( 'Circular', APSS_TEXT_DOMAIN ); ?>
                         </option>
                         <option value="rectangle" <?php
                         if ( $options[ 'pin_it_button_options' ][ 'icon_shape' ] == 'rectangle' ) {
                              echo "selected='selected'";
                         }
                         ?>>
                                      <?php _e( 'Rectangular', APSS_TEXT_DOMAIN ); ?>
                         </option>
                    </select>
                    <p class="description"> <?php _e( 'Select pin it hover shape', APSS_TEXT_DOMAIN ); ?> </p>
               </div>
          </div>
     </div>
</div>