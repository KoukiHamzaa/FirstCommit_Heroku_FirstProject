<?php
namespace Elementor;
use Elementor\Group_Control_Base;

function vmagazine_ea_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'vmagazine-elementor-addons',
        [
            'title'  => 'VMagazine Addons',
            'icon' => 'font'
        ],
        1
    );

    /**
     * Initialize VMagazine_EA_Helper
     */
    new VMagazine_EA_Helper;

}
add_action('elementor/init','Elementor\vmagazine_ea_elementor_init');


/*
* Grouping common functions to use on almost all the elements
*
*/
trait VmagazineEaCommonFunctions {


    
    protected function query_controls(){

        
        /**
         * Content Tab: Query
         */
        $this->start_controls_section(
            'section_post_query',
            [
                'label'             => esc_html__( 'Query', 'vmagazine-ea' ),
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label'             => esc_html__( 'Post Type', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => vmagazine_ea_get_post_types(),
                'default'           => 'post',

            ]
        );

        //post categories
        $this->add_control(
            'categories',
            [
                'label'             => esc_html__( 'Categories', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_post_categories(),
                'condition'         => [
                    'post_type' => 'post'
                ]
            ]
        );

        //product categories
        $this->add_control(
            'product_categories',
            [
                'label'             => esc_html__( 'Categories', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_product_categories(),
                'condition'         => [
                    'post_type' => 'product'
                ]
            ]
        );

        $this->add_control(
            'authors',
            [
                'label'             => esc_html__( 'Authors', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_auhtors(),
            ]
        );

        //post tags
        $this->add_control(
            'tags',
            [
                'label'             => esc_html__( 'Tags', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_tags(),
                'condition'         => [
                    'post_type' => 'post'
                ]
            ]
        );

       

        //get all posts
        $this->add_control(
            'exclude_posts',
            [
                'label'             => esc_html__( 'Exclude Posts', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_posts(),
                'condition'         => [
                    'post_type' => 'post'
                ]
            ]
        );

        //get all product list
        $this->add_control(
            'exclude_products',
            [
                'label'             => esc_html__( 'Exclude Products', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => vmagazine_ea_get_products(),
                'condition'         => [
                    'post_type' => 'product'
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label'             => esc_html__( 'Order', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'DESC'           => esc_html__( 'Descending', 'vmagazine-ea' ),
                   'ASC'       => esc_html__( 'Ascending', 'vmagazine-ea' ),
                ],
                'default'           => 'DESC',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'             => esc_html__( 'Order By', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => vmagazine_ea_get_post_orderby_options(),
                'default'           => 'date',
            ]
        );

        $this->add_control(
            'offset',
            [
                'label'             => esc_html__( 'Offset', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '',
            ]
        );

        $this->add_control(
            'showposts',
            [
                'label'             => esc_html__( 'Posts To Show', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
            ]
        );


        $this->end_controls_section();

    }


    protected function post_meta(){

        /**
         * Content Tab: Post Meta
         */
        $this->start_controls_section(
            'section_post_meta',
            [
                'label'             => esc_html__( 'Post Meta', 'vmagazine-ea' ),
            ]
        );
        
        $this->add_control(
            'post_meta',
            [
                'label'             => esc_html__( 'Post Meta', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
            ]
        );

        
        
        $this->add_control(
            'post_date',
            [
                'label'             => esc_html__( 'Post Date', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );

        $this->add_control(
            'post_comment',
            [
                'label'             => esc_html__( 'Post Comment', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );

        $this->add_control(
            'post_view',
            [
                'label'             => esc_html__( 'Post View', 'vmagazine-ea' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'vmagazine-ea' ),
                'label_off'         => esc_html__( 'No', 'vmagazine-ea' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        

    }

    //excerpts
    protected function post_excerpts(){

        /**
         * Content Tab: Post Excerpts
         */
        $this->start_controls_section(
            'section_post_excerpts',
            [
                'label'             => esc_html__( 'Post Excerpts', 'vmagazine-ea' ),
            ]
        );
        
        $this->add_control(
            'title_excerpts',
            [
                'label'             => esc_html__( 'Title Length', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '',
                'description'       => esc_html__('Enter Length for title in letters or leave balnk to display full','vmagazine-ea')
            ]
        );

        $this->add_control(
            'content_excerpts',
            [
                'label'             => esc_html__( 'Post Content Length', 'vmagazine-ea' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => '',
                'description'       => esc_html__('Enter Length for contents in letters or leave balnk to hide content','vmagazine-ea')
            ]
        );

        $this->end_controls_section();

    }


}



class VMagazine_EA_Helper {

    public static function get_query_args( $control_id, $settings ) {
        $defaults = [
            $control_id . '_post_type' => 'post',
            $control_id . '_posts_ids' => [],
            'orderby' => 'date',
            'order' => 'desc',
            'posts_per_page' => 3,
            'offset' => 0,
        ];

        $settings = wp_parse_args( $settings, $defaults );

        $post_type = $settings[ $control_id . '_post_type' ];

        $query_args = [
            'orderby' => $settings['orderby'],
            'order' => $settings['order'],
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish', // Hide drafts/private posts for admins
        ];

        if ( 'by_id' === $post_type ) {
            $query_args['post_type'] = 'any';
            $query_args['post__in']  = $settings[ $control_id . '_posts_ids' ];

            if ( empty( $query_args['post__in'] ) ) {
                // If no selection - return an empty query
                $query_args['post__in'] = [ 0 ];
            }
        } else {
            $query_args['post_type'] = $post_type;
            $query_args['posts_per_page'] = $settings['posts_per_page'];
            $query_args['tax_query'] = [];

            $query_args['offset'] = $settings['offset'];

            $taxonomies = get_object_taxonomies( $post_type, 'objects' );

            foreach ( $taxonomies as $object ) {
                $setting_key = $control_id . '_' . $object->name . '_ids';

                if ( ! empty( $settings[ $setting_key ] ) ) {
                    $query_args['tax_query'][] = [
                        'taxonomy' => $object->name,
                        'field' => 'term_id',
                        'terms' => $settings[ $setting_key ],
                    ];
                }
            }
        }

        if ( ! empty( $settings[ $control_id . '_authors' ] ) ) {
            $query_args['author__in'] = $settings[ $control_id . '_authors' ];
        }

        $post__not_in = [];
        if ( ! empty( $settings['post__not_in'] ) ) {
            $post__not_in = array_merge( $post__not_in, $settings['post__not_in'] );
            $query_args['post__not_in'] = $post__not_in;
        }

        if( isset( $query_args['tax_query'] ) && count( $query_args['tax_query'] ) > 1 ) {
            $query_args['tax_query']['relation'] = 'OR';
        }

        return $query_args;
    }

}
