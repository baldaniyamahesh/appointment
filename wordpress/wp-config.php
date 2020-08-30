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
define( 'DB_NAME', 'appo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'i`jna;lH15nGMXn.{@z*|P5HlzQ/m7kN:Wq9[81rOj@N30>]S1CtHDhh[0uOPI*!' );
define( 'SECURE_AUTH_KEY',  ' Z~P[1}xUJE`Hk^e[`~S->-uHFv@^K#FopevY0dtU0h%<`zr_!Tgihc/I;)VhVId' );
define( 'LOGGED_IN_KEY',    'Y zrrzYt!9{cV!VCW7;;K%MrUI[QPY39%=cPS!K~A=f>)-o@+f`7H|9lfz]G`*$&' );
define( 'NONCE_KEY',        'n*^58g6{PzMs.{ ;Hc0v@5u/F=>1jdzh+S0q/Z@;_glky.WTF>#=iTQoWxK8?HFZ' );
define( 'AUTH_SALT',        '>5:e<+HxU9wkoZEA#9^Lnxzf:Ri{GKQuU2+`an3MkCPhpek1^JIKnWT1_C3%)60^' );
define( 'SECURE_AUTH_SALT', ',V4X21J}Pz6nL?8pbuf3FD)*k_#dKe)g|[tTdmD+v?.T=9ojC?r@`}|c_GOfSwZh' );
define( 'LOGGED_IN_SALT',   't=|)_TND^sArYj|r:Zdmwo}qV#mS{!6+eIm,7CZ<MLYMc*sh?T#&z2)G1n6h:u}=' );
define( 'NONCE_SALT',       ' (wTon@hYF7-9eZES.3/P|c$46kE-$`W#Yy|<}p,R^w,&;n-:rlnn:AgGw]UVdS#' );

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
