<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '#T+Y]^b)1E;(yc:AzgT:q[bUI SCgO !wrlyI*BTrm|o&86k|VRWLmUS.#HX/83o' );
define( 'SECURE_AUTH_KEY',   '$]jM6_t9|ew&3Ffn!A:f7sh~0:<eVc&MtFb(d;t&Jzt3V!j5Z;^>~YQ17  *AT*_' );
define( 'LOGGED_IN_KEY',     '^Gt3*<nS2MM!XY>O*/Jk6s7ZhNHE4wQ0u5Pf<P+//dVAueGK..~+3QcH;ujB}=:6' );
define( 'NONCE_KEY',         'AxLV8w% b{L0;NA?<]j0NHbD)`GzpM=^hPYP@oDS@:/adAK&JRt$}%4@04sgkp,I' );
define( 'AUTH_SALT',         '#j`e/I%|5D&7z$x_mOT>]724[jB`}*Z9Zp+>j<gc@, `Wn/j@5#j:K~949*)fp$A' );
define( 'SECURE_AUTH_SALT',  '=}Zylym%DsM;6`DU`L:-h#R#&Kr{?SDsmsx-/zIsEVY^Ip%7Ea#xj:JUbl#dg*yf' );
define( 'LOGGED_IN_SALT',    '|P3}HrzF/ 6n{!Nbi<r-iuxfqL.}h$+2 ^6Z14]c`d{ bK&`kw7FF(]%>^F|pc]s' );
define( 'NONCE_SALT',        '=EOl&`~=%R4s;Yfm&2M-dcDwLl.sJ x&|1pCKaEzW!nPZih uQ~&]*ks+~wp7-`7' );
define( 'WP_CACHE_KEY_SALT', '<`4C8Bbpclh+6~7%mcK5Bs6p8wTE18{`Ai,KJi>Dud.NIU;z7?Dv`=h^1W+,z9{!' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
