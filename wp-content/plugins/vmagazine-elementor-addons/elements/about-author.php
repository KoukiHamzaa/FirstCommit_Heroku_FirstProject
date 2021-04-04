<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_About_Author extends Widget_Base {

    use \Elementor\VmagazineEaCommonFunctions;

    public function get_name() {
        return 'vmea-about-author';
    }

    public function get_title() {
        return esc_html__( 'VMagazine: About Author', 'vmagazine-ea' );
    }

    public function get_icon() {
        return 'vmea-icons vmea-author';
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
            'author_title',
            [
                'label'             => esc_html__( 'Author Title', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'author_img',
            [
                'label'             => esc_html__( 'Author Image', 'vmagazine-ea' ),
                'type'              => Controls_Manager::MEDIA,
            ]
        );

         $this->add_control(
            'author_desc',
            [
                'label'             => esc_html__( 'Author Description', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'element_social_divider',
            [
                'type'      => Controls_Manager::DIVIDER,
                'style'     => 'thick',
                
            ]
        );

        $this->add_control(
            'author_fb_url',
            [
                'label'             => esc_html__( 'Facebook URL', 'vmagazine-ea' ),
                'type'              => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'author_twitter_url',
            [
                'label'             => esc_html__( 'Twitter URL', 'vmagazine-ea' ),
                'type'              => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'author_pinterest_url',
            [
                'label'             => esc_html__( 'Pinterest URL', 'vmagazine-ea' ),
                'type'              => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'author_insta_url',
            [
                'label'             => esc_html__( 'Instagram URL', 'vmagazine-ea' ),
                'type'              => Controls_Manager::URL,
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
                    '{{WRAPPER}} .vmea-about-author .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-about-author .block-title',
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
                'label'     => esc_html__( 'Author Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-about-author .info_wrap .author-title' => 'color: {{VALUE}};',
                    '{{ WRAPPER}} .vmagazine-about-author .info_wrap span:before, .vmagazine-about-author .info_wrap span:after' => 'background: {{VALUE}}',
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


       

        //description color
        $this->add_control(
            'author_desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-about-author .author-desc' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'author_social_icons_color',
            [
                'label'     => esc_html__( 'Social Icons Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-about-author .author-profiles a' => 'color: {{VALUE}};'
                ],
                'separator'  => 'before',
            ]
        );

        $this->add_control(
            'author_social_icons_color_hover',
            [
                'label'     => esc_html__( 'Social Icons Color: Hover', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-about-author .author-profiles a:hover' => 'color: {{VALUE}};'
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

        $this->add_render_attribute( 'vmea-about-author', 'class', 'vmea-about-author' );

        $element_title          = $settings['element_title'];
        $author_title           = $settings['author_title'];
        $author_img             = $settings['author_img'];
        $author_desc            = $settings['author_desc'];
        
        $author_fb_url          = $settings['author_fb_url'];
        $author_twitter_url     = $settings['author_twitter_url'];
        $author_pinterest_url   = $settings['author_pinterest_url'];
        $author_insta_url       = $settings['author_insta_url'];





        $fb_target          = isset($author_fb_url['is_external']) ? 'target="_blank"' : 'target="_self"';
        $tw_target          = isset($author_twitter_url['is_external']) ? 'target="_blank"' : 'target="_self"';
        $pinterest_target   = isset($author_pinterest_url['is_external']) ? 'target="_blank"' : 'target="_self"';
        $insta_target       = isset($author_insta_url['is_external']) ? 'target="_blank"' : 'target="_self"';
        
        $fb_nofollow        =  isset($author_fb_url['nofollow']) ? 'rel="nofollow"' : '';
        $tw_nofollow        =  isset($author_twitter_url['nofollow']) ? 'rel="nofollow"' : '';
        $pinterest_nofollow =  isset($author_pinterest_url['nofollow']) ? 'rel="nofollow"' : '';
        $insta_nofollow     =  isset($author_insta_url['nofollow']) ? 'rel="nofollow"' : '';
        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-about-author' ); ?>>
      
    <div class="vmagazine-about-author">
        <?php if($element_title){ ?>
            <?php vmagazine_ea_widget_title( $element_title ); ?>
        <?php } ?>
        <div class="info_wrap">
            <div class="author-title">
                <span>
                    <?php echo esc_html($author_title); ?>
                </span>
            </div>
            <div class="author-img">
                
                <?php echo vmagazine_load_images($author_img['url']); ?>   
            </div>
            <div class="author-desc">
                <?php echo esc_html($author_desc); ?>
            </div>
            <div class="author-profiles">
                <?php if($author_fb_url['url']){ ?>
                <a href="<?php echo esc_url($author_fb_url['url']); ?>" class="fb-link" <?php echo $fb_target .' '.$fb_nofollow; ?>>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if($author_twitter_url['url']){ ?>
                <a href="<?php echo esc_url($author_twitter_url['url']);?>" class="twitter-url" <?php echo $tw_target .' '.$tw_nofollow; ?>>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <?php } ?>
                <?php if($author_pinterest_url['url']){ ?>
                <a href="<?php echo esc_url($author_pinterest_url['url']); ?>" class="pinterest-link" <?php echo $pinterest_target .' '.$pinterest_nofollow; ?>>
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
                <?php } ?>

                <?php if($author_insta_url['url']){ ?>
                <a href="<?php echo esc_url($author_insta_url['url']);?>" class="insta-url" <?php echo $insta_target .' '.$insta_nofollow; ?>>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <?php } ?>

            </div>
          
        </div>
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_About_Author() );