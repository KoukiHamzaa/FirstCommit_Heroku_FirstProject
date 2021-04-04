<?php
/**
 * Vmagazine Custom Shortcodes
 *
 * @package Vmagazine
 */
// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Enable font size & font family selects in the editor
if ( ! function_exists( 'vmagazine_mce_buttons' ) ) {
	function vmagazine_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'vmagazine_mce_buttons' );

// Customize mce editor font sizes
if ( ! function_exists( 'vmagazine_mce_text_sizes' ) ) {
	function vmagazine_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'vmagazine_mce_text_sizes' );

// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'vmagazine_style_select' ) ) {
	function vmagazine_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'vmagazine_style_select' );


add_filter( 'mce_external_plugins', 'vmagazine_add_tinymce_plugin' );
add_filter( 'mce_buttons', 'vmagazine_register_mce_button' );


// Declare script for new button
function vmagazine_add_tinymce_plugin( $plugin_array ) {
	$pathe = $plugin_array['vmagazine_mce_button'] = plugin_dir_url( __FILE__ ).'assets/js/shortcodes.js';
	return $plugin_array;
}

// Register new button in the editor
function vmagazine_register_mce_button( $buttons ) {
	array_push( $buttons, 'vmagazine_mce_button' );
	return $buttons;
}


if ( ! function_exists( 'ap_paragraph_br_fix' ) ){
	function ap_paragraph_br_fix($content,$paragraph_tag=false,$br_tag=false){
		$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);

		$content = preg_replace('#<br \/>#', '', $content);

		if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);

		return trim($content);
	}
}

if ( ! function_exists( 'ap_content_helper' ) ){
	function ap_content_helper($content,$paragraph_tag=false,$br_tag=false){
		return ap_paragraph_br_fix( do_shortcode(shortcode_unautop($content)), $paragraph_tag );
	}
}


function ap_social_shortcodes($atts){
	extract(shortcode_atts( 
		array(
			'facebook' => '',
			'twitter' => '',
			'gplus' => '',
			'skype' => '',
			'linkedin' => '',
			'youtube' => '',
			'dribble' => ''
			), $atts, 'ap_social'));

	$social = '<div class="social-shortcode">';
	if($facebook){
	$social .= '<a href="'.esc_url($facebook).'" class="fb-icon" target="_blank"><i class="fa fa-facebook"></i></a>';
	}
	if($twitter){
	$social .= '<a href="'.esc_url($twitter).'" class="twitter-icon" target="_blank"><i class="fa fa-twitter"></i></a>';
	}
	if($gplus){
	$social .= '<a href="'.esc_url($gplus).'" class="google-icon" target="_blank"><i class="fa fa-google"></i></a>';
	}
	if($skype){
	$social .= '<a href="'.esc_url($skype).'" class="skype-icon" target="_blank"><i class="fa fa-skype"></i></a>';
	}
	if($linkedin){
	$social .= '<a href="'.esc_url($linkedin).'" class="linkedin-icon"  target="_blank"><i class="fa fa-linkedin"></i></a>';
	}
	if($youtube){
	$social .= '<a href="'.esc_url($youtube).'" class="youtube-icon" target="_blank"><i class="fa fa-youtube-play"></i></a>';
	}
	if($dribble){
	$social .= '<a href="'.esc_url($dribble).'" class="dribbble-icon" target="_blank"><i class="fa fa-dribbble"></i></a>';
	}
	$social .='</div>';
	return $social;
}
add_shortcode('ap_social', 'ap_social_shortcodes');


function ap_accordian_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			'icon' => '',
			), $atts, 'ap_accordian'));

	if($icon){
		$icon = '<i class="fa '.$icon.'"></i>';
	}
	$accordion = '<div class="ap_accordian">';
	$accordion .='<div class="ap_accordian_title">'.$icon.' '.$title.'</div>';
	$accordion .='<div class="ap_accordian_content">'.ap_content_helper($content).'</div>';
	$accordion .='</div>';
	return $accordion;
}

add_shortcode('ap_accordian', 'ap_accordian_shortcode');

function ap_accordian_shortcode_wrap($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'class' => '',
			), $atts, 'ap_accordian_wrap'));
	return '<div class="accordion-wrap '.$class.'">'.ap_content_helper($content).'</div>';
}
add_shortcode('ap_accordian_wrap', 'ap_accordian_shortcode_wrap');

function ap_toggle_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			'status' => 'close'
			), $atts, 'ap_toggle'));
	$style = '';
	if($status == 'close') {
		$style = 'style="display: none;"';
	}
	$accordion = '<div class="ap_toggle '.$status.'">';
	$accordion .='<div class="ap_toggle_title">'.$title.'</div>';
	$accordion .='<div class="ap_toggle_content" '.$style.'>'.ap_content_helper($content).'</div>';
	$accordion .='</div>';
	return $accordion;
}

add_shortcode('ap_toggle', 'ap_toggle_shortcode');



function ap_drop_cap_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'font_size' => '26',
			), $atts, 'ap_drop_cap'));

	$drop_cap = '<span class="ap_drop_cap" style="font-size:'.$font_size.'px">';
	$drop_cap .= $content;
	$drop_cap .='</span>';
	return $drop_cap;
}

add_shortcode('ap_drop_cap', 'ap_drop_cap_shortcode');

function ap_slide_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'caption' => '',
			'link' => '#',
			'target' => '_self'
			), $atts, 'ap_slide'));
	$ap_slide = '<div class="ap-slide">';
	if($link):
	$ap_slide .= '<a href="'.$link.'" target="'.$target.'">';
	endif;
	$ap_slide .= '<img title="'.$caption.'" src="'.$content.'">';
	if($link):
	$ap_slide .= '</a>';
	endif;
	$ap_slide .= '</div>';
	return $ap_slide;
}

add_shortcode('ap_slide', 'ap_slide_shortcode');

function ap_slider_shortcode($atts, $content=null){
	$ap_slider = '<div class="shortcode-slider"><div class="slider_wrap">';
	$ap_slider .= ap_content_helper($content);
	$ap_slider .= '</div></div>';
	return $ap_slider;
}
add_shortcode('ap_slider', 'ap_slider_shortcode');


function ap_galler_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'link' => '#'
			), $atts, 'ap_gall'));
	$ap_gall = '<li class="ap-gal">';
	if($link):
	$ap_gall .= '<a href="'.$link.'">';
	endif;
	$ap_gall .= '<img src="'.$content.'">';
	if($link):
	$ap_gall .= '</a>';
	endif;
	$ap_gall .= '</li>';
	return $ap_gall;
}
add_shortcode('ap_gall', 'ap_galler_shortcode');

function ap_gallery_shortcode($atts, $content=null){
	$ap_gal = '<div class="shortcode-gallery"><ul class="gallery_wrap">';
	$ap_gal .= ap_content_helper($content);
	$ap_gal .= '</ul></div>';
	return $ap_gal;
}
add_shortcode('ap_galery', 'ap_gallery_shortcode');



function ap_tab_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			), $atts, 'ap_tab'));

	$ap_tab ='<div class="ap_tab '.sanitize_title($title).'">';
	$ap_tab .='<div class="tab-title" id="'.sanitize_title($title).'">'.$title.'</div>';
	$ap_tab .= ap_content_helper($content);
	$ap_tab .='</div>';
	return $ap_tab;
}

add_shortcode('ap_tab', 'ap_tab_shortcode');

function ap_tab_wrap_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'type' => 'horizontal',
			), $atts, 'ap_tab_group'));
	$ap_tab_wrap = '<div class="clearfix ap_tab_wrap '.$type.'">';
	$ap_tab_wrap .= ap_content_helper($content);
	$ap_tab_wrap .= '</div>';
	return $ap_tab_wrap;
}

add_shortcode('ap_tab_group', 'ap_tab_wrap_shortcode');

function ap_column_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'span' => '6',
			), $atts, 'ap_column'));
	$ap_column = '<div class="ap_column ap-span'.$span.'">';
	$ap_column .= ap_content_helper($content);
	$ap_column .= '</div>';
	return $ap_column;
}

add_shortcode('ap_column', 'ap_column_shortcode');

function ap_column_wrap_shortcode($atts, $content=null){
	$ap_column_wrap = '<div class="clearfix ap-row">';
	$ap_column_wrap .= ap_content_helper($content);
	$ap_column_wrap .= '</div>';
	return $ap_column_wrap;
}

add_shortcode('ap_column_wrap', 'ap_column_wrap_shortcode');

function ap_list_shortcode($atts, $content=null){
    extract(shortcode_atts( 
		array(
			'list_type' => 'ap-list1',
			), $atts, 'ap_list'));
	$ap_list = '<ul class="ap-list '.$list_type.'">';
	$ap_list .= ap_content_helper($content);
	$ap_list .= '</ul>';
	return $ap_list;
}

add_shortcode('ap_list', 'ap_list_shortcode');

function ap_li_shortcode($atts, $content=null){
	$ap_li = '<li>';
	$ap_li .= ap_content_helper($content);
	$ap_li .= '</li>';
	return $ap_li;
}

add_shortcode('ap_li', 'ap_li_shortcode');

function ap_dropcaps_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'style' => 'ap-normal',
                    ), $atts, 'ap_dropcaps'));
    $ap_dropcaps = '<span class="ap-dropcaps '.$style.'">';
    $ap_dropcaps .= ap_content_helper($content);
    $ap_dropcaps .= '</span>';
    return $ap_dropcaps;
}

add_shortcode('ap_dropcaps', 'ap_dropcaps_shortcode');

function ap_tagline_box_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'ap_tagline_text' => 'Enter you Tag Line text here',
        'tag_box_style' => 'ap-all-border-box',
                    ), $atts, 'ap_tagline_box'));

    $ap_tagline_box = '<div class="ap_tagline_box clearfix ' . $tag_box_style . '">';
    $ap_tagline_box .= ap_content_helper($content);
    $ap_tagline_box .='</div>';
    return $ap_tagline_box;
}

add_shortcode('ap_tagline_box', 'ap_tagline_box_shortcode');