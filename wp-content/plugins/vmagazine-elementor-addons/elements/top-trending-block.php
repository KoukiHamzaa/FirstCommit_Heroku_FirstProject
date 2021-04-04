<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Top_Trending_Block extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-top-trending-block';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Top Trending', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-ttb';
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
                    '{{WRAPPER}} .vmea-top-trending-block .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-top-trending-block .block-title',
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
                    '{{WRAPPER}} .vmagazine-top-trending-block .first-block-wrap .inner-wrap h3.extra-large-font a , .vmagazine-top-trending-block .last-block-wrap .inner-wrap h3.extra-large-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-top-trending-block .first-block-wrap .inner-wrap h3.extra-large-font a:hover , .vmagazine-top-trending-block .last-block-wrap .inner-wrap h3.extra-large-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-top-trending-block .first-block-wrap .inner-wrap h3.extra-large-font a , .vmagazine-top-trending-block .last-block-wrap .inner-wrap h3.extra-large-font a',
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
                    '{{WRAPPER}} .vmagazine-top-trending-block .first-block-wrap .inner-wrap .post-content-wrapper .post-meta, .vmagazine-top-trending-block .last-block-wrap .inner-wrap .post-content-wrapper .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmagazine-top-trending-block .first-block-wrap .inner-wrap .post-content-wrapper .post-meta, .vmagazine-top-trending-block .last-block-wrap .inner-wrap .post-content-wrapper .post-meta span::after' => 'background: {{VALUE}}'
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

        $this->add_render_attribute( 'vmea-top-trending-block', 'class', 'vmea-top-trending-block' );

        $element_title          = $settings['element_title'];
        $post_cat_show          = $settings['post_cat_show'];
        $postsPerPage           = 5;//empty($settings['showposts']) ? 5 : $settings['showposts'];


        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-top-trending-block' ); ?>>
   <?php if($element_title): ?>
        <div class="block-header clearfix">
           <?php vmagazine_ea_widget_title( $element_title ); ?>
        </div><!-- .block-header-->
    <?php endif; ?>
        
    <div class="vmagazine-top-trending-block block-post-wrapper wow fadeInUp" data-wow-duration="0.7s">
        
            <?php 
                $block_args = vmagazine_ea_query($settings,$first_id='',$postsPerPage);
                $block_query = new \WP_Query( $block_args );
                if( $block_query->have_posts() ) {
                    $block_post_counter = 0;
                    while( $block_query->have_posts() ) {
                        $block_post_counter++;
                        $block_query->the_post();
                        $image_id = get_post_thumbnail_id();
                        $img_scrs = vmagazine_home_element_img('vmagazine-large-square-thumb');
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
            ?>
                        
                            <?php if( $block_post_counter < 3 ){ ?>
                                <?php if( $block_post_counter == 1 ){ ?>
                                <div class="first-block-wrap">
                                <?php } ?>
                                    <div class="inner-wrap">
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_load_images($img_scrs); ?>
                                        </a>    
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
                                        <?php vmagazine_ea_icon_meta($settings); ?>
                                     </div><!-- .post-content-wrapper -->
                                    </div>
                                    <?php if( $block_post_counter == 2 ){ ?> 
                                    </div><!-- .first-block-wrap -->
                                    <?php } ?>
                            <?php }elseif( $block_post_counter == 3 ){ ?>
                                    <div class="middle-block-wrap">
                                        <div class="inner-wrap">
                                        <div class="post-thumb">
                                        
                                       <?php $img_scr = vmagazine_home_element_img('vmagazine-large-square-middle'); ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_load_images($img_scr); ?>
                                        </a>
                                       <div class="image-overlay"></div>
                                        
                                        </div>
                                        <div class="post-content-wrapper clearfix">
                                            <?php if( 'yes' == $post_cat_show ){ ?>
                                                <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                            <?php } ?>
                                            
                                            <h3 class="extra-large-font">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <?php vmagazine_ea_icon_meta($settings); ?>
                                        </div><!-- .post-content-wrapper -->
                                     </div>
                                    </div>
                            <?php }else{ ?>
                                    <?php if( $block_post_counter == 4 ){ ?>
                                    <div class="last-block-wrap">
                                    <?php } ?>
                                        <div class="inner-wrap">
                                        <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo vmagazine_load_images($img_scrs); ?>
                                        </a>
                                       <div class="image-overlay"></div>
                                        </div>
                                        <div class="post-content-wrapper clearfix">
                                            <?php if( 'yes' == $post_cat_show ){ ?>
                                                <?php do_action( 'vmagazine_post_cat_or_tag_lists' ); ?>
                                            <?php } ?>
                                            
                                            <h3 class="extra-large-font">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <?php vmagazine_ea_icon_meta($settings); ?>
                                        </div><!-- .post-content-wrapper -->
                                        </div>
                                        <?php if( $block_post_counter == 5 ){ ?>
                                        </div><!-- .last-block-wrap -->
                                        <?php } ?>
                            <?php } ?>
                               
                                
                        <?php
                    }
                }
                wp_reset_postdata();
            ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Top_Trending_Block() );