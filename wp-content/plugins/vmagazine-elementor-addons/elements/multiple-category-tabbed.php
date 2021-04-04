<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Multiple_Category_Tabbed extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-mul-cat-tabbed';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Multiple Category Tabbed', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-mct';
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
                    '{{WRAPPER}} .vmea-mul-cat-tabbed .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-mul-cat-tabbed .block-title',
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
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper h3.large-font,.vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post .post-caption-wrapper h3.small-font' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post .post-caption-wrapper h3.small-font a:hover,.vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper h3.large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper h3.large-font,.vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post .post-caption-wrapper h3.small-font',
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
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post .post-caption-wrapper .post-meta,.vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post .post-caption-wrapper .post-meta span::after,.vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .top-post-wrapper .single-post .post-caption-wrapper p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post,.vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .second-col-wrapper' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-mul-cat-tabbed .block-content-wrapper .btm-posts-wrapper .single-post' => 'padding-top: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-mul-cat-tabbed', 'class', 'vmea-mul-cat-tabbed' );

        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];
        $element_title          = $settings['element_title'];
        $post_view_btn          = $settings['post_view_btn'];
        

        $post_count             = $settings['showposts'];

        if( empty($post_count) ){
            $post_count = 7;
        }elseif($post_count > 7 ){
            $post_count = 7;
        }

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


        
        
        ?>

        <div <?php echo $this->get_render_attribute_string( 'vmea-mul-cat-tabbed' ); ?>>
       
            
            <div class="vmagazine-mul-cat-tabbed block-post-wrapper clearfix" >
            <div class="block-header clearfix">
                <?php
                    vmagazine_ea_widget_title( $element_title );
                    echo '<div class="multiple-child-cat-tabs"><ul class="vmagazine-tabbed-links">';
                    if( !empty( $post_cats) ):
                    foreach ( $all_categories as $key ) {
                        $term = get_term_by( 'id', $key, 'category' );
                        if(!empty( $term )){
                            echo '<li>
                            <a href="javascript:void(0)" data-meta="'.esc_attr($post_meta).'" data-id="' .intval( $key ). '" data-slug="' . intval($key) . '" data-link="'.get_term_link($term->slug, 'category').'" data-count="'.absint($content_excerpts).'">' . $term->name . '</a>
                            </li>';

                        }
                    }
                    endif;
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
                        
                            if( $post_count == 1 ) {
                                $vmagazine_font_size = 'large-font';
                                $img_src = vmagazine_home_element_img('vmagazine-rectangle-thumb');
                                echo '<div class="top-post-wrapper wow fadeInDown" data-wow-duration="0.7s">';
                            } elseif( $post_count == 2 ) {
                                $vmagazine_font_size = 'small-font';
                                $img_src = vmagazine_home_element_img('vmagazine-small-thumb');
                                $vmagazine_animate_class = 'fadeInUp';
                                echo '<div class="btm-posts-wrapper wow fadeInUp" data-wow-duration="0.7s">';
                                echo '<div class="first-col-wrapper">';
                            }elseif( $post_count == 5 ){
                                echo '<div class="second-col-wrapper">';
                                $img_src = vmagazine_home_element_img('vmagazine-small-thumb');
                            } else {
                                $vmagazine_font_size = 'small-font';
                                $img_src = vmagazine_home_element_img('vmagazine-small-thumb');
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
                               
                                <?php vmagazine_ea_icon_meta($settings); ?>
                                <h3 class="<?php echo esc_attr( $vmagazine_font_size ); ?>">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <?php if( $post_count == 1 ){
                                    ?>
                                    <p> 
                                    <?php echo vmagazine_ea_get_excerpt_content($content_excerpts)?> 
                                    </p>
                                <?php } ?>

                            </div><!-- .post-caption-wrapper -->
                           
                        </div><!-- .single-post -->
                    <?php
                        if( $post_count == 1 ) {
                            echo '</div>';
                        }
                        if( $post_count == 4 ){
                                echo '</div>';/** first-col-wrapper **/
                        }
                        elseif( $post_count == $total_posts_count ){
                             echo '</div>';/** second-col-wrapper **/
                            echo '</div>';
                        }
                    }
                }
                wp_reset_postdata();
                if( $post_view_btn ){
                    vmagazine_block_view_all( $post_cat, $post_view_btn );    
                }
                
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Multiple_Category_Tabbed() );