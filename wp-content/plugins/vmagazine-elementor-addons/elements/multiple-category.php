<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Multiple_Category extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-mul-cat';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Multiple Category Block', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-mcb';
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
                    '{{WRAPPER}} .vmea-mul-cat .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-mul-cat .block-title',
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
                    '{{WRAPPER}} .vmagazine-mul-cat.layout-one .block-cat-content .left-post-wrapper .post-caption-wrapper h3.large-font a,.vmagazine-mul-cat.layout-one .block-cat-content .right-posts-wrapper .single-post .post-caption-wrapper h3.small-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-mul-cat.layout-one .block-cat-content .left-post-wrapper .post-caption-wrapper h3.large-font a:hover,.vmagazine-mul-cat.layout-one .block-cat-content .right-posts-wrapper .single-post .post-caption-wrapper h3.small-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-mul-cat.layout-one .block-cat-content .left-post-wrapper .post-caption-wrapper h3.large-font a,.vmagazine-mul-cat.layout-one .block-cat-content .right-posts-wrapper .single-post .post-caption-wrapper h3.small-font a',
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
                    '{{WRAPPER}} .vmea-mul-cat .single-post .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmea-mul-cat .single-post .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmagazine-mul-cat.layout-one .block-cat-content .left-post-wrapper .post-caption-wrapper p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-mul-cat.layout-one .block-cat-content .right-posts-wrapper .single-post:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-mul-cat', 'class', 'vmea-mul-cat' );

        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];
        $element_title          = $settings['element_title'];
        $post_view_btn          = $settings['post_view_btn'];
        $element_layout         = $settings['element_layout'];

        $post_count             = $settings['showposts'];
        $post_meta              = $settings['post_meta']; 
        
        $all_categories = $settings['categories'];
        if( ! empty($all_categories)){
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


        $layout = ('block_layout_2' == $element_layout) ? 'layout-two' : 'layout-one';
        
        ?>

        <div <?php echo $this->get_render_attribute_string( 'vmea-mul-cat' ); ?>>
       
            <div class="vmagazine-mul-cat block-post-wrapper <?php echo esc_attr($layout);?> clearfix">
            <div class="block-header clearfix">
                <?php
                    vmagazine_ea_widget_title( $element_title );
                    echo '<div class="child-cat-tabs"><ul class="vmagazine-tab-links">';
                    $li_order = 0;
                    foreach ( $all_categories as $key ) {
                        $li_order++;
                        $li_class = '';
                        if( $li_order == 1 ){
                            $li_class = ' class="active"';
                        }
                        $term = get_term_by( 'id', $key, 'category' );
                        
                        if(!empty( $term )){
                            echo '<li'.$li_class.'>
                            <a href="javascript:void(0)" data-title="'.esc_attr($title_length).'" data-meta="'.esc_attr($post_meta).'" data-id="' . intval($key) . '" data-slug="' . intval($key) . '" data-link="'.get_term_link($term->slug, 'category').'" data-layout="'.esc_attr($element_layout).'" data-count="'.absint($post_count).'" data-length="'.absint($content_excerpts).'" data-btn="'.esc_attr($post_view_btn).'">' . $term->name . '</a>
                            </li>';

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
                <div class="block-cat-content <?php echo esc_attr($first_cat); ?>">

                <?php
                

                $block_args = vmagazine_ea_query($settings,$first_id,$post_count);
                $block_query = new \WP_Query( $block_args );
                $post_count = 0;
                $total_posts_count = $block_query->post_count;
                if( $block_query->have_posts() ) {
                    while( $block_query->have_posts() ) {
                        $block_query->the_post();
                        $post_count++;
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                        
                        if( $element_layout == 'block_layout_2' ){
                            
                            $vmagazine_font_size = 'small-font';
                            if( $post_count < 3  ) {
                                $img_src = vmagazine_home_element_img('vmagazine-long-post-thumb');
                                echo '<div class="left-post-wrapper">';
                            }elseif( $post_count >= 3 ){
                                $img_src = vmagazine_home_element_img('vmagazine-cat-post-sm');
                            }
                            if( $post_count == 3 ) {
                                $vmagazine_animate_class = 'fadeInUp';
                                echo '<div class="right-posts-wrapper">';
                            }
                            
                        }else{
                            if( $post_count == 1 ) {
                                $vmagazine_font_size = 'large-font';
                                $img_src = vmagazine_home_element_img('vmagazine-rectangle-thumb');
                                echo '<div class="left-post-wrapper">';
                            } elseif( $post_count == 2 ) {
                                $vmagazine_font_size = 'small-font';
                                $img_src = vmagazine_home_element_img('vmagazine-small-thumb');
                                $vmagazine_animate_class = 'fadeInUp';
                                echo '<div class="right-posts-wrapper">';
                            } else {
                                $vmagazine_font_size = 'small-font';
                                $img_src = vmagazine_home_element_img('vmagazine-rectangle-thumb');
                            }
                        }
                ?>
                        <div class="single-post clearfix">
                            <div class="post-thumb">
                                <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php echo vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                </a>
                                <?php if( $post_count == 1 ) { do_action( 'vmagazine_post_format_icon' ); } ?>
                            </div><!-- .post-thumb -->
                            <div class="post-caption-wrapper">
                                <div class="post-caption-inner">
                                    <?php vmagazine_ea_icon_meta($settings); ?>
                                    <h3 class="<?php echo esc_attr( $vmagazine_font_size ); ?>">
                                        <a href="<?php the_permalink(); ?>">
                                             <?php echo vmagazine_ea_title_excerpt($title_length); ?>
                                        </a>
                                    </h3>
                                </div>
                                <?php if( ($element_layout == 'block_layout_1') && ($post_count == 1) ){
                                    ?>
                                    <p> 
                                    <?php echo vmagazine_ea_get_excerpt_content($content_excerpts); ?> 
                                    </p>
                                <?php } ?>

                            </div><!-- .post-caption-wrapper -->
                            
                        </div><!-- .single-post -->
            <?php

                        if( ($element_layout=='block_layout_2') && ( $post_count < 3 ) ){
                            echo '</div>';
                        }elseif( $post_count == 1 || $post_count == $total_posts_count ) {
                            if( $post_count == $total_posts_count ){

                               if( $post_view_btn ){
                                    vmagazine_block_view_all( $post_cat, $post_view_btn );    
                                }
                                
                            }
                            echo '</div>';
                        }
                        
                    }
                }
                wp_reset_postdata();
                
            ?>

            </div>
            
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Multiple_Category() );