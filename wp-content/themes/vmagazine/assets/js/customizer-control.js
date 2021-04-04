/**
 * Scripts within the customizer controls window.
 * Shows and hides customizer controllers based on conditions
 * 
 */

(function () {
	wp.customize.bind('ready', function () {

		

    	/**
    	* Footer options show or hide 
    	*
    	*/
    	wp.customize( 'vmagazine_footer_layout', function( setting ) {

    	            wp.customize.control( 'vmagazine_buttom_footer_menu', function( control ) {
    	                var visibility = function() {
    	                    if ( 'footer_layout_3' === setting.get() ) {
                                control.container.addClass( 'vmagazine-control-hide' );
    	                    } else {
                                control.container.removeClass( 'vmagazine-control-hide' );
    	                    }
    	                };

    	                visibility();
    	                setting.bind( visibility );
    	            });

                    wp.customize.control( 'vmagazine_footer_logo', function( control ) {
                        var visibility = function() {
                            if ( 'footer_layout_3' === setting.get() || 'footer_layout_2' === setting.get()  ) {
                                control.container.addClass( 'vmagazine-control-hide' );
                            } else {
                                control.container.removeClass( 'vmagazine-control-hide' );
                            }
                        };

                        visibility();
                        setting.bind( visibility );
                    });

                    wp.customize.control( 'vmagazine_footer_icon_title', function( control ) {
                        var visibility = function() {
                            if ( 'footer_layout_3' === setting.get() ) {
                                control.container.removeClass( 'vmagazine-control-hide' );
                            } else {
                                control.container.addClass( 'vmagazine-control-hide' );
                            }
                        };

                        visibility();
                        setting.bind( visibility );
                    });

                    wp.customize.control( 'vmagazine_description_text', function( control ) {
                        var visibility = function() {
                            if ( 'footer_layout_2' === setting.get() ) {
                                control.container.addClass( 'vmagazine-control-hide' );
                            } else {
                                control.container.removeClass( 'vmagazine-control-hide' );
                            }
                        };

                        visibility();
                        setting.bind( visibility );
                    });


                      wp.customize.control( 'vmagazine_buttom_footer_icons', function( control ) {
                        var visibility = function() {
                            if ( 'footer_layout_2' === setting.get() ) {
                                control.container.addClass( 'vmagazine-control-hide' );
                            } else {
                                control.container.removeClass( 'vmagazine-control-hide' );
                            }
                        };

                        visibility();
                        setting.bind( visibility );
                    });
    	});






    });


})(jQuery);