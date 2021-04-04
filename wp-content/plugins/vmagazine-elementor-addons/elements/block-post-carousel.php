<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Block_Post_Carousel extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-block-post-carousel';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Block Posts(Carousel)', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-bpc';
	}

   
    public function get_script_depends() {
        return [
            'jquery-lazy',
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
            'element_layout',
            [
                'label'     => esc_html__( 'Layout', 'vmagazine-ea' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block_layout_1',
                'options'   => [
                    'block_layout_1'  => esc_html__( 'Layout One', 'vmagazine-ea' ),
                    'block_layout_2'  => esc_html__( 'Layout Two', 'vmagazine-ea' ),
                ],
            ]
        );


       $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-rect-post-carousel',
                'condition'         => [
                    'element_layout'     => 'block_layout_1',
                ],
                
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size_2',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-large-square-thumb',
                'condition'         => [
                    'element_layout'     => 'block_layout_2',
                ],
                
            ]
        );
      

        $this->add_control(
            'post_cat_show_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );
         
        $this->add_control(
            'post_cat_show',
            [
                'label'             => esc_html__( 'Show Post Categories', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );



        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

        $this->post_meta();

        //$this->post_excerpts();

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
                    '{{WRAPPER}} .vmea-block-post-carousel .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-block-post-carousel .block-title',
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
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a:hover,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a',
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
                    '{{WRAPPER}} .vmea-block-post-carousel .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmea-block-post-carousel .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .block-post-wrapper.list .single-post .post-content-wrapper .post-content p,.block-post-wrapper.grid-two .single-post .post-content-wrapper .post-content p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmea-block-post-carousel .block-post-wrapper.list .single-post,.vmea-block-post-carousel .block-post-wrapper.grid-two .single-post' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmea-block-post-carousel .block-post-wrapper.list .single-post:not(:first-child),.vmea-block-post-carousel .block-post-wrapper.grid-two .single-post:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}};',                   
                ],
                'description'       => esc_html__('Leave blank for default value','vmagazine-ea')
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

        $this->add_render_attribute( 'vmea-block-post-carousel', 'class', 'vmea-block-post-carousel' );
/*
        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];*/
        $element_title          = $settings['element_title'];
        $element_layout         = $settings['element_layout'];

        $post_count             = $settings['showposts'];
        $post_meta              = $settings['post_meta']; 
        $post_cat_show          = $settings['post_cat_show'];
 

        

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }
        
        
        ?>
<div <?php echo $this->get_render_attribute_string( 'vmea-block-post-carousel' ); ?>>
        
    
 <div class="vmagazine-post-carousel block-post-wrapper <?php echo esc_attr($element_layout);?>">
            
            <div class="block-header clearfix">
                 <?php vmagazine_ea_widget_title( $element_title ); ?>
            </div><!-- .block-header-->    
            
                <?php 
                    $title_font_size = 'large-font';
                    if( $element_layout == 'block_layout_1'){
                        $img_size = 'vmagazine-rect-post-carousel';
                    }else{
                        $img_size = 'vmagazine-large-square-thumb';
                    }
                    
                ?>
            
            <?php 
                $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                $block_query = new \WP_Query( $block_args );
                if( $block_query->have_posts() ) {
                    echo '<div class="block-carousel">';
                    while( $block_query->have_posts() ) {
                        $block_query->the_post();

                        $image_id   = vmagazine_ea_home_element_img_id();
                        if( $element_layout == 'block_layout_1'){
                        $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );    
                        }else{
                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size_2', $settings );        
                        }
            ?>
                        <div class="single-post clearfix">
                            <div class="post-thumb">
                                <?php echo vmagazine_load_images($img_src); ?>
                            </div>
                                <?php do_action( 'vmagazine_post_format_icon' ); ?>
                                <div class="post-caption">
                                    <?php if( $post_cat_show == 'yes' ){ ?>
                                        <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                    <?php } ?>
                                    <?php if( $element_layout == 'block_layout_1'){ ?>
                                        <?php vmagazine_ea_icon_meta($settings); ?>    
                                    <?php } ?>
                                    <h3 class="<?php echo esc_attr( $title_font_size ); ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <?php if( $element_layout == 'block_layout_2'){ ?>
                                        <?php vmagazine_ea_icon_meta($settings); ?> 
                                    <?php } ?>
                                </div><!-- .post-caption -->
                            
                        </div><!-- .single-post -->
            <?php
                    }
                    echo '</div>';
                }
                wp_reset_postdata();
            ?>
        <div class="crs-layout-action">
           <div class="vmagazine-lSPrev"></div>
           <div class="vmagazine-lSNext"></div>
       </div>            
        </div><!-- .block-post-wrapper -->


            
</div><!-- element main wrapper -->
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Block_Post_Carousel() );