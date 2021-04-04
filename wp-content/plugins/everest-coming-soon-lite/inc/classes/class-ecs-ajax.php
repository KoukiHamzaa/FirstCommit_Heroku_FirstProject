<?php
defined('ABSPATH') or die('No script kiddies please!!');

if ( !class_exists('ECSL_Ajax') ) {

    class ECSL_Ajax extends ECSL_Library {

        function __construct() {
            /**
             * Subscription Action
             */
            add_action('wp_ajax_ecs_subscribe_action', array( $this, 'subscribe_action' ));
            add_action('wp_ajax_nopriv_ecs_subscribe_action', array( $this, 'subscribe_action' ));

            /**
             * Email Action
             */
            add_action('wp_ajax_ecs_email_action', array( $this, 'email_action' ));
            add_action('wp_ajax_nopriv_ecs_email_action', array( $this, 'email_action' ));
        }

        function subscribe_action() {
            if ( !empty($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'ecs_ajax_nonce') ) {
                global $ecs_settings;
                $email = sanitize_email($_POST[ 'email' ]);
                global $wpdb;
                $table = $wpdb->prefix . 'ecs_subscribers';
                $already_available_check = $wpdb->get_var("select count(*) from $table where email like '$email'");
                $response = array();
                if ( $already_available_check == 0 ) {
                    $check = $wpdb->insert(
                            $table, array(
                        'email' => $email
                            ), array(
                        '%s'
                            )
                    );
                    if ( $check ) {
                        $response[ 'success' ] = 1;
                        $response[ 'message' ] = (!empty($ecs_settings[ 'component' ][ 'subscription_success_message' ])) ? esc_attr($ecs_settings[ 'component' ][ 'subscription_success_message' ]) : __('Subscribed successfully!', 'everest-coming-soon-lite');
                    } else {
                        $response[ 'success' ] = 0;
                        $response[ 'message' ] = __('Something went wrong. Please try again later.', 'everest-coming-soon-lite');
                    }
                } else {
                    $response[ 'success' ] = 0;
                    $response[ 'message' ] = (!empty($ecs_settings[ 'component' ][ 'email_available' ])) ? esc_attr($ecs_settings[ 'component' ][ 'email_available' ]) : __('Email already subscribed.', 'everest-coming-soon-lite');
                }
                die(json_encode($response));
            } else {
                $this->permission_denied();
            }
        }

        function email_action() {
            if ( !empty($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'ecs_ajax_nonce') ) {
                $contact_name = sanitize_text_field($_POST[ 'contact_name' ]);
                $contact_email = sanitize_text_field($_POST[ 'contact_email' ]);
                $contact_message = sanitize_text_field($_POST[ 'contact_message' ]);
                global $ecs_settings;
                $from_name = (!empty($ecs_settings[ 'general' ][ 'email_from_name' ])) ? esc_attr($ecs_settings[ 'general' ][ 'email_from_name' ]) : 'No Reply';
                $from_email = (!empty($ecs_settings[ 'general' ][ 'email_from_email' ])) ? esc_attr($ecs_settings[ 'general' ][ 'email_from_email' ]) : 'noreply@' . site_url();
                $admin_email = get_option('admin_email');
                $subject = apply_filters('ecs_email_subject', __('New Contact Email', 'everest-coming-soon-lite'));
                $default_contact_message = 'Hi there,<br/><br/>'
                        . ''
                        . 'You have received a contact email from ' . get_option('blogname') . '. Details below: <br/><br/>'
                        . ''
                        . 'Name: ' . $contact_name . '<br/>'
                        . 'Email: ' . $contact_email . '<br/>'
                        . 'Message: ' . $contact_message . '<br/><br/>'
                        . ''
                        . 'Thank You.';
                $contact_email_message = (!empty($ecs_settings[ 'component' ][ 'contact_message' ])) ? $ecs_settings[ 'component' ][ 'contact_message' ] : '';
                if ( $contact_email_message != '' ) {
                    $contact_email_message = $this->convert_into_br($contact_email_message);
                    $contact_email_message = str_replace('#name', $contact_name, $contact_email_message);
                    $contact_email_message = str_replace('#email', $contact_email, $contact_email_message);
                    $contact_email_message = str_replace('#message', $contact_message, $contact_email_message);
                } else {
                    $contact_email_message = $default_contact_message;
                }
                $headers[] = 'Content-Type: text/html; charset=UTF-8';
                $headers[] = "From: $from_name <$from_email>";
                $check = wp_mail($admin_email, $subject, $contact_email_message, $headers);
                if ( $check ) {
                    $response[ 'success' ] = 1;
                    $response[ 'message' ] = (!empty($ecs_settings[ 'component' ][ 'success_message' ])) ? esc_attr($ecs_settings[ 'component' ][ 'success_message' ]) : __('Email sent successfully!', 'everest-coming-soon-lite');
                } else {
                    $response[ 'success' ] = 0;
                    $response[ 'message' ] = apply_filters('ecs_email_failure_message', __('Something went wrong. Please try again later.', 'everest-coming-soon-lite'));
                }
                die(json_encode($response));
            } else {
                $this->permission_denied();
            }
        }

    }

    new ECSL_Ajax();
}
