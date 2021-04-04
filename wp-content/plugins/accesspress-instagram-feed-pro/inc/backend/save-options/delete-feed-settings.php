<?php
defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
$id = $_GET['if_id'];
$instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$wpdb->delete( $instagram_feed_tbl, array( 'id' => $id ), array( '%d' ) );
$wpdb->delete( APIF_Instagram_Feeds_Table, array( 'post_id'=> $id ), array( '%d' ) );
wp_redirect(admin_url().'admin.php?page=ap-instagram-feed-pro&message=7');
exit();