// (function ($) {
//       $(function () {
//          $(window).load(function(){
//           var $grid = $('.ifgrid').isotope({
//           itemSelector: '.element-itemif'
//         });
//     });
//   });
      
// }(jQuery));

jQuery(document).ready(function($) {

    $('.apif-owl-demo p,.ap-self-user-feed p').each(function() {
          var $this = $(this);
          if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
              $this.remove();
   });


    $('.apif-owl-demo').each(function(){

        $(this).find('br').remove();
         
      // apif-owl-silder
        var widdth = $(this).find('.apif-owl-silder').width();
       if(widdth <= 350){
        $(this).find('.apif-owl-silder').addClass('apif-small-size-display');
       }else{
         $(this).find('.apif-owl-silder').removeClass('apif-small-size-display');
       }
    });

    $('#swipebox-next').click(function(){
        //console.log('click next');
        //$('video')[0].pause();
        $("video").each(function(){
            $(this).get(0).pause();
         });
    });

    $('#swipebox-prev').click(function(){
        //$('video')[0].pause();
      //  console.log('click prev');
        $("video").each(function(){
            $(this).get(0).pause();
         });
    });

    $(document.body).on('click', '#swipebox-prev', function(e){
       // alert('check');
    });

    $(document).keydown(function(e) {
        // Enable esc
        if (e.keyCode == 27) {
           $('.apif-accesspress-popup-overlay').click();
        }

    });


    $('.apif-close-btn').click(function(){
        $('.apif-accesspress-popup-overlay').click();
    });

    $('.apif-accesspress-popup-overlay').click(function(){
        $('.apif-accesspress-popup-overlay').fadeOut();
        $('.apif-popup-controls').fadeOut();
        $('.apif-close-btn').fadeOut();
        $(".apif-popup-carousel-type").hide();
        // $('.apif-accesspress-popup').fadeOut();
        $('.apif-popup-main-wrap').removeClass('active-popup');
        //$('video')[0].pause();
        $("video").each(function(){
            $(this).get(0).pause();
         });
    });

 var scrolltop;
 var sync1 = $(".apif-popup-carousel-sidecar");
 var slider =   sync1.bxSlider({
    slideMargin: 10,
    slideWidth: 300,
    minSlides: 1,
    maxSlides: 1,
      infiniteLoop: false,
      hideControlOnEnd: true
    });
    // for the accesspress lightbox
 $(document.body).on('click', '.apif-own-lightbox', function(e){
  //$('body').on('click', '.apif-own-lightbox', function(e){
        e.preventDefault();
        var $this               = $(this);
        var data_index          = $this.data('index');
        var data_index_id       = $this.data('index-id');
        var data_id             = $this.data('id');
        var data_index_prev     =  parseInt(data_index)-1;
        var data_index_next     =  parseInt(data_index)+1;
        var data_index_id_prev  =  data_index_prev+'-'+data_id;
        var data_index_id_next  =  data_index_next+'-'+data_id;
        var data_source_type    = $this.data('source-type');
        var data_source_url     = $this.data('source-url');
        var data_profile_image  = $this.data('profile-image');
        var data_username       = $this.data('username');


        // var data_image_caption  = $this.data('image-caption');
        if($(this).closest('.ap_slider_wrapper').hasClass('apif-slider-4-view')){
          var data_image_caption  = $this.closest('.sp-slide').find('.apif-hidden').html();
          var carousel = $this.closest('.sp-slide').find('.apif-hidden-carousel').val();
        }else{
          var data_image_caption  = $this.parent().find('.apif-hidden').html();
          var carousel = $this.parent().find('.apif-hidden-carousel').val();
        }
        
        var data_likes          = $this.data('likes');
        var data_comments       = $this.data('comments');
        var data_posted_ago     = $this.data('posted-ago');
        var data_instagram_link = $this.data('instagram-link');
        var showcomment = $this.data('showcomment');
        
        scrolltop = $(document).scrollTop();
        var data_feedid   = $this.data('feedid');
        var data_feedlink = $this.data('link');
        var data_feedtype = $this.data('feedtype');
        $('.apif-accesspress-popup-overlay').fadeIn();
        $('.apif-popup-controls').fadeIn();
        $('.apif-close-btn').fadeIn();
        // $('.apif-accesspress-popup').fadeIn();
        $('.apif-popup-main-wrap').addClass('active-popup');
        // $('.apif-accesspress-popup').css('top', scrolltop + 50);
        // $('.apif-popup-controls').css('top', scrolltop+window.innerHeight/2);
        // $('.apif-close-btn').css('top', scrolltop+100);

        if(data_source_type =='image'){
            $('.apif-img-popup').show();
            // $('.apif-img-popup img').attr("src", data_source_url);
            $('.apif-img-popup a.apif-example-link').css("background-image", 'url('+data_source_url+')');
            $('.apif-popup-pvid').hide();
            $('.apif-popup-carousel-type').hide();
        }else if(data_source_type === 'sidecar' || data_source_type === 'carousel'){
          //carousel type
            $('.apif-img-popup').hide();
            $('.apif-popup-pvid').hide();
            $('.apif-popup-carousel-type').show();
             $.ajax({
                    type: 'post',
                    url: frontend_ajax_object.ajax_url,
                    data: {
                        'action': 'get_carousel_feeds',
                        '_wpnonce': frontend_ajax_object.ajax_nonce,
                        'feed_id'  : data_feedid,
                        'link' : data_feedlink,
                        'ftype':  data_feedtype,
                        'carousel_array':  carousel,
                    },
                   beforeSend: function() {
                       $(".apif-popup-carousel-type .apif-loader-carousel").css({
                        'opacity': '1',
                        'visibility' : 'visible',
                       });
                       $(".apif-popup-carousel-type .apif-loader-carousel").show();
                        $(".apif-popup-carousel-type .bx-wrapper").css({
                        'opacity': '0',
                        'visibility' : 'hidden',
                       });
                      // $(".apif-popup-carousel-type").hide();
                   },
                   complete: function() {
                      $(".apif-popup-carousel-type .apif-loader-carousel").css({
                        'opacity': '0',
                        'visibility' : 'hidden'
                       });
                      $(".apif-popup-carousel-type .apif-loader-carousel").hide();
                      $(".apif-popup-carousel-type .bx-wrapper").css({
                        'opacity': '1',
                        'visibility' : 'visible'
                       });
                      //$(".apif-popup-carousel-type").show();
                   },
                   success: function(response) {
                     $('.apif-popup-carousel-type .apif-popup-carousel-sidecar').html(response);
                     slider.destroySlider();
                     slider.reloadSlider({
                       mode: 'fade',
                       speed: 500,
                       minSlides: 1,
                       maxSlides: 1,
                       auto: true,
                       pager: false,
                       controls: true,
                    });
                     $(".apif-popup-carousel-type").show();
                 /*  sync1.bxSlider({
                  minSlides: 1,
                  maxSlides: 5,
                  slideMargin: 10,
                   slideWidth: 300,
                  speed: 500,
                  pager: true,
                  prevText: '<i class="car2go-icon-caret-left"></i>',
                  nextText: '<i class="car2go-icon-caret-right"></i>',
              });*/
                   }
        });           
        }
        else{
            $('.apif-img-popup').hide();
            var datahtml = "<video controls='' width='380' height='390' autoplay='' name='media'><source src="+data_source_url+" type='video/mp4'>Your browser does not support the video tag.</video>";
            $('.apif-popup-pvid').html(datahtml);
            $('.apif-popup-pvid').show();
            $('.apif-popup-carousel-type').hide();
        }

        $('.apif-previous-button a').attr('data-index', data_index_id_prev);

        // $('.apif-previous-button a').attr('data-feedid', data_feedid);
        // $('.apif-previous-button a').attr('data-link', data_feedlink);
        // $('.apif-previous-button a').attr('data-feedtype', data_feedtype);

        $('.apif-next-button a').data('index', data_index_id_next);
        
        // $('.apif-next-button a').data('feedid', data_feedid);
        // $('.apif-next-button a').data('link', data_feedlink);
        // $('.apif-next-button a').data('feedtype', data_feedtype);

        $('.apif-fb-share').attr('href','https://www.facebook.com/sharer/sharer.php?u='+data_feedlink);
        $('.apif-tweet-share').attr('href','https://twitter.com/intent/tweet?text='+data_feedlink);
        $('.apif-gplus-share').attr('href','https://plus.google.com/share?url='+data_feedlink);

        if(data_profile_image.length !=''){
            $('.apif-popup-pimg img').attr('src', data_profile_image);
        }
        $('.apif-popup-name h4').html(data_username);
        $('.apif-popup-camera-icon a').attr('href', data_instagram_link);
        $('.apif-popup-follow-me a').attr('href', 'https://www.instagram.com/'+data_username);
        $('.apif-popup-name a').attr('href', 'https://www.instagram.com/'+data_username);
        // if(frontend_ajax_object.enable_links_in_username_and_tags == '1'){
        //     data_image_caption = data_image_caption.replace(/#(\w+)/g, "<a href='https://www.instagram.com/explore/tags/$1' target='_blank' title='$1'>$&</a>").replace(/@(\w+)/g, "<a href='https://www.instagram.com/$1' target='_blank' title='$1'>$&</a>");
        // }
        $('.apif-popup-disc-text .apif-caption-text').css('display','block');
        $('.apif-popup-disc-text p').html(data_image_caption);
        var height = $('.apif-popup-disc-text .apif-caption-text p').outerHeight();
        if(height > 70){
           $('.apif-popup-disc-text .apif-caption-text').css('overflow-y','scroll');
        }else{
           $('.apif-popup-disc-text .apif-caption-text').css('overflow-y','hidden');
        }
        $('.apif-popup-like-count').html(data_likes);
        $('.apif-popup-comment-count').html(data_comments);
        $('.apif-popup-posted-ago').html(data_posted_ago);
        // $("html, body").animate({ scrollTop: 0 }, "slow");
        $('.apif-comment-lists-wrapper').html('');
        if(showcomment == 1){
            $.ajax({
                        type: 'post',
                        url: frontend_ajax_object.ajax_url,
                        data: {
                            action: 'get_media_comments',
                            _wpnonce: frontend_ajax_object.ajax_nonce,
                            feedid  : data_feedid,
                            feedlink : data_feedlink,
                            feedtype:  data_feedtype,
                        },
                       beforeSend: function() {
                          // $(".apif-comment-lists-wrapper").mCustomScrollbar("destroy"); //Destroy
                           $(".ap-insta-popup-comment-lists .apif-loader-comment").css('display', 'block');
                           $(".apif-comment-lists-wrapper").hide();
                       },
                       complete: function() {
                           $(".ap-insta-popup-comment-lists .apif-loader-comment").css('display', 'none');
                           $(".apif-comment-lists-wrapper").show();
                       },
                       success: function(response) {
                         $(".ap-insta-popup-comment-lists .apif-loader-comment").css('display', 'none');
                         $(".apif-comment-lists-wrapper").show();
                         $('.apif-comment-lists-wrapper').html(response);
                       }
            });
        }

    });

      var height = $('.apif-instagram-layout .apif-com-wrap').outerHeight();
        if(height > 134){
           $('.apif-instagram-layout .apif-com-wrap').css('overflow-y','scroll');
           $('.apif-instagram-layout .apif-com-wrap').css('height','134px');
        }else{
           $('.apif-instagram-layout .apif-com-wrap').css('overflow-y','hidden');
        }

  // $( document ).scroll(function() {
  //   scrolltop = $(this).scrollTop();
  //   $('.apif-accesspress-popup').css('top', scrolltop + 50);
  //   $('.apif-popup-controls').css('top', scrolltop+window.innerHeight/2);
  //   $('.apif-close-btn').css('top', scrolltop+150);  
  // });


    // for previous buttons
    $('body').on('click', '.apif-previous-button a', function(e){
        //$('video')[0].pause();
        $("video").each(function(){
            $(this).get(0).pause();
         });
        e.preventDefault();
        var data_index          = $(this).attr('data-index');
        $('.apif-own-lightbox').each(function(){
           var data_index_id = $(this).data('index-id');
           if(data_index_id == data_index){
            $(this).trigger( "click" );
           } 
        });
    });


    // for next buttons
  $('body').on('click', '.apif-next-button a', function(e){
        //$('video')[0].pause();
        $("video").each(function(){
            $(this).get(0).pause();
         });
        var $this = $(this);
        var data_index = $(this).data('index');
        $('.apif-own-lightbox').each(function(){
           var data_index_id = $(this).data('index-id');
           if(data_index_id == data_index){
            $(this).trigger( "click" );
           }
        });
    });

    if (typeof(frontend_owl_carousel_object) != "undefined" && frontend_owl_carousel_object !== null) {
        if(frontend_owl_carousel_object.owl_carousel_enable == 'true'){
            var next_text     = frontend_owl_carousel_object.next_text;
            var previous_text = frontend_owl_carousel_object.previous_text;
            var large_desktop_column = parseInt(frontend_owl_carousel_object.large_desktop_column);

           /* var layout = frontend_owl_carousel_object.layout;
            if (typeof(layout) != "undefined" && layout !== null && layout == 'postcarousel') {
              var largedesktop  = 4; //postcarousel
            }else{
              var largedesktop = 5;// row carousel
            }*/
            var autoplay = frontend_owl_carousel_object.autoplay;
             if(autoplay == 'true'){
              autoplay = 'true';
            }else{
              autoplay = 'false';
            }
            var pager = frontend_owl_carousel_object.pager;
            if(pager == 'true'){
              pager = 'true';
            }else{
              pager = 'false';
            }
            var count = parseInt(frontend_owl_carousel_object.count);
           // alert(count);
            var mobile_count = parseInt(frontend_owl_carousel_object.mobile_count);
            var tablet_count = parseInt(frontend_owl_carousel_object.tablet_count);
            var controls = frontend_owl_carousel_object.controls;
            var autoplay_speed = parseInt(frontend_owl_carousel_object.autoplay_speed);
            var slidemargin = parseInt(frontend_owl_carousel_object.margin);
            var controls_type = frontend_owl_carousel_object.controls_type;
            if (controls_type == 'arrow') {
                 var nav_type = [
                    '<span class="lnr lnr-chevron-left"></span>',
                    '<span class="lnr lnr-chevron-right"></span>'
                ];
            } else {
                var nav_type = [previous_text, next_text];
            }
            $(".apif-owl-demo.apif-standard_resolution").owlCarousel({
                loop: true,
                margin: slidemargin,
                autoplay: autoplay,
                autoplaySpeed:autoplay_speed, //Set AutoPlay to 3 seconds as 3000
                autoplayHoverPause: true,
                responsiveClass: true,
                pullDrag : true,
                 //Auto height
               //autoHeight : true,
                //nav: controls,
                navText: nav_type,
                // autoWidth:true,
                dots: pager,
               // dotsEach: true,
                responsive: {
                  0: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false,
                  },
                  450: {
                    items: mobile_count,
                    nav: true,
                     dots: false,
                  },
                  768: {
                    items: mobile_count, //ipad,mobile
                    nav: true,
                     dots: false,
                  },
                  992: {
                    items: tablet_count, //ipadpro,mobile//tablet
                    nav: true,
                 //   dots: false,
                  },
                  1024: {
                    items: count, //desktop
                    nav: controls,
                   // dots: pager,
                   },
                    1200: {
                    items: count, //desktop
                     nav: controls,
                  //  dots: pager,
                  },
                  1367: {
                    items: large_desktop_column, 
                    nav: controls,
                    //dots: pager,
                  }
                }
            });

            $(".apif-owl-demo.apif-low_resolution").owlCarousel({
                loop: true,
                margin: slidemargin,
                autoplay: autoplay,
                autoplaySpeed:autoplay_speed,
                autoplayHoverPause: true,
                responsiveClass: true,
               // nav: controls,
                navText: nav_type,
                dots: pager,
               // dotsEach: true,
                responsive: {
                  0: {
                    items: 2,
                    nav: false
                  },
                  450: {
                    items: 3,
                    nav: true
                  },
                  768: {
                    items: mobile_count,
                    nav: true
                  },
                  992: {
                    items: tablet_count,
                    nav: true
                  },
                  1024: {
                    items: count, //desktop
                     nav: controls,
                   },
                  1200: {
                    items: count, //desktop
                     nav: controls,
                  },
                  1367: {
                    items: 8,
                    nav: controls,
                    //nav: true,
                  }
                }
            });

            $(".apif-owl-demo.apif-thumbnail").owlCarousel({
                loop: true,
                margin: slidemargin,
                autoplay: autoplay,
                autoplaySpeed:autoplay_speed,
                autoplayHoverPause: true,
                responsiveClass: true,
               // nav: controls,
                navText: nav_type,
                dots: pager,
                //dotsEach: true,
                responsive: {
                  0: {
                    items: 2,
                    nav: false
                  },
                  450: {
                    items: mobile_count,
                    nav: true
                  },
                  768: {
                    items:mobile_count,
                    nav: true
                  },
                  992: {
                    items: tablet_count,
                    nav: true
                  },
                   1024: {
                    items: count, //desktop
                     nav: controls,
                   },
                  1200: {
                    items: count, //desktop
                     nav: controls,
                  },
                  1367: {
                    items: 12,
                    nav: controls,
                   // margin: 0
                  }
                }
            });

             var i = 1;
             $('.owl-carousel').each(function(){
              var control = $(this).data('controls');
              var pager = $(this).data('pager');
              var id = $(this).data('id');
              if(control){
                if($(this).find('.owl-nav').hasClass('disabled')){
                $(this).find('.owl-nav').removeClass('disabled');
               }
                $(this).on('changed.owl.carousel', function(event) {
                $(this).find('.owl-nav').removeClass('disabled');
              });

              }else{
                if(!$(this).find('.owl-nav').hasClass('disabled')){
                 $(this).find('.owl-nav').addClass('disabled');
                }
                $(this).on('changed.owl.carousel', function(event) {
                $(this).find('.owl-nav').addClass('disabled');
              });

              }
              if(pager){
                 $('.apif-owl-demo[data-id=' + id + '] .owl-dot').each(function() {
                   $(this).text(i);
                  i++;
                 });
              }
             
               
             });

          
         
        }
    }


    /*
    * NiVo Slider
    */
    if (typeof(frontend_nivo_slider_object) != "undefined" && frontend_nivo_slider_object !== null) {
        if(frontend_nivo_slider_object.nivo_slider_enable == 'true'){
        $('.apif-nivo-slider').each(function () {
          var slider_animation_effect = $(this).attr('data-animation');
          var animSpeed = $(this).attr('data-animSpeed');
          var pauseTime = $(this).attr('data-pauseTime');
            $(this).nivoSlider({
                effect: slider_animation_effect,  // Specify sets like: 'fold,fade,sliceDown'
                slices: 15,                     // For slice animations
                boxCols: 8,                     // For box animations
                boxRows: 4,                     // For box animations
                animSpeed: animSpeed,                 // Slide transition speed 500
                pauseTime: pauseTime,                 // How long each slide will show 5000
                startSlide: 0,                     // Set starting Slide (0 index)
                directionNav: true,             // Next & Prev navigation
                controlNav: false,                 // 1,2,3... navigation
                controlNavThumbs: false,         // Use thumbnails for Control Nav
                pauseOnHover: true,             // Stop animation while hovering
                manualAdvance: false,             // Force manual transitions
                // prevText: '<i class="fa fa-chevron-left"></i>',                 // Prev directionNav text
                // nextText: '<i class="fa fa-chevron-right"></i>',                 // Next directionNav text
                prevText: '<span class="lnr lnr-arrow-left"></span>',                 // Prev directionNav text
                nextText: '<span class="lnr lnr-arrow-right"></span>',                 // Next directionNav text
                randomStart: false,             // Start on a random slide
            });

          });
        }
    }

    init_masonry();
    function init_masonry(){
        var masonary_obj = [];
          $('.ap_feeds').each(function () {
            new WOW().init();
          var layouttype = $(this).attr('data-layouttype');
          if(layouttype != 'grid'){
            var $selector = $(this);
            var masonary_id = $(this).data('feed-id');
            masonary_obj[masonary_id] = $selector.imagesLoaded(function () {
                masonary_obj[masonary_id].isotope({
                    itemSelector: '.apif-masonry-box',
                    percentPosition: true,
                    layoutMode: 'packery',
                    masonry: {
                        // use element for option
                        columnWidth: '.apif-masonry-box',
                        // horizontalOrder: true
                    }
                });
            });
          }
      });
    }

    $('.apif-feeds-share-wrap').click(function(){
      $(this).parent().toggleClass('apif-show-share');
    });

   var masonary_obj = [];
   // $('.apif-load-more-button').click(function(){
     $('body').on('click', '.apif-load-more-button', function(e){
        var selector = $(this);
        var apif_id = selector.attr('data-id');
        var column = selector.attr('data-total-column');
        var largedesktopcolumn = selector.attr('data-largedesktopcolumn');
        var hoveranimation = selector.attr('data-hoveranimation');
        var feedtype = selector.attr('data-feedtype');
        var link = selector.attr('data-pagination-link');
        var layout = selector.attr('data-layout-name');
        var random_no = selector.attr('data-random-num');
        var sort_by = selector.attr('data-sort-by');
        var data_index_num_last = selector.attr('data-index-num-last');
        var masonary_id = selector.closest('.apif-wrapper').find('.ap_feeds').data('feed-id');
        
        var $selector_feeds = selector.closest('.apif-wrapper').find('.ap_feeds');
        masonary_obj[masonary_id] = $selector_feeds.imagesLoaded(function () {
              masonary_obj[masonary_id].isotope({
                  itemSelector: '.apif-masonry-box',
                  percentPosition: true,
                  layoutMode: 'packery',
                  masonry: {
                      // use element for option
                      columnWidth: '.apif-masonry-box'
                  }
              });
          });

        if(feedtype === 'any_user_timeline' || feedtype === 'hashtag'){
            var page_num = selector.data('page-number');
            var total_page = selector.data('total-page');
            var next_page = parseInt(page_num) + 1;
            if (next_page <= total_page) {
                  $.ajax({
                        type: 'post',
                        url: frontend_ajax_object.ajax_url,
                        data: {
                            action: 'load_more_by_userfeeds',
                            _wpnonce: frontend_ajax_object.ajax_nonce,
                            layout  : layout,
                            hoveranimation  : hoveranimation,
                            'apif_id' : apif_id,
                            page_num: next_page,
                            random_num : random_no,
                            column : column,
                            largedesktopcolumn : largedesktopcolumn,
                            data_index_num_last : data_index_num_last,
                            sort_by : sort_by,
                        },
                        beforeSend: function (xhr) {
                             selector.closest('.ap_pagination').find('.ap_wait_loader').show();
                             selector.hide();
                        },
                        success: function (response) {
                               selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                               selector.data('page-number', next_page);
                                var $items = $(response);
                                    masonary_obj[masonary_id].append($items).isotope('appended', $items);
                                    masonary_obj[masonary_id].imagesLoaded(function () {
                                    })
                                .done( function( instance ) {
                                   console.log('all images successfully loaded');
                                    selector.show();
                                    masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                })
                                .fail( function() {
                                    console.log('all images loaded, at least one is broken');
                                    selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                    selector.show();
                                    masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                  })
                                .progress( function( instance, image ) {
                                    console.log('progress ehre');
                                     selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                    selector.show();
                                  });
                            if (next_page == total_page) {
                                selector.remove();
                            } else {
                                selector.show();
                            }
                         /* var customheight = $('.apif-masonry-box .apif-featimg').width();
                          $('.apif-masonry-box .apif-featimg .example-image-link').css({
                            'height': (customheight * 1.2) + 'px'
                          });*/
                            $('.apif-masonry-box').each(function(){
                            if(!$(this).parent().hasClass('ap-feeds-grid-layout2')){
                              var customheight = $(this).find('.apif-featimg').width();
                            $(this).find('.apif-featimg .example-image-link').css({
                            'height': (customheight * 1.2) + 'px'
                             });
                            } 
                          });
                          var widthroundimgslide = $('.ap_feeds-round_image .apif-round-image-block').width();
                          $('.ap_feeds-round_image .apif-round-image-block .img-thumb').css({
                            'height': widthroundimgslide + 'px'
                          });

                          if(layout === 'round_image'){
                                $('.ap_feeds').each(function(){
                                var widdth = $(this).find('.img-thumb').width();
                                 if(widdth <= 350){
                                  $(this).find('.apif-masonry-box').addClass('apif-small-size-display');
                                 }else{
                                   $(this).find('.apif-masonry-box').removeClass('apif-small-size-display');
                                 }
                              });
                          }else if(layout === 'grid_layout' || layout === 'grid_layout1' || layout === 'grid_layout2' 
                            || layout === 'masonry_layout' || layout === 'masonry_layout1' || layout === 'masonry_layout2' 
                            || layout === 'masonry_layout3' || layout === 'masonry_layout4' || layout === 'masonry_layout5'){
                            $('.ap_feeds').each(function(){
                                var widdth = $(this).find('.ap-self-user-feed figure').width();
                               if(widdth <= 350){
                                $(this).find('.ap-self-user-feed').addClass('apif-small-size-display');
                               }else{
                                 $(this).find('.ap-self-user-feed').removeClass('apif-small-size-display');
                               }
                            });
                          }

                        }
                    });

            }else{
             selector.remove();
            }
        }else{
         $.ajax({
          type: 'POST',
          url: frontend_ajax_object.ajax_url,
          data: {
                  'action': 'load_more',
                  'pagination_link': link,
                  'layout'  : layout,
                  hoveranimation  : hoveranimation,
                  'apif_id' : apif_id,
                  'random_num' : random_no,
                  'sort_by' : sort_by,
                   column : column,
                   largedesktopcolumn : largedesktopcolumn,
                  'data_index_num_last' : data_index_num_last,
                  '_wpnonce' : frontend_ajax_object.ajax_nonce,
          },
          beforeSend: function() {
            selector.closest('.ap_pagination').find('.ap_wait_loader').show();
            selector.hide();
          },
          success: function( response ){
            selector.closest('.ap_pagination').find('.ap_wait_loader').show();
            var $items = $(response);
               masonary_obj[masonary_id].append($items).isotope('appended', $items);
                masonary_obj[masonary_id].imagesLoaded(function () {
                })
            .done( function( instance ) {
                //console.log('all images successfully loaded');
                selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                selector.show();
                masonary_obj[masonary_id].isotope('reloadItems').isotope();
                if(frontend_ajax_object.enable_links_in_username_and_tags == '1'){
                    $('.apif-image-caption').each(function(){
                        var texts = $(this).html();
                        texts = texts.replace(/#(\w+)/g, "<a href='https://www.instagram.com/explore/tags/$1' target='_blank' title='$1'>$&</a>").replace(/@(\w+)/g, "<a href='https://www.instagram.com/$1' target='_blank' title='$1'>$&</a>");
                        $(this).html(texts);
                    });
                }
                //274px approx
                 $('.apif-masonry-box').each(function(){
                  if(!$(this).parent().hasClass('ap-feeds-grid-layout2')){
                    var customheight = $(this).find('.apif-featimg').width();
                  $(this).find('.apif-featimg .example-image-link').css({
                  'height': (customheight * 1.2) + 'px'
                   });
                  } 
                });
                var widthroundimgslide = $('.ap_feeds-round_image .apif-round-image-block').width();
                $('.ap_feeds-round_image .apif-round-image-block .img-thumb').css({
                  'height': widthroundimgslide + 'px'
                });
                 if(layout === 'round_image'){
                      $('.ap_feeds').each(function(){
                      var widdth = $(this).find('.img-thumb').width();
                       if(widdth <= 350){
                        $(this).find('.apif-masonry-box').addClass('apif-small-size-display');
                       }else{
                         $(this).find('.apif-masonry-box').removeClass('apif-small-size-display');
                       }
                    });
                }

            })
            .fail( function() {
                console.log('all images loaded, at least one is broken');
                selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                selector.show();
                masonary_obj[masonary_id].isotope('reloadItems').isotope();
              })
            .progress( function( instance, image ) {
                selector.closest('.ap_pagination').find('.ap_wait_loader').show();
              });
          }
        });
      }       
   });


$('.apif-ri-grid').each(function(){
  var random = $(this).find('.apif-grid-rotator-val').data('rand');
  var gridid = $(this).attr('id');
  var rows = $(this).find('.apif-grid-rotator-val').data('rows');
  var step = $(this).find('.apif-grid-rotator-val').data('step');
  var cols = $(this).find('.apif-grid-rotator-val').data('cols');
  var interval = $(this).find('.apif-grid-rotator-val').data('interval');
  var animation = $(this).find('.apif-grid-rotator-val').data('animation');
  var animation_speed = $(this).find('.apif-grid-rotator-val').data('animationspeed');
   $('#'+gridid).gridrotator({
      rows : rows,
      columns : cols,
      step : step,
      maxStep :8,
      interval : interval,
      preventClick : false,
      animType : animation,
      animSpeed : animation_speed,
      slideshow : true,
      w1024 : {
          rows : rows,
          columns : cols
      },
      w768 : {
          rows : rows,
          columns : cols
      },
      w480 : {
          rows : rows,
          columns : cols
      },
      w320 : {
          rows : rows,
          columns : cols
      },
      w240 : {
          rows : rows,
          columns : cols,
      },
  });
});


    if(frontend_ajax_object.enable_links_in_username_and_tags == '1'){
        $('.apif-image-caption').each(function(){
            var texts = $(this).html();
            texts = texts.replace(/#(\w+)/g, "<a href='https://www.instagram.com/explore/tags/$1' target='_blank' title='$1'>$&</a>").replace(/@(\w+)/g, "<a href='https://www.instagram.com/$1' target='_blank' title='$1'>$&</a>");
            $(this).html(texts);
        });

        $('.apif-posted-info').each(function(){
            var texts = $(this).html();
            texts = texts.replace(/#(\w+)/g, "<a href='https://www.instagram.com/explore/tags/$1' target='_blank' title='$1'>$&</a>").replace(/@(\w+)/g, "<a href='https://www.instagram.com/$1' target='_blank' title='$1'>$&</a>");
            $(this).html(texts);
        });
    }

   var apif_masonary_obj = [];
        /*
     *
     * @Masonary intialization
     */
    $('.apifeeds-filtr-container').each(function() {
        new WOW().init();
        var $selector = $(this);
        var masonary_id = $(this).data('id');
        apif_masonary_obj[masonary_id] = $selector.imagesLoaded(function() {
            apif_masonary_obj[masonary_id].isotope({
                itemSelector: '.ap-self-user-feed',
                percentPosition: true,
                layoutMode: 'packery',
                masonry: {
                    columnWidth: '.ap-self-user-feed',
                    // horizontalOrder: true,
                    // gutter: 10
                /*    horizontalOrder: true,
                    gutter: 0
*/
                },
            });
       });
    });

/*      $('.apif-filter-trigger').click(function() {
        var selector = $(this);
        var filter_key = selector.data('filter-key');
        var layout_type = selector.data('layout-type');
        selector.closest('.smls-filter').find('.smls-filter-trigger').removeClass('smls-active-filter');
        selector.addClass('smls-active-filter');
        filterValue = (filter_key == 'all') ? '*' : '.' + filter_key;
        var masonary_id = selector.closest('.apif-filter-layout-view').find('.apifeeds-filtr-container').data('id');
        smls_masonary_obj[masonary_id].isotope({filter: filterValue});

    });*/

      /*
     * Filter template implementation
     */
   $('body').on('click', '.apif-filter-trigger', function(e){
        var selector = $(this);
        var filter_key = selector.data('filter-key');
        var layout_type = selector.data('layout-type');
        selector.closest('.apifeeds-filter-wrap').find('.apif-filter-trigger').removeClass('apif-active-filter');
        selector.addClass('apif-active-filter');
        filterValue = (filter_key == 'all') ? '*' : '.' + filter_key;
        var $container = selector.closest('.apif-filter-layout-view').find('.apifeeds-filtr-container');
          $container.imagesLoaded(function() {
            $container.isotope({
                itemSelector: '.ap-self-user-feed',
                percentPosition: true,
                 layoutMode: 'packery',
                masonry: {
                    columnWidth: '.ap-self-user-feed',
                    // horizontalOrder: true,
                    // gutter: 10

                },
            });
          });
        //var masonary_id = selector.closest('.apif-filter-layout-view').find('.apifeeds-filtr-container').data('id'); 
        $container.isotope({filter: filterValue});
        return false;
    });

   $('.apif-image-caption br').remove();

});





// // for photo swipe lightbox
// (function () {
//     var initPhotoSwipeFromDOM = function (gallerySelector) {
//         var parseThumbnailElements = function (el) {
//             var thumbElements = el.childNodes,
//                     numNodes = thumbElements.length,
//                     items = [],
//                     el,
//                     childElements,
//                     thumbnailEl,
//                     size,
//                     item;

//             for (var i = 0; i < numNodes; i++) {
//                 el = thumbElements[i];

//                 // include only element nodes 
//                 if (el.nodeType !== 1) {
//                     continue;
//                 }

//                 childElements = el.children;

//                 size = el.getAttribute('data-size').split('x');

//                 // create slide object
//                 item = {
//                     src: el.getAttribute('href'),
//                     w: parseInt(size[0], 10),
//                     h: parseInt(size[1], 10),
//                     author: el.getAttribute('data-author')
//                 };

//                 item.el = el; // save link to element for getThumbBoundsFn

//                 if (childElements.length > 0) {
//                     item.msrc = childElements[0].getAttribute('src'); // thumbnail url
//                     if (childElements.length > 1) {
//                         item.title = childElements[1].innerHTML; // caption (contents of figure)
//                     }
//                 }


//                 var mediumSrc = el.getAttribute('data-med');
//                 if (mediumSrc) {
//                     size = el.getAttribute('data-med-size').split('x');
//                     // "medium-sized" image
//                     item.m = {
//                         src: mediumSrc,
//                         w: parseInt(size[0], 10),
//                         h: parseInt(size[1], 10)
//                     };
//                 }
//                 // original image
//                 item.o = {
//                     src: item.src,
//                     w: item.w,
//                     h: item.h
//                 };

//                 items.push(item);
//             }

//             return items;
//         };

//         // find nearest parent element
//         var closest = function closest(el, fn) {
//             return el && (fn(el) ? el : closest(el.parentNode, fn));
//         };

//         var onThumbnailsClick = function (e) {
//             e = e || window.event;
//             e.preventDefault ? e.preventDefault() : e.returnValue = false;

//             var eTarget = e.target || e.srcElement;

//             var clickedListItem = closest(eTarget, function (el) {
//                 return el.tagName === 'A';
//             });

//             if (!clickedListItem) {
//                 return;
//             }

//             var clickedGallery = clickedListItem.parentNode;

//             var childNodes = clickedListItem.parentNode.childNodes,
//                     numChildNodes = childNodes.length,
//                     nodeIndex = 0,
//                     index;

//             for (var i = 0; i < numChildNodes; i++) {
//                 if (childNodes[i].nodeType !== 1) {
//                     continue;
//                 }

//                 if (childNodes[i] === clickedListItem) {
//                     index = nodeIndex;
//                     break;
//                 }
//                 nodeIndex++;
//             }

//             if (index >= 0) {
//                 openPhotoSwipe(index, clickedGallery);
//             }
//             return false;
//         };

//         var photoswipeParseHash = function () {
//             var hash = window.location.hash.substring(1),
//                     params = {};

//             if (hash.length < 5) { // pid=1
//                 return params;
//             }

//             var vars = hash.split('&');
//             for (var i = 0; i < vars.length; i++) {
//                 if (!vars[i]) {
//                     continue;
//                 }
//                 var pair = vars[i].split('=');
//                 if (pair.length < 2) {
//                     continue;
//                 }
//                 params[pair[0]] = pair[1];
//             }

//             if (params.gid) {
//                 params.gid = parseInt(params.gid, 10);
//             }

//             return params;
//         };

//         var openPhotoSwipe = function (index, galleryElement, disableAnimation, fromURL) {
//             var pswpElement = document.querySelectorAll('.pswp')[0],
//                     gallery,
//                     options,
//                     items;

//             items = parseThumbnailElements(galleryElement);

//             // define options (if needed)
//             options = {
//                 galleryUID: galleryElement.getAttribute('data-pswp-uid'),
//                 getThumbBoundsFn: function (index) {
//                     // See Options->getThumbBoundsFn section of docs for more info
//                     var thumbnail = items[index].el.children[0],
//                             pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
//                             rect = thumbnail.getBoundingClientRect();

//                     return {x: rect.left, y: rect.top + pageYScroll, w: rect.width};
//                 },
//                 addCaptionHTMLFn: function (item, captionEl, isFake) {
//                     if (!item.title) {
//                         captionEl.children[0].innerText = '';
//                         return false;
//                     }
//                     captionEl.children[0].innerHTML = item.title + '<br/><small>Photo: ' + item.author + '</small>';
//                     return true;
//                 }

//             };


//             if (fromURL) {
//                 if (options.galleryPIDs) {
//                     // parse real index when custom PIDs are used 
//                     // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
//                     for (var j = 0; j < items.length; j++) {
//                         if (items[j].pid == index) {
//                             options.index = j;
//                             break;
//                         }
//                     }
//                 } else {
//                     options.index = parseInt(index, 10) - 1;
//                 }
//             } else {
//                 options.index = parseInt(index, 10);
//             }

//             // exit if index not found
//             if (isNaN(options.index)) {
//                 return;
//             }



//             var radios = document.getElementsByName('gallery-style');
//             for (var i = 0, length = radios.length; i < length; i++) {
//                 if (radios[i].checked) {
//                     if (radios[i].id == 'radio-all-controls') {

//                     } else if (radios[i].id == 'radio-minimal-black') {
//                         options.mainClass = 'pswp--minimal--dark';
//                         options.barsSize = {top: 0, bottom: 0};
//                         options.captionEl = false;
//                         options.fullscreenEl = false;
//                         options.shareEl = false;
//                         options.bgOpacity = 0.85;
//                         options.tapToClose = true;
//                         options.tapToToggleControls = false;
//                     }
//                     break;
//                 }
//             }

//             if (disableAnimation) {
//                 options.showAnimationDuration = 0;
//             }

//             // Pass data to PhotoSwipe and initialize it
//             gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);

//             // see: http://photoswipe.com/documentation/responsive-images.html
//             var realViewportWidth,
//                     useLargeImages = false,
//                     firstResize = true,
//                     imageSrcWillChange;

//             gallery.listen('beforeResize', function () {

//                 var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
//                 dpiRatio = Math.min(dpiRatio, 2.5);
//                 realViewportWidth = gallery.viewportSize.x * dpiRatio;


//                 if (realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200) {
//                     if (!useLargeImages) {
//                         useLargeImages = true;
//                         imageSrcWillChange = true;
//                     }

//                 } else {
//                     if (useLargeImages) {
//                         useLargeImages = false;
//                         imageSrcWillChange = true;
//                     }
//                 }

//                 if (imageSrcWillChange && !firstResize) {
//                     gallery.invalidateCurrItems();
//                 }

//                 if (firstResize) {
//                     firstResize = false;
//                 }

//                 imageSrcWillChange = false;

//             });

//             gallery.listen('gettingData', function (index, item) {
//                 if (useLargeImages) {
//                     item.src = item.o.src;
//                     item.w = item.o.w;
//                     item.h = item.o.h;
//                 } else {
//                     item.src = item.m.src;
//                     item.w = item.m.w;
//                     item.h = item.m.h;
//                 }
//             });

//             gallery.init();
//         };

//         // select all gallery elements
//         var galleryElements = document.querySelectorAll(gallerySelector);
//         for (var i = 0, l = galleryElements.length; i < l; i++) {
//             galleryElements[i].setAttribute('data-pswp-uid', i + 1);
//             galleryElements[i].onclick = onThumbnailsClick;
//         }

//         // Parse URL and open gallery if it contains #&pid=3&gid=1
//         var hashData = photoswipeParseHash();
//         if (hashData.pid && hashData.gid) {
//             openPhotoSwipe(hashData.pid, galleryElements[ hashData.gid - 1 ], true, true);
//         }
//     };

//     initPhotoSwipeFromDOM('.for-mosaic');

// })();

// // Mosaic View Layout Javascript 
// function initHoverEffectForThumbView() {
//     jQuery('.thumb-elem, .grid-elem header').each(function(){
//       var thisElem = jQuery(this);
//       var getElemWidth = thisElem.width();
//       var getElemHeight = thisElem.height();
//       var centerX = getElemWidth/2;
//       var centerY = getElemHeight/2;

//       thisElem.mouseenter(function(){
//         thisElem.on('mousemove', function (e) {
//           var mouseX = e.pageX - thisElem.offset().left;
//                 var mouseY = e.pageY - thisElem.offset().top;
//                 var mouseDistX = (mouseX / centerX) * 100 - 100;
//                 var mouseDistY = (mouseY / centerY) * 100 - 100;
//                 thisElem.find('img.the-thumb').css({
//                   'left': -(mouseDistX/6.64) - 15 + "%",
//                     'top':  -(mouseDistY/6.64) - 15 + "%"
//                 });
//         });

//         thisElem.find('.thumb-elem-section:not(.no-feat-img)').fadeIn('fast');
//       }).mouseleave(function(){
//         thisElem.find('.thumb-elem-section:not(.no-feat-img)').fadeOut('fast');
//       });
//     });
// }


// function initSimpleHoverEffectForThumbView() {
//     jQuery('.thumb-elem, .grid-elem header').each(function(){
//       var thisElem = jQuery(this);
//       thisElem.mouseenter(function(){
//         thisElem.find('.thumb-elem-section:not(.no-feat-img)').fadeIn('fast');
//       }).mouseleave(function(){
//         thisElem.find('.thumb-elem-section:not(.no-feat-img)').fadeOut('fast');
//       });
//     });
// }

// jQuery(window).load(function() {
//   "use strict";

//     if (!hoverEffect.disable_hover_effect && jQuery(window).width() > 768) {
//      // jQuery('.thumb-elem, .grid-elem header').addClass('hovermove');
//         initHoverEffectForThumbView();
//     }else{
//         initSimpleHoverEffectForThumbView();
//     }
// });
// var hoverEffect = {"disable_hover_effect":""};

    // var widthOwl = $('.owl-item').width();
    // $(window).load(function(){
    //     $('.owl-item').height(widthOwl);
    // });

jQuery(document).ready(function($){
  var widthOwl = $('.apif-owl-demo .owl-item').width();
  $('.apif-owl-demo .owl-item').css({
    'height': widthOwl + 'px'
  });
  
  $('.ap_feeds').on('click','.apif-share-wrapper',function(e){
     $(this).toggleClass('apif-active-share');
  });
  $(".apif-share-wrap").click(function (event) {
    // show delete dialog for $(this).closest(".server")
    event.stopPropagation();
   });

  var $box = $(".apif-share-wrapper");
   $(window).on("click", function(event){    
          if ( 
            $box.has(event.target).length == 0 //checks if descendants of $box was clicked
            &&
            !$box.is(event.target) //checks if the $box itself was clicked
          ){
            // alert("you clicked outside the box");
            $box.removeClass('apif-active-share');
          } else {
          //  alert("you clicked inside the box");
          }
   });

  var widthroundimgslide = $('.ap_feeds-round_image .apif-round-image-block').width();
  $('.ap_feeds-round_image .apif-round-image-block .img-thumb').css({
    'height': widthroundimgslide + 'px'
  });

  $('.apif-masonry-box').each(function(){
    if(!$(this).parent().hasClass('ap-feeds-grid-layout2')){
      var customheight = $(this).find('.apif-featimg').width(); 
      $(this).find('.apif-featimg .example-image-link').css({
      // 'height': (customheight2 * 1.2) + 'px'
        'height': (customheight) + 'px'
       });
    } 
  });

  //round image layout
  // var $masonry_containers = jQuery('.apif-masonry-view');
// use imagesLoaded, instead of window.load
/*  $masonry_containers.each(function(){
    new WOW().init();
    var $selector = $(this);

     $(this).imagesLoaded( function() {
      $(this).isotope({
       itemSelector: '.apif-masonry-box',
      // masonry is default layoutMode, no need to specify it
       masonry: {
       columnWidth: '.apif-masonry-box',
      },
      // sortBy: 'random'
     });
     });

  });*/



});
