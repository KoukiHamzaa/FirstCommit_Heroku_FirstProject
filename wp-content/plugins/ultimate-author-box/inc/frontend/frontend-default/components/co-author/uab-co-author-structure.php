<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="uab-co-author-individual uab-co-author-<?php echo intval($co_author_id) ?>">

		<?php if ($uab_template_type == 'uab-template-4'){
			// include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-social.php');
		} ?>

		<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-component-image.php'); ?>

		<?php
			// if (($uab_template_type == 'uab-template-2') || ($uab_template_type == 'uab-template-5')){
			// 	include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-social.php');
			// }
		?>
			
		<div class="uab-co-author-description">

			<div class="uab-co-author-display-name">
				<a href="<?=($type == 'author')?get_author_posts_url($co_author_id):esc_attr('javascript:void()') ?>"><?=$uab_co_author_name ?></a>
			</div>

			<div class="uab-co-author-company">
				
				<div class="uab-co-author-work">

				<?php if (!empty($co_author_designation)): ?><span class="uab-co-author-company-designation"><?=$co_author_designation ?></span><?php endif;

				if (!empty($co_author_company)):
					if (!empty($co_author_designation) && !empty($co_author_company)):
						if (!empty($co_author_company_separator)):
					?><span><?=($co_author_company_separator !== ',')?(' ' . $co_author_company_separator):$co_author_company_separator ?></span>
					<?php else: ?><span><?php echo esc_attr(',') ?></span><?php endif;
					endif;

				?><span class="uab-co-author-company-link">
						<?php if (!empty($co_author_company_url)): ?>
							<a href="<?=$co_author_company_url ?>"><?=$co_author_company ?></a>
						<?php else: ?>
							<span><?=$co_author_company ?></span>
						<?php endif ?>
					</span>
				<?php endif ?>
				</div>

				<?php if ($type == 'author'): ?>
					<div class="uab-num-post-count"><?php echo _e('Total Posts: ','ultimate-author-box') . $numOfPost ?></div>
				<?php else: ?>
					<div class="uab-num-post-count"><?php echo _e('Total Posts: ','ultimate-author-box') . intval(0) ?></div>
				<?php endif ?>
				
				<?php
				// if (($uab_template_type != 'uab-template-2') && ($uab_template_type != 'uab-template-4') && ($uab_template_type != 'uab-template-5')) {
					include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-social.php');
				// }
				?>
				

			</div>

		</div>

	</div>