<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>

<div class="uab-author-profile-pic">
	<?php
	if(isset($uab_co_author_image_shape)){
		switch($uab_co_author_image_shape){
			case 'uab_is_circle':
			$uap_profile_image_shape = 'uap-co-author-image-circle';
			break;
			default:
			$uap_profile_image_shape = 'uap-co-author-image-square';
		}
	}else{
		$uap_profile_image_shape = 'uap-co-author-image-square';
	}

		?>
	<div class="uap-co-author-image <?php esc_attr_e($uap_profile_image_shape); ?>">
		<?php
		$uab_select_image_option = isset($uab_co_author_image_type)?$uab_co_author_image_type:'uab_gravatar';
		switch($uab_select_image_option){
			case 'uab_facebook':
			if(!empty($uab_co_author_facebook)){
				?>
				<!--Facebook Image-->
				<img src="//graph.facebook.com/<?php esc_attr_e($uab_co_author_facebook) ;?>/picture?width=200"> 
				<?php
			}
			else{
				_e(get_avatar($author_id,200));
			}
			break;
			case 'uab_instagram':
			if(!empty($uab_co_author_instagram)){
				?>
				<!--Instagram Image-->
				<img src="https://instagram.com/p/<?php esc_attr_e($uab_co_author_instagram) ;?>/media/" width=200>
				<?php
			}
			else{
				_e(get_avatar($author_id,200));
			}
			break;
			case 'uab_twitter':
			if(!empty($uab_co_author_twitter)){
				?>
				<img src="https://twitter.com/<?php esc_attr_e($uab_co_author_twitter) ;?>/profile_image?size=original" width=200>
				<?php
			}
			else{
				_e(get_avatar($author_id,200));
			}
			break;
			case 'uab_upload_image':
			if(!empty($uab_co_author_custom_image)){
				?>
				<!--Custom Image-->
				<img src="<?php esc_attr_e($uab_co_author_custom_image);?>" width="200">
				<?php
			}
			else{
				_e(get_avatar($author_id,200));
			}
			break;
			default:
			_e(get_avatar($author_id,200));
		}
		?>
	</div>
</div>