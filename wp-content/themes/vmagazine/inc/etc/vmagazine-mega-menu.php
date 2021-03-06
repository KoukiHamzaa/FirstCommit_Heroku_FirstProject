<?php
/**
 * Vmagazine Mega Menu
 *
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 */

if( !class_exists( 'vmagazine_mega_menu' ) ) {
    class vmagazine_mega_menu {
        function __construct() {
            // Exchange argument for back-end menu walker
            add_filter( 'wp_edit_nav_menu_walker', array( &$this, 'modify_backend_walker' ) , 1000 );

            // Modify arguments for front-end mega menu
            add_filter( 'wp_nav_menu_args', array( &$this, 'modify_nav_arguments' ), 1000 );

            // Save menu
            add_action( 'wp_update_nav_menu_item', array( &$this, 'update_menu' ), 1000, 2 );
        }

        /**
         * Tells WordPress to use our back-end walker instead of the default one
         */
        function modify_backend_walker() {
            return 'vmagazine_backend_walker';
        }

        /**
         * Replaces the default arguments for the front end menu creation with new ones
         */
        function modify_nav_arguments($arguments) {
            $arguments['walker']                = new vmagazine_walker();
            //$arguments['container_class']         = $arguments['container_class'] .= 'mega-menu-wrapper';
            $arguments['menu_class']            = 'menu vmagazine_mega_menu';

            return $arguments;
        }

        function update_menu( $menu_id, $menu_item_db ) {
            if( !isset( $_POST['vmagazine_mega_menu_cat'][$menu_item_db] ) ) {
                $_POST['vmagazine_mega_menu_cat'][$menu_item_db] = "";
            }

            $value = $_POST['vmagazine_mega_menu_cat'][$menu_item_db];
            update_post_meta( $menu_item_db, 'vmagazine_mega_menu_cat', $value );
        }
    }
}

if( !class_exists( 'vmagazine_walker' ) ) {
    /**
     * The avia walker is the front-end walker and necessary to display the menu, this is a advanced version of the WordPress menu walker
     * @package WordPress
     * @since 1.0.0
     * @uses Walker
     */
    class vmagazine_walker extends Walker
    {
        /**
         * What the class handles.
         *
         * @see Walker::$tree_type
         * @since 3.0.0
         * @var string
         */
        var $tree_type = array( 'post_type', 'taxonomy', 'custom' );

        /**
         * Database fields to use.
         *
         * @see Walker::$db_fields
         * @since 3.0.0
         * @todo Decouple this.
         * @var array
         */
        var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

        var $mega_menu_active = 0;

        /**
         * Starts the list before the elements are added.
         *
         * @see Walker::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function start_lvl( &$output, $depth = 0, $args = array() ) {
            if( !$this->mega_menu_active ) {

                $indent = str_repeat("\t", $depth);

                $output .= "\n$indent<ul class=\"sub-menu\">\n";
            }
        }

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $args = (object) $args;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $class_names = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'page_item page-item-' . $item->ID;

            /**
             * Filter the CSS class(es) applied to a menu item's <li>.
             *
             * @since 3.0.0
             *
             * @see wp_nav_menu()
             *
             * @param array  $classes The CSS classes that are applied to the menu item's <li>.
             * @param object $item    The current menu item.
             * @param array  $args    An array of wp_nav_menu() arguments.
             */
            $has_mega_menu = get_post_meta( $item->ID, 'vmagazine_mega_menu_cat', true );
            if( $has_mega_menu ) {
                $has_mega_class = 'has-mega-menu';
            } else {
                $has_mega_class = 'no-mega-menu';
            }

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) .' '. $has_mega_class .'"' : '';            

            /**
             * Filter the ID applied to a menu item's <li>.
             *
             * @since 3.0.1
             *
             * @see wp_nav_menu()
             *
             * @param string $menu_id The ID that is applied to the menu item's <li>.
             * @param object $item    The current menu item.
             * @param array  $args    An array of wp_nav_menu() arguments.
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            
            $this->mega_menu_active = get_post_meta( $item->ID, 'vmagazine_mega_menu_cat', true );

            $cat_menu_output = '';
            $cat_content_output = '';
            $mega_menu_wrap_start = '';
            $mega_menu_wrap_end = '';
            $mega_cat_wrap_start = '';
            $mega_cat_wrap_end = '';
            $mega_cat_content_wrap_start = '';
            $mega_cat_content_wrap_end = '';

            if( $depth == 0 && $this->mega_menu_active ) {
                $mega_toggle = '';
                $mega_cat = get_category( $this->mega_menu_active );
                $cat_menu_output = '';
                $cat_content_output = '';
                $mega_child_cats = get_categories( array( 'child_of' => $this->mega_menu_active ) );

                if( $mega_child_cats ) {
                    $parnet_link = get_category_link( $mega_cat->cat_ID );
                    $extra_class = 'mega-cat-menu has-menu-tab';
                    $mega_cat_wrap_start = '<div class="ap-mega-menu-cat-wrap">';
                    $mega_cat_wrap_end = '</div>';
                    $cat_menu_output .= '<div class="mega-cat-all"><a href="'.$parnet_link.'" data-cat-id="'.$mega_cat->cat_ID.'" class="mega-cat-menu">'. __( "All", "vmagazine" ).'</a></div>';
                    $cat_content_output .= $this->cat_content($this->mega_menu_active, 4 );
                    foreach( $mega_child_cats as $mega_child_cat ) {
                        $cat_link = get_category_link( $mega_child_cat->cat_ID );                        
                        $cat_menu_output .= '<div><a href="'.$cat_link.'" data-cat-id="'.$mega_child_cat->cat_ID.'" class="mega-cat-menu">'.$mega_child_cat->name.'</a></div>';
                        $cat_content_output .= $this->cat_content($mega_child_cat->cat_ID, 4);
                    }
                }else {
                    $extra_class = 'no-mega-cat-menu';
                    $cat_content_output .= $this->cat_content($this->mega_menu_active, 5 );
                }

                $mega_menu_wrap_start = '<ul class="sub-menu mega-sub-menu '.$extra_class.'"><li class="menu-item-inner-mega clearfix">';

                $mega_cat_content_wrap_start = '<div class="ap-mega-menu-con-wrap " >';
                $mega_cat_content_wrap_end = '</div>';

                if($item->has_children) {
                    $closing_megamenu = '';
                    $mega_toggle = '';
                }else {
                    $closing_megamenu = '</ul>';
                    if( $mega_child_cats ) {
                        $mega_toggle = '<span class="mega-sub-toggle"> <i class="fa fa-angle-right"></i> </span>';
                    }
                }
                $mega_menu_wrap_end = '</li>'.$closing_megamenu.$mega_toggle;
            }

            $output .= $indent . '<li' . $id . $class_names .'>';
            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            /**
             * Filter the HTML attributes applied to a menu item's <a>.
             *
             * @since 3.6.0
             *
             * @see wp_nav_menu()
             *
             * @param array $atts {
             *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
             *
             *     @type string $title  Title attribute.
             *     @type string $target Target attribute.
             *     @type string $rel    The rel attribute.
             *     @type string $href   The href attribute.
             * }
             * @param object $item The current menu item.
             * @param array  $args An array of wp_nav_menu() arguments.
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            /** This filter is documented in wp-includes/post-template.php */
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $item_output .= $mega_menu_wrap_start.$mega_cat_wrap_start.$cat_menu_output.$mega_cat_wrap_end;
            $item_output .= $mega_cat_content_wrap_start.$cat_content_output.$mega_cat_content_wrap_end.$mega_menu_wrap_end;

            /**
             * Filter a menu item's starting output.
             *
             * The menu item's starting output only includes $args->before, the opening <a>,
             * the menu item's title, the closing </a>, and $args->after. Currently, there is
             * no filter for modifying the opening and closing <li> for a menu item.
             *
             * @since 3.0.0
             *
             * @see wp_nav_menu()
             *
             * @param string $item_output The menu item's starting HTML output.
             * @param object $item        Menu item data object.
             * @param int    $depth       Depth of menu item. Used for padding.
             * @param array  $args        An array of wp_nav_menu() arguments.
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Page data object. Not used.
         * @param int    $depth  Depth of page. Not Used.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }

        // Mega menu category posts
        function cat_content( $mega_category, $post_per_page ) {
            $cat_content_output = '';
            $cat_post_query = new WP_Query( 'cat='.$mega_category.'&posts_per_page='.$post_per_page );
            if( $cat_post_query->have_posts() ) {
                $cat_content_output .= '<div class="cat-con-section cat-con-id-'.$mega_category.'">';
                while( $cat_post_query->have_posts() ) {
                    $cat_post_query->the_post();
                    
                        $img_src = vmagazine_home_element_img('vmagazine-rectangle-thumb');
                        $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vmagazine-rectangle-thumb' );
                        $thumb_img = '<div class="mega-img-thumb"><a href="'.get_the_permalink().'" title="'.the_title_attribute( 'echo=0' ).'"><img src="'.$img_src.'" alt="'.the_title_attribute( 'echo=0' ).'"></a></div>';
                    
                    $cat_content_output .= '<div class="menu-post-block">'.$thumb_img.'<h3><a href="'.get_the_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.vmagazine_title_excerpt(55).'</a></h3></div>';
                }
                $cat_content_output .= '</div>';
                wp_reset_postdata();
            }
            return $cat_content_output;
        }

        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->has_children = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
    }
}

if( !class_exists( 'vmagazine_backend_walker' ) ) {
    /**
     * Create HTML list of nav menu input items
     *
     * @package ProfitMag
     * @since 1.0
     * @uses Walker_Nav_Menu
     */
    class vmagazine_backend_walker extends Walker_Nav_Menu {
        /**
         * Starts the list before the elements are added.
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        function start_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker_Nav_Menu::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        function end_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Start the element output.
         *
         * @see Walker_Nav_Menu::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         * @param int    $id     Not used.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = '';
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) )
                    $original_title = false;
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title = get_the_title( $original_object->ID );
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = sprintf( __( '%s (Invalid)','vmagazine' ), $item->title );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = sprintf( __('%s (Pending)','vmagazine'), $item->title );
            }

            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

            $submenu_text = '';
            if ( 0 == $depth ) {
                $submenu_text = 'style="display: none;"';
            }

            ?>
        <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode( ' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_attr($submenu_text); ?>><?php esc_html_e( 'sub item','vmagazine' ); ?></span></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-up-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up', 'vmagazine' ); ?>">&#8593;</abbr></a>
                            |
                            <a href="<?php
                            echo wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-down-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down', 'vmagazine' ); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e( 'Edit Menu Item', 'vmagazine' ); ?>" href="<?php
                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>"><?php esc_html_e( 'Edit Menu Item','vmagazine' ); ?></a>
                    </span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
                <?php if( 'custom' == $item->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                            <?php esc_html_e( 'URL','vmagazine' ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Navigation Label','vmagazine' ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>
                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Title Attribute','vmagazine' ); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                        <?php esc_html_e( 'Open link in a new window/tab','vmagazine' ); ?>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'CSS Classes (optional)','vmagazine' ); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                    </label>
                </p>
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Link Relationship (XFN)','vmagazine' ); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Description','vmagazine' ); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                        <span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.','vmagazine'); ?></span>
                    </label>
                </p>

                <!-- Custom Mega Menu -->
            <?php
                // Read the menu settings
                $vmagazine_mega_menu_cat = get_post_meta( $item_id, 'vmagazine_mega_menu_cat', true );

                // Get Categories
                $vmagazine_categories = get_categories();

                $vmagazine_cat = array();
                foreach( $vmagazine_categories as $vmagazine_category ) {
                    $vmagazine_cat[$vmagazine_category->term_id] = $vmagazine_category->name ;
                }

                // Make a menu tree
                $vmagazine_category_tree =  array( '' => '-Not a Mega Menu-' )+$vmagazine_cat ;

            ?>
                <p class="field-mega-menu description description-wide">
                    <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
                        <?php esc_html_e( 'Make this Category as a Mega Menu','vmagazine' ); ?><br />
                        <select name="vmagazine_mega_menu_cat[<?php echo esc_attr($item_id); ?>]" >
                            <?php foreach( $vmagazine_category_tree as $category_id => $category ) { ?>
                                <option value="<?php echo esc_attr($category_id); ?>" <?php echo selected( $vmagazine_mega_menu_cat, $category_id, false ); ?>><?php echo esc_html( $category ); ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </p>

                <p class="field-move hide-if-no-js description description-wide">
                    <label>
                        <span><?php esc_html_e( 'Move','vmagazine' ); ?></span>
                        <a href="#" class="menus-move-up"><?php esc_html_e( 'Up one','vmagazine' ); ?></a>
                        <a href="#" class="menus-move-down"><?php esc_html_e( 'Down one','vmagazine' ); ?></a>
                        <a href="#" class="menus-move-left"></a>
                        <a href="#" class="menus-move-right"></a>
                        <a href="#" class="menus-move-top"><?php esc_html_e( 'To the top','vmagazine' ); ?></a>
                    </label>
                </p>

                <div class="menu-item-actions description-wide submitbox">
                    <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original: %s','vmagazine'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            admin_url( 'nav-menus.php' )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php esc_html_e( 'Remove', 'vmagazine' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                    ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Cancel', 'vmagazine' ); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php
            $output .= ob_get_clean();
        }
    }
}

// Instantiate Mega Menu
new vmagazine_mega_menu();