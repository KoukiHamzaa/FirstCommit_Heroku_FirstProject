<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$image[ 0 ] = ' ';
if ( has_post_thumbnail() ) {
     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> ID ), 'single-post-thumbnail' );
}
$link = "http://service.weibo.com/share/share.php?url=$url&appkey=&title=" . $title . "&pic=" . $image[ 0 ];


