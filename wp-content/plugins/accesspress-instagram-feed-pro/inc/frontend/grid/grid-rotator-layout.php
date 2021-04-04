<?php
$rows = (isset($grid_rotator_layout_no_of_rows) && $grid_rotator_layout_no_of_rows !='')? $grid_rotator_layout_no_of_rows : 2;
$cols = (isset($grid_rotator_layout_no_of_columns) && $grid_rotator_layout_no_of_columns !='') ? $grid_rotator_layout_no_of_columns : 6;
if(isset($grid_rotator_layout_steps) && $grid_rotator_layout_steps != ''){
 if($grid_rotator_layout_steps == "random"){
    $steps = "'random'";
 }else{
    $steps = $grid_rotator_layout_steps;
 }
}else{
   $steps = 3;
}
$interval = (isset($grid_rotator_layout_interval) && $grid_rotator_layout_interval !='')? $grid_rotator_layout_interval : 2000;
$animation = (isset($grid_rotator_layout_animation) && $grid_rotator_layout_animation !='')? $grid_rotator_layout_animation : 'fadeInOut';
$animation_speed = (isset($grid_rotator_layout_animation_speed) && $grid_rotator_layout_animation_speed !='' )? $grid_rotator_layout_animation_speed : '800';
$rand_no = rand();
 ?>
<div class="ri-grid apif-ri-grid apif-ri-grid-<?php echo $rand_no; ?> clearfix" id="apif-ri-grid-<?php echo $rand_no; ?>">
 <input type="hidden" class="apif-grid-rotator-val" data-rand="<?php echo $rand_no;?>" data-rows="<?php echo $rows;?>" data-rows="<?php echo $rows;?>" data-rows="<?php echo $rows;?>" data-cols="<?php echo $cols;?>" data-steps="<?php echo $steps;?>" data-interval="<?php echo $interval;?>" data-animation="<?php echo $animation;?>" data-animationspeed="<?php echo $animation_speed;?>"/>
<img class="ri-loading-image" src="<?php echo APIF_IMAGE_DIR. '/ripple.gif'; ?>"/>
    <?php
        if(isset($ins_media['meta']['error_message'])){
            ?>
               <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
            <?php
        }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
        <ul>
        <?php
        $data_profile_image = IF_Pro_Class::get_Profile_Image($ins_media['data']);
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
              $check = 1;
            }
           if($check == 1){
       	        $permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
                $img = $vm['images']['standard_resolution']['url'];
                $image_url = APIF_IMAGE_DIR . '/image-square.png';
                include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
                $link = $vm["link"];
                $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
                $image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
               ?>
                <li>
                  <a href="<?php echo $link ?>" target="_blank">
                    <img src="<?php echo esc_url($image); ?>" alt='<?php echo strip_tags(substr($vm['caption']['text'], 0, 20)); ?>'>
                  </a>
                  </li>
                <?php
             }
            endforeach; ?>
</ul>
<?php } ?>
</div>
<?php
wp_enqueue_script('apif-isotope-pkgd-min-js');
wp_enqueue_script('apif-imagesloaded-min-js');
wp_enqueue_script('apif-isotope-packery');
wp_enqueue_style( 'apif-gridrotator' );
wp_dequeue_script( 'apif-nivoslider-core' ); 
wp_dequeue_style('apif-nivo-slider');
wp_enqueue_script( 'apif-gridrotator' );
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
$dependencies = array('jquery', 'apif-gridrotator','apif-bxslider-core','apif-isotope-pkgd-min-js','apif-imagesloaded-min-js','apif-isotope-packery');
wp_enqueue_script('apif-frontend-js', $dependencies);