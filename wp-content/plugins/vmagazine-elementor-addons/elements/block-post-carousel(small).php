<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Post_Carousel_Small extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-carousel-slider-small';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Carousel Slider(Small)', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-cssm';
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

        $this->add_control(
            'post_date_show',
            [
                'label'             => esc_html__( 'Show Post Dates', 'vmagazine-ea' ),
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
                    '{{WRAPPER}} .vmea-carousel-slider-small .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-carousel-slider-small .block-title',
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
                    '{{WRAPPER}} .vmagazine-block-post-car-small h3.extra-large-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-block-post-car-small h3.extra-large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-block-post-car-small h3.extra-large-font a',
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
            'post_date_color',
            [
                'label'     => esc_html__( 'Post Date Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-block-post-car-small .post-content-wrapper .date' => 'color: {{VALUE}};'
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

        $this->add_render_attribute( 'vmea-carousel-slider-small', 'class', 'vmea-carousel-slider-small' );

      
        $element_title          = $settings['element_title'];
        $post_count             = $settings['showposts'];
        $post_cat_show          = $settings['post_cat_show'];
        $post_date_show         = $settings['post_date_show'];
    
        
        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-carousel-slider-small' ); ?>>
      
      <div class="vmagazine-block-post-car-small block-post-wrapper">
            <?php vmagazine_ea_widget_title( $element_title ); ?>

            <div class="carousel-wrap cS-hidden">
            <?php 
                $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                $block_query = new \WP_Query( $block_args );
                if( $block_query->have_posts() ) {
                    while( $block_query->have_posts() ) {
                        $block_query->the_post();
                        $image_id   = get_post_thumbnail_id();
                        $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

                        $alt_val = '';
                        if( $image_alt ){
                            $alt_val = 'alt="'.esc_attr($image_alt).'"';
                        }

                        $img_src    = vmagazine_home_element_img('vmagazine-large-square-middle');
            ?>
                        <div class="single-post clearfix">
                                
                                <div class="post-thumb">
                                    <img src="<?php echo esc_url($img_src); ?>" <?php echo ($alt_val); ?> title="<?php the_title_attribute(); ?>" />
                                    <div class="image-overlay"></div>
                                        
                                </div><!-- .post-thumb -->
                                <div class="post-content-wrapper clearfix">
                                    <?php if( 'yes' == $post_cat_show ){ ?>
                                        <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                    <?php } ?>
                                    <h3 class="extra-large-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <?php if( 'yes' == $post_date_show ){ ?>
                                    <div class="date">
                                        <?php
                                            $date = get_the_date();
                                            echo esc_html($date);
                                        ?>
                                    </div>
                                    <?php } ?>
                                </div><!-- .post-content-wrapper -->
                           
                        </div><!-- .single-post  -->
                        <?php
                    }
                }
                wp_reset_postdata();
            ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Post_Carousel_Small() );