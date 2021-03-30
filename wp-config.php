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
define( 'DB_NAME', 'sql4402532' );

/** MySQL database username */
define( 'DB_USER', 'sql4402532' );

/** MySQL database password */
define( 'DB_PASSWORD', 'PzS7bfNVl5' );

/** MySQL hostname */
define( 'DB_HOST', 'sql4.freemysqlhosting.net' );

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
define( 'AUTH_KEY',         'cvt^;gEsBAExku=fwJ];{>|2%zw;uJ,P.jnlz64|s#}N?-UI;7x-7F.7XDGKCDI@' );
define( 'SECURE_AUTH_KEY',  '_Y79%jhjAU+p5#phOBP/=qp:w8.F)y3CURQoco]k_XQ<j3{MyZCECH_A6:v}g1|f' );
define( 'LOGGED_IN_KEY',    '~u~O;9I[uZ12TLgQZ=k)!Vo^;b6sn.)F%YzRMSI:YKZW5Ap1={yPLNN@@?d]Z?WT' );
define( 'NONCE_KEY',        '5Gr1Wc>)pf$pH__kxGnIl+Y1}_Hhr)=--nM#tdabK@Vy,q 5oEZ)1.Trk#jy)8}5' );
define( 'AUTH_SALT',        'z5&m~488()jHh!h>O5E0t7=M*_CZ1lwPNp|IvOxAL1`/uI(_reA~>LC|Q3jk `V ' );
define( 'SECURE_AUTH_SALT', '.wDzok_(x&GE:q+(a@]6:<hs#mk&~~4rH~^DgMKT:d:nDQXpr-dRms3|`/(Ku(Gq' );
define( 'LOGGED_IN_SALT',   'xL/W`nk7M&mf$PcLf6ElwovR/&Qn.L~sb@oG*^NtvNq:E^NX8@pH3G^DN~p[.}Ea' );
define( 'NONCE_SALT',       '$4t,w8L6u|A+_|kPILr8]>qtI*BRlux3M8RaKVhS6eE7[wR yp:??F@2ckh| kCd' );

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
