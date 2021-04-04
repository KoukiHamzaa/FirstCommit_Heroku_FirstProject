<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
global $wpdb;
if ( is_multisite() ) {
$current_blog = $wpdb->blogid;

    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    foreach ( $blog_ids as $blog_id ) {
        switch_to_blog( $blog_id );
        $table_name = $wpdb->prefix . 'instagram_feeds';
        $table_name2 = $wpdb->prefix . '_apif_instagram_posts';
        $table_name3 = $wpdb->prefix . 'apif_instagram_feeds_comments';
        $table_name4 = $wpdb->prefix . 'apif_carousel';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                        id int(11) NOT NULL AUTO_INCREMENT,
                        feed_settings varchar(16000) NOT NULL,
                        PRIMARY KEY  (id)
                        ) $charset_collate;";
    
        $sql2 = "CREATE TABLE IF NOT EXISTS  $table_name2 (
                        id int(11) NOT NULL AUTO_INCREMENT,
                        feed_id varchar(20) NOT NULL,
                        post_id varchar(10) NOT NULL,
                        type varchar(255) NOT NULL,
                        media_type varchar(255) NOT NULL,
                        header varchar(255) NOT NULL,
                        nickname varchar(255) NOT NULL,
                        screenname varchar(255) NOT NULL,
                        userpic varchar(255) NOT NULL,
                        system_timestamp varchar(255) NOT NULL,
                        carousel longtext NOT NULL,
                        img longtext NOT NULL,
                        media longtext NOT NULL,
                        description longtext NOT NULL,
                        profile_link varchar(255) NOT NULL,
                        permalink varchar(255) NOT NULL,
                        additional longtext NOT NULL,
                        userMeta longtext NOT NULL,
                        location longtext NOT NULL,
                        post_status varchar(255) NOT NULL,
                        extra_options longtext NOT NULL,
                        `order` varchar(20) NOT NULL,
                        date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                        PRIMARY KEY (id)
                        ) $charset_collate;";
        $sql3 = "CREATE TABLE IF NOT EXISTS $table_name3 (
        id int(11) NOT NULL AUTO_INCREMENT,
        commentID varchar(20) NOT NULL,
        feedID varchar(20) NOT NULL,
        comments varchar(16000),
        created_time varchar(255) NOT NULL,
        additional longtext NOT NULL,
        extra_options longtext NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        $sql4 = "CREATE TABLE IF NOT EXISTS $table_name4 (
        ID int(11) NOT NULL AUTO_INCREMENT,
        feed_id int(11) NOT NULL,
        feed_settings varchar(16000) NOT NULL,
        PRIMARY KEY  (ID)
        ) $charset_collate;";

        dbDelta( $sql );
        dbDelta( $sql2 );
        dbDelta( $sql3 );
        dbDelta( $sql4 );
        restore_current_blog();
    }

}else{
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'instagram_feeds';
$table_name2 = $wpdb->prefix . '_apif_instagram_posts';
$table_name3 = $wpdb->prefix . 'apif_instagram_feeds_comments';
$table_name4 = $wpdb->prefix . 'apif_carousel';
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
                id int(11) NOT NULL AUTO_INCREMENT,
                feed_settings varchar(16000) NOT NULL,
                PRIMARY KEY  (id)
                ) $charset_collate;";

$sql2 = "CREATE TABLE IF NOT EXISTS $table_name2 (
                id int(11) NOT NULL AUTO_INCREMENT,
                feed_id varchar(20) NOT NULL,
                post_id varchar(10) NOT NULL,
                type varchar(255) NOT NULL,
                media_type varchar(255) NOT NULL,
                header varchar(255) NOT NULL,
                nickname varchar(255) NOT NULL,
                screenname varchar(255) NOT NULL,
                userpic varchar(255) NOT NULL,
                system_timestamp varchar(255) NOT NULL,
                carousel longtext NOT NULL,
                img longtext NOT NULL,
                media longtext NOT NULL,
                description longtext NOT NULL,
                profile_link varchar(255) NOT NULL,
                permalink varchar(255) NOT NULL,
                additional longtext NOT NULL,
                location longtext NOT NULL,
                userMeta longtext NOT NULL,
                post_status varchar(255) NOT NULL,
                extra_options longtext NOT NULL,
                `order` varchar(20) NOT NULL,
                date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                PRIMARY KEY (id)
                ) $charset_collate;";
$sql3 = "CREATE TABLE IF NOT EXISTS $table_name3 (
            id int(11) NOT NULL AUTO_INCREMENT,
            commentID varchar(20) NOT NULL,
            feedID varchar(20) NOT NULL,
            comments varchar(16000),
            created_time varchar(255) NOT NULL,
            additional longtext NOT NULL,
            extra_options longtext NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
$sql4 = "CREATE TABLE IF NOT EXISTS $table_name4 (
    ID int(11) NOT NULL AUTO_INCREMENT,
    feed_id int(11) NOT NULL,
    feed_settings varchar(16000) NOT NULL,
    PRIMARY KEY  (ID)
    ) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
dbDelta( $sql2 );
dbDelta( $sql3 );
dbDelta( $sql4 );
}