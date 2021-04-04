<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_FB_Like extends Widget_Base {

    use \Elementor\VmagazineEaCommonFunctions;

    public function get_name() {
        return 'vmea-fb-like';
    }

    public function get_title() {
        return esc_html__( 'VMagazine: Facebook Like', 'vmagazine-ea' );
    }

    public function get_icon() {
        return 'vmea-icons vmea-fblike';
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
            'page_url',
            [
                'label'             => esc_html__( 'Facebook Page URL', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
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
            'page_header',
            [
                'label'             => esc_html__( 'Use Small Header', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'true',
                'default'           => 'false',
            ]
        );

        $this->add_control(
            'page_friends',
            [
                'label'             => esc_html__( 'Show Friend Faces', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'true',
                'default'           => 'true',
            ]
        );

        $this->add_control(
            'timeline',
            [
                'label'             => esc_html__( 'Timeline', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'default'           => 'yes',
            ]
        );

        $this->add_control(
            'messages',
            [
                'label'             => esc_html__( 'Message', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'default'           => 'yes',
            ]
        );

        $this->add_control(
            'events',
            [
                'label'             => esc_html__( 'Events', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'default'           => 'yes',
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
                    '{{WRAPPER}} .vmea-fb-like .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-fb-like .block-title',
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

        $this->add_render_attribute( 'vmea-fb-like', 'class', 'vmea-fb-like' );

        $element_title          = $settings['element_title'];
        $page_url               = esc_url($settings['page_url']);
        $facebook_like_width    = 500;
        $timeline               = ( $settings['timeline'] == 'yes' ) ? 'timeline' : '';
        $messages               = ( $settings['messages'] == 'yes' ) ? 'messages' : '';
        $events                 = ( $settings['events']  == 'yes' ) ? 'events' : '';
        $facebook_tabs          = array( $timeline , $messages , $events);
        $facebook_tabs          = array_filter($facebook_tabs);
        $facebook_tabs          = implode(",", $facebook_tabs);
        $facebook_hide_cover    = 'false';
        $adapt_container_width  = 'true';
        $page_friends           = $settings['page_friends'];
        $page_header            = $settings['page_header'];


        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-fb-like' ); ?>>
      
   
    <div id="fb-root"></div>
    

    <div class="ap-facebook-like-box">
        <?php vmagazine_ea_widget_title( $element_title ); ?>

        <div class="fb-page" 
        data-href="<?php echo esc_url($page_url) ?>" 
        data-width = "<?php echo absint($facebook_like_width); ?>"
        data-tabs = "<?php echo esc_attr($facebook_tabs); ?>"
        data-small-header="<?php echo esc_attr($page_header); ?>" 
        data-adapt-container-width="<?php echo esc_attr($adapt_container_width); ?>" 
        data-hide-cover="<?php echo esc_attr($facebook_hide_cover); ?>" 
        data-show-facepile="<?php echo esc_attr($page_friends); ?>">
        <div class="fb-xfbml-parse-ignore">
        <blockquote cite="https://www.facebook.com/facebook">
        <a href="<?php echo esc_url($page_url) ?>">Facebook</a>
        </blockquote></div></div>

    </div>

            
</div><!-- element main wrapper -->
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1517901295152599";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_FB_Like() );