(function ($) {
    "use strict";

var isEditMode = false;

var vmeaYTplayer = function( $scope, $ ){

  var player;
  var time_update_interval;

    function onYouTubeIframeAPIReady() {
    	
    	var vidID 		= $('.vmea-video-playlist .video-datas').attr('data-video-list');
		var playlistNew = $('.vmea-video-playlist .video-datas').attr('data-new-list');

        var player = new YT.Player('vmagazine-video-placeholder', {
            //width: 800,
            //height: 450,
            videoId: vidID,
            playerVars: {
                color: 'white',
                playlist: playlistNew,
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
}


$(window).on('elementor/frontend/init', function () {
        if(elementorFrontend.isEditMode()) {
            isEditMode = true;
        }

        elementorFrontend.hooks.addAction('frontend/element_ready/vmea-video-playlist.default', vmeaYTplayer);


});



}(jQuery));
