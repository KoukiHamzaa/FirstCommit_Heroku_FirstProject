<?php
defined('ABSPATH') or die('No scripts for you');
$json_data = get_the_author_meta('uab_linkedin_profile_data',$author_id);
$linkedin_profile_data = json_decode($json_data);
$month = array('1'=>'Jan','2'=>'Feb','3'=>'Mar','4'=>'Apr','5'=>'May','6'=>'Jun','7'=>'Jul','8'=>'Aug','9'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
?>
<div class="uab-linkedin-profile-wrapper">
	<?php
		// $this->print_array($linkedin_profile_data);
		// $this->print_array($uab_profile_data[$key]);
	if (in_array($uab_template_type, array('uab-template-4','uab-template-5','uab-template-12','uab-template-6'))): ?>
		<div class="uab-linkedin-header uab-tab-header"><?php esc_attr_e('Linkedin','ultimate-author-box') ?></div>
	<?php endif ?>
	<div class="uab-linkedin-basic">
		<div class="uab-linkedin-profile-picture" data-code="<?=$linkedin_profile_data->location->country->code ?>">
			<img src="<?php echo $linkedin_profile_data->pictureUrl ?>" class="uab-linkedin-profile-img">
			<img class="uab_country_logo" src="https://www.countryflags.io/<?=$linkedin_profile_data->location->country->code ?>/flat/16.png" onerror="switch_image(this)">
		</div>
		<div class="uab-linkedin-general">
			<div class="uab-linkedin-profile-header">
				<div class="uab-linkedin-profile-name">
					<a href="<?php echo $linkedin_profile_data->publicProfileUrl ?>"><span><?php echo $linkedin_profile_data->firstName . ' ' . $linkedin_profile_data->lastName; ?></span></a>
				</div>
				<div class="uab-linkedin-profile-headline">
					<?php echo $linkedin_profile_data->headline ?>
				</div>
			</div>
			<?php if (!isset($uab_profile_data[$key]['uab_header_hide'])): ?>
				<div class="uab-linkedin-profile-summary">
					<?php echo $linkedin_profile_data->summary ?>
				</div>
			<?php endif ?>
			<?php if (!isset($uab_profile_data[$key]['uab_company_details_hide'])): ?>
				<div class="uab-linkedin-company-list">
					<?php
					$jobs = $linkedin_profile_data->positions->values;
					if (intval($linkedin_profile_data->positions->_total) > 0) :?>
						<label><?php esc_attr_e('Experiences','ultimate-author-box') ?></label>
						<?php
						foreach ($jobs as $index => $company) :
						?>
						<div class="uab-linkedin-company uab-linkedin-company-id-<?=intval($company->company->id) ?>">
							<a href="https://linkedin.com/company/<?php echo intval($company->company->id) ?>"><span class="uab-linkedin-company-name"><?=esc_attr($company->company->name) ?></span></a>

							<?php if (isset($company->isCurrent) && ($company->isCurrent == 1)): ?>
								<span class="uab-work-experience-period uab-profile-current-company"><?php esc_attr_e('Currently Working','ultimate-author-box') ?></span>
							<?php endif ?>
							
							<?php
							if (isset($company->endDate) && is_object($company->endDate)) {
								$working_yr = intval($company->endDate->year) - intval($company->startDate->year);
								if ($working_yr == 0) {
									$working_month = intval($company->endDate->month) - intval($company->startDate->month);
								}
							}
							?>

							<?php if (isset($company->endDate)): ?>
								<span class="uab-work-experience-period uab-profile-end-date"><?=($working_yr == 0)?esc_attr($working_month . ' months'):(($working_yr == 1)?($working_yr . ' year'):($working_yr . ' years')) ?></span>
							<?php endif ?>

							<span class="uab-linkedin-company-industry"><?=esc_attr($company->company->industry) ?></span>
							<span class="uab-linkedin-company-location"><?=esc_attr($company->location->name) ?></span>
							<div class="uab-profile-start-date">
								<?php if (isset($company->isCurrent) && ($company->isCurrent == 1)): ?>
									<span><?php esc_attr_e('Since','ultimate-author-box') ?></span>
								<?php else: ?>
									<span><?php esc_attr_e('Worked From','ultimate-author-box') ?></span>
								<?php endif ?>
								<span><?=esc_attr($month[intval($company->startDate->month)]) ?></span>,
								<span><?=esc_attr($company->startDate->year) ?></span>
							</div>
						</div>

						<?php endforeach ?>
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>