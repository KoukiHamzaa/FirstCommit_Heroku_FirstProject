<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Timeline_Posts extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-timeline-posts';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Timeline Posts', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-tp';
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
            'element_view_all_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );


        $this->add_control(
            'post_view_btn',
            [
                'label'             => esc_html__( 'Button Text', 'vmagazine-ea' ),
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
                    '{{WRAPPER}} .vmea-timeline-posts .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-timeline-posts .block-title',
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
                    '{{WRAPPER}} .vmagazine-timeline-post .timeline-post-wrapper .single-post .post-caption .captions-wrapper h3.small-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-timeline-post .timeline-post-wrapper .single-post .post-caption .captions-wrapper h3.small-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-timeline-post .timeline-post-wrapper .single-post .post-caption .captions-wrapper h3.small-font a',
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
                    '{{WRAPPER}} .vmea-timeline-posts .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmea-timeline-posts .post-meta span::after' => 'background: {{VALUE}}'
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
                'label'     => esc_html__( 'Post Border Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmea-timeline-posts  .vmagazine-timeline-post .timeline-post-wrapper .single-post .post-caption .captions-wrapper' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .vmea-timeline-posts .vmagazine-timeline-post .timeline-post-wrapper .single-post .post-caption .captions-wrapper:before' => 'border-color: transparent {{VALUE}} transparent transparent;',
                    '{{WRAPPER}} .vmagazine-timeline-post .timeline-post-wrapper .single-post:before' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmea-timeline-posts .vmagazine-timeline-post .timeline-post-wrapper .single-post' => 'padding-bottom: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-timeline-posts', 'class', 'vmea-timeline-posts' );

        
        $element_title          = $settings['element_title'];
        $post_view_btn          = $settings['post_view_btn'];

        $post_count             = $settings['showposts'];
        $post_meta              = $settings['post_meta']; 
        $post_comment           = $settings['post_comment'];
        $post_view              = $settings['post_view'];
        $post_count             = $settings['showposts'];

        

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }
        
        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-timeline-posts' ); ?>>
        
    <div class="vmagazine-timeline-post block-post-wrapper">
        <?php vmagazine_ea_widget_title( $element_title ); ?>
        <?php 
        $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                
        $block_query = new \WP_Query( $block_args );
        if( $block_query->have_posts() ) { ?>
            <div class="timeline-post-wrapper">
                <?php 
                while( $block_query->have_posts() ):
                    $block_query->the_post();
                    ?>
                    <div class="single-post">
                        <div class="post-date">
                            <?php do_action( 'vmagazine_formated_date' ); ?>
                        </div><!-- .post-thumb -->
                        <div class="post-caption clearfix">
                            <div class="captions-wrapper">
                                <h3 class="small-font">
                                    <a href="<?php the_permalink(); ?>">
                                       <?php the_title(); ?>
                                    </a>
                                </h3>
                                <?php if( 'yes' == $post_meta ){ ?>
                                    <div class="post-meta">
                                        <?php
                                        if( 'yes' == $post_comment ){
                                            vmagazine_post_comments();
                                        }

                                        if( function_exists('vmagazine_post_views') && 'yes' == $post_view ){
                                            vmagazine_post_views();    
                                        } ?>   
                                    </div><!-- .post-meta -->
                                <?php } ?>
                            </div>
                        </div><!-- .post-caption -->
                    </div><!-- .single-post -->
                <?php
                endwhile; 
                if( $post_view_btn ){
                    vmagazine_block_view_all( $post_cat, $post_view_btn );    
                }
                 ?>
            </div>
        <?php 
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Timeline_Posts() );