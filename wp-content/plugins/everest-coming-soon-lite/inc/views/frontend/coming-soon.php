<?php
defined('ABSPATH') or die('No script kiddies please!!');
include(ECSL_PATH . '/inc/views/frontend/variables.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo esc_attr($site_title); ?></title>
        <?php
        /**
         * Disable search engine crawling
         */
        if ( isset($general_settings[ 'hide_search' ]) && $general_settings[ 'hide_search' ] == '1' ) {
            ?>
            <meta name='robots' content='noindex,nofollow' />
        <?php } ?>
        <?php if ( !empty($general_settings[ 'meta_tag_name' ]) ) { ?>
            <meta name="<?php echo esc_attr($general_settings[ 'meta_tag_name' ]); ?>" content="<?php echo (!empty($general_settings[ 'meta_tag_content' ])) ? esc_attr($general_settings[ 'meta_tag_content' ]) : ''; ?>" />
        <?php } ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles-->
         <link href="<?php echo esc_attr(ECSL_CSS_DIR) . 'font-awesome.min.css?ver=' . ECSL_VERSION; ?>" rel="stylesheet" /> 
        <link href="//fonts.googleapis.com/css?family=Open+Sans|Lato|Roboto|Roboto+Slab|Montserrat|Poppins|Oxygen|Roboto+Condensed|Ubuntu|Playfair+Display|Rubik|Titillium+Web:300,400,500,600,700,900|serif|Khand:300,400,500,700,900" rel="stylesheet">

        <link href="<?php echo esc_attr(ECSL_CSS_DIR) . 'animate.css?ver=' . ECSL_VERSION; ?>" rel="stylesheet" />
        <link href="<?php echo esc_attr(ECSL_CSS_DIR) . 'ecs-frontend-style.css?ver=' . ECSL_VERSION; ?>" rel="stylesheet" />
        <?php if ( !empty($general_settings[ 'favicon' ]) ) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url($general_settings [ 'favicon' ]); ?>" type="images/x-icon" />
        <?php } ?>
        <!-- Styles-->
        <script>
            var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
            var ajax_nonce = '<?php echo wp_create_nonce('ecs_ajax_nonce'); ?>';
        </script>
        <!-- Scripts-->
        <script type="text/javascript" src="<?php echo esc_attr(ECSL_JS_DIR) . 'jquery-3.2.1.min.js?ver=' . ECSL_VERSION; ?>"></script>
        <script type="text/javascript" src="<?php echo esc_attr(ECSL_JS_DIR) . 'jquery.downCount.js?ver=' . ECSL_VERSION ?>"></script>
        <script type="text/javascript" src="<?php echo esc_attr(ECSL_JS_DIR) . 'ecs-frontend-script.js?ver=' . ECSL_VERSION; ?>"></script>
        <!-- Scripts-->
        <?php
        /**
         * Action to append any other section in head
         *
         * @since 1.0.0
         */
        do_action('ecs_head', $ecs_settings);
        $template_class = 'ecs-template-' . $template;
        ?>
    </head>
    <body class="ecs-wrap <?php echo esc_attr($template_class); ?> ">
        <?php
        include(ECSL_PATH . '/inc/views/frontend/templates/template-' . $template . '.php');
        include(ECSL_PATH . '/inc/views/frontend/dynamic-styles/style-template-' . $template . '.php');
        ?>
    </body>
</html>
