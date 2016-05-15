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

define('AUTH_KEY',         '}|Sk]gSM*(.{Xuv<4fPL#o>:&0QI)p8?QtdKg0l=y tLsEaGr,bY+XxXR?.Fnav8');
define('SECURE_AUTH_KEY',  '[UShPei3EV3761+y*Gqa,h/q9E#xFkUMCjZ!Nyg-a}xb|2Fu:cVu%RyIOhu9gRb;');
define('LOGGED_IN_KEY',    'cep[:_{Ye61|fRwwy*|y8=3Yv{XGR+3Ps,/y=+qK+PK&pyUheNca51|O1$KY9O,9');
define('NONCE_KEY',        'CrO2aYbG%R+x,iF4CzJC/m0r=- }P;Hk`e.5so!~6yxz:0S)XEwpIaudOv?&:.Q!');
define('AUTH_SALT',        ' r|~rTh|<#-$+$[C|$le-y< _JC:Q9t:dFk<?><jSdRWi@x`q]<j h!kYb+/]e8Q');
define('SECURE_AUTH_SALT', 'R<t|4w-`fiIvrLCF,qS2y-:htn.]9y|DE`EV[EbyC5&|IIqD1SIc{oT}8>+]l|:e');
define('LOGGED_IN_SALT',   '6T4:bFa{@6`{>z+TzsPNB* :`|dcs?8O#WvrcbMo@5Qrq9,p$ay|bj_5w BdABe_');
define('NONCE_SALT',       '%Z&yjg**84:(4opJ$UoJ~<SNLw>|2hF1pu6PYRk3_K9.^C@Fx2e&DP&PSar=TbmS');

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
