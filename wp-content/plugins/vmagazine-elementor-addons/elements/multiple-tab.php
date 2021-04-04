<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Multiple_Tab extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-multiple-tab';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: Multiple Tabs', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-mutb';
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

        $this->start_controls_section(
            'vmea_element_header',
            [
                'label' => esc_html__( 'Header', 'vmagazine-ea' )
            ]
        );

        $this->add_control(
            'element_title',
            [
                'label'             => esc_html__( 'Element Title', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
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


        $this->add_control(
            'vmea_multiple_tabs_data',
            [
                'type'      => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [ 'vmea_multiple_tab' => 'Tab Title' ],
                   
                ],
                'fields' => [
                    [
                        'name'          => 'vmea_multiple_tab',
                        'label'         => esc_html__( 'Tab Title', 'vmagazine-ea' ),
                        'default'       => esc_html__( 'Tab Title', 'vmagazine-ea' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => false,
                    ],
                    [
                        'name'              => 'post_type',
                        'label'             => esc_html__( 'Post Type', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT,
                        'options'           => vmagazine_ea_get_post_types(),
                        'default'           => 'post',
                    ],
                    [
                        'name'              => 'categories',
                        'label'             => esc_html__( 'Categories', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_post_categories(),
                        
                    ],
                    [

                        'name'              => 'product_categories',
                        'label'             => esc_html__( 'Categories', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_product_categories(),
                        'condition'         => [
                            'post_type' => 'product'
                        ]

                    ],

                    [   'name'              => 'authors',
                        'label'             => esc_html__( 'Authors', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_auhtors(),

                    ],

                    [
                        'name'              => 'tags' ,
                        'label'             => esc_html__( 'Tags', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_tags(),
                        'condition'         => [
                            'post_type' => 'post'
                        ] 
                    ],

                    [
                        'name'              => 'exclude_posts',
                        'label'             => esc_html__( 'Exclude Posts', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_posts(),
                    ],

                    [
                        'name'              => 'exclude_products',
                        'label'             => esc_html__( 'Exclude Products', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT2,
                        'label_block'       => true,
                        'multiple'          => true,
                        'options'           => vmagazine_ea_get_products(),
                        'condition'         => [
                            'post_type' => 'product'
                        ]   
                    ],

                    [
                        'name'              => 'order',
                        'label'             => esc_html__( 'Order', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT,
                        'options'           => [
                           'DESC'           => esc_html__( 'Descending', 'vmagazine-ea' ),
                           'ASC'            => esc_html__( 'Ascending', 'vmagazine-ea' ),
                        ],
                        'default'           => 'DESC',
                    ],

                    [
                        'name'              => 'orderby',
                        'label'             => esc_html__( 'Order By', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::SELECT,
                        'options'           => vmagazine_ea_get_post_orderby_options(),
                        'default'           => 'date',
                    ],

                    [
                        'name'              => 'offset',
                        'label'             => esc_html__( 'Offset', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::NUMBER,
                        'default'           => '',
                    ],

                    [
                        'name'              => 'showposts',
                        'label'             => esc_html__( 'Posts To Show', 'vmagazine-ea' ),
                        'type'              => Controls_Manager::NUMBER,
                        'default'           => 1,
                    ],

                  
                ],
                'title_field' => '{{vmea_multiple_tab}}',
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
                    '{{WRAPPER}} .vmea-multiple-tab .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-multiple-tab .block-title',
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
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post .post-caption h3.small-font a' => 'color: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'post_title_color_hover',
            [
                'label'     => esc_html__( 'Post Title Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post .post-caption h3.small-font a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'post_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post .post-caption h3.small-font a',
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
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post .post-meta' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post .post-meta span::after' => 'background: {{VALUE}}'
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
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .widget_vmagazine_categories_tabbed .vmagazine-tabbed-wrapper .single-post' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',                   
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

        $this->add_render_attribute( 'vmea-multiple-tab', 'class', 'vmea-multiple-tab widget_vmagazine_categories_tabbed ' );

        $element_title          = $settings['element_title'];
        /*$post_cat_show          =  $settings['post_cat_show'];*/


        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-multiple-tab' ); ?>>
   <?php if($element_title): ?>
        <div class="block-header clearfix">
           <?php vmagazine_ea_widget_title( $element_title ); ?>
        </div><!-- .block-header-->
    <?php endif; ?>

    <div class="vmagazine-cat-tab vmagazine-tabbed-wrapper">
        <ul class="vmagazine-cat-tabs clearfix" id="vmagazine-widget-tabbed">
            <?php foreach( $settings['vmea_multiple_tabs_data'] as $item ){ ?>
                <li class="cat-tab first-tabs">
                     <a href="javascript:void(0)" id="<?php echo esc_attr($item['_id']); ?>">
                         <?php echo $item['vmea_multiple_tab']; ?>
                     </a>
                </li>
            <?php } ?>
        </ul>
        
        <?php foreach( $settings['vmea_multiple_tabs_data'] as $item ){ ?>

            <div id="section-<?php echo esc_attr($item['_id']);?>" class="vmagazine-tabbed-section" style="display: none;">
                <?php
                 /**
                 * Advanced query arguments
                 *
                 */   
                $post_type      = $item['post_type'];
                $category       = '';
                $tags           = '';
                $exclude_posts  = '';

                if( 'post' == $post_type ){

                    $category       = $item['categories'];
                    $tags           = $item['tags'];
                    $exclude_posts  = $item['exclude_posts'];

                }elseif( 'product' == $post_type ){

                  $category         = $item['product_categories'];  
                  $exclude_posts    = $item['exclude_products'];

                }

                //Categories
                $post_cat = '';
                $post_cats = $category;
                if ( ! empty( $category) ){
                    asort($category);    
                }
                
                if ( !empty( $post_cats) ) {
                    $post_cat = implode( ",", $post_cats );
                }

                
                if( !empty($first_id)){
                    $post_cat = $category[0];
                }


                // Post Authors
                $post_author = '';
                $post_authors = $item['authors'];
                if ( !empty( $post_authors) ) {
                    $post_author = implode( ",", $post_authors );
                }

                $args = array(
                            'post_status'           => array( 'publish' ),
                            'post_type'             => $post_type,
                            'post__in'              => '',
                            'cat'                   => $post_cat,
                            'author'                => $post_author,
                            'tag__in'               => $tags,
                            'orderby'               => $item['orderby'],
                            'order'                 => $item['order'],
                            'post__not_in'          => $exclude_posts,
                            'offset'                => $item['offset'],
                            'ignore_sticky_posts'   => 1,
                            'posts_per_page'        => $item['showposts']
                        );

                if( 'product' == $post_type ){

                    $args = array(
                                'post_type'             => 'product',
                                'post__in'              => '',
                                'orderby'               => $item['orderby'],
                                'order'                 => $item['order'],
                                'author'                => $post_author,
                                'posts_per_page'        => $item['showposts'],
                                'post__not_in'          => $exclude_posts,
                                'offset'                => $item['offset'],
                               
                            );

                    if( $post_cat ){
                         $args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $post_cat
                                    )
                                );
                    }
                }


                $first_tab_query = new \WP_Query( $args );
                if( $first_tab_query->have_posts() ) {
                    while( $first_tab_query->have_posts() ) {
                        $first_tab_query->the_post();
                        
                        $image_id   = vmagazine_ea_home_element_img_id();
                        $img_src    = '';
                        if( $image_id ){
                            $img_src    = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                        }

                        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                        ?>
                        <div class="single-post clearfix">
                            <div class="post-thumb">
                               <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                   <?php echo vmagazine_load_images($img_src); ?>
                                    <div class="image-overlay"></div>
                                </a>
                            </div>
                            <div class="post-caption clearfix">
                               
                                <div class="post-meta">
                                <?php $posted_on = get_the_date();
                                echo '<span class="posted-on"><i class="fa fa-clock-o"></i>'. $posted_on .'</span>';?>
                                </div>
                               
                                <h3 class="small-font">
                                    <a href="<?php the_permalink(); ?>">
                                         <?php the_title(); ?>
                                    </a>
                                </h3>
                               
                            </div><!-- .post-caption -->
                        </div><!-- .single-post -->
                        <?php
                    }
                }
                /*if( $view_all ){
                    vmagazine_block_view_all($vmagazine_first_tab_cat_id,$view_all);    
                }*/
                
                wp_reset_postdata();
                ?>
            </div>

        <?php } ?>

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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Multiple_Tab() );