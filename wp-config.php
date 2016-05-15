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
define('AUTH_KEY',         '(D}e~eaz<e8C,._H{+L:-26H:G<x_br1atkwH?-9UpIzlNw6gNC4*OE?5gg-XAog');
define('SECURE_AUTH_KEY',  'Xn,q-T-v_,aC v/Sw|/f_Nf*RTWt BjGJXf1JFvfW-;uPxm{@lNvw&dmnS8F3B&x');
define('LOGGED_IN_KEY',    'v+9m)|GGDiWIlsy0!sRulObafyBz0Gq5^?7yYMj4*Zy$P)^j7F1ou]^]/;vC{/@i');
define('NONCE_KEY',        'n)V)k]7_v&tU(^5*e4G(fgl! Z7}uA-=+5J3usw_vt_-GR~K{F+fYt]s}xC{&,[&');
define('AUTH_SALT',        'V}Qr3p<o1(QE`Yns1k0/It|}exG*Ib1|Unp_i(na]Kf*9D~1JrpcF]MlpJd||J[z');
define('SECURE_AUTH_SALT', '$M40-;}f@lH{qU)zohhQQb.!;%^b1YQ86d`yxy)1g`v8%Ueri(*C@[S&=anm{>Kz');
define('LOGGED_IN_SALT',   '$T7$3AVNRs%jGE.2zrxAVr-4_#[b*XmXN#52F~a)yP~nD2,noW@5k6cl#Q(Qhsh ');
define('NONCE_SALT',       'w?T{bx3|3n)Dx+,lylbaRNji5-;J!b(PJ-wl.L]bo3nTDw1><7,qXxuZ|WwThL-n');


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
