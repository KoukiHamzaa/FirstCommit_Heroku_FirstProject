<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Grid_List extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-grid-list';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Grid/List Posts', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-grl';
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
                'default'   => 'list',
                'options'   => [
                    'list'  => esc_html__( 'Layout One', 'vmagazine-ea' ),
                    'grid-two'  => esc_html__( 'Layout Two', 'vmagazine-ea' ),
                ],
            ]
        );


       

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-small-thumb',
                
            ]
        );

       $this->add_control(
            'element_layout_two_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                 'condition'         => [
                    'element_layout'     => 'grid-two',
                ],
                
            ]
        );
       $this->add_control(
            'first_post_content_excerpts',
            [
                'label'             => esc_html__( 'First Post Content Length', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'description'       => esc_html__('Enter Length for first post contents in letters or leave balnk to hide content','vmagazine-ea'),
                'condition'         => [
                    'element_layout'     => 'grid-two',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size_large',
                'label'             => esc_html__( 'First Post Image Size', 'vmagazine-ea' ),
                'default'           => 'vmagazine-rectangle-thumb',
                'condition'         => [
                    'element_layout'     => 'grid-two',
                ],
                
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
            'element_btn_layout',
            [
                'label'     => esc_html__( 'Buton Type', 'vmagazine-ea' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'view_all',
                'options'   => [
                    'view_all'  => esc_html__( 'View All', 'vmagazine-ea' ),
                    'ajax_loader'  => esc_html__( 'AJAX Loader', 'vmagazine-ea' ),
                ],
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
                    '{{WRAPPER}} .vmea-grid-list .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-grid-list .block-title',
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
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a,.vmagazine-grid-list.grid-two .single-post h3.large-font a' => 'color: {{VALUE}};'
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a:hover,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a:hover,.vmagazine-grid-list.grid-two .single-post h3.large-font a:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post h3.large-font a,.block-post-wrapper.list .single-post .post-content-wrapper .large-font a,.vmagazine-grid-list.grid-two .single-post h3.large-font a '
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
                    '{{WRAPPER}} .vmea-grid-list .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .vmea-grid-list .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post.first-post .post-content p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .vmagazine-grid-list.grid-two .single-post:not(:first-child)' => 'padding-top: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-grid-list', 'class', 'vmea-grid-list' );

        $title_length           = $settings['title_excerpts'];
        $content_excerpts       = $settings['content_excerpts'];
        $element_title          = $settings['element_title'];
        $post_view_btn          = $settings['post_view_btn'];
        $element_layout         = $settings['element_layout'];

        $post_count             = $settings['showposts'];
        $post_meta              = $settings['post_meta']; 
        $element_btn_layout     = $settings['element_btn_layout'];
        $post_cat_show          = $settings['post_cat_show'];
        $first_post_content     = $settings['first_post_content_excerpts'];

        

        //Categories
        $post_cat = '';
        $post_cats = $settings['categories'];
        if ( !empty( $post_cats) ) {
            $post_cat = implode( ",", $post_cats );
        }
        
        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-grid-list' ); ?>>
        
    <div class="vmagazine-grid-list-wrapp <?php echo esc_attr($element_layout);?>">
    <?php if($element_title): ?>
    <div class="block-header clearfix">
       <?php vmagazine_ea_widget_title( $element_title ); ?>
    </div><!-- .block-header-->
    <?php endif; ?>
        <div class="vmagazine-grid-list block-post-wrapper <?php echo esc_attr($element_layout);?>">
            
            <div class="posts-wrap">
                <?php 
                $block_args = vmagazine_ea_query($settings,$first_id='',$post_count);
                
                $block_query = new \WP_Query( $block_args );
                $post_count = 0;
                if( $block_query->have_posts() ) {
                    while( $block_query->have_posts() ) {
                        $post_count++;
                         $post_class = '';
                        if( $post_count == 1 ){
                            $post_class = 'first-post';
                        }
                        $block_query->the_post();
                        $image_id   = vmagazine_ea_home_element_img_id();

                        if( ( $element_layout == 'grid-two' ) ){
                            if( $post_count == 1 ){
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size_large', $settings );    
                            }else{
                                $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );    
                            }
                        }else{
                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );    
                        }
                         
                        
                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                        ?>
                        <div class="single-post <?php echo esc_attr($post_class);?> clearfix">
                            <div class="post-thumb">
                                <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php echo vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                </a>
                                <?php 
                                if( $post_cat_show == 'yes' ){
                                    do_action( 'vmagazine_post_cat_or_tag_lists' );
                                 } ?>
                            </div><!-- .post-thumb -->
                            <div class="post-content-wrapper clearfix">
                                <?php vmagazine_ea_icon_meta($settings); ?>                             
                                <h3 class="large-font">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <?php if( $element_layout == 'grid-two' && $first_post_content && $post_count == 1 ){ ?>
                                    <div class="post-content">
                                       <p> 
                                        <?php echo vmagazine_ea_get_excerpt_content($first_post_content); ?> 
                                        </p>
                                    </div>
                                <?php }elseif( $content_excerpts &&  $post_count > 1 ){ ?>
                                    <div class="post-content">
                                        <p> 
                                        <?php echo vmagazine_ea_get_excerpt_content($content_excerpts); ?> 
                                        </p>
                                    </div><!-- .post-content --> 
                                <?php }elseif( $element_layout != 'grid-two' && $content_excerpts ){ ?>
                                    <div class="post-content">
                                        <p> 
                                        <?php echo vmagazine_ea_get_excerpt_content($content_excerpts); ?> 
                                        </p>
                                    </div><!-- .post-content --> 
                                <?php } ?>

                                
                            </div><!-- .post-content-wrapper -->
                        </div><!-- .single-post  -->
                        <?php
                    }
                }
                wp_reset_postdata();
               ?>
            </div>
            <?php 
            if($element_btn_layout == 'view_all' && $post_view_btn){
                vmagazine_block_view_all( $post_cat, $post_view_btn );
            }
            elseif($element_btn_layout == 'ajax_loader'){
            if( !empty($post_cat) ){
                $id = $post_cat;
            }else{
                $id = '';
            }?>
            <div class="gl-posts" data-cat-show="<?php echo esc_attr($post_cat_show);?>" data-url="<?php echo esc_url($img_src);?>" data-meta="<?php echo esc_attr($post_meta);?>" data-cat="<?php echo esc_attr($id);?>" data-offset="<?php echo esc_attr($post_count);?>" data-type="<?php echo esc_attr($element_layout);?>" data-id="<?php echo absint($post_count);?>" data-length="<?php echo absint($content_excerpts)?>">
                <?php if($post_view_btn): ?>
                    <a href="javascript:void(0)" class="vm-ajax-load-more">
                    <span><?php echo esc_html($post_view_btn);?></span>
                    <i class="fa fa-refresh"></i>
                    </a>
                <?php endif; ?>
            </div>
          
        <?php } ?>
                
            
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Grid_List() );