<?php
 global $apif_settings, $insta;
    $apif_settings = get_option( 'apif_settings' );
    // echo "<pre>";
    // print_r($apif_settings);
    // echo "</pre>";
    $username = !empty($apif_settings['username']) ? $apif_settings['username'] : ''; // your username
    $access_token = !empty($apif_settings['access_token']) ? $apif_settings['access_token'] : '';
    //$layout = $apif_settings['instagram_mosaic'];
    $image_likes_count = $attr['likes_count'];
    $image_comments_count = $attr['comments_count'];
    $show_comments = $attr['show_comments'];
    $count = $attr['image_counter']; // number of images to show
    $image_size =  $attr['image_resolution'];// $apif_settings['image_size']; //thumbnail low_resolution standard_resolution
    $feed_type = $attr['feed_type'];
    $rows = isset($attr['rows']) ? $attr['rows'] : 2;
    $cols = isset($attr['columns']) ? $attr['columns'] : 4;;
    require_once('instagram.php');
    $insta = new InstaWCD();
    $insta->username = $username;
    $insta->access_token = $access_token;



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ?>
    <?php

    switch ($feed_type) {
        case 'self':
            # code...
            // get the self user feed
            $ins_media = $insta->userFeed($count);
            break;
        
        case 'recent_media':
            //get the recent media uploaded by user
            $ins_media = $insta->userMedia($count);
            break;

        case 'likes':
            //for user likes feed
            $ins_media = $insta->userLiked($count);
            break;

        case 'popular_feeds':
            // for the instagram popular feeds
            $ins_media = $insta->instagramPopular($count);
            break;
        
        case 'any_user':
            //for any user
            $username  = 'namrataashrestha';
            $ins_media = $insta->anyUserFeed($username, $count);
            break;
        
        case 'tag':
            // for recent tag media
            $tag_name = 'oneplusx';
            $ins_media = $insta->getTagRecentMedia($tag_name, $count);
            break;

        default:
            // get the self user feed
            $ins_media = $insta->userFeed($count);
            break;
    }

?>

<script type="text/javascript">
	jQuery(document).ready(function($){

       /*
        Carousel initialization
        */
        $('.jcarousel')
            .jcarousel({
                // Options go here
            });

        /*
         Prev control initialization
         */
        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                // Options go here
                target: '-=1'
            });

        /*
         Next control initialization
         */
        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                // Options go here
                target: '+=1'
            });

        /*
         Pagination initialization
         */
        /*$('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .jcarouselPagination({
                // Options go here
            });*/

	});
</script>

   <div class="jcarousel-wrapper">
        <div class='jcarousel'>
    		<img class="jcarousel-loading-image" src="<?php echo APIF_IMAGE_DIR. '/ripple.gif'; ?>"/>
            <?php
            if(isset($ins_media['meta']['error_message'])){
                ?>
                   <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
                <?php
            }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>

            <?php
                foreach ($ins_media['data'] as $vm):
                    $img = $vm['images']['standard_resolution']['url'];
                    $image_url = APIF_IMAGE_DIR . '/image-square.png';
                    $image = $vm['images'][$image_size]['url'];
                    
                    $link = $vm["link"];
                    $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
                    ?>
                    <li><a href="<?php echo $link ?>" target="_blank"><img src="<?php echo esc_url($image); ?>" alt='<?php echo $vm['caption']['text']; ?>'></a></li>
                    <?php
                endforeach; ?>

            <?php }            
        ?>
        </div>
    </div>