<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Recent_Posts extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-recent-posts';
	}

	public function get_title() {
		return esc_html__( 'VMagazine Recent Posts', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-rp';
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
            'post_cat_show',
            [
                'label'             => __( 'Category', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => __( 'Show', 'vmagazine-ea' ),
                'label_off'         => __( 'Hide', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );

         $this->add_control(
            'post_date',
            [
                'label'             => __( 'Date', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => __( 'Show', 'vmagazine-ea' ),
                'label_off'         => __( 'Hide', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-cat-post-sm',
            ]
        );
        


        $this->end_controls_section();


		/**
		 * Query And Layout Controls!
		 * @source includes/elementor-helper.php
		 */
		$this->query_controls();

		/**
         * Content Tab: Post Excerpts
         */
        $this->start_controls_section(
            'section_post_excerpts',
            [
                'label'             => __( 'Post Excerpts', 'vmagazine-ea' ),
            ]
        );
        
        $this->add_control(
            'title_excerpts',
            [
                'label'             => __( 'Title Length', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '',
                'description'		=> esc_html__('Enter Length for title in letters or leave balnk to display full','vmagazine-ea')
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
                    '{{WRAPPER}} .vmea-rec-posts .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-rec-posts .block-title',
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
                    '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content .recent-post-content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content .recent-post-content a',
            ]
        );

        $this->add_control(
            'post_title_style_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );


        //post category
        $this->add_control(
            'post_cat_color',
            [
                'label'     => esc_html__( 'Category Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content .recent-post-content span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        //date color
        $this->add_control(
            'post_date_color',
            [
                'label'     => esc_html__( 'Date Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content .recent-post-content span.posted-on' => 'color: {{VALUE}};',
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

        //post seperator color
        $this->add_control(
            'post_seperator_color',
            [
                'label'     => esc_html__( 'Post Seperator Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmea-rec-posts .vmagazine-rec-posts.recent-post-widget .recent-posts-content' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',                   
                ],
                'description'       => esc_html__('Leave blank for default value','vmagazine-ea')
            ]
        );


        $this->add_responsive_control(
            'post_content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'vmagazine-ea' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-rec-posts.recent-post-widget .recent-posts-content .recent-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();//end for styling tab



	}

	/**
	 * Render tiled posts widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render( ) {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'tiled-posts', 'class', 'vmea-rec-posts clearfix' );

        $title_length   = $settings['title_excerpts'];
        $element_title  = $settings['element_title'];
        $post_cat_show  = $settings['post_cat_show'];
        $post_date      = $settings['post_date'];
        $post_count     = $settings['showposts'];

    
        ?>

        <div <?php echo $this->get_render_attribute_string( 'tiled-posts' ); ?>>
            <?php vmagazine_ea_widget_title( $element_title ); ?>
			<?php 
			
                $args = vmagazine_ea_query($settings,$first_id='',$post_count);
                $rec_posts = new \WP_Query( $args );

                if ( $rec_posts->have_posts() ) : ?>
                <div class="vmagazine-rec-posts recent-post-widget block_layout_1">
                	<?php 
                 while ($rec_posts->have_posts()) : $rec_posts->the_post();

                	  
                	
                        $image_id   = vmagazine_ea_home_element_img_id();
                        $img_src    = '';
                        if( $image_id ){
                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                        }
                    
                            
                    if( $img_src || get_the_title() ){
                        ?>
                            <div class="recent-posts-content wow fadeInUp">
                                <div class="image-recent-post post-thumb">
                                  <a href="<?php the_permalink(); ?>" class="thumb-zoom">
                                    <?php echo vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                  </a>
                                </div>
                                <div class="recent-post-content">
                                    <?php if($post_cat_show == 'yes' ){
                                        do_action('vmagazine_single_cat'); 
                                     } ?>
                                    <a href="<?php the_permalink()?>">
                                        <?php echo vmagazine_ea_title_excerpt($title_length); ?>
                                    </a>
                                    <?php
                                    if($post_date == 'yes' ){ ?>
                                    <div class="posted-date">
                                    <?php 
                                    $posted_on = get_the_date();
                                    echo '<span class="posted-on"><i class="fa fa-clock-o"></i>'. $posted_on .'</span>';
                                    ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php
                    }

                endwhile;
                wp_reset_postdata();
                echo '</div>';
            endif;
            ?>
        </div>
    <?php 
    }

    /**
	 * Render tiled posts widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function content_template() { }

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Recent_Posts() );