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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "chapter03" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ',za-z8=_Zttl(pt(b5:=;S%U;P6:rj0X@t8^|R:yy&X*T$h]%E@?|ha{[A`AKL^-' );
define( 'SECURE_AUTH_KEY',  '&zppqPfd?G@%/!;;8a1~ybx*#06pcj(4TQCQ$E(N@4[mGjLu 5t2X{+jMq`QZ>FM' );
define( 'LOGGED_IN_KEY',    '7zI0],V!z<7=]1L>:_)lV3CXTOJ%rGcf7/6Sq9,7GO_1Lo@=f8GhCH?6<$LvkAaO' );
define( 'NONCE_KEY',        'MsS&G^kpU5FiTx]!cs$ssC]f:8[*Dv%+n2IE0L_*b5IFGIFpb$1y@ilau&D5`&jO' );
define( 'AUTH_SALT',        '`@@!YG7F_;(O=OuS9N>qAMoNCS*tn-2Gky*vS0Xaj,?j|sl@y&k_jlz[(#@K6^nL' );
define( 'SECURE_AUTH_SALT', 'A@5n=aEDz!WY+293Dchnh39VbI1=W.<g(wKEBr7F]GAXQ!XzADCQdgz+qv5hYF=p' );
define( 'LOGGED_IN_SALT',   'gsMu(Em;(:Is4uKbB2FLi2S9_)6<X)z;BR_izf~d (F5wUD(O@xiac4I+98!^?Fd' );
define( 'NONCE_SALT',       '_xv#B0?i-NaZz{q{5tN s;8NVk14LDJbk5ntI B&8&,U:f=bfkBlN5{{M&Y/rO8}' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_SITEURL', 'http://localhost/chapter03/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
