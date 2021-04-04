<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<div class="apss-tab-contents apss-share-options" id="tab-apss-customizations-settings" style='display:none'>
<?php
$icon_color = (isset($options['icon_color']) && $options['icon_color'] != "") ? $options['icon_color'] : "";
$text_color = (isset($options['text_color']) && $options['text_color'] != "") ? $options['text_color'] : "";
$background_color = (isset($options['background_color']) && $options['background_color'] != "") ? $options['background_color'] : "";
$hover_color = (isset($options['hover_color']) && $options['hover_color'] != "") ? $options['hover_color'] : "";
$custom_css = (isset($options['custom_css']) && $options['custom_css'] != "") ? $options['custom_css'] : "";
?>
    <div class="apss-subhead">
        <h2><?php _e('Customization Settings', APSS_TEXT_DOMAIN) ?></h2>
    </div>
    <div class="icon-color-options">
        <div class="apss-row-odd">
            <div class="apss-general-div" >
                <div class="apss-title-div">
                    <label><?php _e('Icon Color', APSS_TEXT_DOMAIN); ?></label>
                </div>
                <div class="apss-option-value">
                    <label>
                        <input type="text" name="apss_share_settings[icon_color]" value="<?php echo esc_attr($icon_color); ?>" id="icon_bg_color" class="cpa-color-picker"  />
                    </label>
                    <p class="description"> <?php _e('Set icon color or leave empty to set the default value', APSS_TEXT_DOMAIN) ?> </p>
                </div>
            </div>
        </div>
        <div class="apss-row-even">
            <div class="apss-general-div" >
                <div class="apss-title-div">
                    <label><?php _e('Text Color', APSS_TEXT_DOMAIN); ?></label>
                </div>
                <div class="apss-option-value">
                    <label>
                        <input type="text" name="apss_share_settings[text_color]" value="<?php echo esc_attr($text_color); ?>" id="icon_bg_color" class="cpa-color-picker"  />
                    </label>
                    <p class="description"> <?php _e('Set text color or leave empty to set the default value', APSS_TEXT_DOMAIN) ?> </p>
                </div>
            </div>
        </div>
        <div class="apss-row-odd">
            <div class="apss-general-div"> 
                <div class="apss-title-div">
                    <label><?php _e('Background Color', APSS_TEXT_DOMAIN); ?></label>
                </div>
                <div class="apss-option-value">
                    <label>
                        <input type="text" name="apss_share_settings[background_color]" value="<?php echo esc_attr($background_color); ?>" id="icon_bg_color" class="cpa-color-picker"  />
                    </label>
                    <p class="description"> <?php _e('Set background color or leave empty to set the default value', APSS_TEXT_DOMAIN) ?> </p>
                </div>
            </div>
        </div>
        <div class="apss-row-even">
            <div class="apss-general-div">
                <div class="apss-title-div">
                    <label><?php _e('Hover Color', APSS_TEXT_DOMAIN); ?></label>
                </div>
                <div class="apss-option-value">
                    <label>
                        <input type="text" name="apss_share_settings[hover_color]" value="<?php echo esc_attr($hover_color); ?>" id="icon_font_color" class="cpa-color-picker"  />
                    </label>
                    <p class="description"> <?php _e('Set hover color or leave empty to set the default value', APSS_TEXT_DOMAIN) ?> </p>
                </div>
            </div>
        </div>
        <div class="apss-row-odd">
            <div class="apss-general-div">
                <div class="apss-title-div"> 
                    <label><?php _e('Custom CSS', APSS_TEXT_DOMAIN) ?>  </label>
                </div>
                <div class="apss-option-value">
                    <label>
                        <textarea rows="5" cols="10" name="apss_share_settings[custom_css]" id="custom_css"><?php echo esc_attr($custom_css); ?></textarea>
                    </label>
                    <p class="description"> <?php _e('Please include your custom CSS here that you want to include for the plugin', APSS_TEXT_DOMAIN) ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>