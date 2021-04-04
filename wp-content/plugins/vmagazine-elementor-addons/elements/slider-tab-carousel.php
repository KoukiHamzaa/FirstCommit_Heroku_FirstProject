<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Slider_Tab_Carousel extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-slider-tab-carousel';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Slider Tab Carousel', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-stc';
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


        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

        $this->post_meta();

         /**
         * Content Tab: Post Excerpts
         */
        $this->start_controls_section(
            'section_post_excerpts',
            [
                'label'             => esc_html__( 'Post Excerpts', 'vmagazine-ea' ),
            ]
        );
        
        $this->add_control(
            'title_excerpts',
            [
                'label'             => esc_html__( 'Title Length', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'description'       => esc_html__('Enter Length for title in letters or leave balnk to display full','vmagazine-ea')
            ]
        );

        $this->end_controls_section();

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
                    '{{WRAPPER}} .vmea-slider-tab-carousel .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-slider-tab-carousel .block-title',
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
                    '{{WRAPPER}} .vmagazine-slider-tab-carousel .block-content-wrapper-carousel .post-caption h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-slider-tab-carousel .block-content-wrapper-carousel .post-caption h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-slider-tab-carousel .block-content-wrapper-carousel .post-caption h3',
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
                    '{{WRAPPER}} .vmagazine-slider-tab-carousel .block-content-wrapper-carousel .post-caption .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-slider-tab-carousel .block-content-wrapper-carousel .post-caption .post-meta span::after' => 'background: {{VALUE}}'
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

        $this->add_render_attribute( 'vmea-slider-tab-carousel', 'class', 'vmea-slider-tab-carousel' );

        $title_length           = $settings['title_excerpts'];
        $element_title          = $settings['element_title'];
        
        

        $post_count             = $settings['showposts'];
        $post_meta              = $settings['post_meta']; 
        
        $all_categories = $settings['categories'];
        if( ! empty($all_categories)){
            asort($all_categories);    
        }
        

        $first_cat = 'null';
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

        <div <?php echo $this->get_render_attribute_string( 'vmea-slider-tab-carousel' ); ?>>
        
        <div class="vmagazine-slider-tab-carousel">
            <div class="block-post-wrapper">
                <div class="block-header clearfix">
                    <?php 
                        vmagazine_ea_widget_title( $element_title );
                        echo '<div class="slider-cat-tabs-carousel"><ul class="slider-tab-links-carousel">';
                        if( !empty($post_cats) ){
                        foreach ( $all_categories as $key ) {
                            $term = get_term_by( 'id', $key, 'category' );
                            if(!empty( $term )){
                                echo '<li><a data-meta="'.esc_attr($post_meta).'" href="javascript:void(0)" data-id="' . intval($key) . '" data-slug="' . intval($key) . '" data-offset="'.absint($post_count).'">' . $term->name . '</a></li>';
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
                    <div class="block-cat-content-carousel <?php echo esc_attr($first_cat); ?>" data-slug="<?php echo esc_attr($first_cat); ?>">
                
                    <?php 

                        $block_args = vmagazine_ea_query($settings,$first_id,$post_count);
                        $block_query = new \WP_Query( $block_args );
                        if( $block_query->have_posts() ) {
                            echo '<div class="tab-cat-slider-carousel">';
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
                                        <a href="javascript:void(0)" class="thumb-zoom">
                                            <img src="<?php echo esc_url($img_src) ?>" <?php echo ($alt_val); ?>>
                                            <div class="image-overlay"></div>
                                        </a>
                                        <?php do_action( 'vmagazine_post_format_icon' ); ?>
                                    </div>
                                    <div class="post-caption">
                                        <?php vmagazine_ea_icon_meta($settings); ?>   
                                        <h3 class="large-font">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo vmagazine_ea_title_excerpt($title_length); ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Slider_Tab_Carousel() );