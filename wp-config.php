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
define( 'DB_NAME', 'corsivalab-exam' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'dO<K^U-fc+Tc$[iXc/3{o-Qyl*pL_^VOMrG6yY)UsU&Sr/H9z(xV>v@d^YWJCFL|' );
define( 'SECURE_AUTH_KEY',  '+8WXAX1I=h>z>SQ)]{Z?<#fxTtV Ql]UbPfpf8/$j%P(Q~/0x3Li7*BcjA{J/V},' );
define( 'LOGGED_IN_KEY',    'oXKj,Jr4Li~8X/k_E&4=-:r^(_iFbZ69rnQm^1I@k:~CI&RA-4mln.k(qK3@lP:{' );
define( 'NONCE_KEY',        '-465P+x. z?]Mno%wCd@ot|kLZL@f,-2eOMm]f1k?u(nqNq4J*tvF?2mZ+`ofD,g' );
define( 'AUTH_SALT',        'Uwjvd%pg2|N(P_d x|8ZTLNNMSJ9DDqtG[08f.&ZMRl,$e9rb5Z^#iilbRYigQ%s' );
define( 'SECURE_AUTH_SALT', 'k,Px*p{;]93cSz8Vm=b4>pA2F)ZwH2$C:Ow;m$a:-bG`;i>D8c _/CT|8L{xVNt&' );
define( 'LOGGED_IN_SALT',   'P4IC6NxSJK h_MoO97nQFq92OrtA[+]HA:wMRYW@F&|@Ms,+une`a[pl)F.yF>Z^' );
define( 'NONCE_SALT',       'g4T_&@l23Od&j(aC/snjB_`i:VA{d<]u}zhgng:.xg(K{X~1;/~j+4fHWhQMo$d=' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
