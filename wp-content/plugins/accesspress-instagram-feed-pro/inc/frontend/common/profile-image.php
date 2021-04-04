<div class='profile-image'>
    <?php if(isset($data_profile_image) && $data_profile_image !=''){ ?>
    <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>'/>
    <?php } ?>
</div>