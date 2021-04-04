<?php

// Get categories
if ( !function_exists('vmagazine_ea_get_post_categories') ) {
    function vmagazine_ea_get_post_categories() {

        $options = array();
        
        $terms = get_terms( array( 
            'taxonomy'      => 'category',
            'hide_empty'    => true,
        ));

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name.' ('.$term->count.')';
            }
        }

        return $options;
    }
}



/**
 * Get All POst Types
 * @return array
 */
function vmagazine_ea_get_post_types(){

    $eael_cpts = get_post_types( array( 'public'   => true, 'show_in_nav_menus' => true ), 'object' );
    $eael_exclude_cpts = array( 'elementor_library', 'attachment' );

    foreach ( $eael_exclude_cpts as $exclude_cpt ) {
        unset($eael_cpts[$exclude_cpt]);
    }
    $post_types = array_merge($eael_cpts);
    foreach( $post_types as $type ) {
        $types[ $type->name ] = $type->label;
    }

    return $types;
}

/**
 * Get all types of post.
 * @return array
 */
function eael_get_all_types_post(){
    $posts_args = array(
        'post_type'      => 'any',
        'post_style'     => 'all_types',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
    );
    $posts = eael_load_more_ajax( $posts_args );

    $post_list = [];

    foreach( $posts as $post ) {
        $post_list[ $post->ID ] = $post->post_title;
    }

    return $post_list;
}


/**
 * POst Orderby Options
 * @return array
 */
function vmagazine_ea_get_post_orderby_options(){
    $orderby = array(
        'ID'            => 'Post ID',
        'author'        => 'Post Author',
        'title'         => 'Title',
        'date'          => 'Date',
        'modified'      => 'Last Modified Date',
        'parent'        => 'Parent Id',
        'rand'          => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order'    => 'Menu Order',
    );

    return $orderby;
}


// Get all Authors
if ( !function_exists('vmagazine_ea_get_auhtors') ) {
    function vmagazine_ea_get_auhtors() {

        $options = array();

        $users = get_users();

        foreach ( $users as $user ) {
            $options[ $user->ID ] = $user->display_name;
        }

        return $options;
    }
}

// Get all Authors
if ( !function_exists('vmagazine_ea_get_tags') ) {
    function vmagazine_ea_get_tags() {

        $options = array();

        $tags = get_tags();

        foreach ( $tags as $tag ) {
            $options[ $tag->term_id ] = $tag->name.' ('.$tag->count.')';
        }

        return $options;
    }
}

// Get all Posts
if ( !function_exists('vmagazine_ea_get_posts') ) {
    function vmagazine_ea_get_posts() {

        $post_list = get_posts( array(
            'post_type'         => 'post',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => -1,
        ) );

        $posts = array();

        if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
            foreach ( $post_list as $post ) {
               $posts[ $post->ID ] = $post->post_title;
            }
        }

        return $posts;
    }
}



if ( class_exists( 'WooCommerce' ) || is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

    // Get all Products
    if ( !function_exists('vmagazine_ea_get_products') ) {
        function vmagazine_ea_get_products() {

            $post_list = get_posts( array(
                'post_type'         => 'product',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'posts_per_page'    => -1,
            ) );

            $posts = array();

            if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
                foreach ( $post_list as $post ) {
                   $posts[ $post->ID ] = $post->post_title;
                }
            }

            return $posts;
        }
    }
    
    // Woocommerce - Get product categories
    if ( !function_exists('vmagazine_ea_get_product_categories') ) {
        function vmagazine_ea_get_product_categories() {

            $options = array();

            $terms = get_terms( array( 
                'taxonomy'      => 'product_cat',
                'hide_empty'    => true,
            ));

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $options[ $term->term_id ] = $term->name.' ('.$term->count.')';
                }
            }

            return $options;
        }
    }

    // WooCommerce - Get product tags
    if ( !function_exists('vmagazine_ea_product_get_tags') ) {
        function vmagazine_ea_product_get_tags() {

            $options = array();

            $tags = get_terms( 'product_tag' );

            if ( ! empty( $tags ) && ! is_wp_error( $tags ) ){
                foreach ( $tags as $tag ) {
                    $options[ $tag->term_id ] = $tag->name.' ('.$tag->count.')';
                }
            }

            return $options;
        }
    }
}else{

    /**
    * Fallback options if WooCommerce not exists
    */

    function vmagazine_ea_get_products(){

        $options = esc_html__('WooCommerce Not Installed','vmagazine-ea');

        return $options;

    }

    function vmagazine_ea_get_product_categories(){
        $options = esc_html__('WooCommerce Not Installed','vmagazine-ea');

        return $options;
    }

    function vmagazine_ea_product_get_tags(){
        $options = esc_html__('WooCommerce Not Installed','vmagazine-ea');

        return $options;
    }

}



/**
* Post title excerpt
*/
function vmagazine_ea_title_excerpt( $limit ) {
    $title = get_the_title();
    if($limit){
        $limit_content = mb_substr( $title, 0 , $limit );
        $title_length = strlen($title);
        return $limit_content;
    }else{
        return $title;
    }
    
}



/**
 * Function for content excerpt length
 */
if( ! function_exists( 'vmagazine_ea_get_excerpt_content' ) ):
    function vmagazine_ea_get_excerpt_content( $limit ) {

        if( empty($limit)){
            return;
        }
        
        $contents   = strip_shortcodes( get_the_content() );
        $content    = strip_tags( $contents );
        
        if($limit){
            $content = mb_substr( $content, 0 , absint($limit) );
        }
       
        return $content;
    }
    endif;


/*--------------------------------------------------------------------------------------------------------*/

/**
* Queries for the elements
*
*/
if( ! function_exists('vmagazine_ea_query')){
    function vmagazine_ea_query($settings,$first_id='',$postsPerPage = 6 ){

        
        
        
        $post_type      = $settings['post_type'];
        $category       = '';
        $tags           = '';
        $exclude_posts  = '';

        if( 'post' == $post_type ){

            $category       = $settings['categories'];
            $tags           = $settings['tags'];
            $exclude_posts  = $settings['exclude_posts'];

        }elseif( 'product' == $post_type ){

          $category         = $settings['product_categories'];  
          $exclude_posts    = $settings['exclude_products'];

        }

        //Categories
        $post_cat = '';
        $post_cats = $category;
        if ( ! empty( $category) ){
            asort($category);    
        }
        
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }

        
        if( !empty($first_id)){
            $post_cat = $category[0];
        }


        // Post Authors
        $post_author = '';
        $post_authors = $settings['authors'];
        if ( !empty( $post_authors) ) {
            $post_author = implode( ",", $post_authors );
        }

        $args = array(
                    'post_status'           => array( 'publish' ),
                    'post_type'             => $post_type,
                    'post__in'              => '',
                    'cat'                   => $post_cat,
                    'author'                => $post_author,
                    'tag__in'               => $tags,
                    'orderby'               => $settings['orderby'],
                    'order'                 => $settings['order'],
                    'post__not_in'          => $exclude_posts,
                    'offset'                => $settings['offset'],
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => $postsPerPage
                );

        if( 'product' == $post_type ){

            $args = array(
                        'post_type'             => 'product',
                        'post__in'              => '',
                        'orderby'               => $settings['orderby'],
                        'order'                 => $settings['order'],
                        'author'                => $post_author,
                        'posts_per_page'        => $postsPerPage,
                        'post__not_in'          => $exclude_posts,
                        'offset'                => $settings['offset'],
                       
                    );

            if( $post_cat ){
                 $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $post_cat
                            )
                        );
            }
        }


         return $args;

    }
}


/*--------------------------------------------------------------------------------------------------------*/
/**
 * Element title function
 *
 * @param $widget_title string
 * @param $widget_title url
 *
 *  @return <h4>Widget title</h4> or <h4><a href="widget_title_url">widget title</a></h4> ( if widet url is not empty )
 */

if( ! function_exists( 'vmagazine_ea_widget_title' ) ):
  function vmagazine_ea_widget_title( $widget_title) {

    if( empty($widget_title) ) {
      return;
    }
?>
    <h4 class="block-title">
        <span class="title-bg">
<?php if( !empty( $widget_title ) ) {
      echo esc_html( $widget_title );
    } 
?>
    </span>
</h4>
<?php
  }
endif;



if( !function_exists( 'vmagazine_ea_home_element_img_id' ) ) :
    function vmagazine_ea_home_element_img_id() {
      
        $fallback_option  = get_theme_mod( 'post_fallback_img_option', 'show' );
        $fallback_img_url = get_theme_mod( 'post_fallback_image' );
        $image_id = '';
        if( has_post_thumbnail() ) {

            $image_id      = get_post_thumbnail_id( get_the_ID() );
            
        } elseif( $fallback_option == 'show' && !empty( $fallback_img_url ) ) {

            $image_id    = vmagazine_get_attachment_id_from_url( $fallback_img_url );
            
        } 
        return $image_id;
    }
endif;


/*----------------------------------------------------------------------------------------*/
/**
* Post meta
*/
/* Post Meta with icons **/
if( ! function_exists( 'vmagazine_ea_icon_meta') ){
    function vmagazine_ea_icon_meta($settings){
        
        $post_meta          = $settings['post_meta']; 
        $post_date          = $settings['post_date'];
        $post_comment       = $settings['post_comment'];
        $post_view          = $settings['post_view'];


        if( 'yes' != $post_meta ){
            return;
        }

        $posted_on = get_the_date();
        $comments  = get_comments_number();
        echo '<div class="post-meta">';
           if( 'yes' == $post_date ){
                echo '<span class="posted-on"><i class="fa fa-clock-o"></i>'. esc_html($posted_on) .'</span>';
            }
            if( 'yes' == $post_comment ){
                echo '<span class="comments"><i class="fa fa-comments"></i>'. esc_html($comments) .'</span>';
            }
            if(function_exists('vmagazine_post_views') && 'yes' == $post_view ){
                echo vmagazine_post_views();
            }
        echo '</div>';
    }
}
add_action( 'vmagazine_ea_icon_meta', 'vmagazine_ea_icon_meta' );



