<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nrm5r00vruh3zc8i' );

/** MySQL database username */
define( 'DB_USER', 'a62yh255123246b2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xrd8gnoxxv0d3t7i' );

/** MySQL hostname */
define( 'DB_HOST', 'ulsq0qqx999wqz84.chr7pe7iynqr.eu-west-1.rds.amazonaws.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nrV2$Fj=p6vrUl5b4>!{!(jKwI2|6V?buD-f9l0$3E@9@=0,W:`h0Ck^t8/8LuxT' );
define( 'SECURE_AUTH_KEY',  '/Y=,@O&]j-)pr^jK:d)vb2>-Ed rhWssXUE/mDNOxL:jOgJ/j[.y^8^ #L81S`a~' );
define( 'LOGGED_IN_KEY',    'ndoI<l,<21/EWaP#3,J.@;] hpC_2]Afqu{L,7n7D[p[lO}],%Y4la6{%J:0_ELd' );
define( 'NONCE_KEY',        'eYjgxL@H?I/z1y7{TUO9jC]OcRbO6d%JyL9D]QqIfOyWzi1P8S(n+f?0HhqJt+tM' );
define( 'AUTH_SALT',        'jek#!,0jj`*uHr1wXRT.=WbHS9DU&Fng%NO)Jrk_%DyTs [z8.zj66}lnjs(k~zP' );
define( 'SECURE_AUTH_SALT', '~b&8&kmKTD1S.>;;Q$91g1ZWIOgi5P9~,-Ja4 cnxpv@|tl[/SCh`j}r3<%u:E*_' );
define( 'LOGGED_IN_SALT',   '[xzL}2[,_K=yeG=W_y yZ&Qi:L0IejHB4E9=zFr3Iq/iuGa]p7q%tO>+be1]^t_*' );
define( 'NONCE_SALT',       'QVVzY-3=z{L(?t%UHREmBS4[(uVk/m?lBd~T@lp6)yBp_@aiy&~R3aktc*m@Q1[Z' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
