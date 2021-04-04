<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Fullwidth_Slider extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-fullwidth-slider';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Fullwidth Slider', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-fs';
	}

    public function get_script_depends() {
        return [
            'jquery-lazy',
            'jquery-slickslider',
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
            'slider_layout',
            [
                'label'     => esc_html__( 'Slider Layout', 'vmagazine-ea' ),
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
                'name'              => 'image_size_slider',
                'label'             => esc_html__( 'Slider Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-single-large',
            ]
        );

       
     
        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

        $this->post_meta();


        //styling tab
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__( 'Slider Styles', 'vmagazine-ea' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

       

        //post title
        $this->add_control(
            'post_title_color',
            [
                'label'     => esc_html__( 'Post Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .slick-slider .post-content-wrapper h3.extra-large-font a,.vmagazine-fullwid-slider.block_layout_2 .single-post .post-content-wrapper h3.extra-large-font' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .slick-slider .post-content-wrapper h3.extra-large-font a:hover,.vmagazine-fullwid-slider.block_layout_2 .single-post .post-content-wrapper h3.extra-large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .slick-slider .post-content-wrapper h3.extra-large-font a,.vmagazine-fullwid-slider.block_layout_2 .single-post .post-content-wrapper h3.extra-large-font',
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
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .slick-slider .post-content-wrapper .post-meta,.vmagazine-fullwid-slider.block_layout_2 .single-post .post-content-wrapper .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .slick-slider .post-content-wrapper .post-meta span::after' => 'bakground:{{VALUE}};',
                ],
            ]
        );

        
    $this->end_controls_section();//end for styling tab

    /**
    * Slider thumbnail styles
    *
    */

        $this->start_controls_section(
            'thumb_general_style',
            [
                'label' => esc_html__( 'Slider Thumb Styles', 'vmagazine-ea' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

       

        //post title
        $this->add_control(
            'thumb_post_title_color',
            [
                'label'     => esc_html__( 'Post Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .posts-tab-wrap .single-post .post-caption-wrapper h3.large-font,.vmagazine-fullwid-slider.block_layout_2 .posts-tab-wrap.slick-vertical .single-post .slider-nav-inner-wrapper .post-caption-wrapper h3' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'thumb_post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .posts-tab-wrap .single-post .post-caption-wrapper h3.large-font:hover,.vmagazine-fullwid-slider.block_layout_2 .posts-tab-wrap.slick-vertical .single-post .slider-nav-inner-wrapper .post-caption-wrapper h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'thumb_post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .posts-tab-wrap .single-post .post-caption-wrapper h3.large-font,.vmagazine-fullwid-slider.block_layout_2 .posts-tab-wrap.slick-vertical .single-post .slider-nav-inner-wrapper .post-caption-wrapper h3',
            ]
        );

        $this->add_control(
            'thumb_post_title_style_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );


       

        //date color
        $this->add_control(
            'thumb_post_date_color',
            [
                'label'     => esc_html__( 'Post Date Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-fullwid-slider.block_layout_1 .posts-tab-wrap .single-post .post-caption-wrapper span:first-child,.vmagazine-fullwid-slider.block_layout_2 .posts-tab-wrap.slick-vertical .single-post .slider-nav-inner-wrapper .post-caption-wrapper span' => 'color: {{VALUE}};',
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

        $this->add_render_attribute( 'vmea-fullwidth-slider', 'class', 'vmea-fullwidth-slider' );

        
        $slider_layout          = $settings['slider_layout'];
        $posts_to_show          = $settings['showposts'];
        $post_date              = $settings['post_date'];
        $post_count             = $settings['showposts'];
      
       

        ?>

        <div <?php echo $this->get_render_attribute_string( 'vmea-fullwidth-slider' ); ?>>
        
            <div class="vmagazine-fullwid-slider block-post-wrapper <?php echo esc_attr($slider_layout);?>" data-count="<?php echo absint($posts_to_show);?>">
            <div class="slick-wrap sl-before-load">
            <?php 
                $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                $block_query = new \WP_Query( $block_args );
                if( $block_query->have_posts() ) {
                    while( $block_query->have_posts() ) {
                        $block_query->the_post();
                        
                        $image_id   = vmagazine_ea_home_element_img_id();
                        $img_src    = '';
                        if( $image_id ){
                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size_slider', $settings );
                        }
                            
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
            ?>
                        <div class="single-post clearfix">
                            
                                <div class="post-thumb">
                                    <?php echo  vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                </div><!-- .post-thumb -->
                                <div class="post-content-wrapper clearfix">
                                    <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>

                                    <?php vmagazine_ea_icon_meta($settings); ?>
                                    <h3 class="extra-large-font">
                                        <a href="<?php the_permalink(); ?>">
                                             <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                </div><!-- .post-content-wrapper -->
                           
                        </div><!-- .single-post  -->
                        <?php
                    }
                }
                wp_reset_postdata();
            ?>
            </div> 
            <?php if( $slider_layout == 'block_layout_2' ){ ?>
            <div class="vmagazine-container">
            <?php } ?>
            <div class="posts-tab-wrap sl-before-load">
                <?php 
                    $block_args = vmagazine_ea_query( $settings);
                    $block_query = new \WP_Query( $block_args );
                    if( $block_query->have_posts() ) {
                        while( $block_query->have_posts() ) {
                            $block_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $img_srcs = vmagazine_home_element_img('vmagazine-small-thumb');
                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                ?>                
                <div class="single-post clearfix">  
                    <div class="slider-nav-inner-wrapper">
                        <div class="post-thumb">
                            <a href="javascript:void(0)" class="thumb-zoom">
                                <?php echo  vmagazine_load_images($img_srcs); ?>
                                <div class="image-overlay"></div>
                            </a>
                            <?php do_action( 'vmagazine_post_format_icon' );?>
                        </div><!-- .post-thumb -->
                        <div class="post-caption-wrapper">
                             <?php if( 'yes' == $post_date ):
                               $posted_on = get_the_date();
                               echo '<span class="posted-on"><i class="fa fa-clock-o"></i>'. $posted_on .'</span>';
                             endif; ?>
                            <h3 class="large-font">
                                <?php the_title(); ?>
                            </h3>
                           
                        </div><!-- .post-caption-wrapper -->
                    </div><!-- .slider-nav-inner-wrapper -->
                </div> 
                <?php }} wp_reset_postdata();?>               
            </div>
            <?php if( $slider_layout == 'block_layout_2' ){ ?>
            </div>
            <?php } ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Fullwidth_Slider() );