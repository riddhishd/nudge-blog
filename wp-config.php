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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */


// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

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

define('AUTH_KEY',         '1<i;v[. <9%|t#o#KgN2:-OkpxQKRj@?/o6Ta0m0q!M /o/n}bxZa^s*YgYb>YV~'); 
define('SECURE_AUTH_KEY',  'Hl-o=P=LyCSdk|i/&M-TU=;GO%Ptdj%EK-[w%~J#+:59mNy?y)K}+8,wv&?/c,&3'); 
define('LOGGED_IN_KEY',    '+g[7a+Q;aA}$Gb!8tE^uIb99T|~H2qSnJ0+/cu~vGYVhn|{Jsq1p@!u&beG>|!qu'); 
define('NONCE_KEY',        '8-*|5Ci  i-TWy2IX+.i?`RI,Q+g<x,vF9PS3#.hFI]I%MoPH2U9Gd_mShj|ky+}'); 
define('AUTH_SALT',        'bG|&YQn9},[.kr8sU#igg[qDWD^]17v6wugmE#6n-hH4Oj)A-Iuy_vP.jRt&&.`<'); 
define('SECURE_AUTH_SALT', 'n~:!Sp#fB>I,e)xL^`PmD2*+!l,KQ8YQ(Te=+50?(pUY}mlE<|X%zTm:AX9/Lv^>'); 
define('LOGGED_IN_SALT',   'j{b |I- j4/8SwhrY.NNV}+U9eBzyVN;?+Z)@=:0D@H2ic=qPrwb|{3,v~Y2{@L`'); 
define('NONCE_SALT',       '}BdUX;jBvv2we*|t#:&3FET-y.GmROy]T-FovV4#kr,] R-C9FRq9jP7-1JX+x[.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
