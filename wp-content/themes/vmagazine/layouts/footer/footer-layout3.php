<?php
/**
* Footer layout 3
* @package VMagazine
* @since 1.1.5
*/


 
  $social_enable 				= get_theme_mod('vmagazine_buttom_footer_icons','hide');
  $vmagazine_description_text 	= get_theme_mod('vmagazine_description_text');
  $vmagazine_footer_icon_title 	= get_theme_mod('vmagazine_footer_icon_title','Follow Us Today!' );
?>
<div class="buttom-footer footer-4">
	<div class="vmagazine-container">
		<?php  if( $vmagazine_description_text || $social_enable == 'show' ){ ?>
			<div class="middle-footer-wrap">
				<?php if( $vmagazine_footer_icon_title ){ ?>
					<h3 class="icon-title"><?php echo esc_html($vmagazine_footer_icon_title); ?></h3>
				<?php } ?>
			    <?php if( $social_enable == 'show' ): ?>
			    <div class="footer-social">
					<?php vmagazine_social_icons();?>
				</div>
				<?php endif; ?>

				<?php if( $vmagazine_description_text ): ?>
				    <div class="footer-desc">
				    	<?php echo wp_kses_post($vmagazine_description_text); ?>
				    </div>
			    <?php endif; ?>
			</div>
		<?php } ?>
			
	</div>

	<div class="footer-btm-wrap">
				
		<div class="footer-credit">
        	<?php vmagazine_credit();?>
        </div>
	            
	</div>

</div>
