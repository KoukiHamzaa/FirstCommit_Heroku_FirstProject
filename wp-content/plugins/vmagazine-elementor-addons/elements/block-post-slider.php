<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Block_Post_Slider extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-block-post-slider';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Block Post Slider', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-bps';
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
                    '{{WRAPPER}} .vmea-block-post-slider .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-block-post-slider .block-title',
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
                    '{{WRAPPER}} .vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .slider-item-wrapper .slider-bigthumb .post-captions h3.large-font a,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb .post-captions h3.large-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .slider-item-wrapper .slider-bigthumb .post-captions h3.large-font a:hover,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb .post-captions h3.large-font a:hover,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb:hover .post-captions h3.large-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .slider-item-wrapper .slider-bigthumb .post-captions h3.large-font a,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb .post-captions h3.large-font a',
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
                    '{{WRAPPER}} .vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .slider-item-wrapper .slider-bigthumb .post-captions .post-meta,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb .post-captions .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .slider-item-wrapper .slider-bigthumb .post-captions .post-meta span::after,.vmagazine-block-post-slider .block-content-wrapper .block-post-slider-wrapper .small-thumbs-wrapper .small-thumbs-inner .slider-smallthumb .post-captions .post-meta span::after' => 'background: {{VALUE}}'
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

        $this->add_render_attribute( 'vmea-block-post-slider', 'class', 'vmea-block-post-slider' );

        

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

        <div <?php echo $this->get_render_attribute_string( 'vmea-block-post-slider' ); ?>>
        
            <div class="vmagazine-block-post-slider block-post-wrapper clearfix">
            <div class="block-header clearfix">
                <?php
                     vmagazine_ea_widget_title( $element_title );
                    echo '<div class="multiple-child-cat-tabs-post-slider"><ul class="vmagazine-tabbed-post-slider">';
                    if( !empty( $post_cats) ):
                    foreach ( $all_categories as $key ) {
                        $term = get_term_by( 'id', $key, 'category' );
                        if(!empty( $term )){
                            echo '<li><a href="javascript:void(0)" data-meta="'.esc_attr($post_meta).'" data-id="' . intval( $key ) . '" data-slug="' . intval( $key ) . '" data-link="'.get_term_link($term->slug, 'category').'" data-offset="'.absint($post_count).'">' . $term->name . '</a></li>';

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
                <div class="block-cat-content <?php echo esc_attr( $first_cat ); ?>" data-slug="<?php echo esc_attr( $first_cat ); ?>">

                <?php
               
                $block_args = vmagazine_ea_query($settings,$first_id,$post_count);
                $block_query = new \WP_Query( $block_args );
                $post_count = 0;
                $post_counter = 0;
                $total_posts_count = $block_query->post_count;
                if( $block_query->have_posts() ) { ?>
                   <div class="block-post-slider-wrapper"> 
                    <?php 
                    while( $block_query->have_posts() ) {
                        $block_query->the_post();
                        $post_count++;
                        $post_counter++;
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 
                        
                        $alt_val = '';
                        if( $image_alt ){
                            $alt_val = 'alt="'.esc_attr($image_alt).'"';
                        }

                        $big_image_path = vmagazine_home_element_img('vmagazine-post-slider-lg');
                        $sm_image_path = vmagazine_home_element_img('vmagazine-slider-thumb');
                        
                            if( $post_count == 1 ) { ?>
                            <div class="slider-item-wrapper">
                                    <div class="slider-bigthumb">
                                            <div class="slider-img">
                                                <img src="<?php echo esc_url($big_image_path) ?>" <?php echo ($alt_val); ?>>
                                            </div>
                                            <div class="post-captions">
                                                <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                                <?php vmagazine_ea_icon_meta($settings); ?> 
                                                <h3 class="large-font">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                    </div>
                                <?php 
                            }elseif( $post_count <= 5 ){ 

                                if( $post_count == 2 ){ ?>
                                    <div class="small-thumbs-wrapper">
                                       <div class="small-thumbs-inner"> 
                                 <?php } ?>

                               <div class="slider-smallthumb">
                                    <div class="slider-img">
                                        <img src="<?php echo esc_url($sm_image_path) ?>" <?php echo ($alt_val); ?>>
                                    </div>
                                    <div class="post-captions">
                                        <?php vmagazine_ea_icon_meta($settings); ?> 
                                        <h3 class="large-font">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                               </div>
                            <?php if( ($post_count == 5) || ($total_posts_count == $post_counter) ){ ?>
                                   </div><!-- .small-thumbs-inner -->
                                    </div><!-- .small-thumbs-wrapper -->  
                            <?php } ?>
                          <?php  }
                          if( ($post_count == 5) || ($total_posts_count == $post_counter) ){ ?>
                            </div>
                        <?php 
                          }
                          if( $post_count == 5 ){
                            $post_count = 0;
                          }  
                }
                 echo '</div>';
            }
                wp_reset_query();
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Block_Post_Slider() );