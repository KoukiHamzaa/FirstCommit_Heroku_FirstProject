<div class="ufb-each-form-field ufb-relative">
    <span class="ufb-drag-arrow"><i class="fa fa-arrows"></i></span>
    <div class="ufb-form-field-wrap ufb-without-field-wrap">
        <label class="ufb-field-label-ref"><?php echo ($val['field_label'] == '') ? __( 'Untitled Star Rating', UFB_TD ) : esc_attr( $val['field_label'] ); ?></label>
        <div class="ufb-form-field">
            <img src="<?php echo UFB_IMG_DIR . '/star-rating-preview.jpg'; ?>"/>
        </div>
    </div><!--ufb-form-field-wrap-->
    <div class="ufb-field-controls">
        <a href="javascript:void(0)" class="ufb-field-settings-trigger button-primary"><?php _e( 'Settings', UFB_TD ); ?></a><span>+</span>
        <a href="javascript:void(0)" class="ufb-field-delete-trigger">Delete</a>
    </div>
    <div class="ufb-field-settings-wrap" style="display:none;">
        <span class="ufb-up-arrow"></span>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Field Label', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][field_label]" placeholder="<?php _e( 'Our Service', UFB_TD ); ?>" class="ufb-field-label-field" value="<?php echo esc_attr( $val['field_label'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label>
                <?php _e( 'Field Notes', UFB_TD ); ?>
                <?php echo UFB_Lib::generate_help_text( __( 'This field is to enable or disable the field notes or information for the field.', UFB_TD ) ); ?>
            </label>
            <div class="ufb-form-field">
                <?php $field_notes = isset( $val['field_notes'] ) ? $val['field_notes'] : '0'; ?>
                <select name="field_data[<?php echo $key; ?>][field_notes]" class="ufb-field-notes-trigger">
                    <option value="0" <?php selected( $val['field_notes'], '0' ); ?>><?php _e( 'Don\'t Show', UFB_TD ); ?></option>
                    <option value="sub-label" <?php selected( $val['field_notes'], 'sub-label' ); ?>><?php _e( 'Show as sub label', UFB_TD ); ?></option>
                    <option value="info-icon" <?php selected( $val['field_notes'], 'info-icon' ); ?>><?php _e( 'Show as info icon', UFB_TD ); ?></option>
                </select>
            </div>
        </div>
        <div class="ufb-form-field-wrap ufb-field-note-text" <?php if ( $val['field_notes'] == '0' ) { ?> style="display: none"<?php } ?>>
            <label>
                <?php _e( 'Note Text', UFB_TD ); ?>
                <?php echo UFB_Lib::generate_help_text( __( 'This field is for field note or field information text.', UFB_TD ) ); ?>
            </label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][note_text]" placeholder="<?php _e( 'Your Name', UFB_TD ); ?>" value="<?php echo isset( $val['note_text'] ) ? esc_attr( $val['note_text'] ) : ''; ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Required', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <?php $required = isset( $val['required'] ) ? 1 : 0; ?>
                <input type="checkbox" name="field_data[<?php echo $key; ?>][required]" value="1" <?php checked( $required, true ); ?>/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Error Message', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][error_message]" placeholder="<?php _e( 'Please give us a rating.', UFB_TD ); ?>" value="<?php echo esc_attr( $val['error_message'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap ufb-full-width ufb-op-wrap">
            <label><?php _e( 'Stars', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="button" value="<?php _e( 'Add Star', UFB_TD ); ?>" class="ufb-star-value-adder button-primary" name="<?php echo $key; ?>"/>
                <div class="ufb-star-value-wrap">
                    <?php
                    if ( isset( $val['value'] ) && is_array( $val['value'] ) && count( $val['value'] > 0 ) ) {
                        $count = 1;
                        foreach ( $val['value'] as $star_value ) {
                            ?>
                            <div class="ufb-each-star">
                                <div class="ufb-star-label-wrap">
                                    <span class="ufb-star-label">Value <?php echo $count; ?></span>
                                    <input type="text" name="field_data[<?php echo $key; ?>][value][]" value="<?php echo esc_attr( $star_value ); ?>" placeholder="1/5" />
                                </div>
                                <div class="ufb-star-label-wrap">
                                    <span class="ufb-star-label1">Label <?php echo $count; ?></span>
                                    <input type="text" name="field_data[<?php echo $key; ?>][label][]" value="<?php echo esc_attr( $val['label'][$count - 1] ); ?>" placeholder="Terrible" />
                                </div>
                                <span class="ufb-star-remover">X</span>
                            </div>
                            <?php
                            $count++;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'ID of the field', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][field_id]"  value="<?php echo esc_attr( $val['field_id'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Class of the field', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][field_class]"  value="<?php echo esc_attr( $val['field_class'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label>
                <?php _e( 'Column', UFB_TD ); ?>
                <?php echo UFB_Lib::generate_help_text( __( 'This is the column wise display of your field.', UFB_TD ) ); ?>
            </label>
            <div class="ufb-form-field">
                <?php $column = isset( $val['column'] ) ? $val['column'] : '1' ?>
                <select name="field_data[<?php echo $key; ?>][column]">
                    <option value="1" <?php selected( $column, '1' ); ?>>1</option>
                    <option value="2" <?php selected( $column, '2' ); ?>>2</option>
                    <option value="3" <?php selected( $column, '3' ); ?>>3</option>
                    <option value="4" <?php selected( $column, '4' ); ?>>4</option>
                </select>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label>
                <?php _e( 'Hidden by Default', UFB_TD ); ?>
                <?php echo UFB_Lib::generate_help_text( __( 'Check if you want to hide this element at the beginning of the form load. It is useful when you want show with some conditional logic.', UFB_TD ) ); ?>                 
            </label>
            <div class="ufb-form-field">
                <input type="checkbox" name="field_data[<?php echo $key; ?>][hidden]" value="1" <?php echo (isset( $val['hidden'] ) && $val['hidden'] == 1) ? 'checked="checked"' : ''; ?>/>
            </div>
        </div>
        <input type="hidden" name="field_data[<?php echo $key; ?>][field_type]" value="star-rating" />
    </div>
</div><!--ufb-each-form-field-->
