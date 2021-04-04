<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Fucntions for rendering metaboxes in post area
 * 
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 */

add_action( 'add_meta_boxes', 'vmagazine_page_metabox' );

if( !function_exists( 'vmagazine_page_metabox' ) ):
	function vmagazine_page_metabox() {
		add_meta_box(
			'vmagazine_post_metabox_settings', // $id
			esc_html__( 'Page Options', 'vmagazine-companion' ), // $title
			'vmagazine_page_metabox_settings_callback', // $callback
			'page', // $page
			'normal', // $context
			'high'
        ); // $priority
	}
endif; //vmagazine_page_metabox

function vmagazine_page_sidebars(){

    $vmagazine_page_sidebar = array(
        'default-layout' => array(
                        'value'     => 'default_sidebar',
                        'label'     => esc_html__( 'Default Sidebar', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value'     => 'right_sidebar',
                        'label'     => esc_html__( 'Right sidebar', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'
                    ),
        'left-sidebar' => array(
                        'value'     => 'left_sidebar',
                        'label'     => esc_html__( 'Left sidebar', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no_sidebar',
                        'label'     => esc_html__( 'No sidebar Full width', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
                    )
         

    );

    return $vmagazine_page_sidebar;
}

/**
 * Call back function for post option
 */
if( !function_exists( 'vmagazine_page_metabox_settings_callback' ) ):

	function vmagazine_page_metabox_settings_callback() {
		global $post;
        
        $vmagazine_page_sidebar = vmagazine_page_sidebars();

		wp_nonce_field( basename( __FILE__ ), 'vmagazine_page_meta_nonce' );
?>
	<ul class="vmagazine-page-meta-tabs">
        <li class="meta-menu-sidebars active" atr="pg-metabox-sidebars"><i class="fa fa-map-o"></i><?php esc_html_e( 'Sidebars', 'vmagazine-companion' ); ?></li>
    </ul><!--.tmp-page-meta-tabs-->
    <div class="pg-metabox">
            <!-- Header -->
            <div id="pg-metabox-info" class="pg-metabox-inside">
                <h3><?php esc_html_e( 'About Metabox Options', 'vmagazine-companion' ); ?></h3>
                <hr />
                <ul>
                    <li><?php esc_html_e( 'Sidebars is globally available to every post type you create.', 'vmagazine-companion' ); ?></li>
                </ul>
            </div><!-- #pg-metabox-info-->

            <!-- Page sidebars -->
            <div id="pg-metabox-sidebars" class="pg-metabox-inside">
            	<div class="meta-row">
                    <div class="meta-title"> <?php esc_html_e( 'Available Sidebars', 'vmagazine-companion' ); ?> </div>
                    <span class="section-desc"><em><?php esc_html_e( 'Select available sidebar which replaced sidebar layout from customizer settings.', 'vmagazine-companion' ); ?></em></span>
                    <div class="meta-options">
                        <div class="layout-thmub-section">
			                <ul class="single-sidebar-layout" id="vmagazine-img-container-meta">
			                <?php
			                    $img_count = 0 ; 
			                   foreach ( $vmagazine_page_sidebar as $field ) {
			                        $img_count++;
			                        $vmagazine_sidebar_meta_layout = get_post_meta( $post->ID, 'vmagazine_page_sidebar', true );
			                        $default_class ='';
			                        if( empty( $vmagazine_sidebar_meta_layout ) && $img_count == 1 ){
			                            $default_class = 'vmagazine-radio-img-selected';
			                        }
			                        $img_class = ( $field['value'] == $vmagazine_sidebar_meta_layout )?'vmagazine-radio-img-selected vmagazine-radio-img-img':'vmagazine-radio-img-img'; 
			                ?>
			                    <li>
			                        <label>
			                            <img class="<?php echo esc_attr( $default_class.' '.$img_class );?>" src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] );?>" title="<?php echo esc_attr( $field['label'] );?>" />
			                            <input style = 'display:none' type="radio" value="<?php echo esc_attr( $field['value'] ); ?>" name="vmagazine_page_sidebar" <?php checked( $field['value'], $vmagazine_sidebar_meta_layout ); if( empty( $vmagazine_sidebar_meta_layout ) && $field['value'] == 'default_sidebar' ){ echo "checked='checked'";}  ?> />
			                        </label>
			                    </li>
			                    
			                <?php } ?>
			                </ul>
			            </div><!-- .layout-thmub-section -->
                    </div><!-- .meta-options -->
                </div>
            </div><!-- #pg-metabox-sidebars -->
        </div><!--.pg-metabox-->
    <div class="clear"></div>
<?php
	}
endif;

/**
 * Function for save sidebar layout of post
 */
add_action( 'save_post', 'vmagazine_save_page_settings' );

if( ! function_exists( 'vmagazine_save_page_settings' ) ):

function vmagazine_save_page_settings( $post_id ) {

    global $post;
     $vmagazine_page_sidebar = vmagazine_page_sidebars();
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'vmagazine_page_meta_nonce' ] ) || !wp_verify_nonce( $_POST[ 'vmagazine_page_meta_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
    	return;
    }        
        
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ){
        	return $post_id;  
        }            
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }


    /*Post sidebar*/    
    $old = get_post_meta( $post_id, 'vmagazine_page_sidebar', true ); 
    $new = sanitize_text_field( $_POST['vmagazine_page_sidebar'] );
    if ( $new && $new != $old ) {  
        update_post_meta ( $post_id, 'vmagazine_page_sidebar', $new );  
    } elseif ( '' == $new && $old ) {  
        delete_post_meta( $post_id,'vmagazine_page_sidebar', $old );  
    }

}
endif;