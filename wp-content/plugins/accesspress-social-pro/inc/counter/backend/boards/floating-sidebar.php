<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apsc-boards-tabs" id="apsc-board-float-sidebar-settings" style="display:none">
     <div class="apsc-option-inner-wrapper apsc-row-odd">
          <label for="apsc-floating-sidebar"><?php _e( 'Enable Floating Sidebar', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <label  class="apsc-checkbox" >
                    <input type="checkbox" name="floating_sidebar[active]" value="1" id="apsc-floating-sidebar" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'active' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'active' ] == '1') ? 'checked="checked"' : ''; ?>/>
                    <label class="apsc-general-checkbox" for="apsc-floating-sidebar">
                         <?php _e( 'Yes', 'ap-social-pro' ); ?>
                    </label>
                    <div class="apsc-check round"></div>
               </label>
               <div class="apsc-option-note"><?php _e( 'Check if you want to show floating sidebar in the frontend', 'ap-social-pro' ); ?></div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even">
          <label><?php _e( 'Display Floating Sidebar In', 'ap-social-pro' ); ?> :</label>
          <div class="apsc-option-field">
               <select name="floating_sidebar[show]">
                    <option value="all" <?php echo ($apsc_settings[ 'floating_sidebar' ][ 'show' ] == 'all') ? 'selected="selected"' : ''; ?>><?php _e( 'All pages', 'ap-social-pro' ); ?></option>
                    <option value="only_homepage" <?php echo ($apsc_settings[ 'floating_sidebar' ][ 'show' ] == 'only_homepage') ? 'selected="selected"' : ''; ?>><?php _e( 'Only on homepage', 'ap-social-pro' ); ?></option>
                    <option value="except_homepage" <?php echo ($apsc_settings[ 'floating_sidebar' ][ 'show' ] == 'except_homepage') ? 'selected="selected"' : ''; ?>><?php _e( 'Except homepage', 'ap-social-pro' ); ?></option>
               </select>
               <div class="apsc-option-note"><?php _e( 'Select where you want your floating buttons to be displayed in the frontend', 'ap-social-pro' ); ?></div>

          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-odd apsc-chose-theme">
          <label><?php _e( 'Choose Theme', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <select name="floating_sidebar[theme]" id="floating-template" class="apsc-display template-dropdown" size="1" >

                    <?php for ( $i = 1; $i <= 25; $i ++ ) { ?>
                         <option class="apsc-temp" value="theme-<?php echo $i; ?>" <?php if ( isset( $apsc_settings[ 'floating_sidebar' ][ 'theme' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'theme' ] == "theme-$i" ) { ?>selected="selected"<?php } ?>>
                              <?php
                              _e( 'Theme ' . $i, 'ap-social-pro' );
                              ?>
                         </option>
                    <?php } ?>
               </select>
               <div class="apsc-template-demo" >
                    <?php
                    $cnt = 1;
                    for ( $i = 1; $i <= 25; $i ++ ) {
                         ?>
                         <div class="apsc-common-floating" id="apsc-temp-demo-floating<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
                              <div class="apsc-preview"> Preview </div>
                              <div class="apsc-display-template apsc-clearfix">
                                   <img src="<?php echo SC_PRO_IMAGE_DIR . '/floating-bar/floatingbartheme' . $i . '.jpg ' ?>"/>
                              </div>
                         </div>
                         <?php
                         $cnt ++;
                    }
                    ?>
               </div>
               <div class="apsc-option-note"><?php _e( 'Select any one of the above template/theme for your floating sidebar', 'ap-social-pro' ); ?></div>

          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even apsc-hover-side-bg">
          <label><?php _e( 'Hover Background Color', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <input type="text" name="floating_sidebar[hover_color]" class="apsc-colorpicker" value="<?php echo isset( $apsc_settings[ 'floating_sidebar' ][ 'hover_color' ] ) ? $apsc_settings[ 'floating_sidebar' ][ 'hover_color' ] : ''; ?>"/>
               <div class="apsc-option-note"><?php _e( 'Please keep blank if you don\'t want to change the background color of icon on mouser hover', 'ap-social-pro' ); ?></div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-odd">
          <label><?php _e( 'Floating Sidebar Position', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <select name="floating_sidebar[position]">
                    <option value="left-top" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'left-top') ? 'selected="selected"' : ''; ?>><?php _e( 'Left Top', 'ap-social-pro' ); ?></option>
                    <option value="left-middle" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'left-middle') ? 'selected="selected"' : ''; ?>><?php _e( 'Left Middle', 'ap-social-pro' ); ?></option>
                    <option value="left-bottom" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'left-bottom') ? 'selected="selected"' : ''; ?>><?php _e( 'Left Bottom', 'ap-social-pro' ); ?></option>
                    <option value="right-top" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'right-top') ? 'selected="selected"' : ''; ?>><?php _e( 'Right Top', 'ap-social-pro' ); ?></option>
                    <option value="right-middle" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'right-middle') ? 'selected="selected"' : ''; ?>><?php _e( 'Right Middle', 'ap-social-pro' ); ?></option>
                    <option value="right-bottom" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'position' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'position' ] == 'right-bottom') ? 'selected="selected"' : ''; ?>><?php _e( 'Right Bottom', 'ap-social-pro' ); ?></option>
               </select>
               <div class="apsc-option-note"><?php _e( 'Select any one of the floating position for your sidebar', 'ap-social-pro' ); ?></div>

          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even">
          <label><?php _e( 'Counter Format', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <label><input type="radio" name="sidebar_counter_format" value="default" <?php echo (isset( $apsc_settings[ 'sidebar_counter_format' ] ) && $apsc_settings[ 'sidebar_counter_format' ] == 'default') ? 'checked="checked"' : ''; ?>/>12300</label>
               <label><input type="radio" name="sidebar_counter_format" value="comma" <?php echo (isset( $apsc_settings[ 'sidebar_counter_format' ] ) && $apsc_settings[ 'sidebar_counter_format' ] == 'comma') ? 'checked="checked"' : ''; ?>/>12,300</label>
               <label><input type="radio" name="sidebar_counter_format" value="short" <?php echo (isset( $apsc_settings[ 'sidebar_counter_format' ] ) && $apsc_settings[ 'sidebar_counter_format' ] == 'short') ? 'checked="checked"' : ''; ?>/>12.3K</label>
               <div class="apsc-option-note"><?php _e( 'Select any one of the counter format for your sidebar', 'ap-social-pro' ); ?></div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-odd">
          <label for="apsc-mobile-device"><?php _e( 'Hide In Mobile Devices', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <label  class="apsc-checkbox" >
                    <input type="checkbox" name="mobile_hide" id="apsc-mobile-device" value="1" <?php echo (isset( $apsc_settings[ 'mobile_hide' ] ) && $apsc_settings[ 'mobile_hide' ] == '1') ? 'checked="checked"' : ''; ?>/>

                    <label class="apsc-general-checkbox" for="apsc-mobile-device">
                         <?php _e( 'Yes', 'ap-social-pro' ); ?>
                    </label>
                    <div class="apsc-check round"></div>
                    <div class="apsc-option-note"><?php _e( 'Check if you want to hide floating sidebar in the mobile devices', 'ap-social-pro' ); ?></div>

               </label>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even">
          <label><?php _e( 'Social Profiles', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <textarea name="floatbar_profiles" rows="8"><?php echo (isset( $apsc_settings[ 'floatbar_profiles' ] )) ? $apsc_settings[ 'floatbar_profiles' ] : ''; ?></textarea>
               <div class="apsc-option-note"><?php _e( 'Please enter the list of social profiles separated with comma if you want the social networking buttons or their buttons to be different than one set previously in "Display Settings" tab', 'ap-social-pro' ); ?></div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-odd">
          <label for="apsc-semi-transparent"><?php _e( 'Semi Transparent', 'ap-social-pro' ); ?></label>
          <div class="apsc-option-field">
               <label  class="apsc-checkbox" >
                    <input type="checkbox" name="floating_sidebar[semi_transparent]" value="1" id="apsc-semi-transparent" <?php echo (isset( $apsc_settings[ 'floating_sidebar' ][ 'semi_transparent' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'semi_transparent' ] == '1') ? 'checked="checked"' : ''; ?>/>
                    <label class="apsc-general-checkbox" for="apsc-semi-transparent">
                         <?php _e( 'Yes', 'ap-social-pro' ); ?>
                    </label>
                    <div class="apsc-check round"></div>
               </label>
               <div class="apsc-option-note"><?php _e( 'Check if you want to make floating sidebar semi transparent', 'ap-social-pro' ); ?></div>
          </div>
     </div>
</div>