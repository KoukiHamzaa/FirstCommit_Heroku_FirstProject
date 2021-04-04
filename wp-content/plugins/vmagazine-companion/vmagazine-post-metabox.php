<?php 
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

/**
 * Fucntions for rendering metaboxes in post area
 * 
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 */

add_action( 'add_meta_boxes', 'vmagazine_post_metabox' );

if( !function_exists( 'vmagazine_post_metabox' ) ):
	function vmagazine_post_metabox() {
		add_meta_box(
			'vmagazine_post_metabox_settings', // $id
			esc_html__( 'Post Options', 'vmagazine-companion' ), // $title
			'vmagazine_post_metabox_settings_callback', // $callback
			'post', // $page
			'normal', // $context
			'high'
        ); // $priority
	}
endif; //vmagazine_post_metabox

 function vmagazine_post_sidebars(){

	$vmagazine_post_sidebar = array(
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
        'both-sidebar' => array(
                        'value'     => 'both_sidebar',
                        'label'     => esc_html__( 'Both sidebars', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/both-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no_sidebar',
                        'label'     => esc_html__( 'No sidebar Full width', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
                    ),
        
       

    );

    return $vmagazine_post_sidebar;

}

function vmagazine_post_layouts(){

	$vmagazine_post_layout = array(
        'post-layout' => array(
                        'value'     => 'post_layout',
                        'label'     => esc_html__( 'Post Layout (Default) ', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
                    ), 
        'post-layout1' => array(
                        'value'     => 'post_layout1',
                        'label'     => esc_html__( 'Post Layout 1', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/postlayout1.jpg'
                    ),

        'post-layout2' => array(
                        'value'     => 'post_layout2',
                        'label'     => esc_html__( 'Post Layout 2', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/postlayout2.jpg'
                    ),
        'post-layout3' => array(
                        'value'     => 'post_layout3',
                        'label'     => esc_html__( 'Post Layout 3', 'vmagazine-companion' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/postlayout3.jpg'
                    )
    );

    return $vmagazine_post_layout;
}

function vmagazine_post_review_types(){
	
	$post_review_type = array(
                        'no_review' => esc_html__( 'No Review','vmagazine-companion' ),
                        'star_review' => esc_html__( 'Star Review','vmagazine-companion' ),
                        'percent_review' => esc_html__( 'Percentage Review','vmagazine-companion' ),
                        'point_review' => esc_html__( 'Point Review','vmagazine-companion' )
                    );

    return  $post_review_type;
}

function vmagazine_post_star_review(){

	$post_star_review = array(
                        '5' => esc_html__( '5 Stars', 'vmagazine-companion' ),
                        '4.5' => esc_html__( '4.5 Stars', 'vmagazine-companion' ),
                        '4' => esc_html__( '4 Stars', 'vmagazine-companion' ),
                        '3.5' => esc_html__( '3.5 Stars', 'vmagazine-companion' ),
                        '3' => esc_html__( '3 Stars', 'vmagazine-companion' ),
                        '2.5' => esc_html__( '2.5 Stars', 'vmagazine-companion' ),
                        '2' => esc_html__( '2 Stars', 'vmagazine-companion' ),
                        '1.5' => esc_html__( '1.5 Stars', 'vmagazine-companion' ),
                        '1' => esc_html__( '1 Stars', 'vmagazine-companion' ),
                        '0.5' => esc_html__( '0.5 Stars', 'vmagazine-companion' )

                    );	

	return $post_star_review;
}


/**
 * Call back function for post option
 */
if( !function_exists( 'vmagazine_post_metabox_settings_callback' ) ):

	function vmagazine_post_metabox_settings_callback() {
		global $post;

		$vmagazine_post_layout = vmagazine_post_layouts();
		$post_review_type = vmagazine_post_review_types();
		$post_star_review = vmagazine_post_star_review();
		$vmagazine_post_sidebar = vmagazine_post_sidebars();

		wp_nonce_field( basename( __FILE__ ), 'vmagazine_post_meta_nonce' );
        $get_post_meta_identity = get_post_meta( $post->ID, 'post_meta_identity', true );
        $post_identity_value = empty( $get_post_meta_identity ) ? 'pg-metabox-info' : $get_post_meta_identity;
?>
	<ul class="vmagazine-page-meta-tabs">
        
        <li class="meta-menu-titlebar active <?php if( $post_identity_value == 'pg-metabox-sidebars' ) { echo 'active'; } ?>" atr="pg-metabox-sidebars"><i class="fa fa-map-o"></i><?php esc_html_e( 'Sidebars', 'vmagazine-companion' ); ?></li>
        <li class="meta-menu-titlebar <?php if( $post_identity_value == 'pg-metabox-layout' ) { echo 'active'; } ?>" atr="pg-metabox-layout"><i class="fa fa-newspaper-o"></i><?php esc_html_e( 'Post Layouts', 'vmagazine-companion' ); ?></li>
        <li class="meta-menu-titlebar <?php if( $post_identity_value == 'pg-metabox-review' ) { echo 'active'; } ?>" atr="pg-metabox-review"><i class="fa fa-weixin"></i><?php esc_html_e( 'Post Review', 'vmagazine-companion' ); ?></li>
        <li class="meta-menu-titlebar <?php if( $post_identity_value == 'pg-metabox-format' ) { echo 'active'; } ?>" atr="pg-metabox-format"><i class="fa fa-cubes"></i><?php esc_html_e( 'Post Format', 'vmagazine-companion' ); ?></li>
        <li class="meta-menu-titlebar <?php if( $post_identity_value == 'pg-metabox-format' ) { echo 'active'; } ?>" atr="pg-metabox-ads"><i class="fa fa-buysellads"></i><?php esc_html_e( 'Post ADS', 'vmagazine-companion' ); ?></li>
    </ul><!--.tmp-page-meta-tabs-->
    <div class="pg-metabox">
        <!-- Header -->
        <div id="pg-metabox-info" class="pg-metabox-inside">
            <ul>
                <li><?php esc_html_e( 'Sidebars is globally available to every post type you create.', 'vmagazine-companion' ); ?></li>
            </ul>
        </div><!-- #pg-metabox-info-->

        <!-- Post sidebars -->
        <div id="pg-metabox-sidebars" class="pg-metabox-inside">
        	<div class="meta-row">
                <div class="meta-title"> <?php esc_html_e( 'Available Sidebars', 'vmagazine-companion' ); ?> </div>
                <span class="section-desc"><em><?php esc_html_e( 'Select available sidebar which replaced sidebar layout from customizer settings.', 'vmagazine-companion' ); ?></em></span>
                <div class="meta-options">
                    <div class="layout-thmub-section">
		                <ul class="single-sidebar-layout" id="vmagazine-img-container-meta">
		                <?php
		                    $img_count = 0 ; 
		                   foreach ( $vmagazine_post_sidebar as $field ) {
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
		            </div><!-- .layout-thumb-section -->
                </div><!-- .meta-options -->
            </div><!-- .meta-row -->
        </div><!-- #pg-metabox-sidebars -->

        <!-- Post Layout -->
        <div id="pg-metabox-layout" class="pg-metabox-inside">
            <div class="meta-row">
                <div class="meta-title"> <?php esc_html_e( 'Available Layouts', 'vmagazine-companion' ); ?> </div>
                <span class="section-desc"><em><?php esc_html_e( 'Select post layout from available options.', 'vmagazine-companion' ); ?></em></span>
                <div class="meta-options">
                    <div class="layout-thmub-section">
                        <ul class="single-post-layout vmagazine-img-container-meta-layouts" id="vmagazine-img-container-meta">
                        <?php
                            $img_count = 0 ; 
                           foreach ( $vmagazine_post_layout as $field ) {
                                $img_count++;
                                $vmagazine_post_meta_layout = get_post_meta( $post->ID, 'vmagazine_post_layout', true );
                                $default_class ='';
                                if( empty( $vmagazine_post_meta_layout ) && $img_count == 1 ){
                                    $default_class = 'vmagazine-radio-img-selected';
                                }
                                $img_class = ( $field['value'] == $vmagazine_post_meta_layout )?'vmagazine-radio-img-selected vmagazine-radio-img-img':'vmagazine-radio-img-img'; 
                        ?>
                            <li>
                                <label>
                                    <img class="<?php echo esc_attr( $default_class.' '.$img_class );?>" src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] );?>" title="<?php echo esc_attr( $field['label'] );?>" />
                                    <input style = 'display:none' type="radio" value="<?php echo esc_attr( $field['value'] ); ?>" name="vmagazine_post_layout" <?php checked( $field['value'], $vmagazine_post_meta_layout ); if( empty( $vmagazine_post_meta_layout ) && $field['value'] == 'post_layout' ){ echo "checked='checked'";}  ?> />
                                </label>
                            </li>
                            
                        <?php } ?>
                        </ul>
                    </div><!-- .layout-thumb-section -->
                </div><!-- .meta-options -->
            </div><!-- .meta-row -->
        </div><!-- #pg-metabox-layouts -->

        <!-- Post review -->
        <div id="pg-metabox-review" class="pg-metabox-inside">
            <div class="meta-row">
                <div class="meta-title"> <?php esc_html_e( 'Types of Review', 'vmagazine-companion' ); ?> </div>
                <span class="section-desc"><em><?php esc_html_e( 'Choose types of review from select box.', 'vmagazine-companion' ); ?></em></span>
                <div class="meta-options">
                    <?php
                        $vmagazine_review_option = get_post_meta( $post->ID, 'post_review_option', true );

                        $star_rating = get_post_meta( $post->ID, 'star_rating', true );
                        $star_review_count = get_post_meta( $post->ID, 'star_review_count', true );

                        $percent_rating = get_post_meta( $post->ID, 'percent_rating', true );
                        $precent_review_count = get_post_meta( $post->ID, 'percent_review_count', true );

                        $point_rating = get_post_meta( $post->ID, 'points_rating', true );
                        $point_review_count = get_post_meta( $post->ID, 'points_review_count', true );

                        //Execute this saving function
                        $vmagazine_allowed_textarea = array(
                                    'a' => array(
                                        'href' => array(),
                                        'title' => array()
                                    ),
                                    'br' => array(),
                                    'em' => array(),
                                    'strong' => array(),
                                );

                        $vmagazine_get_review_description = get_post_meta( $post->ID, 'post_review_description', true );

                    ?>
                    <div class="type-selector">
                        <select id="reviewSelector" name="post_review_option" class="vmagazine-panel-dropdown">
                            <?php foreach( $post_review_type as $post_review => $post_review_label ) { ?>
                                <option value="<?php echo esc_attr( $post_review ); ?>" <?php selected( $vmagazine_review_option, $post_review ); ?>><?php echo esc_html( $post_review_label ); ?></option>
                            <?php } ?>
                        </select>
                    </div><!-- .type-selector -->
                    <div id="type-star_review" class="review-types">
                        <div class="star-review-label review-title"><strong><?php esc_html_e( 'Add star ratings for this post :', 'vmagazine-companion' );?></strong></div>
                        <div class="post-review-section star-section">
                            <?php
                                $count = 0;
                                if( !empty( $star_rating ) ){
                                    foreach ( $star_rating as $rate_value ) {
                                        if( !empty( $rate_value['feature_name'] ) || !empty( $rate_value['feature_star'] ) ) {
                                        $count++;
                            ?>

                            <div class="review-section-group star-group">
                                <span class="custom-label"><?php esc_html_e( 'Feature Name:', 'vmagazine-companion' );?></span>
                                <input style="width: 300px;" type="text" name="star_ratings[<?php echo esc_attr($count); ?>][feature_name]" value="<?php echo esc_attr($rate_value['feature_name']); ?>"/>
                                <select name="star_ratings[<?php echo esc_attr($count); ?>][feature_star]">
                                    <option value=""><?php esc_html_e( 'Select rating', 'vmagazine-companion' );?></option>
                                    <?php foreach ( $post_star_review as $key => $value ) { ?>
                                            <option value="<?php echo esc_attr( $key ); ?>"<?php selected( $rate_value['feature_star'], $key ); ?>><?php echo esc_html( $value ); ?></option>
                                    <?php } ?>
                                </select>
                                <a href="javascript:void(0)" class="delete-review-stars dlt-btn button"><?php esc_html_e( 'Delete', 'vmagazine-companion' ) ;?></a>
                            </div><!-- .review-section-group -->
                            <?php
                                        }
                                    } 
                                }
                            ?>
                        </div><!-- .post-review-section.star-section -->
                        <input id="post_star_review_count" type="hidden" name="star_review_count" value="<?php echo esc_attr($count); ?>" />
                        <a href="javascript:void(0)" class="add-review-stars add-review-btn button"><?php esc_html_e( 'Add rating category', 'vmagazine-companion' );?></a>
                    </div><!-- #type-star_review -->

                    <div id="type-percent_review" class="review-types">
                        <div class="percent-review-label review-title"><strong><?php esc_html_e( 'Add Percentage ratings for this post :', 'vmagazine-companion' );?></strong></div>
                        <div class="post-review-section percent-section">
                            <?php 
                                $p_count = 0;
                                if( !empty( $percent_rating ) ) {
                                    foreach ( $percent_rating as $key => $value ) {
                                        $p_count++;
                            ?>
                                    <div class="review-section-group percent-group">
                                        <span class="custom-label"><?php esc_html_e( 'Feature Name:', 'vmagazine-companion' );?></span>
                                            <input style="width: 300px;" type="text" name="percent_ratings[<?php echo esc_attr($p_count); ?>][feature_name]" value="<?php echo esc_html( $value['feature_name'] ); ?>"/>
                                        <span class="opt-sep"><?php esc_html_e( 'Percent: ', 'vmagazine-companion' );?></span>
                                        <input style="width: 100px;" type="number" min="1" max="100" name="percent_ratings[<?php echo esc_attr($p_count); ?>][feature_percent]" value="<?php echo intval( $value['feature_percent'] ); ?>" step="1"/>
                                        <a href="javascript:void(0)" class="delete-review-percents dlt-btn button"><?php esc_html_e( 'Delete', 'vmagazine-companion' ) ;?></a>
                                    </div><!-- .review-section-group -->
                            <?php 
                                    }
                                }
                            ?>
                        </div><!-- .post-review-section.percent-section -->
                        <input id="post_precent_review_count" type="hidden" name="percent_review_count" value="<?php echo intval( $p_count ); ?>" />
                        <a href="javascript:void(0)" class="add-review-percents add-review-btn button"><?php esc_html_e( 'Add rating category', 'vmagazine-companion' );?></a>
                    </div><!-- #type-percentage_review -->

                    <div id="type-point_review" class="review-types">
                        <div class="point-review-label review-title"><strong><?php esc_html_e( 'Add Point ratings for this post :', 'vmagazine-companion' );?></strong></div>
                        <div class="post-review-section points-section">
                            <?php 
                                $pn_count = 0;
                                if( !empty( $point_rating ) ) {
                                    foreach ( $point_rating as $key => $value ) {
                                        $pn_count++;
                                        
                                        $val = isset($value['feature_points']) ? $value['feature_points'] : $value['feature_percent'];
                            ?>
                                    <div class="review-section-group points-group">
                                        <span class="custom-label"><?php esc_html_e( 'Feature Name:', 'vmagazine-companion' );?></span>
                                            <input style="width: 300px;" type="text" name="points_ratings[<?php echo esc_attr($pn_count); ?>][feature_name]" value="<?php echo esc_html( $value['feature_name'] ); ?>"/>
                                        <span class="opt-sep"><?php esc_html_e( 'Points: ', 'vmagazine-companion' );?></span>
                                        <input style="width: 100px;" type="number" min="1" max="10" name="points_ratings[<?php echo esc_attr($pn_count); ?>][feature_points]" value="<?php echo intval( $val ); ?>" step="1"/>
                                        <a href="javascript:void(0)" class="delete-review-points dlt-btn button"><?php esc_html_e( 'Delete', 'vmagazine-companion' ) ;?></a>
                                    </div><!-- .review-section-group -->
                            <?php 
                                    }
                                }
                            ?>
                        </div><!-- .post-review-section.point-section -->
                        <input id="post_points_review_count" type="hidden" name="points_review_count" value="<?php echo intval( $pn_count ); ?>" />
                        <a href="javascript:void(0)" class="add-review-points add-review-btn button"><?php esc_html_e( 'Add rating category', 'vmagazine-companion' );?></a>
                    </div><!-- #type-point_review -->

                    <div class="post-review-desc">
                        <div class="review-title"><strong><?php esc_html_e( 'Review description:', 'vmagazine-companion' );?></strong></div>
                        <p class="review-textarea">
                            <textarea row="5" name="post_review_description"><?php echo wp_kses_post( $vmagazine_get_review_description ); ?></textarea>
                        </p>
                    </div><!-- .post-review-desc -->

                </div><!-- .meta-options -->
            </div><!-- .meta-row -->
        </div><!-- #pg-metabox-review -->

        <!-- Post format -->
        <div id="pg-metabox-format" class="pg-metabox-inside">
            <div class="meta-row">
                <div class="meta-options">
                    <div class="format-type-field" id="format-standard">
                        <div class="meta-title"><?php esc_html_e( 'Standard Format', 'vmagazine-companion' ); ?></div>
                        <div class="meta-desc"><?php esc_html_e( 'Currently standard format has been selected', 'vmagazine-companion' ); ?></div><!-- .meta-desc -->
                    </div><!-- #format-standard -->

                    <div class="format-type-field" id="format-video">
                        <?php $video_url_value = get_post_meta( $post->ID, 'post_embed_video_url', true ); ?>
                        <div class="meta-title"><?php esc_html_e( 'Video Format', 'vmagazine-companion' ); ?></div>
                        <div class="format-label"><strong><?php esc_html_e( 'Embed video url', 'vmagazine-companion' );?></strong></div>
                        <div class="format-input">
                            <input type="text" name="post_embed_video_url" size="90" class="post-video-url" value="<?php echo esc_url( $video_url_value ); ?>" />
                            <input class="button" type="button" id="reset-video-embed" value="<?php esc_html_e( 'Reset url', 'vmagazine-companion' ); ?>" />
                        </div><!-- .format-input -->
                        <span><em><?php esc_html_e( 'Please use youtube/vimeo video url ( https://www.youtube.com/watch?v=cXhXy6DIhDY ).', 'vmagazine-companion' ); ?></em></span>
                    </div><!-- #format-video -->

                    <div class="format-type-field" id="format-audio">
                        <?php $audio_url_value = get_post_meta( $post->ID, 'post_embed_audio_url', true ); ?>
                        <div class="meta-title"><?php esc_html_e( 'Audio Format', 'vmagazine-companion' ); ?></div>
                        <div class="format-label"><strong><?php esc_html_e( 'Embed audio url', 'vmagazine-companion' );?></strong></div>
                        <div class="format-input">
                            <input type="text" name="post_embed_audio_url" size="90" class="post-audio-url" value="<?php echo esc_url( $audio_url_value ); ?>" />
                            <input class="button" name="media_upload_button" id="post_audio_upload_button" value="<?php esc_html_e( 'Embed audio', 'vmagazine-companion' ); ?>" type="button" />
                            <input class="button" type="button" id="reset-audio-embed" value="<?php esc_html_e( 'Reset url', 'vmagazine-companion' ); ?>" />
                        </div><!-- .format-input -->
                    </div><!-- #format-audio -->

                    <div class="format-type-field" id="format-gallery">
                        <?php
                            $post_gallery_images = get_post_meta( $post->ID, 'post_images', true );
                            $post_images_count = get_post_meta( $post->ID, 'post_gallery_image_count', true );
                        ?>
                        <div class="meta-title"><?php esc_html_e( 'Gallery Format', 'vmagazine-companion' ); ?></div>
                        <div class="format-label"><strong><?php esc_html_e( 'Embed gallery images.', 'vmagazine-companion' );?></strong></div>
                        <div class="format-input">
                            <div class="post-gallery-section">
                                <?php
                                    $total_img = 0;
                                    if( !empty( $post_gallery_images ) ){
                                        $total_img = count( $post_gallery_images );
                                        $img_counter = 0;
                                        foreach( $post_gallery_images as $key => $img_value ){
                                           $attachment_id = vmagazine_get_attachment_id_from_url( $img_value );
                                           $img_url = wp_get_attachment_image_src( $attachment_id, 'thumbnail', true );
                                ?>
                                            <div class="gal-img-block">
                                                <div class="gal-img"><img src="<?php echo esc_url( $img_url[0] ); ?>" alt="<?php the_title_attribute()?>"/><span class="fig-remove" title="<?php echo esc_attr( 'remove', 'vmagazine-companion' ); ?>"></span></div>
                                                <input type="hidden" name="post_images[<?php echo esc_attr($img_counter); ?>]" class="hidden-media-gallery" value="<?php echo esc_url( $img_value ); ?>" />
                                            </div>
                                <?php
                                            $img_counter++;
                                        }
                                    }
                                ?>
                            </div><!-- .post-gallery-section -->
                            <input id="post_image_count" type="hidden" name="post_gallery_image_count" value="" />
                            <span class="add-img-btn" id="post_gallery_upload_button" title="<?php esc_attr_e( 'Add Images', 'vmagazine-companion' ); ?>"></span>
                        </div><!-- .format-input -->
                    </div><!-- #format-gallery -->
                </div><!-- .meta-options -->
            </div><!-- .meta-row -->
        </div><!-- #pg-metabox-format -->
        <?php 
        $old_ads = get_post_meta( $post->ID, 'vmagazine_ads_url', true );
        $ads_img = get_post_meta( $post->ID, 'vmagazine_ads_img', true );
        ?>
        <div id="pg-metabox-ads" class="pg-metabox-inside">
            <div class="meta-row">
            <div class="meta-title">
                <?php esc_html_e('Post ADS','vmagazine-companion');?>
            </div>
            <div class="meta-options">
            <input type="url" name="vmagazine_ads_img" id="ads-img-link" placeholder="No image selected" value="<?php echo esc_url($ads_img);?>">
            <a href="javascript:void(0)"><?php esc_html_e('Upload Image','vmagazine-companion');?></a>
            <div class="ads-url">
            <div class="meta-desc">
                <?php esc_html_e('Enter ADS URL:','vmagazine-companion'); ?>
            </div>
            <input type="url" name="vmagazine_ads_url" value="<?php echo esc_url($old_ads);?>">    
            </div>
            </div>
           </div> 
        </div>

    </div><!--.pg-metabox-->
    <div class="clear"></div>
    <input type="hidden" id="post-meta-selected" name="post_meta_identity" value="<?php echo esc_attr( $post_identity_value ); ?>" />
<?php
	}
endif;

/**
 * Function for save sidebar layout of post
 */
add_action( 'save_post', 'vmagazine_save_post_settings' );

if( ! function_exists( 'vmagazine_save_post_settings' ) ):

function vmagazine_save_post_settings( $post_id ) {

    global $post;
    $vmagazine_post_sidebar = vmagazine_post_sidebars();
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'vmagazine_post_meta_nonce' ] ) || !wp_verify_nonce( $_POST[ 'vmagazine_post_meta_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on auto save
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

    /** 
     * Post sidebar
     */
    $old = get_post_meta( $post_id, 'vmagazine_page_sidebar', true ); 
    $new = sanitize_text_field( $_POST['vmagazine_page_sidebar'] );
    if ( $new && $new != $old ) {  
        update_post_meta ( $post_id, 'vmagazine_page_sidebar', $new );  
    } elseif ( '' == $new && $old ) {  
        delete_post_meta( $post_id,'vmagazine_page_sidebar', $old );  
    }

    /**
    * Post ADS
    */
    $old_ads = get_post_meta( $post_id, 'vmagazine_ads_url', true );
    $ads_img = get_post_meta( $post_id, 'vmagazine_ads_img', true );


    $new_ads = esc_url_raw( $_POST['vmagazine_ads_url'] );
    if( $new_ads != $old_ads ){
        update_post_meta ( $post_id, 'vmagazine_ads_url', $new_ads ); 
    }elseif ( '' == $new_ads && $old_ads ) {  
        delete_post_meta( $post_id,'vmagazine_ads_url', $old_ads );  
    }

    $new_ads_img = esc_url_raw( $_POST['vmagazine_ads_img'] );
    if( $new_ads_img != $ads_img ){
        update_post_meta ( $post_id, 'vmagazine_ads_img', $new_ads_img ); 
    }elseif ( '' == $new_ads_img && $ads_img ) {  
        delete_post_meta( $post_id,'vmagazine_ads_img', $ads_img );  
    }    

    /**
     * Post layout
     */
    $post_layout = get_post_meta( $post_id, 'vmagazine_post_layout', true ); 
    $stz_post_layout = sanitize_text_field( $_POST['vmagazine_post_layout'] );
    if ( $stz_post_layout && $stz_post_layout != $post_layout ) {  
        update_post_meta ( $post_id, 'vmagazine_post_layout', $stz_post_layout );  
    } elseif ( '' == $stz_post_layout && $post_layout ) {  
        delete_post_meta( $post_id,'vmagazine_post_layout', $post_layout );  
    }

    /**
     * update post review option
     */

    $post_review_option = get_post_meta( $post_id, 'post_review_option', true );
    $stz_post_review_option = sanitize_text_field( $_POST[ 'post_review_option' ] );

    if ( $stz_post_review_option && '' == $stz_post_review_option ){
        add_post_meta( $post_id, 'post_review_option', $stz_post_review_option );
    }elseif ( $stz_post_review_option && $stz_post_review_option != $post_review_option ) {  
        update_post_meta($post_id, 'post_review_option', $stz_post_review_option );  
    } elseif ( '' == $stz_post_review_option && $post_review_option ) {  
        delete_post_meta( $post_id,'post_review_option', $post_review_option );  
    }


    /**
     * update all data of star review
     */
    $stz_star_rating = $_POST['star_ratings'];
    update_post_meta( $post_id, 'star_rating', $stz_star_rating );

    /**
     * update data for star count
     */    
    $star_review_count = get_post_meta( $post_id, 'star_review_count', true );
    $stz_star_review_count = sanitize_text_field( $_POST[ 'star_review_count' ] );

    if ( $stz_star_review_count && '' == $stz_star_review_count ){
        add_post_meta( $post_id, 'star_review_count', $stz_star_review_count );
    }elseif ( $stz_star_review_count && $stz_star_review_count != $star_review_count ) {  
        update_post_meta($post_id, 'star_review_count', $stz_star_review_count );  
    } elseif ( '' == $stz_star_review_count && $star_review_count ) {  
        delete_post_meta( $post_id, 'star_review_count', $star_review_count );  
    }

    /**
     * update all data of percentage review
     */
    $stz_percent_rating = $_POST['percent_ratings'];
    update_post_meta( $post_id, 'percent_rating', $stz_percent_rating );

    /**
     * update data for percent count
     */    
    $percent_review_count = get_post_meta( $post_id, 'percent_review_count', true );
    $stz_percent_review_count = sanitize_text_field( $_POST[ 'percent_review_count' ] );

    if ( $stz_percent_review_count && '' == $stz_percent_review_count ){
        add_post_meta( $post_id, 'percent_review_count', $stz_percent_review_count );
    }elseif ( $stz_percent_review_count && $stz_percent_review_count != $percent_review_count ) {  
        update_post_meta($post_id, 'percent_review_count', $stz_percent_review_count );  
    } elseif ( '' == $stz_percent_review_count && $percent_review_count ) {  
        delete_post_meta( $post_id, 'percent_review_count', $percent_review_count );  
    }

    /**
     * update all data of points review
     */
    $stz_points_rating = $_POST['points_ratings'];
    update_post_meta( $post_id, 'points_rating', $stz_points_rating );

    /**
     * update data for points count
     */    
    $points_review_count = get_post_meta( $post_id, 'points_review_count', true );
    $stz_points_review_count = sanitize_text_field( $_POST[ 'points_review_count' ] );

    if ( $stz_points_review_count && '' == $stz_points_review_count ){
        add_post_meta( $post_id, 'points_review_count', $stz_points_review_count );
    }elseif ( $stz_points_review_count && $stz_points_review_count != $points_review_count ) {  
        update_post_meta($post_id, 'points_review_count', $stz_points_review_count );  
    } elseif ( '' == $stz_points_review_count && $points_review_count ) {  
        delete_post_meta( $post_id, 'points_review_count', $points_review_count );  
    }

    /**
     * Update review description
     */
    $post_review_description = get_post_meta( $post_id, 'post_review_description', true );
    $stz_review_description = wp_kses( $_POST[ 'post_review_description' ], $vmagazine_allowed_textarea );

    if ( $stz_review_description && '' == $stz_review_description ){
        add_post_meta( $post_id, 'post_review_description', $stz_review_description );
    }elseif ( $stz_review_description && $stz_review_description != $post_review_description ) {  
        update_post_meta($post_id, 'post_review_description', $stz_review_description );  
    } elseif ( '' == $stz_review_description && $post_review_description ) {  
        delete_post_meta( $post_id, 'post_review_description', $post_review_description );  
    }

    /**
     * update post video format
     */
    $prev_video_url = esc_url( get_post_meta( $post_id, 'post_embed_video_url', true ) );
    $new_video_url = esc_url( $_POST['post_embed_video_url'] );

    if ( $new_video_url && '' == $new_video_url ){
        add_post_meta( $post_id, 'post_embed_video_url', $new_video_url );
    }elseif ( $new_video_url && $new_video_url != $prev_video_url ) {
        update_post_meta($post_id, 'post_embed_video_url', $new_video_url );
    } elseif ( '' == $new_video_url && $prev_video_url ) {
        delete_post_meta( $post_id, 'post_embed_video_url', $prev_video_url );
    }

    /**
     * update post audio format
     */
    $prev_audio_url = esc_url( get_post_meta( $post_id, 'post_embed_audio_url', true ) );
    $new_audio_url = esc_url( $_POST['post_embed_audio_url'] );

    if ( $new_audio_url && '' == $new_audio_url ){
        add_post_meta( $post_id, 'post_embed_audio_url', $new_audio_url );
    }elseif ( $new_audio_url && $new_audio_url != $prev_audio_url ) {
        update_post_meta($post_id, 'post_embed_audio_url', $new_audio_url );
    } elseif ( '' == $new_audio_url && $prev_audio_url ) {
        delete_post_meta( $post_id, 'post_embed_audio_url', $prev_audio_url );
    }

    /**
     * update post gallery format
     */
    $stz_post_image = $_POST['post_images'];
    update_post_meta( $post_id, 'post_images', $stz_post_image );

    $image_count = get_post_meta( $post->ID, 'post_gallery_image_count', true );
    $stz_image_count = sanitize_text_field( $_POST['post_gallery_image_count'] );
   
    if ( $stz_image_count && '' == $stz_image_count ){
        add_post_meta( $post_id, 'post_gallery_image_count', $stz_image_count );
    }elseif ($stz_image_count && $stz_image_count != $image_count) {
        update_post_meta($post_id, 'post_gallery_image_count', $stz_image_count);
    } elseif ('' == $stz_image_count && $image_count) {
        delete_post_meta($post_id,'post_gallery_image_count');
    }


    /**
     * post meta identity
     */
    $post_identity = get_post_meta( $post_id, 'post_meta_identity', true );
    $stz_post_identity = sanitize_text_field( $_POST[ 'post_meta_identity' ] );

    if ( $stz_post_identity && '' == $stz_post_identity ){
        add_post_meta( $post_id, 'post_meta_identity', $stz_post_identity );
    }elseif ( $stz_post_identity && $stz_post_identity != $post_identity ) {  
        update_post_meta($post_id, 'post_meta_identity', $stz_post_identity );  
    } elseif ( '' == $stz_post_identity && $post_identity ) {  
        delete_post_meta( $post_id, 'post_meta_identity', $post_identity );  
    }

}
endif;