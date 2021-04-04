<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/* 
 * Ultimate Author Box - Custom Post Type 
 */

$singular = __( 'Ultimate Guest Author', 'ultimate-author-box' );
$plural = __( 'Ultimate Guest Author', 'ultimate-author-box' );
//Used for the rewrite slug below.
$plural_slug = str_replace( ' ', '_', $plural );

//Setup all the labels to accurately reflect this post type.
$labels = array(
	'name' => $plural,
	'singular_name' => $singular,
	'add_new' => __( 'Add New ', 'ultimate-author-box' ),
	'add_new_item' => __( 'Add New ', 'ultimate-author-box' ) . $singular,
	'edit' => __( 'Edit ', 'ultimate-author-box' ),
	'edit_item' => __( 'Edit ', 'ultimate-author-box' ) . $singular,
	'new_item' => __( 'New ', 'ultimate-author-box' ) . $singular,
	'view' => __( 'View ', 'ultimate-author-box' ) . $singular,
	'view_item' => __( 'View ', 'ultimate-author-box' ) . $singular,
	'search_term' => __( 'Search ', 'ultimate-author-box' ) . $plural,
	'parent' => __( 'Parent ', 'ultimate-author-box' ) . $singular,
	'not_found' => __( 'No ', 'ultimate-author-box' ) . $plural . __( ' found', 'ultimate-author-box' ),
	'not_found_in_trash' => __( 'No ', 'ultimate-author-box' ) . $plural . __( ' in Trash', 'ultimate-author-box' )
);

//Define all the arguments for this post type.
$args = array(
	'labels' => $labels,
	'public' => false,	
	'publicly_queryable' => false,
	'exclude_from_search' => true,
	'show_in_nav_menus' => false,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 70,
	'menu_icon' => 'dashicons-businessman',
	'can_export' => true,
	'delete_with_user' => false,
	'hierarchical' => false,
	'has_archive' => false,
	'query_var' => false,
	'capability_type' => 'page',
	'map_meta_cap' => true,
	// 'capabilities' => array(),
	'rewrite' => array(
		'slug' => strtolower( $plural_slug ),
		'with_front' => true,
		'pages' => true,
		'feeds' => false,
	)
);
register_post_type( 'uab_guest_author', $args );

