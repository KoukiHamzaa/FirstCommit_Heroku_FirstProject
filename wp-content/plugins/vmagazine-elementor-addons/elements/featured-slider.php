<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Featured_Slider extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-featured-slider';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Featured Slider', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-ftr-sl';
	}

    public function get_script_depends() {
        return [
            'jquery-lazy',
            'jquery-lightslider',
            'vmagazine-ea-script'
        ];
    }

   public function get_categories() {
		return [ 'vmagazine-elementor-addons' ];
	}


	protected function _register_controls() {


        /**
         * Content Tab: Post Layout Options
         */
        $this->start_controls_section(
            'section_post_layouts',
            [
                'label'             => esc_html__( 'Layout Options', 'vmagazine-ea' ),
            ]
        );
        
        $this->add_control(
            'element_title',
            [
                'label'             => esc_html__( 'Element Title', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
            ]
        );

   
        $this->add_control(
            'element_title_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

        $this->add_control(
            'post_slider_section',
            [
                'label'             => esc_html__( 'Slider Posts', 'vmagazine-ea' ),
                'description'       => esc_html__( 'Display post slider ?', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size_slider',
                'label'             => esc_html__( 'Slider Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-post-slider-lg',
                'condition'         => [
                    'post_slider_section'     => 'yes',
                ],
            ]
        );

        $this->add_control(
            'element_featured_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

        $this->add_control(
            'post_featured_section',
            [
                'label'             => esc_html__( 'Post Lists', 'vmagazine-ea' ),
                'description'       => esc_html__( 'Display post lists below slider ?', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size_post',
                'label'             => esc_html__( 'Post List Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-slider-thumb',
                'condition'         => [
                    'post_featured_section'     => 'yes',
                ],
            ]
        );

         $this->add_control(
            'element_view_all_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

         $this->add_control(
            'post_view_btn',
            [
                'label'             => esc_html__( 'View All Button Text', 'vmagazine-ea' ),
                'description'       => esc_html__( 'Enter text for view all button or leave it blank to hide', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
            ]
        );


        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

        $this->post_meta();

        $this->post_excerpts();

        //styling tab
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__( 'General Styles', 'vmagazine-ea' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        //element title
        $this->add_control(
            'element_title_color',
            [
                'label'     => esc_html__( 'Element Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
               
                'selectors' => [
                    '{{WRAPPER}} .vmea-featured-slider .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-featured-slider .block-title',
            ]
        );

         $this->add_control(
            'element_title_style_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

        //post title
        $this->add_control(
            'post_title_color',
            [
                'label'     => esc_html__( 'Post Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide .slider-caption h3.small-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide .slider-caption h3.small-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide .slider-caption h3.small-font a',
            ]
        );

        $this->add_control(
            'post_title_style_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );


       

        //date color
        $this->add_control(
            'post_meta_color',
            [
                'label'     => esc_html__( 'Post Meta Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider .post-meta' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'post_date_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

         $this->add_control(
            'post_content_color',
            [
                'label'     => esc_html__( 'Post Content Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide .slider-caption .post-content' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_content_color_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );
 

        //post seperator color
        $this->add_control(
            'post_seperator_color',
            [
                'label'     => esc_html__( 'Post Seperator Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_space_between',
            [
                'label'      => esc_html__( 'Space Between Posts', 'vmagazine-ea' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',                   
                ],
                'description'       => esc_html__('Leave blank for default value','vmagazine-ea')
            ]
        );


        $this->add_responsive_control(
            'post_content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'vmagazine-ea' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-featured-slider.featured-slider-wrapper .featured-posts li.f-slide .slider-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();//end for styling tab



	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render( ) {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'vmea-featured-slider', 'class', 'vmea-featured-slider' );

        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];
        $element_title          = $settings['element_title'];
        $featured_option        = $settings['post_featured_section'];
        $post_view_btn          = $settings['post_view_btn'];
        $post_slider_section    = $settings['post_slider_section'];
        $post_count             = $settings['showposts'];

        $slider_sec_class       =  ($featured_option == 'yes') ? 'slider-fullwidth' : '';

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }

        ?>

        <div <?php echo $this->get_render_attribute_string( 'vmea-featured-slider' ); ?>>
           
        <div class="vmagazine-featured-slider featured-slider-wrapper">
        
        <?php vmagazine_ea_widget_title( $element_title ); ?>
        
        <div class="section-wrapper clearfix">
        <?php if( $post_slider_section == 'yes'): ?>
            <div class="slider-section <?php echo esc_attr($slider_sec_class);?>">                    
                <?php 
                    $vmagazine_slider_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                    $vmagazine_slider_query = new \WP_Query( $vmagazine_slider_args );
                    if( $vmagazine_slider_query->have_posts() ) {
                        echo '<ul class="featuredSlider cS-hidden">';
                        while( $vmagazine_slider_query->have_posts() ) {
                            $vmagazine_slider_query->the_post();
                            
                            $image_id   = vmagazine_ea_home_element_img_id();
                            $img_src    = '';
                            if( $image_id ){
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size_slider', $settings );
                            }

                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            $alt_val = '';
                            if( $image_alt ){
                                $alt_val = 'alt="'.esc_attr($image_alt).'"';
                            }
                            
                            ?>
                            <li class="slide">
                                <img src="<?php echo esc_url($img_src); ?>" <?php echo ($alt_val); ?> title="<?php the_title_attribute(); ?>">
                                <div class="slider-caption">
                                    <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                    <?php vmagazine_ea_icon_meta($settings); ?>
                                    <h3 class="featured large-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                </div>
                                
                            </li>
                        <?php
                        }
                        echo '</ul>';
                    }
                    wp_reset_postdata();
                ?>                      
            </div><!-- .slider-section -->
            <?php endif; ?>
            <?php if( $featured_option == 'yes' ) { ?>
            <div class="featured-posts">
                <?php 
                    $vmagazine_featured_args = vmagazine_ea_query($settings);
                    $vmagazine_featured_query = new \WP_Query( $vmagazine_featured_args );
                    if( $vmagazine_featured_query->have_posts() ) {
                        echo '<ul class="featuredpost">';
                        while( $vmagazine_featured_query->have_posts() ) {
                            $vmagazine_featured_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            
                            

                            $image_id   = vmagazine_ea_home_element_img_id();
                            $img_src    = '';
                            if( $image_id ){
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size_post', $settings );
                            }
                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            ?>
                            <li class="f-slide post-thumb">
                                <a class="f-slider-img thumb-zoom" href="<?php the_permalink(); ?>">
                                    <?php echo  vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                </a>                                            
                                <div class="slider-caption">
                                    <?php vmagazine_ea_icon_meta($settings); ?>
                                   
                                    <h3 class="small-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_ea_title_excerpt($title_length); ?>
                                        </a>
                                    </h3>
                                    
                                    <div class="post-content">
                                        <?php echo vmagazine_ea_get_excerpt_content($content_excerpts); ?> 
                                    </div>
                                    
                                    
                                </div>
                                
                            </li>
                        <?php
                        }
                        echo '</ul>';
                    }
                    if( $post_view_btn ){
                        vmagazine_block_view_all( $post_cat, $post_view_btn );    
                    }
                    
                    wp_reset_postdata();
                ?>              
            </div><!-- .featured-posts -->
            <?php }?>
        </div><!-- .section-wrapper -->
    </div><!-- .featured-slider-wrapper -->


            
        </div>
    <?php 
    }

    /**
	 * Render widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function content_template() { }

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Featured_Slider() );