<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Category_Slider extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-cat-post-slider';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Category Posts(Slider)', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-cps';
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
            'element_layout',
            [
                'label'     => esc_html__( 'Layout', 'vmagazine-ea' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block_layout_1',
                'options'   => [
                    'block_layout_1'  => esc_html__( 'Layout One', 'vmagazine-ea' ),
                    'block_layout_2' => esc_html__( 'Layout Two', 'vmagazine-ea' ),
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-large-category',
                'condition'         => [
                    'element_layout'     => 'block_layout_1',
                ],
                
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size_two',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-vertical-slider-thumb',
                'condition'         => [
                    'element_layout'     => 'block_layout_2',
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
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .block-title,.vmea-cat-post-slider .vmagazine-cat-slider .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .block-title,.vmea-cat-post-slider .vmagazine-cat-slider .block-title',
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
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .lSSlideWrapper li.lslide a, .block-post-wrapper.block_layout_2 .lSSlideWrapper li.lslide a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .lSSlideWrapper li.lslide a:hover, .block-post-wrapper.block_layout_2 .lSSlideWrapper li.lslide a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .lSSlideWrapper li.lslide a, .block-post-wrapper.block_layout_2 .lSSlideWrapper li.lslide a',
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
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .lSSlideWrapper li.single-post .post-caption .post-meta,.block-post-wrapper.block_layout_2 .lSSlideWrapper li.lslide .post-caption .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .lSSlideWrapper li.single-post .post-caption .post-meta span::after,.block-post-wrapper.block_layout_2 .lSSlideWrapper li.lslide .post-caption .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmagazine-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .lSSlideWrapper li.single-post .post-caption p' => 'color: {{VALUE}};',
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

        $this->add_render_attribute( 'vmea-cat-post-slider', 'class', 'vmea-cat-post-slider' );

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


        if( $element_layout == 'block_layout_1' ){
            $wid_wrapper_st = '<div class="content-wrapper-featured-slider">';
            $wid_wrapper_ed = '</div>';
        }else{
            $wid_wrapper_st = '';
            $wid_wrapper_ed = '';
        }

        ?>

        <div <?php echo $this->get_render_attribute_string( 'vmea-cat-post-slider' ); ?>>
       

          <div class="vmagazine-cat-slider block-post-wrapper <?php echo esc_attr( $element_layout ); ?>" >
            
            <?php echo wp_kses_post($wid_wrapper_st); ?>
             <?php vmagazine_ea_widget_title( $element_title ); ?>
                <?php
                    $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                    $block_query = new \WP_Query( $block_args );
                    if( $block_query->have_posts() ) {
                        echo '<ul class="widget-cat-slider cS-hidden">';
                        while( $block_query->have_posts() ) {
                            $block_query->the_post();
                            $total_posts_count = $block_query->post_count+1;
                           
                            $img_id =   ($element_layout == 'block_layout_1')  ? 'image_size' : 'image_size_two';

                            $image_id   = vmagazine_ea_home_element_img_id();
                            $img_src    = '';
                            if( $image_id ){
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, $img_id, $settings );
                            }

                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            $alt_val = '';
                            if( $image_alt ){
                                $alt_val = 'alt="'.esc_attr($image_alt).'"';
                            }

                            if( $element_layout == 'block_layout_1'){
                                $font_class = 'extra-large-font';
                            }else{
                                $font_class = 'small-font';
                            }

                            ?>
                            <li class="single-post clearfix">
                                <div class="post-thumb">
                                    <img src="<?php echo esc_url($img_src); ?>" <?php echo ($alt_val); ?> title="<?php the_title_attribute(); ?>" />
                                </div>
                                <div class="post-caption">
                                    <?php 
                                    if($element_layout == 'block_layout_1'){
                                        do_action( 'vmagazine_post_cat_or_tag_lists' ); 
                                    }
                                    vmagazine_ea_icon_meta($settings); ?>
                                    <h3 class="<?php echo esc_attr($font_class);?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_ea_title_excerpt($title_length); ?>
                                        </a>
                                    </h3>
                                    <?php if( ($element_layout == 'block_layout_1') && $content_excerpts ){ ?>
                                    <p>
                                    <?php 
                                    echo vmagazine_ea_get_excerpt_content($content_excerpts);
                                    if( $post_view_btn ){
                                        vmagazine_block_view_all( $post_cat, $post_view_btn );  
                                    }
                                    ?>
                                    </p>
                                    <?php } ?>
                                </div><!-- .post-caption -->
                            </li><!-- .single-post -->
                            <?php
                        }
                        echo '</ul>';
                    }
                wp_reset_postdata();
            ?>
        <?php echo wp_kses_post($wid_wrapper_ed); ?><!-- .content-wrapper -->
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Category_Slider() );