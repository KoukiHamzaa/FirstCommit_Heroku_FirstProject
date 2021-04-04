<?php

$default_values = array( 'site_title' => __('Site Under Maintenance', 'everest-coming-soon-lite') );
$site_title = (!empty($ecs_settings[ 'general' ][ 'site_title' ])) ? esc_attr($ecs_settings[ 'general' ][ 'site_title' ]) : $default_values[ 'site_title' ];
$general_settings = isset($ecs_settings[ 'general' ]) ? $ecs_settings[ 'general' ] : array();
$component_settings = isset($ecs_settings[ 'component' ]) ? $ecs_settings[ 'component' ] : array();
$template_settings = isset($ecs_settings[ 'template' ]) ? $ecs_settings[ 'template' ] : array();
/**
 * Header Components
 */
$header_text = (!empty($component_settings[ 'header_text' ])) ? $component_settings[ 'header_text' ] : '';
$site_short_description = (!empty($component_settings[ 'site_short_description' ])) ? wpautop($component_settings[ 'site_short_description' ]) : '';
/**
 * About Us components
 */
$about_us_title = (!empty($component_settings[ 'about_us_title' ])) ? $component_settings[ 'about_us_title' ] : '';
$about_us_description = (!empty($component_settings[ 'about_us_description' ])) ? wpautop($component_settings[ 'about_us_description' ]) : '';

/**
 * Subscription Components
 */
$subscription_title = (!empty($component_settings[ 'subscription_title' ])) ? $component_settings[ 'subscription_title' ] : '';
$subscription_description = (!empty($component_settings[ 'subscription_description' ])) ? wpautop($component_settings[ 'subscription_description' ]) : '';
$subscribe_button_label = (!empty($component_settings[ 'subscribe_button_label' ])) ? esc_attr($component_settings[ 'subscribe_button_label' ]) : __('Subscribe', 'everest-coming-soon-lite');
$subscribe_required_message = (!empty($component_settings[ 'subscribe_required_message' ])) ? $component_settings[ 'subscribe_required_message' ] : __('Email address is required', 'everest-coming-soon-lite');
$subscription_email_field_label = (!empty($component_settings[ 'subscription_email_field_label' ])) ? $component_settings[ 'subscription_email_field_label' ] : __('Enter your email', 'everest-gallery');
/**
 * Contact us Components
 */
$contact_us_title = (!empty($component_settings[ 'contact_us_title' ])) ? $component_settings[ 'contact_us_title' ] : '';
$contact_us_description = (!empty($component_settings[ 'contact_us_description' ])) ? wpautop($component_settings[ 'contact_us_description' ]) : '';
$name_field_label = (!empty($component_settings[ 'name_field_label' ])) ? $component_settings[ 'name_field_label' ] : __('Enter your name', 'everest-coming-soon-lite');
$email_field_label = (!empty($component_settings[ 'email_field_label' ])) ? $component_settings[ 'email_field_label' ] : __('Enter your email', 'everest-coming-soon-lite');
$message_field_label = (!empty($component_settings[ 'message_field_label' ])) ? $component_settings[ 'message_field_label' ] : __('Enter your message', 'everest-coming-soon-lite');
$submit_button_label = (!empty($component_settings[ 'submit_button_label' ])) ? $component_settings[ 'submit_button_label' ] : __('Send Email', 'everest-coming-soon-lite');
$contact_required_message = (!empty($component_settings[ 'required_message' ])) ? $component_settings[ 'required_message' ] : __('This field is required', 'everest-coming-soon-lite');
/**
 * Get in touch Components
 */
$get_in_touch_title = (!empty($component_settings[ 'get_in_touch_title' ])) ? ($component_settings[ 'get_in_touch_title' ]) : '';
$get_in_touch_description = (!empty($component_settings[ 'get_in_touch_description' ])) ? wpautop($component_settings[ 'get_in_touch_description' ]) : '';
$phone_label = (!empty($component_settings[ 'phone_label' ])) ? ($component_settings[ 'phone_label' ]) : __('Phone', 'everest-coming-soon-lite');
$address_label = (!empty($component_settings[ 'address_label' ])) ? ($component_settings[ 'address_label' ]) : __('Address', 'everest-coming-soon-lite');
$email_label = (!empty($component_settings[ 'email_label' ])) ? ($component_settings[ 'email_label' ]) : __('Email', 'everest-coming-soon-lite');
$phone_value = (!empty($component_settings[ 'phone_value' ])) ? ($component_settings[ 'phone_value' ]) : '';
$phone_value = str_replace('#plus', '+', $phone_value);
$address_value = (!empty($component_settings[ 'address_value' ])) ? ($component_settings[ 'address_value' ]) : '';
$email_value = (!empty($component_settings[ 'email_value' ])) ? ($component_settings[ 'email_value' ]) : '';
/**
 * Countdown Timer
 */
$countdown_title = ($component_settings[ 'countdown_title' ]) ? esc_attr($component_settings[ 'countdown_title' ]) : '';
$countdown_short_description = ($component_settings[ 'countdown_short_description' ]) ? wpautop($component_settings[ 'countdown_short_description' ]) : '';
$countdown_expiry_date = ($component_settings[ 'countdown_expiry_date' ]) ? esc_attr($component_settings[ 'countdown_expiry_date' ]) : '';
$days_label = (!empty($component_settings[ 'days_label' ])) ? esc_attr($component_settings[ 'days_label' ]) : __('days', 'everest-coming-soon-lite');
$hours_label = (!empty($component_settings[ 'hour_label' ])) ? esc_attr($component_settings[ 'hour_label' ]) : __('hours', 'everest-coming-soon-lite');
$minutes_label = (!empty($component_settings[ 'minute_label' ])) ? esc_attr($component_settings[ 'minute_label' ]) : __('minutes', 'everest-coming-soon-lite');
$seconds_label = (!empty($component_settings[ 'second_label' ])) ? esc_attr($component_settings[ 'second_label' ]) : __('seconds', 'everest-coming-soon-lite');
/**
 * Social Network Components
 */
$social_network_title = (!empty($component_settings[ 'social_network_title' ])) ? esc_attr($component_settings[ 'social_network_title' ]) : '';
$social_network_short_description = (!empty($component_settings[ 'social_network_short_description' ])) ? wpautop($component_settings[ 'social_network_short_description' ]) : '';
$social_networks = (!empty($component_settings[ 'social_networks' ])) ? $component_settings[ 'social_networks' ] : array();
$template = (!empty($template_settings[ 'coming_soon_template' ])) ? esc_attr($template_settings[ 'coming_soon_template' ]) : '1';