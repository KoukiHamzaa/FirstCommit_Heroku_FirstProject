<div class="ufb-each-form-field ufb-relative">
    <span class="ufb-drag-arrow"><i class="fa fa-arrows"></i></span>
    <div class="ufb-form-field-wrap ufb-without-field-wrap">
        <label class="ufb-field-label-ref"><?php echo ($val['field_label'] != '') ? esc_attr( $val['field_label'] ) : __( 'Untitled WYSIWYG Field', UFB_TD ); ?></label>
        <div class="ufb-form-field">
            
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
                <input type="text" name="field_data[<?php echo $key; ?>][field_label]" placeholder="<?php _e( 'Your Description', UFB_TD ); ?>" class="ufb-field-label-field ufb-field" value="<?php echo esc_attr( $val['field_label'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Editor Type', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <select name="field_data[<?php echo $key; ?>][editor_type]" class="ufb-field-notes-trigger">
                    <option value="rich" <?php selected( $val['editor_type'], 'rich' ); ?>><?php _e( 'Rich', UFB_TD ); ?></option>
                    <option value="visual" <?php selected( $val['editor_type'], 'visual' ); ?>><?php _e( 'Visual Only', UFB_TD ); ?></option>
                    <option value="text" <?php selected( $val['editor_type'], 'text' ); ?>><?php _e( 'Text/HTML Only', UFB_TD ); ?></option>
                </select>
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
                <input type="text" name="field_data[<?php echo $key; ?>][error_message]" placeholder="<?php _e( 'Please fill your URL', UFB_TD ); ?>" value="<?php echo esc_attr( $val['error_message'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Max Characters', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][max_chars]" placeholder='50' value="<?php echo esc_attr( $val['max_chars'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Min Characters', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][min_chars]" placeholder='20' value="<?php echo esc_attr( $val['min_chars'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label>
                <?php _e( 'Total Rows', UFB_TD ); ?>
                <?php echo UFB_Lib::generate_help_text( __( 'This is the total rows of the WYSIWYG editor.Default number of rows is 10.' ) ) ?>
            </label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][total_rows]" placeholder='10' value="<?php echo esc_attr( $val['total_rows'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Pre filled value', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][pre_filled_value]" value="<?php echo esc_attr( $val['pre_filled_value'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'ID of the field', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][field_id]" value="<?php echo esc_attr( $val['field_id'] ); ?>"/>
            </div>
        </div>
        <div class="ufb-form-field-wrap">
            <label><?php _e( 'Class of the field', UFB_TD ); ?></label>
            <div class="ufb-form-field">
                <input type="text" name="field_data[<?php echo $key; ?>][field_class]" value="<?php echo esc_attr( $val['field_class'] ); ?>"/>
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
        <input type="hidden" name="field_data[<?php echo $key; ?>][field_type]" value="wysiwyg"/>
    </div>
</div><!--ufb-each-form-field-->