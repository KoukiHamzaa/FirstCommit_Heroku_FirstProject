(function($) {
    $(function() {
        /*
        Carousel initialization
        */
        $('.apif-jcarousel')
            .jcarousel({
     
                wrap: 'circular',
                     animation: {
                      duration: 4000,
                      easing:   'linear',
                       }
                });
                $('.apif-jcarousel')
                 .jcarouselAutoscroll({
                     interval: 0, 
                });

                $('.apif-jcarousel').hover(function() {
                    $(this).jcarouselAutoscroll('stop');

                }, function() {
                    $(this).jcarouselAutoscroll('start');
                });

       
    });
})(jQuery);