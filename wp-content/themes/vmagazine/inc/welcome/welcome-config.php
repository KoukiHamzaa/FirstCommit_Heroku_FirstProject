<?php
	/**
	 * Welcome Page Initiation
	*/

	include get_template_directory() . '/inc/welcome/welcome.php';

	/** Plugins **/
	$plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'siteorigin-panels' => array(
					'slug'      => 'siteorigin-panels',
					'filename' 	=> 'siteorigin-panels.php',
					'class' 	=> 'SiteOrigin_Panels'
				),

				'newsletter' 	=> array(
					'slug'      => 'newsletter',
					'filename' 	=> 'plugin.php',
					'class' 	=> 'Newsletter'
				),

				'regenerate-thumbnails' => array(
					'slug'      => 'regenerate-thumbnails',
					'filename' 	=> 'regenerate-thumbnails.php',
					'class' 	=> 'RegenerateThumbnails'	
				),

				'woocommerce' => array(
					'slug' => 'woocommerce',
					'filename' => 'woocommerce.php',
					'class' => 'WooCommerce'
				),
				
			),
			'pro_plug' => array(

				'vmagazine-companion' => array(
					'slug' 		=> 'vmagazine-companion',
					'name' 		=> esc_html__('Vmagazine Companion', 'vmagazine'),
					'filename' 	=> 'vmagazine-companion.php',
					'class' 	=> 'Vmagazine_Companion',
					'host_type' => 'remote', // Use either bundled, remote, wordpress
					'location' 	=> 'https://accesspressthemes.com/plugin-repo/vmagazine-companion/vmagazine-companion.zip',
					'screenshot' => 'https://accesspressthemes.com/plugin-repo/vmagazine-companion/screen.png',
					'version'	=> '1.0.3',
					'author' 	=> 'AccessPress Themes',
					'info' 		=> esc_html__('This plugin is required to make the theme work properly', 'vmagazine'),
				),

				//vmagazine elementor addons
				'vmagazine-elementor-addons' => array(
					'slug' 		=> 'vmagazine-elementor-addons',
					'name' 		=> esc_html__('Vmagazine Elementor Addons', 'vmagazine'),
					'filename' 	=> 'vmagazine-elementor-addons.php',
					'class' 	=> 'VMagazine_EA',
					'host_type' => 'bundled', // Use either bundled, remote, wordpress
					'location' 	=> 'https://accesspressthemes.com/plugin-repo/vmagazine-elementor-addons/vmagazine-elementor-addons.zip',
					'screenshot' => 'https://accesspressthemes.com/plugin-repo/vmagazine-elementor-addons/screen.png',
					'version'	=> '1.0.1',
					'author' 	=> 'AccessPress Themes',
					'info' 		=> esc_html__('This plugin adds custom made elementor elements', 'vmagazine'),
				),

				'ultimate-form-builder' => array(
					'slug' 			=> 'ultimate-form-builder',
					'name' 			=> esc_html__('Ultimate Form Builder', 'vmagazine'),
					'version' 		=> esc_html__('1.3.3', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=>'ultimate-form-builder.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/ultimate-form-builder/ultimate-form-builder.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/ultimate-form-builder/screen.png',
					'class' 		=> 'UFB_Class'
				),


				'accesspress-social-pro' => array(
					'slug' 			=> 'accesspress-social-pro',
					'name'      	=> esc_html__('AccessPress Social Pro', 'vmagazine'),
					'version' 		=> esc_html__('1.3.5', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'accesspress-social-pro.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/accesspress-social-pro/accesspress-social-pro.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/accesspress-social-pro/social-pro-img.jpg',
					'class' 		=> 'APSS_Class'
				),

				'ultimate-author-box' => array(
					'slug' 			=> 'ultimate-author-box',
					'name'      	=> esc_html__('Ultimate Author Box', 'vmagazine'),
					'version' 		=> esc_html__('1.0.15', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'ultimate-author-box.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/ultimate-author-box/ultimate-author-box.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/ultimate-author-box/screen.jpg',
					'class' 		=> 'Ultimate_Author_Box'
				),

				'everest-coming-soon' => array(
					'slug' 			=> 'everest-coming-soon',
					'name'         	=> esc_html__('Everest Coming Soon', 'vmagazine'),
					'version' 		=> esc_html__('1.0.4', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'everest-coming-soon.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/everest-coming-soon/everest-coming-soon.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/everest-coming-soon/screen.png',
					'class' 		=> 'Everest_Coming_Soon'
				),

				'accesspress-instagram-feed-pro' => array(
					'slug' 			=> 'accesspress-instagram-feed-pro',
					'name'         	=> esc_html__('AccessPress Instagram Feed Pro', 'vmagazine'),
					'version' 		=> esc_html__('2.1.5', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'accesspress-instagram-feed-pro.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/accesspress-instagram-feed-pro/accesspress-instagram-feed-pro.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/accesspress-instagram-feed-pro/screen.jpg',
					'class' 		=> 'IF_Pro_Class'
				),
				
				'accesspress-anonymous-post-pro' => array(
					'slug' 			=> 'accesspress-anonymous-post-pro',
					'name'         	=> esc_html__('AccessPress Anonymous Post Pro', 'vmagazine'),
					'version' 		=> esc_html__('3.2.3', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'accesspress-anonymous-post-pro.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'location' 		=> 'https://accesspressthemes.com/plugin-repo/accesspress-anonymous-post-pro/accesspress-anonymous-post-pro.zip',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/accesspress-anonymous-post-pro/screen.png',
					'class' 		=> 'AP_Pro_Class'
				),


				'revslider' 	=> array(
					'slug' 		=> 'revslider',
					'name' 		=> esc_html__('Revolution Slider ', 'vmagazine'),
					'version' 	=> esc_html__( '5.4.6', 'vmagazine' ),
					'author' 	=> 'ThemePunch',
					'filename' 	=>'revslider.php',
					'host_type' => 'remote', // Use either bundled, remote, wordpress
					'location' 	=> 'https://accesspressthemes.com/plugin-repo/revslider/revslider.zip',
					'screenshot' => 'https://accesspressthemes.com/plugin-repo/revslider/screen.png',
					'class' 	=> 'RevSliderFront',
					'info' => esc_html__('Slider Revolution 6 is a new way to build rich & dynamic content for your websites. With our powerful visual editor, you can create modern designs in no time, and with no coding experience required.', 'vmagazine'),
				),

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'vmagazine'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'vmagazine'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(

			),

			// Pro Plugins
			'pro_plugins' => array(

				'woo-product-grid-list-design' 	=> array(
					'slug' 		=> 'woo-product-grid-list-design',
					'name' 		=> esc_html__('WOO Product Grid/List Design- Responsive Products Showcase Extension for Woocommerce', 'vmagazine'),
					'version' 	=> esc_html__( '1.0.3', 'vmagazine' ),
					'author' 	=> 'AccessPress Themes',
					'filename' 	=> 'woo-product-grid-list-design.php',
					'host_type' => 'remote', // Use either bundled, remote, wordpress
					'link' 		=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fwoo-product-gridlist-design-responsive-products-showcase-extension-for-woocommerce%2F23167226',
					'screenshot' => 'https://accesspressthemes.com/plugin-repo/woo-product-grid/woo-product-grid.jpg',
					'class' 	=> 'WOPGLD_Class',
					'info' 		=> esc_html__('Design your WooCommerce shop like never before! A complete package for your Woo shop designer.', 'vmagazine'),
				),

				'woo-badge-designer' => array(
					'slug' 			=> 'woo-badge-designer',
					'name'         	=> esc_html__('Woo Badge Designer - WooCommerce Product Badge Designer WordPress Plugin', 'vmagazine'),
					'version' 		=> esc_html__('1.0.1', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'woo-badge-designer.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 			=> 'https://1.envato.market/LyK3o',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/woo-badge-designer/woo-badge-designer.jpg',
					'class' 		=> 'WOPGLD_Class',
					'info' 			=> esc_html__('Add some attractive badges on your product listing and single page and increase your sales upto 55%.', 'vmagazine'),
				),

				'wp-admin-white-label-login' => array(
					'slug' 			=> 'wp-admin-white-label-login',
					'name'      	=> esc_html__('WP Admin White Label Login - WordPress Plugin For Advanced Customizable Login page', 'vmagazine'),
					'version' 		=> esc_html__('1.3.5', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'wp-admin-white-label-login.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 		=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Fwp-admin-white-label-login-wordpress-plugin-for-advanced-customizable-login-page%2F23127723',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/wp-admin-white-label-login/wp-admin-white-label-login.jpg',
					'class' 		=> 'WP_Admin_White_Label_Login',
					'info' 		=> esc_html__('Make your default wp-admin screen look like a non WP one! Choose from some great ready to use template designs and many features to boost your WordPress backend.', 'vmagazine'),
				),

				'easy-side-tab-pro' => array(
					'slug' 			=> 'easy-side-tab-pro',
					'name'      	=> esc_html__('Easy Side Tab Pro - Responsive Floating Tab Plugin For Wordpress', 'vmagazine'),
					'version' 		=> esc_html__('1.0.6', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'easy-side-tab-pro.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'link' 			=> 'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Feasy-side-tab-pro-responsive-floating-tab-plugin-for-wordpress%2F22296723',
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/easy-side-tab-pro/easy-side-tab.jpg',
					'class' 		=> 'ESTP_Class',
					'info' 		=> esc_html__('Place some great designed floating tabs on your site for quick links. Increase accessibility of your site.', 'vmagazine'),
				),

				'everest-timeline' => array(
					'slug' 			=> 'everest-timeline',
					'name'         	=> esc_html__('Everest Timeline - Responsive WordPress Timeline Plugin', 'vmagazine'),
					'version' 		=> esc_html__('2.0.2', 'vmagazine'),
					'author' 		=> 'AccessPress Themes',
					'filename' 		=> 'everest-timeline.php',
					'host_type' 	=> 'remote', // Use either bundled, remote, wordpress
					'screenshot' 	=> 'https://accesspressthemes.com/plugin-repo/everest-timeline/everest-timeline.jpg',
					'class' 		=> 'APMM_Class_Pro',
					'link'			=>'https://1.envato.market/c/1302794/275988/4415?u=https%3A%2F%2Fcodecanyon.net%2Fitem%2Feverest-timeline-responsive-wordpress-timeline-plugin%2F20922265',
					'info' 		=> esc_html__('A perfect timeline maker! If you\'re planning to make one go for it!', 'vmagazine'),
				),
			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'VMagazine Setup', 'vmagazine' ),
		'theme_short_description' => esc_html__( 'VMagazine is a modern multi-concept premium WooCommerce theme that has been specifically designed to create great ecommerce/online stores. This powerful and flexible theme is perfectly suitable for any eCommerce website for almost products or services - be it clothes, medicines, shoes, accessories, phones, lamps, bags, gadgets or basically anything.', 'vmagazine' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'vmagazine'),
		'deactivate' 			=> esc_html__('Deactivate', 'vmagazine'),
		'activate' 				=> esc_html__('Activate', 'vmagazine'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'vmagazine'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'vmagazine'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/vmagazine/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'vmagazine' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'vmagazine'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'vmagazine' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'vmagazine' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'vmagazine' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'vmagazine'),
		'installed_btn' 	=> esc_html__('Activated', 'vmagazine'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'vmagazine'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'vmagazine'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'vmagazine'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'vmagazine' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'vmagazine' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'vmagazine' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'vmagazine' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'vmagazine' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Vmagazine_Welcome( $plugins, $strings );


	