<?php
/**
 * Vmagazine: Category Posts (Slider)
 *
 * Widget to display selected category posts as on slider style.
 *
 * @package AccessPress Themes
 * @subpackage Vmagazine
 * @since 1.0.0
 */

add_action( 'widgets_init', 'vmagazine_register_category_slider_tab_carousel_widget' );

function vmagazine_register_category_slider_tab_carousel_widget() {
    register_widget( 'vmagazine_category_slider_tab_carousel' );
}

class vmagazine_category_slider_tab_carousel extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'vmagazine_category_slider_tab_carousel',
            'description' => esc_html__( 'Display posts from selected category as slider in Tab.', 'vmagazine-companion' )
        );
        $width = array(
                'width'  => 600
        );
        parent::__construct( 'vmagazine_category_slider_tab_carousel', esc_html__( 'Vmagazine : Slider Tab Carousel', 'vmagazine-companion' ), $widget_ops, $width );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        global $vmagazine_cat_dropdown, $vmagazine_cat_array, $vmagazine_block_layout;
        
        $fields = array(

            //widget wrapper div start
            'block_wrapper_start' => array(
                'vmagazine_widgets_name'    => 'block_wrapper_start',
                'vmagazine_widgets_class'   => 'vmagazine_admin_widget_wrapper',
                'vmagazine_widgets_field_type'   => 'section_wrapper_start'
            ),
                    'block_layout' => array(
                        'vmagazine_widgets_name'         => 'block_layout',
                        'vmagazine_widgets_title'        => esc_html__( 'Layout will be like this', 'vmagazine-companion' ),
                        'vmagazine_widgets_layout_img'   => VMAG_WIDGET_IMG_URI.'stc.png',
                        'vmagazine_widgets_field_type'   => 'widget_layout_image'
                    ),

                //widget tabs
                'block_tab_control' => array(
                    'vmagazine_widgets_name'            => 'block_tab_control',
                    'vmagazine_widgets_field_type'      => 'section_tab_wrapper',
                    'vmagazine_widgets_default'         => 'vmagazine_widget_general',
                    'vmagazine_widgets_field_options'   => array(
                        'vmagazine_widget_general' => esc_html__('General','vmagazine-companion'),
                        'vmagazine_widget_advanced'=> esc_html__('Advanced Settings','vmagazine-companion'),
                    )
                ),
                //general settings wrapper
                'tab_wrapper_general_start' => array(
                    'vmagazine_widgets_name'    => 'tab_wrapper_general_start',
                    'vmagazine_widgets_class'   => 'vmagazine-wie vmagazine_widget_general',
                    'vmagazine_widgets_field_type'   => 'section_wrapper_start'
                ),

                    'block_title' => array(
                        'vmagazine_widgets_name'         => 'block_title',
                        'vmagazine_widgets_title'        => esc_html__( 'Block Title', 'vmagazine-companion' ),
                        'vmagazine_widgets_field_type'   => 'text'
                    ),

                    'block_multi_cat' => array(
                        'vmagazine_widgets_name' => 'block_multi_cat',
                        'vmagazine_widgets_title' => esc_html__( 'Select categories', 'vmagazine-companion' ),
                        'vmagazine_widgets_field_type' => 'multicheckboxes',
                        'vmagazine_widgets_field_options' => $vmagazine_cat_array
                    ), 
                     
                    'block_posts_count' => array(
                        'vmagazine_widgets_name'         => 'block_posts_count',
                        'vmagazine_widgets_title'        => esc_html__( 'No. of Posts', 'vmagazine-companion' ),
                        'vmagazine_widgets_default'      => 4,
                        'vmagazine_widgets_field_type'   => 'number'
                    ),
                //general closing
                'tab_wrapper_general_end' => array(
                'vmagazine_widgets_name'    => 'tab_wrapper_general_end',
                'vmagazine_widgets_field_type'   => 'section_wrapper_end'
                ),
                //Advanced settings wrapper
                'tab_wrapper_adv_start' => array(
                    'vmagazine_widgets_name'    => 'tab_wrapper_adv_start',
                    'vmagazine_widgets_class'   => 'vmagazine-wie vmagazine-hidden vmagazine_widget_advanced',
                    'vmagazine_widgets_field_type'   => 'section_wrapper_start'
                ),    
                              
                    'block_section_meta' => array(
                        'vmagazine_widgets_name' => 'block_section_meta',
                        'vmagazine_widgets_title' => esc_html__( 'Show/Hide Meta', 'vmagazine-companion' ),
                        'vmagazine_widgets_default'=>'show',
                        'vmagazine_widgets_field_options'=>array('show'=>'Show','hide'=>'Hide'),
                        'vmagazine_widgets_field_type' => 'switch',
                        'vmagazine_widgets_description'  => esc_html__('Show or hide post meta options like author name, post date etc','vmagazine-companion'),
                    ),  

                   
                    'block_tabs_color' => array(
                        'vmagazine_widgets_name' => 'block_tabs_color',
                        'vmagazine_widgets_title' => esc_html__( 'Tabs Text Color', 'vmagazine-companion' ),
                        'vmagazine_widgets_field_type' => 'color'
                    ),
                     'block_tabs_color_active' => array(
                        'vmagazine_widgets_name' => 'block_tabs_color_active',
                        'vmagazine_widgets_title' => esc_html__( 'Tabs Text Color: Active', 'vmagazine-companion' ),
                        'vmagazine_widgets_field_type' => 'color'
                    ),

                 //advanced settings closing 
                'tab_wrapper_adv_end' => array(
                    'vmagazine_widgets_name'    => 'tab_wrapper_adv_end',
                    'vmagazine_widgets_field_type'   => 'section_wrapper_end'
                ),              
            //widget wrapper div closing
            'block_wrapper_end' => array(
                'vmagazine_widgets_name'    => 'block_wrapper_end',
                'vmagazine_widgets_field_type'   => 'section_wrapper_end'
            ),     
                                 
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $vmagazine_block_title       = empty( $instance['block_title'] ) ? '' : $instance['block_title'];
        $vmagazine_block_posts_count = empty( $instance['block_posts_count'] ) ? 6 : $instance['block_posts_count'];
        $vmagazine_block_multi_cats = empty( $instance['block_multi_cat'] ) ? null : $instance['block_multi_cat'];
       
        $block_section_meta = isset( $instance['block_section_meta'] ) ? $instance['block_section_meta'] : 'show';
        $block_tabs_color = empty($instance['block_tabs_color']) ? null : $instance['block_tabs_color'];
        $block_tabs_color_active = empty($instance['block_tabs_color_active']) ? null : $instance['block_tabs_color_active'];

       if( !empty( $vmagazine_block_multi_cats ) ) {
            $first_cat_id = key( $vmagazine_block_multi_cats );
            $first_cat_slug = get_term_by( 'id', $first_cat_id , 'category' );
            if( $first_cat_slug ){
                $first_cat_slug = $first_cat_id;//$first_cat_slug->slug;    
            }else{
                $first_cat_slug = '';
            }
            
            $vmagazine_block_posts_type = 'category_posts';
        } if( empty($first_cat_id) || empty($first_cat_slug) ) {
             $terms = get_terms( array(
                'taxonomy' => 'category',
                'hide_empty' => true,
            ) );
            if($terms[1]){
                $first_cat_id = $terms[1]->term_id;
                $first_cat_slug = $first_cat_id;//$terms[1]->slug;
            }else{
                $first_cat_id = '';
                 $first_cat_slug = '';
            }
           
            $vmagazine_block_posts_type = '';
        }    
        echo wp_kses_post($before_widget);
    ?>
        <div class="vmagazine-slider-tab-carousel">
        <div class="block-post-wrapper">
            <div class="block-header clearfix">
                <?php 
                    vmagazine_widget_title( $vmagazine_block_title, $title_url=null, $cat_id=null );
                    echo '<div class="slider-cat-tabs-carousel"><ul class="slider-tab-links-carousel">';
                    if( !empty($vmagazine_block_multi_cats) ){
                    foreach ( $vmagazine_block_multi_cats as $key => $term_id ) {
                        $term = get_term_by( 'id', $key, 'category' );
                        if(!empty( $term )){
                            echo '<li><a data-meta="'.esc_attr($block_section_meta).'" href="javascript:void(0)" data-id="' . intval($key) . '" data-slug="' . intval($key) . '" data-offset="'.absint($vmagazine_block_posts_count).'">' . $term->name . '</a></li>';
                           
                        }
                    }
                    }
                    echo '</ul></div>';
                ?>
            </div><!-- .block-header-->  
            <div class="block-content-wrapper-carousel">
                <div class="block-loader" style="display:none;">
                    <div class="sampleContainer">
                        <div class="loader">
                            <span class="dot dot_1"></span>
                            <span class="dot dot_2"></span>
                            <span class="dot dot_3"></span>
                            <span class="dot dot_4"></span>
                        </div>
                    </div>
                </div>
                <div class="block-cat-content-carousel <?php echo esc_attr( $first_cat_slug ); ?>" data-slug="<?php echo esc_attr( $first_cat_slug ); ?>">
            
                <?php 
                    if( !empty( $first_cat_id ) ) {
                        $block_cat_id = $first_cat_id;
                    } else {
                        $block_cat_id = $vmagazine_block_cat_id;
                    }

                    $block_args = vmagazine_query_args( $vmagazine_block_posts_type, $vmagazine_block_posts_count, $block_cat_id );
                    $block_query = new WP_Query( $block_args );
                    if( $block_query->have_posts() ) {
                        echo '<div class="tab-cat-slider-carousel">';
                        while( $block_query->have_posts() ) {
                            $block_query->the_post();
                            $image_id   = get_post_thumbnail_id();
                            $img_src    = vmagazine_home_element_img('vmagazine-post-slider-lg');
                            $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            ?>
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="javascript:void(0)" class="thumb-zoom">
                                        <img src="<?php echo esc_url($img_src) ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                        <div class="image-overlay"></div>
                                    </a>
                                    <?php do_action( 'vmagazine_post_format_icon' ); ?>
                                </div>
                                <div class="post-caption">
                                     <?php if( $block_section_meta == 'show' ): ?>
                                        <div class="post-meta clearfix">
                                            <?php do_action( 'vmagazine_icon_meta' ); ?>
                                        </div>
                                     <?php endif; ?>  
                                    <h3 class="large-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_title_excerpt(60); ?>
                                        </a>
                                    </h3>
                                </div><!-- .post-caption -->
                            </div><!-- .single-post -->
                            <?php
                        }
                        echo '</div>';
                    }
                wp_reset_query();
                ?>
                </div>
            </div><!-- block-content-wraper-->
        </div><!-- .block-post-wrapper -->
    </div>
    <?php
        echo wp_kses_post($after_widget);

        /**
        * Widget stylings
        */
        if($block_tabs_color || $block_tabs_color_active ): 
        
        echo "
            <style type='text/css'>
            .vmagazine-slider-tab-carousel .slider-cat-tabs-carousel .slider-tab-links-carousel li a{
                color: $block_tabs_color;
            }
            .vmagazine-slider-tab-carousel .slider-cat-tabs-carousel .slider-tab-links-carousel li.active a, .vmagazine-slider-tab-carousel .slider-cat-tabs-carousel .slider-tab-links-carousel li a:hover{
                color: $block_tabs_color_active;
            }
            
            </style>
            ";
        endif;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    vmagazine_widgets_updated_field_value()      defined in vmagazine-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$vmagazine_widgets_name] = vmagazine_widgets_updated_field_value( $widget_field, $new_instance[$vmagazine_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    vmagazine_widgets_show_widget_field()        defined in vmagazine-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $vmagazine_widgets_field_value = !empty( $instance[$vmagazine_widgets_name]) ? esc_attr($instance[$vmagazine_widgets_name] ) : '';
            vmagazine_widgets_show_widget_field( $this, $widget_field, $vmagazine_widgets_field_value );
        }
    }
}