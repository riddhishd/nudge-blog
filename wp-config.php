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
define('AUTH_KEY',         'E%hmW-[@C`7_ZUd_nxxe,gBE@9-Cg(NXmKqOlYxM%+xH>W=^8+s-~3`-`.2ptsSO');
define('SECURE_AUTH_KEY',  'S,*2}~/(43X!|m+WFy#ng|.|uWT|1!;-d|N?o@:OjbG@h%HPRC^G-9@kDRdSSZK2');
define('LOGGED_IN_KEY',    '|X&* grU7{ZzOXab2TVE>}ZdhFm^7}+PCU=P]&+qjo.hxZx=;+NE?%EhF.<reC?2');
define('NONCE_KEY',        'q/1UTe-kGks1jqMClaMs3?lm7|4i.+6|-l]4)o;0CVDME-`+87~OoY2QVoZA;C5+');
define('AUTH_SALT',        'sS.J+XH$Dut=DR5<SO:QSROwq-J-&)d7GeSH[%hj[UidX(Ixlg2#UA-=%Y+YxNM[');
define('SECURE_AUTH_SALT', 'x.iBO[n9tIr3l,byHOqs*JnMhV.i L+m|[6r#:3z~J4I^ S3ro)[GpO<T|4a,B1j');
define('LOGGED_IN_SALT',   '!d}3A;Aj 2SV]^@l^;5vISKSoY*$0ehe[*$nAPneRJk:a|;N{u|Aq0(_y6lW{#<]');
define('NONCE_SALT',       'EAqU,|kGn!]_VHO|(}kOnF^ -.+?a>3rK}LckZnlpVhac`MH$I9VRjlV.TD1@FZl');
//define('AUTH_KEY',              getenv('AUTH_KEY'));
//define('SECURE_AUTH_KEY',       getenv('SECURE_AUTH_KEY'));
//define('LOGGED_IN_KEY',         getenv('LOGGED_IN_KEY'));
//define('NONCE_KEY',             getenv('NONCE_KEY'));
//define('AUTH_SALT',             getenv('AUTH_SALT'));
//define('SECURE_AUTH_SALT',      getenv('SECURE_AUTH_SALT'));
//define('LOGGED_IN_SALT',        getenv('LOGGED_IN_SALT'));
//define('NONCE_SALT',            getenv('NONCE_SALT'));
define('AWS_ACCESS_KEY_ID',     getenv('AWS_ACCESS_KEY_ID'));
define('AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY'));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
