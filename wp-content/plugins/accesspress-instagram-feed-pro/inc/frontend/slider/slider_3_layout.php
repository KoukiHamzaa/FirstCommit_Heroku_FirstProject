<section id="apif-shortcode-wrapper">
<!-- apif-large apif-medium apif-small -->
<?php 
//Jcarousel Slider Layout
if($image_size == 'standard_resolution'){
    $class_name = 'large';

}else if($image_size == 'low_resolution'){
    $class_name = 'medium';
}

?>

<div  class='ap_slider_wrapper apif-slider-3-view apif-<?php if(isset($class_name)){ echo $class_name; }else{ echo 'small'; } ?>'>
<div class="ap_sliders" id="ins-container">
<?php
    if(isset($ins_media['meta']['error_message'])){
        ?>
           <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
        <?php
    }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
    <ul class='apif-slider clearfix'>
    <?php
        foreach ($ins_media['data'] as $vm):
          $check = 1;
          if($feed_type == "personal_hashtag"){
          $alltags = $vm['tags'];
          if(isset($alltags) && !empty($alltags) && in_array($personal_hashtag_name,$alltags)){
          $check = 1;
          }else{
          $check = 0;
          }
          }else{
          $alltags = '';
          $check = 1;
          }

          if($check == 1){
            $img = $vm['images']['standard_resolution']['url'];
            $image_url = APIF_IMAGE_DIR . '/image-square.png';
            include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
            $link = $vm["link"];
            $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
            ?>
                    <li>
                        <?php if(isset($apif_settings['enable_lightbox'])){
                                    if($apif_settings['lightbox_layout'] == 'nivo_lightbox'){
                                ?>
                                    <a href='<?php echo esc_url($image); ?>'  title="<?php echo $vm['caption']['text']; ?>" class="apif-swipebox" data-lightbox-gallery="gallery1"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                    <!-- <a href='<?php echo esc_url($image); ?>'  title="<?php echo $vm['caption']['text']; ?>" class="apif-swipebox hoverlay-link" data-lightbox-gallery="gallery1"> hello </a> -->
                            <?php
                                    }else if($apif_settings['lightbox_layout'] == 'preety_photo'){ ?>
                                    <a href='<?php echo esc_url($image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo $vm['caption']['text']; ?>" class="hoverlay-link"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                            <?php
                                    }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { ?>
                                        <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                      <?php
                                    }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ ?>
                                    <!-- for swipe box -->
                                    <a href='<?php echo esc_url($image); ?>' class="hoverlay-link apif-swipebox" title='<?php echo $vm['caption']['text']; ?>'><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                    <!-- for swipe box ends -->
                                    <?php
                                    }elseif($apif_settings['lightbox_layout'] == 'classic'){ ?>
                                    <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                    <?php
                                    }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ ?>

                                    <?php if($vm['type'] == 'video'){
                                            $image_link = $vm['videos']['low_bandwidth']['url'];
                                        }else{
                                            $image_link = $image;
                                        }
                                        ?>
                                        <a class="hoverlay-link apif-venobox" href="<?php echo $image_link; ?>" title='<?php echo $vm['caption']['text']; ?>' data-gall="apif-Gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                    <?php
                                    }
                                     }else{ ?> 
                                        <a href="<?php echo esc_url($image); ?>" title='<?php echo $vm['caption']['text']; ?>' data-gall="apif-Gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>"/></a>
                                     <?php } ?>
                        <!-- <a href="<?php echo esc_url($image); ?>" target="_blank"><img class="the-thumb" src="<?php echo esc_url($image); ?>" ></a> -->
                    </li>
            <?php
        }
        endforeach;
        ?>
    </ul>
    <?php } ?>
</div>
</div>
</section>
<style>

.pgwSlider .ps-current .ps-prev{ background: <?php if(isset($slider_3_layout_show_next_previous_color)){ echo $slider_3_layout_show_next_previous_color; }else{ echo 'fc0'; } ?> !important;}
.pgwSlider.narrow .ps-current .ps-next { background: <?php if(isset($slider_3_layout_show_next_previous_color)){ echo $slider_3_layout_show_next_previous_color; }else{ echo 'fc0'; } ?> !important;}
</style>

<script type="text/javascript">

// wow and animate css effect
// Masonry Setting for instagram
jQuery(document).ready( function($) {

$('.apif-slider').pgwSlider({
    // maxHeight : 500,
    intervalDuration : 4000,
    adaptiveHeight : true,
    displayControls: true,
    displayList : false,
    listPosition : 'right',
    verticalCentering : true,
});


});

</script>
<?php
$join_js_array = array();
wp_enqueue_style('apif-pgw-slider');
wp_enqueue_script('apif-pgwslider-core');
$dependencies = array('jquery', 'apif-pgwslider-core');

array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);
// wp_localize_script( 'apif-frontend-js', 'frontend_owl_carousel_object', array('owl_carousel_enable' => 'true') );
?>