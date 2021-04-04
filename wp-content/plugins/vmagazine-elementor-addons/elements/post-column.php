<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Post_Column extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-post-column';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Block Post(Column)', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-pcol';
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
                    'block_layout_3' => esc_html__( 'Layout Two', 'vmagazine-ea' ),
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-rectangle-thumb',
                
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
                    '{{WRAPPER}} .vmea-post-column .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-post-column .block-title',
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
                    '{{WRAPPER}} .vmagazine-post-col .single-post .content-wrapper a,.vmagazine-post-col.block_layout_1 .single-post .content-wrapper .small-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-post-col .single-post .content-wrapper a:hover,.vmagazine-post-col.block_layout_1 .single-post .content-wrapper .small-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-post-col .single-post .content-wrapper .large-font a',
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
                    '{{WRAPPER}} .vmagazine-post-col .single-post .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-post-col .single-post .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmagazine-post-col.block_layout_1 .single-post .content-wrapper p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-post-col.block_layout_1 .single-post .content-wrapper .small-font' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmea-post-column .single-post.bottom-post' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-post-column', 'class', 'vmea-post-column' );

        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];
        $element_title          = $settings['element_title'];
        $post_view_btn          = $settings['post_view_btn'];
        $element_layout         = $settings['element_layout'];
        $post_count             = $settings['showposts'];
        

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }

        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-post-column' ); ?>>
       

            <div class="wrapper-vmagazine-post-col <?php echo esc_attr( $element_layout ); ?>">
            <?php vmagazine_ea_widget_title( $element_title ); ?>
            <div class="vmagazine-post-col block-post-wrapper <?php echo esc_attr( $element_layout ); ?> wow zoomIn" data-wow-duration="1s">
                <div class="block-header clearfix">
                    
                </div><!-- .block-header-->
                <?php 
                    $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                    $block_query = new \WP_Query( $block_args );
                    $post_count = 0;
                    $total_posts_count = $block_query->post_count;
                    if( $block_query->have_posts() ) {
                        while( $block_query->have_posts() ) {
                            $block_query->the_post();
                            $post_count++;

                            $image_id   = vmagazine_ea_home_element_img_id();
                            $img_src    = '';
                            if( $image_id ){
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                            }

                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            $post_class = '';
                            if( $post_count == 1 ) { 
                                $post_class = 'first-post'; 
                            } else {
                                $post_class = 'bottom-post';
                            }
                            if( $element_layout == 'block_layout_3'){
                                $vmagazine_font_size = 'small-font';
                            }elseif( ($element_layout == 'block_layout_1') && ($post_count == 1) ){
                                $vmagazine_font_size = 'large-font';
                            }else{
                                $vmagazine_font_size = 'small-font';
                            }
                ?>
                            <div class="single-post <?php echo esc_attr( $post_class ); ?> clearfix">
                            <?php if( $post_count == 1 ||  $element_layout == 'block_layout_3' ) { ?>
                                <div class="post-thumb">
                                    <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php echo vmagazine_load_images($img_src); ?>
                                        <div class="image-overlay"></div>
                                    </a>
                                    <?php do_action( 'vmagazine_post_format_icon' ); ?>
                                </div>
                            <?php } ?>
                                <div class="content-wrapper">
                                    <?php
                                     if( ($element_layout != 'block_layout_1') || ($post_count == 1) ){ 
                                       vmagazine_ea_icon_meta($settings);
                                     } ?>
                                    <h3 class="<?php echo esc_attr( $vmagazine_font_size ); ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_ea_title_excerpt($title_length); ?>
                                        </a>
                                    </h3>
                                    <?php 
                                        if( ($post_count == 1) && ($element_layout != 'block_layout_3') ) {
                                            echo '<p>'. vmagazine_ea_get_excerpt_content($content_excerpts) .'</p>';
                                        } ?>
                                </div><!-- .content-wrapper -->                          
                            </div><!-- .single-post -->
                            <?php
                        }
                    }
                    
                   if( $post_view_btn ){
                        vmagazine_block_view_all( $post_cat, $post_view_btn );    
                    }
                    wp_reset_postdata();
                ?>
            </div><!-- .block-post-wrapper -->
        </div>

            
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Post_Column() );