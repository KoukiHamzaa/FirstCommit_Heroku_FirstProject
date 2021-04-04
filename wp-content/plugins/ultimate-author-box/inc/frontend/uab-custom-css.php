<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
if(isset($uab_profile_data[1]['uab_personal_theme'])=='on'){
	$uab_primary_color = $uab_profile_data[1]['uab_primary_color'];
	$uab_seconday_color = $uab_profile_data[1]['uab_secondary_color'];
	$uab_tertiary_color = $uab_profile_data[1]['uab_tertiary_color'];
	$uab_backgroud_image = $uab_profile_data[1]['custom_image_background'];
}else{
	$uab_primary_color = $uab_general_settings['uab_primary_color'];
	$uab_seconday_color = $uab_general_settings['uab_secondary_color'];
	$uab_tertiary_color = $uab_general_settings['uab_tertiary_color'];
	$uab_backgroud_image = $uab_general_settings['custom_image_background'];
}

?>
<style>

/*Tertiary Color*/
.uab-template-7.uab-custom-template .uab-display-name a:hover,
.uab-template-7.uab-custom-template .uab-rss-feed-title-wrapper a:hover, 
.uab-template-7.uab-custom-template .uab-company-info a:hover, 
.uab-template-7.uab-custom-template .uab-user-website a:hover, 
.uab-template-7.uab-custom-template .uab-user-email a:hover, 
.uab-template-7.uab-custom-template .uab-user-phone a:hover,
.uab-template-7.uab-custom-template .uab-user-website:before, 
.uab-template-7.uab-custom-template .uab-user-email:before, 
.uab-template-7.uab-custom-template .uab-user-phone:before,
.uab-template-7.uab-custom-template .uab-post-title-wrapper a:hover, 
.uab-template-7.uab-custom-template .uap-post-author-name a:hover,
.uab-template-7.uab-custom-template  .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-7.uab-custom-template .uab-social-content a,
.uab-template-7 .uab-num-post-count,
.uab-template-7 .uab-linkedin-basic,
.uab-template-7 .uab-short-info,
.uab-template-7 .uab-short-info a,
.uab-template-7 .uab-short-info a:hover,
.uab-template-7 .uab-linkedin-profile-wrapper .uab-linkedin-profile-summary
,.uab-template-7 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-7 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-7 .uab-linkedin-general .uab-linkedin-profile-name a:hover
{
	color: <?php echo $uab_tertiary_color; ?>;
}

.uab-template-7.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-16.uab-custom-template .uab-tab-content
{
	background: <?php echo $uab_tertiary_color; ?>;
}

.uab-template-16.uab-custom-template .uab-tab-content{
	-webkit-box-shadow: 7px 7px 0 <?php echo $uab_tertiary_color; ?>;
	box-shadow: 7px 7px 0 <?php echo $uab_tertiary_color; ?>;
}

.uab-template-16.uab-custom-template .uab-field-wrap input[type=text], 
.uab-template-16.uab-custom-template .uab-field-wrap input[type=email], 
.uab-template-16.uab-custom-template .uab-field-wrap input[type=tel], 
.uab-template-16.uab-custom-template .uab-field-wrap textarea.uab-message-field{
	background:<?php echo $uab_primary_color; ?>;
}

/*Seconday Colors*/
.uab-template-3.uab-custom-template .uab-tabs li,
.uab-template-3.uab-custom-template .uab-defaut-tab-wrapper ~ .uab-social-icons,
.uab-template-5.uab-custom-template .uab-tabs li,
.uab-template-7.uab-custom-template .uab-tabs li,
.uab-template-7.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-11.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-13.uab-custom-template .uab-social-icons ul li a,
.uab-template-14.uab-custom-template .uab-tab-content,
.uab-template-16.uab-custom-template .uab-tabs li
{
	background: <?php echo $uab_seconday_color; ?>;
}

.uab-template-7.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-11.uab-custom-template .uab-contact-form-submit input[type=submit]:hover
{
	background: <?php echo $uab_seconday_color; ?>;
	opacity: 0.7;
}
.uab-template-3.uab-custom-template .uab-tab-content .uab-defaut-tab
{
	border:3px solid <?php echo $uab_seconday_color; ?>;
}

.uab-template-11.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-content a,
.uab-template-11.uab-custom-template .uab-social-temp-wrapper-3 .uab-title-social-wrapper a:hover, 
.uab-template-11.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-wrapper-second  .uab-social-username-wrapper a:hover, 
.uab-template-11.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-follow a:hover,
.uab-template-11.uab-custom-template .uab-rss-feed-title-wrapper a,
.uab-template-13.uab-custom-template .uab-display-name a:hover 
{
	color: <?php echo $uab_seconday_color; ?>;
}

.uab-template-13.uab-custom-template .uap-profile-image.uap-profile-image-circle, 
.uab-template-13.uab-custom-template .uap-profile-image.uap-profile-image-square img
{
	border: 4px solid rgba(255,255,255,0.2);
}


/*Primary Colors*/
.uab-template-1.uab-custom-template .uab-tabs li,
.uab-template-1.uab-custom-template .uab-contact-inner .uab-contact-label,
.uab-template-1.uab-custom-template .uab-social-icons ul li a:hover i,
.uab-template-1.uab-custom-template .uab-social-icons ul li a:hover svg,
.uab-template-1.uab-custom-template .uab-display-name a:hover,
.uab-template-1.uab-custom-template .uab-short-contact .uab-user-website a:hover,
.uab-template-1.uab-custom-template .uab-user-email a:hover,
.uab-template-1.uab-custom-template .uab-user-phone a:hover,
.uab-template-1.uab-custom-template .uab-template-1.uab-custom-template .uab-post-title-wrapper a:hover,
.uab-template-1.uab-custom-template .uab-post-meta-info .uap-post-author-name a:hover,
.uab-template-1.uab-custom-template .uab-social-content a,
.uab-template-1 label.uab-co-author-header,
.uab-template-1 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-1 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-1 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-7.uab-custom-template .uab-social-content a,
.uab-template-1.uab-custom-template  .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover, 
.uab-template-7.uab-custom-template  .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-1.uab-custom-template .uap-success-message,
.uab-template-1.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-2.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-3.uab-custom-template .uab-rss-feed-title-wrapper a,
.uab-template-4.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-5.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-6.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-8.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-9.uab-custom-template .uab-rss-feed-title-wrapper a,
.uab-template-10.uab-custom-template .uab-rss-feed-title-wrapper a,
.uab-template-12.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-13.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-14.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-15.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-16.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-17.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-18.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-19.uab-custom-template .uab-rss-feed-title-wrapper a:hover,
.uab-template-2.uab-custom-template .uab-tabs li,
.uab-template-2.uab-custom-template .uab-content-header .uab-display-name a:hover,
.uab-template-2.uab-custom-template .uab-content-header .uab-company-info a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-website a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-email a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-phone a:hover,
.uab-template-2.uab-custom-template .uab-content-header .uab-display-name a:hover,
.uab-template-2.uab-custom-template .uab-content-header .uab-company-info a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-website a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-email a:hover,
.uab-template-2.uab-custom-template .uab-short-contact .uab-user-phone a:hover,
.uab-template-2.uab-custom-template .uab-social-content a,
.uab-template-2.uab-custom-template  .uab-social-wrapper-second .uab-title-social-wrapper a:hover,
.uab-template-2.uab-custom-template  .uab-social-wrapper-second  .uab-social-username-wrapper a:hover,
.uab-template-2.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-2.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-2.uab-custom-template .uap-success-message,
.uab-template-2 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-2 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-2 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-3.uab-custom-template .uab-display-name a,
.uab-template-3.uab-custom-template .uab-short-contact a:hover, 
.uab-template-3.uab-custom-template .uab-company-info >a:hover, 
.uab-template-3.uab-custom-template .uab-display-name a:hover, 
.uab-template-3.uab-custom-template .uab-social-icons ul li a:hover i,
.uab-template-3.uab-custom-template .uab-social-icons ul li a:hover svg,
.uab-template-3.uab-custom-template .uab-tabs li,
.uab-template-3.uab-custom-template .uab-post-title-wrapper a,
.uab-template-3.uab-custom-template .uab-social-content a,
.uab-template-3.uab-custom-template  .uab-social-wrapper-second .uab-title-social-wrapper a:hover,
.uab-template-3.uab-custom-template  .uab-social-wrapper-second  .uab-social-username-wrapper a:hover,
.uab-template-3 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-3 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-3 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-4.uab-custom-template .uab-user-website a:hover, 
.uab-template-4.uab-custom-template .uab-front-content .uab-company-info a:hover, 
.uab-template-4.uab-custom-template .uab-front-content .uab-display-name a:hover, 
.uab-template-4.uab-custom-template .uab-user-email a:hover, 
.uab-template-4.uab-custom-template .uab-user-phone a:hover,
.uab-template-16.uab-custom-template .uab-display-name a,
.uab-template-4.uab-custom-template .uab-front-content .uab-display-name a,
.uab-template-4.uab-custom-template .uab-post-title-wrapper a:hover,
.uab-template-4.uab-custom-template .uab-social-content a,
.uab-template-4.uab-custom-template  .uab-social-wrapper-second .uab-title-social-wrapper a:hover, 
.uab-template-4.uab-custom-template  .uab-social-wrapper-second  .uab-social-username-wrapper a:hover,
.uab-template-4 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-4 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-4 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-4 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-4 span.uab-co-author-company-link a:hover,
.uab-template-4 .uab-front-content .uab-tab-header::after,
.uab-template-5.uab-custom-template .uab-company-info a:hover, 
.uab-template-5.uab-custom-template .uab-display-name a:hover, 
.uab-template-5.uab-custom-template .uab-user-website a:hover, 
.uab-template-5.uab-custom-template .uab-user-email a:hover, 
.uab-template-5.uab-custom-template .uab-user-phone a:hover,
.uab-template-5.uab-custom-template .uab-post-title-wrapper a:hover, 
.uab-template-5.uab-custom-template .uab-post-meta-info .uap-post-author-name a:hover,
.uab-template-5.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-5.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-5 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-5 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-5 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-6.uab-custom-template .uab-user-website a:hover, 
.uab-template-6.uab-custom-template .uab-display-name a:hover, 
.uab-template-6.uab-custom-template .uab-company-info a:hover, 
.uab-template-6.uab-custom-template .uab-user-email a:hover, 
.uab-template-6.uab-custom-template .uab-user-phone a:hover,
.uab-template-6.uab-custom-template .uab-user-website a:before, 
.uab-template-6.uab-custom-template .uab-user-email a:before, 
.uab-template-6.uab-custom-template .uab-user-phone a:before,
.uab-template-6.uab-custom-template .uab-social-content a,
.uab-template-6.uab-custom-template  .uab-social-wrapper-second .uab-title-social-wrapper a:hover, 
.uab-template-6.uab-custom-template  .uab-social-wrapper-second  .uab-social-username-wrapper a:hover,
.uab-template-6.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-6.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-6.uab-custom-template .uap-success-message,
.uab-template-6 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-6 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-6 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-8.uab-custom-template .uab-display-name a,
.uab-template-8.uab-custom-template .uab-post-title-wrapper a,
.uab-template-8.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-8.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-8.uab-custom-template .uab-company-info a:hover,
.uab-template-8.uab-custom-template .uap-success-message,
.uab-template-8 label.uab-co-author-header,
.uab-template-8 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-8 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-8 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-8 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-8 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-8 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-9.uab-custom-template .uab-display-name a,
.uab-template-9.uab-custom-template .uab-display-name a:hover, 
.uab-template-9.uab-custom-template .uab-company-info a:hover, 
.uab-template-9.uab-custom-template .uab-user-website a:hover, 
.uab-template-9.uab-custom-template .uab-user-email a:hover, 
.uab-template-9.uab-custom-template .uab-user-phone a:hover,
.uab-template-9.uab-custom-template .uab-user-website a:before, 
.uab-template-9.uab-custom-template .uab-user-email a:before, 
.uab-template-9.uab-custom-template .uab-user-phone a:before,
.uab-template-9.uab-custom-template .uab-social-content a,
.uab-template-9.uab-custom-template  .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-9.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-9.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-9.uab-custom-template .uap-success-message,
.uab-template-9 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-9 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-9 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-9 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-9 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-9 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-9 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-9 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-9 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-10.uab-custom-template .uab-user-website a:hover, 
.uab-template-10.uab-custom-template .uab-user-email a:hover, 
.uab-template-10.uab-custom-template .uab-user-phone a:hover,
.uab-template-10.uab-custom-template .uab-user-website a:before, 
.uab-template-10.uab-custom-template .uab-user-email a:before, 
.uab-template-10.uab-custom-template .uab-user-phone a:before,
.uab-template-10.uab-custom-template .uab-social-content a,
.uab-template-10.uab-custom-template  .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-10.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-10.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-10 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-10 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-10 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-12.uab-custom-template .uab-display-name a,
.uab-template-12.uab-custom-template .uab-display-name a:hover, 
.uab-template-12.uab-custom-template.uab-custom-template .uab-company-info a:hover, 
.uab-template-12.uab-custom-template .uab-user-website a:hover,
.uab-template-12.uab-custom-template .uab-user-website a:before, 
.uab-template-12.uab-custom-template .uab-user-email:before, 
.uab-template-12.uab-custom-template .uab-user-phone:before,
.uab-template-12.uab-custom-template .uap-post-author-name:before, 
.uab-template-12.uab-custom-template .uap-post-date:before,
.uab-template-12.uab-custom-template .uab-social-content a,
.uab-template-12.uab-custom-template .uab-social-wrapper-second .uab-title-social-wrapper a:hover, 
.uab-template-12.uab-custom-template .uab-social-wrapper-second  .uab-social-username-wrapper a:hover,
.uab-template-12.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-12.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-12.uab-custom-template .uab-user-email a:hover,
.uab-template-12.uab-custom-template .uab-user-email a:before,
.uab-template-12.uab-custom-template .uab-user-phone a:hover,
.uab-template-12.uab-custom-template .uab-user-phone a:before,
.uab-template-12.uab-custom-template .uap-success-message,
.uab-template-12 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-12 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-12 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-12 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-12 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-12 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-13.uab-custom-template .uab-display-name a,
.uab-template-13.uab-custom-template .uab-company-info a:hover, 
.uab-template-13.uab-custom-template .uab-user-website a:hover, 
.uab-template-13.uab-custom-template .uab-user-email a:hover, 
.uab-template-13.uab-custom-template .uab-user-phone a:hover,
.uab-template-13.uab-custom-template .uab-user-website a:before, 
.uab-template-13.uab-custom-template .uab-user-email a:before, 
.uab-template-13.uab-custom-template .uab-user-phone a:before,
.uab-template-13.uab-custom-template .uab-post-title-wrapper a:hover, 
.uab-template-13.uab-custom-template .uap-post-author-name a:hover,
.uab-template-13.uab-custom-template .uab-social-content a,
.uab-template-13.uab-custom-template .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-13.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-13.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-13 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-13 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-13 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-13.uab-custom-template .uap-success-message,
.uab-template-14.uab-custom-template .uab-display-name a,
.uab-template-14.uab-custom-template .uab-company-info a, 
.uab-template-14.uab-custom-template .uab-company-info span,
.uab-template-14.uab-custom-template .uab-user-website a:hover, 
.uab-template-14.uab-custom-template .uab-user-email a:hover, 
.uab-template-14.uab-custom-template .uab-user-phone a:hover,
.uab-template-14.uab-custom-template .uab-post-title-wrapper a:hover,
.uab-template-14.uab-custom-template .uap-post-date:before,
.uab-template-14.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-14.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-14 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-14 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-14 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-14 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-14 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-14 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-15.uab-custom-template .uab-tabs li,
.uab-template-15.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-template-15.uab-custom-template .uap-success-message,
.uab-template-16.uab-custom-template .uab-display-name a:hover, 
.uab-template-16.uab-custom-template .uab-company-info a:hover, 
.uab-template-16.uab-custom-template .uab-user-website a:hover, 
.uab-template-16.uab-custom-template .uab-user-email a:hover, 
.uab-template-16.uab-custom-template .uab-user-phone a:hover,
.uab-template-16.uab-custom-template .uab-social-icons li a,
.uab-template-16.uab-custom-template .uab-post-title-wrapper a,
.uab-template-16.uab-custom-template .uap-success-message,
.uab-template-16 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-16 .uab-linkedin-general .uab-linkedin-profile-name a,
.uab-template-16 .uab-linkedin-company-list span.uab-linkedin-company-name,
.uab-template-16 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-16 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-16 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-17.uab-custom-template .uab-user-website a, 
.uab-template-17.uab-custom-template .uab-user-email a, 
.uab-template-17.uab-custom-template .uab-user-phone a,
.uab-template-17.uab-custom-template .uap-post-author-name a, 
.uab-template-17.uab-custom-template .uap-post-date,
.uab-template-17.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-17.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-17.uab-custom-template .uab-tabs li,
.uab-template-17.uab-custom-template .uab-post-title-wrapper a:hover,
.uab-template-17.uab-custom-template .uap-success-message,
.uab-template-17 .uab-co-author-individual .uab-co-author-display-name a,
.uab-template-17 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-17 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-17 .uab-linkedin-general .uab-linkedin-profile-name a:hover,
.uab-template-17 .uab-company-info a:hover,
.uab-template-17 .uab-display-name a:hover, .uab-template-17 .uab-user-website a:hover,
.uab-template-17 .uab-user-email a:hover, .uab-template-17 .uab-user-phone a:hover,
.uab-template-17 label.uab-co-author-header,
.uab-template-18.uab-custom-template .uab-company-info a:hover, 
.uab-template-18.uab-custom-template .uab-user-website a:hover,
.uab-template-18.uab-custom-template .uab-user-website a:before, 
.uab-template-18.uab-custom-template .uab-user-email a:before, 
.uab-template-18.uab-custom-template .uab-user-phone a:before,
.uab-template-18.uab-custom-template .uab-post-title-wrapper a:hover, 
.uab-template-18.uab-custom-template .uap-post-author-name a:hover, 
.uab-template-18.uab-custom-template .uab-user-email a:hover, 
.uab-template-18.uab-custom-template .uab-user-phone a:hover,
.uab-template-18.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-18 .uab-linkedin-company-name:hover,
.uab-template-17.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-19.uab-custom-template ul.uab-tabs li.uab-current:before,
.uab-template-19.uab-custom-template .uab-company-info a:hover, 
.uab-template-19.uab-custom-template .uab-display-name a:hover, 
.uab-template-19.uab-custom-template .uab-user-website a:hover, 
.uab-template-19.uab-custom-template .uab-user-email a:hover, 
.uab-template-19.uab-custom-template .uab-user-phone a:hover,
.uab-template-19.uab-custom-template .uab-social-icons ul li a,
.uab-template-19.uab-custom-template .uab-post-title-wrapper a:hover, 
.uab-template-19.uab-custom-template .uap-post-author-name a:hover,
.uab-template-19.uab-custom-template.uab-frontend-wrapper .uab-facebook-count i,
.uab-template-19.uab-custom-template.uab-frontend-wrapper .uab-facebook-count svg,
.uab-template-19.uab-custom-template ul.uab-tabs li.uab-uab-current:before,
.uab-template-19 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-19 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-19 .uab-linkedin-general .uab-linkedin-profile-name a:hover
{
	color: <?php echo $uab_primary_color; ?>;
}
.uab-template-15,
.uab-template-12 label.uab-co-author-header:before,
.uab-template-9 .uab-co-author-grid label.uab-co-author-header::after,
.uab-template-5 label.uab-co-author-header,
.uab-template-4 label.uab-co-author-header span:after,
.uab-template-4 .uab-linkedin-profile-wrapper .uab-linkedin-header::after{
	background: <?php echo $uab_primary_color; ?>;
}

.uab-template-2.uab-custom-template .uab-tabs li.uab-current,
.uab-template-3.uab-custom-template .uab-tabs li.uab-current,
.uab-template-11.uab-custom-template .uab-tabs li.uab-current
{
	color: #fff;	
}

/*Active Colors*/
.uab-template-1.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit:hover,
.uab-template-3.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-4.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-5.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-6.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-8.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-9.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit:hover,
.uab-template-10.uab-custom-template .uab-contact-form-submit input[type=submit]:hover,
.uab-template-12.uab-custom-template .uab-contact-form-submit input[type=submit]:hover
{
	background: <?php echo $uab_primary_color; ?>;
	opacity: 0.7;
}

.uab-template-1.uab-custom-template .uab-display-name span.uab-user-role, 
.uab-template-1.uab-custom-template .uab-social-icons > span,
.uab-template-1.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-template-2.uab-custom-template .uab-tabs li.uab-current,
.uab-template-2.uab-custom-template .uab-social-icons li a:hover,
.uab-template-2.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-2.uab-custom-template .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-2.uab-custom-template .uab-social-header .uab-social-follow a,
.uab-template-2.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-3.uab-custom-template .uab-tabs li.uab-current,
.uab-template-3.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-3.uab-custom-template .uab-social-header .uab-social-follow a,
.uab-template-3.uab-custom-template  .uab-social-action-wrapper .uab-social-action a:hover,
.uab-custom-template .uab-frontend-wrapper .uab-facebook-count,
.uab-template-4.uab-custom-template .uab-tabs li.uab-current:after,
.uab-template-4.uab-custom-template .uab-front-content .uab-tab-header:after,
.uab-template-4.uab-custom-template .uab-post-title-wrapper:after,
.uab-template-4.uab-custom-template .uab-field-wrap label:after,
.uab-template-4.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-4.uab-custom-template .uab-social-header .uab-social-follow a,
.uab-template-4.uab-custom-template .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-5.uab-custom-template .uab-tab-header,
.uab-template-5.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-5.uab-custom-template .uab-tabs li.uab-current,
.uab-template-5.uab-custom-template .uab-post-header,
.uab-template-5.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-5.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-6.uab-custom-template .uab-tabs li.uab-current:after,
.uab-template-6.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-6.uab-custom-template .uab-recent-posts ul li:before,
.uab-template-6.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-6.uab-custom-template  .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-6.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-7.uab-custom-template .uab-tab-content,
.uab-template-7.uab-custom-template .uab-tabs li.uab-current,
.uab-template-8.uab-custom-template .uab-tabs,
.uab-template-8.uab-custom-template .uab-frontend-tooltip,
.uab-template-8.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-8.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-9.uab-custom-template .uab-tabs li.uab-current:after,
.uab-template-9.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-9.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-template-9.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-10.uab-custom-template .uab-select-tab-header,
.uab-template-10.uab-custom-template .uab-tabs li,
.uab-template-10.uab-custom-template .uap-content-temp-wrapper,
.uab-template-10.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-10.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-10.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-11.uab-custom-template .uab-tabs li.uab-current,
.uab-template-11.uab-custom-template .uab-tab-content,
.uab-template-12.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-12.uab-custom-template .uab-tab-header:before,
.uab-template-12.uab-custom-template .uab-tabs li,
.uab-template-12.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-12.uab-custom-template  .uab-social-action-wrapper .uab-social-action a:hover,
.uab-template-12.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-13.uab-custom-template .uab-tabs li.uab-current,
.uab-template-13.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-13.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-13.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-14.uab-custom-template .uab-select-tab-header,
.uab-template-14.uab-custom-template .uab-tabs li,
.uab-template-14.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-14.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-14.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-15.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-16.uab-custom-template .uab-tabs li.uab-current,
.uab-template-16.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-template-17.uab-custom-template .uab-social-icons ul li a:hover,
.uab-template-17.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-template-17.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-17.uab-custom-template .uab-tabs li:before,
.uab-template-18.uab-custom-template .uab-social-icons li a:hover,
.uab-template-18.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-18.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-template-19.uab-custom-template #uab-tab-index-wrapper,
.uab-template-19.uab-custom-template .uab-contact-form-submit input[type=submit],
.uab-template-19.uab-custom-template.uab-frontend-wrapper .uab-facebook-count
{
	background: <?php echo $uab_primary_color;?>;
}
.uab-template-13 .uab-linkedin-company-list span.uab-linkedin-company-name:hover,
.uab-template-13 .uab-co-author-individual .uab-co-author-display-name a:hover,
.uab-template-13 .uab-linkedin-general .uab-linkedin-profile-name a:hover{
	color: <?php echo $uab_seconday_color; ?>
}


/*Especial Borders*/
.uab-template-2.uab-custom-template .uab-tabs li:after,
.uab-template-5.uab-custom-template .uab-tabs li.uab-current:after
{
	border-color: <?php echo $uab_primary_color; ?> transparent transparent transparent;
}

.uab-template-17 .uap-co-author-image,
.uab-template-17 .uab-linkedin-profile-picture img,
.uab-template-14 .uab-linkedin-profile-wrapper .uab-linkedin-profile-picture,
.uab-template-14 .uap-co-author-image,
.uab-template-3.uab-custom-template .uab-tabs
{
	border-color: <?php echo $uab_primary_color; ?>;
}

.uab-template-10.uab-custom-template .uab-tabs li{
	border-bottom: 1px solid #fff;
}

.uab-template-12.uab-custom-template .uab-tabs li
{
	border: 1px solid #fff;
	border-top: 1px solid #ececec;
}

.uab-template-12.uab-custom-template .uab-tabs li.uab-current {
    background: #fff;
    border: 1px solid #ececec;
    border-bottom: 1px solid transparent;
}

.uab-template-12.uab-custom-template .uab-post-title-wrapper a
{
	border-left: 7px solid <?php echo $uab_primary_color; ?>;

}

.uab-template-13.uab-custom-template .uab-post-image
{
	border: 7px solid rgba(255,255,255,0.2);
}

.uab-template-14.uab-custom-template .uap-profile-image.uap-profile-image-circle, 
.uab-template-14.uab-custom-template .uap-profile-image.uap-profile-image-square img
{
	border: 3px solid <?php echo $uab_primary_color; ?>;
}

.uab-template-14.uab-custom-template .uab-tabs li{
	border-top : 1px solid rgba(255,255,255,0.2);
}
.uab-template-15.uab-custom-template .uab-tabs li.uab-current
{
	box-shadow: 6px 6px 2px 2px rgba(255,255,255,0.2);
}

.uab-template-15.uab-custom-template .uab-post-image{
	-webkit-box-shadow: 4px 4px 0 rgba(255,255,255,0.2);
	box-shadow: 4px 4px 0 rgba(255,255,255,0.2);
}
.uab-template-15.uab-custom-template .uap-profile-image.uap-profile-image-square{
    -webkit-box-shadow: 6px 6px 2px 2px rgba(255,255,255,0.2);
    box-shadow: 6px 6px 2px 2px rgba(255,255,255,0.2);
}
.uab-template-15.uab-custom-template .uab-short-contact span.uab-contact-label{
	    color: <?php echo $uab_primary_color; ?>;
	    opacity: 0.7;
}

.uab-template-15.uab-custom-template .uab-field-wrap input[type=text], 
.uab-template-15.uab-custom-template .uab-field-wrap input[type=email], 
.uab-template-15.uab-custom-template .uab-field-wrap input[type=tel], 
.uab-template-15.uab-custom-template .uab-field-wrap textarea.uab-message-field
{
	-webkit-box-shadow: 4px 4px 1px 1px rgba(255,255,255,0.2);
	box-shadow: 4px 4px 1px 1px rgba(255,255,255,0.2);
}

.uab-template-15.uab-custom-template .uab-contact-form input[type="submit"].uab-contact-submit
{
	-webkit-box-shadow: 6px 6px 2px 2px <?php echo $uab_primary_color; ?>;
	box-shadow: 6px 6px 2px 2px <?php echo $uab_primary_color; ?>;
}

.uab-template-16.uab-custom-template .uab-social-icons li a:hover{
	background: <?php echo $uab_primary_color; ?>;
	color: #fff;
}

.uab-template-17.uab-custom-template .uab-tabs li{
	border: 3px solid <?php echo $uab_primary_color; ?>;
}

.uab-template-17.uab-custom-template .uap-profile-image.uap-profile-image-square img, 
.uab-template-17.uab-custom-template .uap-profile-image.uap-profile-image-circle{
	border: 6px solid <?php echo $uab_primary_color; ?>;
}
/*.uab-template-17.uab-custom-template .uap-profile-image
{
	border : 6px solid <?php echo $uab_primary_color; ?>;
}*/

.uab-template-19.uab-custom-template ul.uab-tabs li{
	border-bottom: 1px solid rgba(255,255,255,0.2);
}

/*Backgroud Image*/
.uab-template-13.uab-custom-template, .uab-template-15.uab-custom-template, .uab-template-18.uab-custom-template, .uab-template-19.uab-custom-template
{
	background-image: url(<?php echo $uab_backgroud_image;?>);
}

.uab-template-13.uab-custom-template:before
{
	background: <?php echo $uab_primary_color; ?>;
	opacity: 0.3;
}

.uab-template-14.uab-custom-template .uab-social-icons ul li a {
    background: <?php echo $uab_primary_color; ?>;
    color: <?php echo $uab_seconday_color; ?>;
}
.uab-template-14.uab-custom-template .uab-social-icons ul li a:hover{
	color: <?php echo $uab_primary_color; ?>;
	background: <?php echo $uab_seconday_color; ?>;
}

.uab-template-18.uab-custom-template .uap-profile-image.uap-profile-image-square img, 
.uab-template-18.uab-custom-template .uap-profile-image.uap-profile-image-circle{
	border: 8px solid rgba(255,255,255,0.2);
}

.uab-custom-template .uab-social-temp-wrapper-3 .uab-title-social-wrapper a, 
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-wrapper-second .uab-social-username-wrapper a, 
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-date, 
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-date a{
	color: <?php echo $uab_primary_color; ?>;
}

/*Typography*/
/*Template 1*/
.uab-custom-template.uab-template-1 .uab-display-name a,
.uab-custom-template.uab-template-1 .uab-company-info,
.uab-custom-template.uab-template-1 .uab-company-info span,
.uab-custom-template.uab-template-1 .uab-company-info a,
.uab-custom-template.uab-template-1 .uab-short-info,
.uab-custom-template.uab-template-1 .uab-contact-inner .uab-contact-label,
.uab-custom-template.uab-template-1 .uab-short-contact .uab-user-website a,
.uab-custom-template.uab-template-1 .uab-user-email a,
.uab-custom-template.uab-template-1 .uab-user-phone a,
.uab-custom-template.uab-template-1 .uab-display-name span.uab-user-role,
.uab-custom-template.uab-template-1 .uab-social-icons > span,
.uab-custom-template.uab-template-1 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-1 .uab-post-meta-info .uap-post-date,
.uab-custom-template.uab-template-1 .uab-post-meta-info .uap-post-author-name a,
/*Template 2*/
.uab-custom-template.uab-template-2 .uab-tabs li,
.uab-custom-template.uab-template-2 .uab-content-header .uab-display-name a,
.uab-custom-template.uab-template-2 .uab-content-header .uab-company-info,
.uab-custom-template.uab-template-2 .uab-content-header .uab-company-info span,
.uab-custom-template.uab-template-2 .uab-content-header .uab-company-info a,
.uab-custom-template.uab-template-2 .uab-short-contact .uab-user-website a,
.uab-custom-template.uab-template-2 .uab-short-contact .uab-user-email a,
.uab-custom-template.uab-template-2 .uab-short-contact .uab-user-phone a,
.uab-custom-template.uab-template-2 .uab-short-info,
.uab-custom-template.uab-template-2 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-2 .uap-post-author-name,
.uab-custom-template.uab-template-2 .uap-post-date,
.uab-custom-template.uab-template-2 .uap-post-author-name a,
.uab-custom-template.uab-template-2 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-2 .uab-post-excerpt-wrapper p,
/*Template 3*/
.uab-custom-template.uab-template-3 .uab-tabs li,
.uab-custom-template.uab-template-3 .uab-display-name a,
.uab-custom-template.uab-template-3 .uab-company-info >span,
.uab-custom-template.uab-template-3 .uab-company-info >a,
.uab-custom-template.uab-template-3 .uab-short-info,
.uab-custom-template.uab-template-3 .uab-short-contact a,
.uab-custom-template.uab-template-3 .uab-short-contact .uab-contact-inner,
.uab-custom-template.uab-template-3 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-3 .uap-post-date,
/*Template 4*/
.uab-custom-template.uab-template-4 .uab-tabs li,
.uab-custom-template.uab-template-4 .uab-front-content .uab-tab-header,
.uab-custom-template.uab-template-4 .uab-front-content .uab-display-name a,
.uab-custom-template.uab-template-4 .uab-front-content .uab-company-info,
.uab-custom-template.uab-template-4 .uab-front-content .uab-company-info a,
.uab-custom-template.uab-template-4 .uab-front-content .uab-company-info span,
.uab-custom-template.uab-template-4 .uab-short-info,
.uab-custom-template.uab-template-4 .uab-user-website a,
.uab-custom-template.uab-template-4 .uab-user-email a,
.uab-custom-template.uab-template-4 .uab-user-phone a,
.uab-custom-template.uab-template-4 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-4 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-4 .uab-post-excerpt-wrapper p,
/*Template 5*/
.uab-custom-template.uab-template-5 .uab-tabs li,
.uab-custom-template.uab-template-5 .uab-tab-header,
.uab-custom-template.uab-template-5 .uab-company-info,
.uab-custom-template.uab-template-5 .uab-company-info span,
.uab-custom-template.uab-template-5 .uab-company-info a,
.uab-custom-template.uab-template-5 .uab-display-name a,
.uab-custom-template.uab-template-5 .uab-short-info,
.uab-custom-template.uab-template-5 .uab-user-website a,
.uab-custom-template.uab-template-5 .uab-user-email a,
.uab-custom-template.uab-template-5 .uab-user-phone a,
.uab-custom-template.uab-template-5 .uab-post-header,
.uab-custom-template.uab-template-5 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-5 .uab-post-meta-info .uap-post-author-name a,
.uab-custom-template.uab-template-5 .uab-post-meta-info .uap-post-author-name,
.uab-custom-template.uab-template-5 .uab-post-meta-info .uap-post-date,
/*Template 6*/
.uab-custom-template.uab-template-6 .uab-tabs li,
.uab-custom-template.uab-template-6 .uab-tab-header,
.uab-custom-template.uab-template-6 .uab-display-name a,
.uab-custom-template.uab-template-6 .uab-company-info span,
.uab-custom-template.uab-template-6 .uab-company-info a,
.uab-custom-template.uab-template-6 .uab-short-info,
.uab-custom-template.uab-template-6 .uab-user-website a,
.uab-custom-template.uab-template-6 .uab-user-email a,
.uab-custom-template.uab-template-6 .uab-user-phone a,
.uab-custom-template.uab-template-6 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-6 .uap-post-date,
.uab-custom-template.uab-template-6 .uap-post-author-name a,
/*Template 7*/
.uab-custom-template.uab-template-7 .uab-display-name a,
.uab-custom-template.uab-template-7 .uab-company-info,
.uab-custom-template.uab-template-7 .uab-company-info span,
.uab-custom-template.uab-template-7 .uab-company-info a,
.uab-custom-template.uab-template-7 .uab-short-info,
.uab-custom-template.uab-template-7 .uab-user-website a,
.uab-custom-template.uab-template-7 .uab-user-email a,
.uab-custom-template.uab-template-7 .uab-user-phone a,
.uab-custom-template.uab-template-7 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-7 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-7 .uab-post-excerpt-wrapper p,
.uab-custom-template.uab-template-7 .uap-post-date,
.uab-custom-template.uab-template-7 .uap-post-author-name a,
/*Template 8*/
.uab-custom-template.uab-template-8 .uab-tabs li,
.uab-custom-template.uab-template-8 .uab-company-info span,
.uab-custom-template.uab-template-8 .uab-company-info a,
.uab-custom-template.uab-template-8 .uab-short-info,
.uab-custom-template.uab-template-8 .uab-frontend-tooltip,
.uab-custom-template.uab-template-8 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-8 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-8 .uab-post-excerpt-wrapper p,
/*Template 9*/
.uab-custom-template.uab-template-9 .uab-tabs li,
.uab-custom-template.uab-template-9 .uab-display-name a,
.uab-custom-template.uab-template-9 .uab-company-info,
.uab-custom-template.uab-template-9 .uab-company-info span,
.uab-custom-template.uab-template-9 .uab-company-info a,
.uab-custom-template.uab-template-9 .uab-short-info,
.uab-custom-template.uab-template-9 .uab-user-website a,
.uab-custom-template.uab-template-9 .uab-user-email a,
.uab-custom-template.uab-template-9 .uab-user-phone a,
.uab-custom-template.uab-template-9 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-9 .uap-post-date,
.uab-custom-template.uab-template-9 .uab-post-excerpt-wrapper,
.uab-template-9 .uab-post-excerpt-wrapper p
/*Template 10*/
.uab-custom-template.uab-template-10 .uab-select-tab-header,
.uab-custom-template.uab-template-10 .uab-tabs li,
.uab-custom-template.uab-template-10 .uab-display-name a,
.uab-custom-template.uab-template-10 .uab-company-info span,
.uab-custom-template.uab-template-10 .uab-company-info a,
.uab-custom-template.uab-template-10 .uab-tab-header,
.uab-custom-template.uab-template-10 .uab-short-info,
.uab-custom-template.uab-template-10 .uab-user-website a,
.uab-custom-template.uab-template-10 .uab-user-email a,
.uab-custom-template.uab-template-10 .uab-user-phone a,
.uab-custom-template.uab-template-10 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-10 .uap-post-date,
.uab-custom-template.uab-template-10 .uap-post-author-name a,
.uab-custom-template.uab-template-10 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-10 .uab-post-excerpt-wrapper p,
/*Template 11*/
.uab-custom-template.uab-template-11 .uab-tabs li,
.uab-custom-template.uab-template-11 .uab-company-info,
.uab-custom-template.uab-template-11 .uab-company-info .uab-company-designation,
.uab-custom-template.uab-template-11 .uab-company-info a,
.uab-custom-template.uab-template-11 .uab-display-name a,
.uab-custom-template.uab-template-11 .uab-user-website a,
.uab-custom-template.uab-template-11 .uab-user-email a,
.uab-custom-template.uab-template-11 .uab-user-phone a,
.uab-custom-template.uab-template-11 .uab-short-info,
.uab-custom-template.uab-template-11 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-11 .uap-post-author-name a,
.uab-custom-template.uab-template-11 .uap-post-date,
.uab-custom-template.uab-template-11 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-11 .uab-post-excerpt-wrapper p,
/*Template 12*/
.uab-custom-template.uab-template-12 .uab-display-name a,
.uab-custom-template.uab-template-12 .uab-display-name .uab-user-role,
.uab-custom-template.uab-template-12 .uab-company-info,
.uab-custom-template.uab-template-12 .uab-company-info span,
.uab-custom-template.uab-template-12 .uab-company-info a,
.uab-custom-template.uab-template-12 .uab-tabs li,
.uab-custom-template.uab-template-12 .uab-tab-header,
.uab-custom-template.uab-template-12 .uab-short-info,
.uab-custom-template.uab-template-12 .uab-user-website a,
.uab-custom-template.uab-template-12 .uab-user-email a,
.uab-custom-template.uab-template-12 .uab-user-phone a ,
.uab-custom-template.uab-template-12 .uab-post-title-wrapper,
.uab-custom-template.uab-template-12 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-12 .uap-post-author-name a,
.uab-custom-template.uab-template-12 .uap-post-date,
/*Template 13*/
.uab-custom-template.uab-template-13 .uab-tabs li,
.uab-custom-template.uab-template-13 .uab-company-info,
.uab-custom-template.uab-template-13 .uab-company-info span,
.uab-custom-template.uab-template-13 .uab-company-info a,
.uab-custom-template.uab-template-13 .uab-short-info,
.uab-custom-template.uab-template-13 .uab-user-website a,
.uab-custom-template.uab-template-13 .uab-user-email a,
.uab-custom-template.uab-template-13 .uab-user-phone a,
.uab-custom-template.uab-template-13 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-13 .uap-post-date,
.uab-custom-template.uab-template-13 .uap-post-author-name a,
.uab-custom-template.uab-template-13 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-13 .uab-post-excerpt-wrapper p,
/*Template 14*/
.uab-custom-template.uab-template-14 .uab-select-tab-header,
.uab-custom-template.uab-template-14 .uab-tabs li,
.uab-custom-template.uab-template-14 .uab-display-name a,
.uab-custom-template.uab-template-14 .uab-company-info a,
.uab-custom-template.uab-template-14 .uab-company-info span,
.uab-custom-template.uab-template-14 .uab-tab-header,
.uab-custom-template.uab-template-14 .uab-short-info,
.uab-custom-template.uab-template-14 .uab-user-website a,
.uab-custom-template.uab-template-14 .uab-user-email a,
.uab-custom-template.uab-template-14 .uab-user-phone a,
.uab-custom-template.uab-template-14 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-14 .uap-post-date,
.uab-custom-template.uab-template-14 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-14 .uab-post-excerpt-wrapper p,
/*Template 15*/
.uab-custom-template.uab-template-15 .uab-tabs li,
.uab-custom-template.uab-template-15 .uab-display-name a,
.uab-custom-template.uab-template-15 .uab-company-info,
.uab-custom-template.uab-template-15 .uab-company-info span,
.uab-custom-template.uab-template-15 .uab-company-info a,
.uab-custom-template.uab-template-15 .uab-short-info,
.uab-custom-template.uab-template-15 .uab-short-contact,
.uab-custom-template.uab-template-15 .uab-short-contact span.uab-contact-label,
.uab-custom-template.uab-template-15 .uab-user-website a,
.uab-custom-template.uab-template-15 .uab-user-email a,
.uab-custom-template.uab-template-15 .uab-user-phone a,
.uab-custom-template.uab-template-15 .uab-social-icons .uab-contact-label,
.uab-custom-template.uab-template-15 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-15 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-15 .uab-post-excerpt-wrapper p,
/*Template 16*/
.uab-custom-template.uab-template-16 .uab-tabs li,
.uab-custom-template.uab-template-16 .uab-user-website a,
.uab-custom-template.uab-template-16 .uab-user-email a,
.uab-custom-template.uab-template-16 .uab-user-phone a,
.uab-custom-template.uab-template-16 .uab-display-name a,
.uab-custom-template.uab-template-16 .uab-company-info,
.uab-custom-template.uab-template-16 .uab-company-info span,
.uab-custom-template.uab-template-16 .uab-company-info a,
.uab-custom-template.uab-template-16 .uab-short-info,
.uab-custom-template.uab-template-16 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-16 .uap-post-author-name a,
.uab-custom-template.uab-template-16 .uap-post-date,
/*Template 17*/
.uab-custom-template.uab-template-17 .uab-tabs li,
.uab-custom-template.uab-template-17 .uab-company-info,
.uab-custom-template.uab-template-17 .uab-company-info span.uab-company-designation,
.uab-custom-template.uab-template-17 .uab-company-info a,
.uab-custom-template.uab-template-17 .uab-display-name a,
.uab-custom-template.uab-template-17 .uab-contact-inner .uab-contact-label,
.uab-custom-template.uab-template-17 .uab-user-website a,
.uab-custom-template.uab-template-17 .uab-user-email a,
.uab-custom-template.uab-template-17 .uab-user-phone a,
.uab-custom-template.uab-template-17 .uab-short-info,
.uab-custom-template.uab-template-17 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-17 .uap-post-author-name,
.uab-custom-template.uab-template-17 .uap-post-date,
.uab-custom-template.uab-template-17 .uap-post-author-name a,
.uab-custom-template.uab-template-17 .uap-post-author-name a,
.uab-custom-template.uab-template-17 .uap-post-date,
/*Template 18*/
.uab-custom-template.uab-template-18 .uab-tabs li,
.uab-custom-template.uab-template-18 .uab-display-name a,
.uab-custom-template.uab-template-18 .uab-company-info,
.uab-custom-template.uab-template-18 .uab-company-info span.uab-company-designation,
.uab-custom-template.uab-template-18 .uab-company-info a,
.uab-custom-template.uab-template-18 .uab-short-info,
.uab-custom-template.uab-template-18 .uab-user-website a,
.uab-custom-template.uab-template-18 .uab-user-email a,
.uab-custom-template.uab-template-18 .uab-user-phone a,
.uab-custom-template.uab-template-18 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-18 .uap-post-author-name a,
.uab-custom-template.uab-template-18 .uap-post-date,
.uab-custom-template.uab-template-18 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-18 .uab-post-excerpt-wrapper p,
/*Template 19*/
.uab-custom-template.uab-template-19 ul.uab-tabs li,
.uab-custom-template.uab-template-19 .uab-company-info,
.uab-custom-template.uab-template-19 .uab-company-info span,
.uab-custom-template.uab-template-19 .uab-company-info a,
.uab-custom-template.uab-template-19 .uab-display-name a,
.uab-custom-template.uab-template-19 .uab-short-info,
.uab-custom-template.uab-template-19 .uab-user-website a,
.uab-custom-template.uab-template-19 .uab-user-email a,
.uab-custom-template.uab-template-19 .uab-user-phone a,
.uab-custom-template.uab-template-19 .uab-post-title-wrapper a,
.uab-custom-template.uab-template-19 .uap-post-author-name a,
.uab-custom-template.uab-template-19 .uap-post-date,
.uab-custom-template.uab-template-19 .uab-post-excerpt-wrapper,
.uab-custom-template.uab-template-19 .uab-post-excerpt-wrapper p,
/*Contact form Template 1*/
.uab-custom-template.uab-template-1 .uab-field-wrap label,
.uab-custom-template.uab-template-1 .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-custom-template.uap-success-message,

.uab-custom-template.uab-template-2 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-2 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-2 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-2 .uab-field-wrap textarea.uab-message-field,
.uab-custom-template.uab-template-2 .uab-contact-form-submit input[type=submit],
.uab-custom-template.uab-template-2 .uap-success-message,


.uab-custom-template.uab-template-3 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-3 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-3 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-3 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-3 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-3 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-3 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-3 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-3 .uab-field-wrap input::-webkit-input-placeholder,
.uab-template-3 textarea.uab-message-field::-webkit-input-placeholder */

.uab-custom-template.uab-template-4 .uab-field-wrap label,
.uab-custom-template.uab-template-4 .uab-contact-form-submit input[type=submit],

.uab-custom-template.uab-template-5 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-5 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-5 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-5 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-5 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-5 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-5 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-5 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-5 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-5 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-6 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-6 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-6 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-6 .uab-field-wrap textarea.uab-message-field,
.uab-custom-template.uab-template-6 .uab-contact-form-submit input[type=submit],
.uab-custom-template.uab-template-6 .uap-success-message,

.uab-custom-template.uab-template-7 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-7 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-7 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-7 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-7 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-7 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-7 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-7 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-7 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-7 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-8 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-8 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-8 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-8 .uab-field-wrap textarea.uab-message-field,
.uab-custom-template.uab-template-8 .uab-contact-form-submit input[type=submit],
.uab-custom-template.uab-template-8 .uap-success-message,

.uab-custom-template.uab-template-9 .uab-field-wrap label,
.uab-custom-template.uab-template-9 .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-custom-template.uab-template-9 .uap-success-message,

.uab-custom-template.uab-template-10 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-10 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-10 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-10 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-10 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-10 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-10 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-10 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-10 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-10 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-11 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-11 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-11 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-11 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-11 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-11 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-11 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-11 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-11 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-11 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-12 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-12 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-12 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-12 .uab-field-wrap textarea.uab-message-field,
.uab-custom-template.uab-template-12 .uab-contact-form-submit input[type=submit],
.uab-custom-template.uab-template-12 .uap-success-message,

.uab-custom-template.uab-template-13 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-13 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-13 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-13 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-13 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-13 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-13 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-13 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-13 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-13 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-13 .uab-contact-form-submit input[type=submit],
.uab-custom-template.uab-template-13 .uap-success-message,

.uab-custom-template.uab-template-14 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-14 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-14 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-14 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-14 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-14 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-14 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-14 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-14 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-14 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-15 .uab-field-wrap label,
.uab-custom-template.uab-template-15 .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-custom-template.uab-template-15 .uap-success-message,

.uab-custom-template.uab-template-16 .uab-field-wrap label,
.uab-custom-template.uab-template-16 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-16 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-16 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-16 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-16 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-16 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-16 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-16 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-16 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-16 textarea.uab-message-field::-webkit-input-placeholder, */

.uab-custom-template.uab-template-16 .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-custom-template.uab-template-16 .uap-success-message,

.uab-custom-template.uab-template-17 .uab-field-wrap label,
.uab-custom-template.uab-template-17 .uab-contact-form input[type="submit"].uab-contact-submit,
.uab-custom-template.uab-template-17 .uap-success-message,

.uab-custom-template.uab-template-18 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-18 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-18 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-18 .uab-field-wrap textarea.uab-message-field,

.uab-custom-template/* .uab-template-18 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-18 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-18 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-18 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-18 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-18 textarea.uab-message-field::-webkit-input-placeholder,  */

.uab-custom-template.uab-template-19 .uab-field-wrap input[type=text],
.uab-custom-template.uab-template-19 .uab-field-wrap input[type=email],
.uab-custom-template.uab-template-19 .uab-field-wrap input[type=tel],
.uab-custom-template.uab-template-19 .uab-field-wrap textarea.uab-message-field,

/*
.uab-custom-template.uab-template-19 .uab-field-wrap input::-moz-placeholder,
.uab-custom-template.uab-template-19 textarea.uab-message-field::-moz-placeholder,
.uab-custom-template.uab-template-19 .uab-field-wrap input:-ms-input-placeholder,
.uab-custom-template.uab-template-19 textarea.uab-message-field:-ms-input-placeholder,
.uab-custom-template.uab-template-19 .uab-field-wrap input::-webkit-input-placeholder,
.uab-custom-template.uab-template-19 textarea.uab-message-field::-webkit-input-placeholder, */

/*Pop up*/
.uab-frontend-popup-content .uab-display-name a,
.uab-frontend-popup-content .uab-display-name .uab-user-role,
.uab-frontend-popup-content .uab-short-info,
.uab-frontend-popup-content .uab-contact-label,
.uab-frontend-popup-content .uab-user-website a,
.uab-frontend-popup-content .uab-user-email a,
.uab-frontend-popup-content .uab-user-phone a,
.uab-custom-template.uab-template-1 .uab-title-social-wrapper a,
.uab-custom-template.uab-template-7 .uab-title-social-wrapper a,
.uab-custom-template.uab-template-9 .uab-title-social-wrapper a,
.uab-custom-template.uab-template-10 .uab-title-social-wrapper a,
.uab-custom-template.uab-template-13 .uab-title-social-wrapper a,
.uab-custom-template.uab-template-1 .uab-social-follow a,
.uab-custom-template.uab-template-7 .uab-social-follow a,
.uab-custom-template.uab-template-9 .uab-social-follow a,
.uab-custom-template.uab-template-10 .uab-social-follow a,
.uab-custom-template.uab-template-13 .uab-social-follow a,
.uab-custom-template.uab-template-1 .uab-social-content,
.uab-custom-template.uab-template-1 .uab-social-content a,
.uab-custom-template.uab-template-7 .uab-social-content,
.uab-custom-template.uab-template-7 .uab-social-content a,
.uab-custom-template.uab-template-9 .uab-social-content,
.uab-custom-template.uab-template-9 .uab-social-content a,
.uab-custom-template.uab-template-10 .uab-social-content,
.uab-custom-template.uab-template-10 .uab-social-content a,
.uab-custom-template.uab-template-13 .uab-social-content,
.uab-custom-template.uab-template-13 .uab-social-content a,
.uab-custom-template.uab-template-1 .uab-temp-content-wrapper .uab-social-date,
.uab-custom-template.uab-template-7 .uab-temp-content-wrapper .uab-social-date,
.uab-custom-template.uab-template-9 .uab-temp-content-wrapper .uab-social-date,
.uab-custom-template.uab-template-10 .uab-temp-content-wrapper .uab-social-date,
.uab-custom-template.uab-template-13 .uab-temp-content-wrapper .uab-social-date,
.uab-custom-template.uab-template-1 .uab-temp-content-wrapper .uab-social-date a,
.uab-custom-template.uab-template-1 .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a,
.uab-custom-template.uab-template-7 .uab-temp-content-wrapper .uab-social-date a,
.uab-custom-template.uab-template-7 .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a,
.uab-custom-template.uab-template-9 .uab-temp-content-wrapper .uab-social-date a,
.uab-custom-template.uab-template-9 .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a,
.uab-custom-template.uab-template-10 .uab-temp-content-wrapper .uab-social-date a,
.uab-custom-template.uab-template-10 .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a,
.uab-custom-template.uab-template-13 .uab-temp-content-wrapper .uab-social-date a,
.uab-custom-template.uab-template-13 .uab-temp-content-wrapper .uab-social-action-wrapper .uab-social-action a,
.uab-custom-template.uab-template-2 .uab-social-header .uab-social-follow a,
.uab-custom-template.uab-template-3 .uab-social-header .uab-social-follow a,
.uab-custom-template.uab-template-4 .uab-social-header .uab-social-follow a,
.uab-custom-template.uab-template-6 .uab-social-header .uab-social-follow a,
.uab-custom-template.uab-template-12 .uab-social-header .uab-social-follow a,
.uab-custom-template.uab-template-2 .uab-social-content,
.uab-custom-template.uab-template-3 .uab-social-content,
.uab-custom-template.uab-template-4 .uab-social-content,
.uab-custom-template.uab-template-6 .uab-social-content,
.uab-custom-template.uab-template-12 .uab-social-content,
.uab-custom-template.uab-template-2 .uab-social-wrapper-second .uab-title-social-wrapper a,
.uab-custom-template.uab-template-2 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template.uab-template-2 .uab-social-wrapper-second .uab-social-date,
.uab-custom-template.uab-template-3 .uab-social-wrapper-second .uab-title-social-wrapper a,
.uab-custom-template.uab-template-3 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template.uab-template-3 .uab-social-wrapper-second .uab-social-date,
.uab-custom-template.uab-template-4 .uab-social-wrapper-second .uab-title-social-wrapper a,
.uab-custom-template.uab-template-4 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template.uab-template-4 .uab-social-wrapper-second .uab-social-date,
.uab-custom-template.uab-template-6 .uab-social-wrapper-second .uab-title-social-wrapper a,
.uab-custom-template.uab-template-6 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template.uab-template-6 .uab-social-wrapper-second .uab-social-date,
.uab-custom-template.uab-template-12 .uab-social-wrapper-second .uab-title-social-wrapper a,
.uab-custom-template.uab-template-12 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template.uab-template-12 .uab-social-wrapper-second .uab-social-date,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-title-social-wrapper a,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-header .uab-social-follow a,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-title-social-wrapper a,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-wrapper-second .uab-social-username-wrapper a,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-date,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-date a,
.uab-custom-template .uab-social-temp-wrapper-3 .uab-social-content,
.uab-custom-template.uab-frontend-wrapper .uab-facebook-count,
.uab-custom-template .uab-rss-feed-title-wrapper a,
.uab-custom-template.uab-template-11 .uab-rss-feed-title-wrapper a,
.uab-custom-template.uab-template-14 .uab-rss-feed-title-wrapper a,
.uab-custom-template.uab-template-14.uab-frontend-wrapper .uab-rss-feed-description-wrapper,
.uab-custom-template.uab-template-15 .uab-rss-feed-title-wrapper a,
.uab-custom-template.uab-frontend-wrapper .uab-rss-feed-date-wrapper,
.uab-custom-template.uab-frontend-wrapper .uab-rss-feed-description-wrapper,
.uab-custom-template.uab-template-15 .uab-rss-feed-description-wrapper,
/*Widget*/
.uab-custom-template .uab-author-grid a .uab-profile-content,
.uab-custom-template .uab-author-list-wrapper .uab-author-list-outer .uab-author-list-content-wrapper .uab-info,
.uab-custom-template .uab-author-slider a,
.uab-custom-template .uab-abw-wrapper.template-2 .uab-abw-name-wrapper,
.uab-custom-template .uab-abw-wrapper.template-2 .uab-abw-description-wrapper,
.uab-custom-template .uab-abw-wrapper.template-1 .uab-abw-description-wrapper,
.uab-custom-template .uab-abw-wrapper.template-1 .uab-abw-name-wrapper,
.uab-custom-template .uab-abw-wrapper.template-1 .uab-abw-designation-wrapper,
.uab-custom-template .uab-abw-wrapper.template-1 .uab-abw-designation-wrapper a 
{
	/*font-family: 'Dosis', sans-serif;;*/
}



</style>
