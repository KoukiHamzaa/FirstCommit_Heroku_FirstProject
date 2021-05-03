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
define( 'DB_NAME', 'r1cb9s9wb7dbyzz3' );

/** MySQL database username */
define( 'DB_USER', 'd8wxxb6yc8dp8dlj' );

/** MySQL database password */
define( 'DB_PASSWORD', 'zv389xpo7tm2csz3' );

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
define( 'AUTH_KEY',         'b8qI$Tms^5b~K&-*$c7rZ/HFh$SDu$(hr=K:ayF~t$>&W+rcu76;Emg;Y.b[)_Ga' );
define( 'SECURE_AUTH_KEY',  '1mIzDHO3I-5@@|GWBC]*L^0GF>WZSR@9A1}!L1ejD6B$lcaZL,oJTX0E52&8$/SV' );
define( 'LOGGED_IN_KEY',    'q]*+3Oa8?Nc}k.q-Zxr%/Fd<x=cb/%$9y.?,P3DWpq,v8B/lwdBD@VXkjg+gZ2/3' );
define( 'NONCE_KEY',        'tRse=erHVp_9YH(G&r:Bvmd4HZishEieb/pYbY.tS>H)UH~03QBZ%MTE-YZZ>7ww' );
define( 'AUTH_SALT',        '!&4FNcvN#Y)Kn9j4qwWKFWIL?,bCgl7Ro/Qs~@TR9|j/giK6p@:4.JxmpY%lyoa.' );
define( 'SECURE_AUTH_SALT', 'K/,.AZ+G#wG`Va+CriZjF|d6M?svt>:ieZI7Wf.f$xV:NlD=A[9,ydnGhMjqZ~gh' );
define( 'LOGGED_IN_SALT',   '=fQnMx0orW0l7^Ke^J3vTD=MT!}R(,.w|]?7Ii-U,&~a1*|5B#bouYpgha,$Kbj<' );
define( 'NONCE_SALT',       '-8SgPiv_-qD9]8$KGabGu#$ma QIk9Bt^ZD,&NxGCH6W&>AcnfNWYyJ:utvA7qsT' );

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
