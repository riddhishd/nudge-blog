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
// ** MySQL settings - You can get this info from your web host ** //
$url = parse_url(getenv('DATABASE_URL') ? getenv('DATABASE_URL') : getenv('CLEARDB_DATABASE_URL'));

/** The name of the database for WordPress */
define('DB_NAME', trim($url['path'], '/'));

/** MySQL database username */
define('DB_USER', $url['user']);

/** MySQL database password */
define('DB_PASSWORD', $url['pass']);

/** MySQL hostname */
define('DB_HOST', $url['host']);

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
define('AUTH_KEY',         'c:TM{#Fx5!zcA `_jwfC%#RWxMvWa/5BF&No)[fqcew,|-SoT,=zEJ*hW+qqC*0(');
define('SECURE_AUTH_KEY',  'UY$N2Knjk_Oe<BDhyNue2!iRD:j!Hha:~c|j]xLRI]Z9Lvv.M<p+,J9GzDa?3|aB');
define('LOGGED_IN_KEY',    '=hE~pEIw3e7g$Y~_--]F5(,plO!ME.@~c#pZ,Zr#IUbQ]l$}!-^&hrm:WVHPZ 5u');
define('NONCE_KEY',        'b.tedNmQRKk,%i N/xmSQ3+~-H]PuX^(p|Hg1<m5JiVV]H1$X(tU h%wNmju{nWE');
define('AUTH_SALT',        '4|Id<,87g-gYd02-=dyoP!ao *v=vK=A0a)o-0-W Kd_;jfDpNIe<5 ;$0Dg~zhf');
define('SECURE_AUTH_SALT', '>R<6J7A!=!6lNUK*Q[kq.&-p*TC.T0+DH%PQOomw(wowO1Uw{2f;f;FZ^_xS+J4|');
define('LOGGED_IN_SALT',   'G3-p3xaaR!V%)T+TyF+Pi)W7ogt<-jSS,(BAcfg*~mp4BJc/9==U,Gn-omY/pIt~');
define('NONCE_SALT',       '{]/`%pMjwbUU3e^.)G8*nw{3wx/`C .|PVY|_|3|$<@v`+@Y:7Y9^oZ_v||tq4^?');

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
