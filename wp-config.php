<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sawasdeeproduct');

/** MySQL database username */
define('DB_USER', 'username');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'KQDD+Ho]qTgdAnR,,x8wFfyB@<7ukL{QS7+7&sGKh~texNJJnX7jcV1 OV>@c+p<');
define('SECURE_AUTH_KEY',  'I}B78j[AC_^eVc&<$1H)y.M]mGm-G%o0BtS@@,.%yB~,$ }b5bXbXd^b>[2[n0 -');
define('LOGGED_IN_KEY',    'J$SU_qx-DptX>{o[+>AP=.0h*V|446j~Z$Ruq|85Z>#8=oJ#6gu{xzIf9xrz{>@~');
define('NONCE_KEY',        '31WWmmHEZ>^r<8h%og#(?>Im/LO&k1:Mhe!pZ*5Mp_}^;IV6m{qCv_Qv)M7n!-r*');
define('AUTH_SALT',        'wkT/Myr*7Qy$Qz8!UH]+5_bs[H5QE+wP!_e^hPcA?HY9CcpEmCoaJ4S6/(;0BPr1');
define('SECURE_AUTH_SALT', ']`/ryxDed:*krlE=gEY7UH~$TIoD.N#(S~62eSakO8s+eMT%iBpW<dcFd.[#G1.t');
define('LOGGED_IN_SALT',   'gFlY*r+6r-=`E~_umvVtfN8=-7obJgH#+16cAd&4f)wv{z*z<TC+Uv2$Qlal}LA_');
define('NONCE_SALT',       'r]sC%t8+6#:B!c$#v{N{l~/ Gv,O}zKtnB>u`mME9%R}dz-~*[qK>&r*h SzRf[m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/sawasdee-product/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
