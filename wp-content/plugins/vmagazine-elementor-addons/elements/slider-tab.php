<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Slider_Tab extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-slider-tab';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Slider Tab', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-slt';
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



        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();


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
                    '{{WRAPPER}} .slider-tab-wrapper .block-post-wrapper.block_layout_1 .block-header h4.block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .slider-tab-wrapper .block-post-wrapper.block_layout_1 .block-header h4.block-title',
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
                    '{{WRAPPER}} .slider-tab-wrapper .block-post-wrapper.block_layout_1 .block-content-wrapper .tab-cat-slider.slick-slider .slick-slide .post-caption h3.large-font' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-tab-wrapper .block-post-wrapper.block_layout_1 .block-content-wrapper .tab-cat-slider.slick-slider .slick-slide .post-caption h3.large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .slider-tab-wrapper .block-post-wrapper.block_layout_1 .block-content-wrapper .tab-cat-slider.slick-slider .slick-slide .post-caption h3.large-font',
            ]
        );

        $this->add_control(
            'post_title_style_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
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

        $this->add_render_attribute( 'vmea-slider-tab', 'class', 'vmea-slider-tab' );
        
        $element_title          = $settings['element_title'];
        $post_count             = empty($settings['showposts']) ? 6 : $settings['showposts'];

        
        $all_categories = $settings['categories'];
        if(!empty($all_categories)){
            asort($all_categories);
        }

        $first_cat = '';
        if( !empty($all_categories)){
            $first_cat = $all_categories[0];
        }

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }

        $first_id = !empty($post_cats) ? $post_cats[0] : '' ;

        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-slider-tab' ); ?>>
        
  <div class="vmagazine-slider-tab slider-tab-wrapper">
        <div class="block-post-wrapper block_layout_1">
            <div class="block-header clearfix">
                <?php 
                    vmagazine_ea_widget_title( $element_title );
                    echo '<div class="slider-cat-tabs"><ul class="slider-tab-links">';
                    if(!empty($all_categories)){
                        foreach ( $all_categories as $key ) {
                            $term = get_term_by( 'id', $key, 'category' );
                            if(!empty( $term )){
                                echo '<li><a href="javascript:void(0)" data-id="' . intval($key) . '" data-slug="' . intval($key) . '" data-offset="'.absint($post_count).'">' . $term->name . '</a></li>';
                               
                            }
                        }
                    }
                    echo '</ul></div>';
                ?>
            </div><!-- .block-header-->  
            <div class="block-content-wrapper">
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
                <div class="block-cat-content <?php echo esc_attr( $first_cat ); ?>" data-slug="<?php echo esc_attr( $first_cat ); ?>">
            
                <?php 
                   
                    $block_args = vmagazine_ea_query($settings,$first_id,$post_count);
                    $block_query = new \WP_Query( $block_args );
                    if( $block_query->have_posts() ) {
                        echo '<div class="tab-cat-slider sl-before-load">';
                        while( $block_query->have_posts() ) {
                            $block_query->the_post();
                            $image_id   = get_post_thumbnail_id();
                            $img_src    = vmagazine_home_element_img('vmagazine-post-slider-lg');
                            $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                            $alt_val = '';
                            if( $image_alt ){
                                $alt_val = 'alt="'.esc_attr($image_alt).'"';
                            }
                            ?>
                            <div class="single-post">
                                <div class="post-thumb">
                                    <img src="<?php echo esc_url($img_src); ?>" <?php echo ($alt_val); ?> title="<?php the_title_attribute(); ?>" />
                                    <div class="image-overlay"></div>
                                    <?php do_action( 'vmagazine_post_format_icon' ); ?>
                                </div>
                                <div class="post-caption">
                                    <h3 class="large-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div><!-- .post-caption -->
                            </div><!-- .single-post -->
                            <?php
                        }
                        echo '</div>';
                    }
                wp_reset_postdata();
                ?>
                </div>
            </div><!-- block-content-wraper-->
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Slider_Tab() );