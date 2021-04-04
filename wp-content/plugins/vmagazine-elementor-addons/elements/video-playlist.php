<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_VMEA_Video_Playlist extends Widget_Base {

	use \Elementor\VmagazineEaCommonFunctions;

	public function get_name() {
		return 'vmea-video-playlist';
	}

	public function get_title() {
		return esc_html__( 'VMagazine: YouTube Video Playlists', 'vmagazine-ea' );
	}

	public function get_icon() {
		return 'vmea-icons vmea-ytv';
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
            'player_video_ids',
            [
                'label'             => esc_html__( 'Video ID', 'vmagazine-ea' ),
                'description'       => esc_html__( 'Id must be seperated with comma Eg: fiTaCplx0RY,BRjMNGMOV4A', 'vmagazine-ea' ),
                'type'              => Controls_Manager::TEXT,
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
                    '{{WRAPPER}} .vmea-video-playlist .block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'element_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .vmea-video-playlist .block-title',
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
            'video_title_color',
            [
                'label'     => esc_html__( 'Video Title Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-video-thumbnails .vmagazine-video-list .video-title-duration h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'video_title_typography',
                'label'     => esc_html__( 'Typography', 'vmagazine-ea' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} .vmagazine-video-thumbnails .vmagazine-video-list .video-title-duration h6',
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
            'video_time_color',
            [
                'label'     => esc_html__( 'Video Time Color', 'vmagazine-ea' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vmagazine-video-thumbnails .vmagazine-video-list .video-list-duration' => 'color: {{VALUE}};'
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

        $this->add_render_attribute( 'vmea-video-playlist', 'class', 'vmea-video-playlist' );

        
        $element_title          = $settings['element_title'];
        $player_video_ids       = $settings['player_video_ids'];



        

        $player_video_id = explode(',',$player_video_ids);
        $video_list = array();

        if ( is_array( $player_video_id ) ) {
            foreach ( $player_video_id as $video_id ) {
                $video_list[] = $video_id;
            }
        }
        $new_video_list = $video_list;

        $new_video_list = implode( ',', $new_video_list );
        
        
        ?>

<div <?php echo $this->get_render_attribute_string( 'vmea-video-playlist' ); ?>>
        
<div  class="video-datas" data-new-list="<?php echo $new_video_list; ?>" data-video-list="<?php echo $video_list[0];?>">

<div class="vmagazine-yt-player">
    <?php vmagazine_ea_widget_title( $element_title ); ?>
    <div class="vmagazine-video-holder clearfix"> 
        <div class="big-video">
            <div class="big-video-inner">
                <div id="vmagazine-video-placeholder"></div>
            </div>
        </div>

        <div class="video-thumbs">
            <div class="video-controls">

                <div class="video-track">
                    <div class="video-current-playlist">
                        <?php esc_html_e( 'Fetching Video Title..', 'vmagazine-ea' ) ?>
                    </div>

                    <div class="video-duration-time">
                        <span class="video-current-time">0:00</span>
                        /
                        <span class="video-duration"><?php esc_html_e( 'Loading..', 'vmagazine-ea' ) ?></span>     
                    </div>
                </div>

                <div class="video-control-holder">
                    <div class="video-play-pause stopped"><i class="fa fa-play" aria-hidden="true"></i></div>
                    <div class="video-prev"><i class="fa fa-step-backward" aria-hidden="true"></i></div>
                    <div class="video-next"><i class="fa fa-step-forward" aria-hidden="true"></i></div>
                </div>

            </div>

            <div class="vmagazine-video-thumbnails">
                <?php
                $video_title = $video_thumb_url = $video_duration = "";
                $vmagazine_yt_api = get_theme_mod('vmagazine_yt_api');

                if( $vmagazine_yt_api ){
                    $key = $vmagazine_yt_api;
                }else{
                    $key = 'AIzaSyALWPOysIWYpJfZ_68yMfEN8E-WKKJ-dZI';
                }

                $i = 1;
                foreach ( $video_list as $video ) {
                    $video_api = wp_remote_get( 'https://www.googleapis.com/youtube/v3/videos?id=' . $video . '&key='.$key.'&part=snippet,contentDetails', array(
                        'sslverify' => false
                            ) );

                    $video_api_array = json_decode( wp_remote_retrieve_body( $video_api ), true );
                    if ( is_array( $video_api_array ) && !empty( $video_api_array[ 'items' ] ) ) {
                        $snippet = $video_api_array[ 'items' ][ 0 ][ 'snippet' ];
                        $video_title = $snippet[ 'title' ];
                        $video_thumb_url = $snippet[ 'thumbnails' ][ 'default' ][ 'url' ];
                        $video_duration = $video_api_array[ 'items' ][ 0 ][ 'contentDetails' ][ 'duration' ];
                        
                        ?>
                        <div class="vmagazine-video-list clearfix" data-index="<?php echo absint($i); ?>" data-video-id="<?php echo esc_attr($video); ?>"> 
                            <img alt="<?php echo esc_attr( $video_title ); ?>" src="<?php echo esc_url( $video_thumb_url ); ?>">

                            <div class="video-title-duration">
                                <h6><?php echo esc_html( $video_title ); ?></h6>
                                <div class="video-list-duration"><?php echo  vmagazine_youtube_duration($video_duration);  ?></div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>  
                        <div class="vmagazine-video-list clearfix" data-index="<?php echo absint($i); ?>">  
                            <div class="video-title-duration">
                                <h6><i><?php esc_html_e( 'Either this video has been removed or you don\'t have access to watch this video', 'vmagazine-ea' ); ?></i></h6>
                            </div>
                        </div>
                        <?php
                    }
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
</div>

            
</div><!-- element main wrapper -->
<?php wp_enqueue_script( 'youtube-api' ); ?>
<script type="text/javascript">

    var player;
    var time_update_interval;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('vmagazine-video-placeholder', {
            //width: 800,
            //height: 450,
            videoId: '<?php echo esc_html($video_list[0]); ?>',
            playerVars: {
                color: 'white',
                playlist: '<?php echo esc_html($new_video_list); ?>',
            },
            events: {
                onReady: initialize,
                onStateChange: onPlayerStateChange
            }
        });

    }

    function initialize() {

        // Update the controls on load
        updateTimerDisplay();

        jQuery('.video-current-playlist').text(jQuery('.vmagazine-video-list:first').text());
        jQuery('.vmagazine-video-list:first').addClass('video-active')

        // Clear any old interval.
        clearInterval(time_update_interval);

        // Start interval to update elapsed time display and
        // the elapsed part of the progress bar every second.
        time_update_interval = setInterval(function () {
            updateTimerDisplay();
        }, 1000);

    }

    // This function is called by initialize()
    function updateTimerDisplay() {
        // Update current time text display.
        jQuery('.video-current-time').text(formatTime(player.getCurrentTime()));
        jQuery('.video-duration').text(formatTime(player.getDuration()));
    }

    function formatTime(time) {
        time = Math.round(time);
        var minutes = Math.floor(time / 60),
                seconds = time - minutes * 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        return minutes + ":" + seconds;
    }

    function onPlayerStateChange(event) {
        updateButtonStatus(event.data);
    }

    function updateButtonStatus(playerStatus) {
        //console.log(playerStatus);
        if (playerStatus == -1) {
            jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // unstarted
            var currentIndex = player.getPlaylistIndex();

            var currentElement = jQuery('.vmagazine-video-list').map(function () {
                if (currentIndex == jQuery(this).attr('data-index')) {
                    return this;
                }
            });

            var videoTitle = currentElement.find('h6').text();

            currentElement.siblings().removeClass('video-active');
            currentElement.addClass('video-active');

            jQuery('.video-current-playlist').text(videoTitle);

            player.setLoop(true);

        } else if (playerStatus == 0) {
            jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // ended
        } else if (playerStatus == 1) {
            jQuery('.video-play-pause').removeClass('stopped').addClass('playing'); // playing
        } else if (playerStatus == 2) {
            jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // paused
        } else if (playerStatus == 3) {
            jQuery('.video-play-pause').removeClass('playing').addClass('stopped'); // buffering
        } else if (playerStatus == 5) {
            // video cued
        }
    }

    jQuery(function ($) {

        $('body').on('click', '.video-play-pause.stopped', function () {
            player.playVideo();
            $(this).removeClass('stopped').addClass('playing');
        });

        $('body').on('click', '.video-play-pause.playing', function () {
            player.pauseVideo();
            $(this).removeClass('playing').addClass('stopped');
        });

        $('.video-next').on('click', function () {
            player.nextVideo();
        });

        $('.video-prev').on('click', function () {
            player.previousVideo()
        });

        $('.vmagazine-video-list').on('click', function () {
            var videoIndex = $(this).attr('data-index');
            player.playVideoAt(videoIndex);
            player.setLoop(true);
        });

    });

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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_VMEA_Video_Playlist() );