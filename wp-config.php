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
/** The name of the database for WordPress */
define('DB_NAME', 'wp_pwa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ')8(<*l8^L&xNz]|zix{Q`8v0t[r[z<w=-~1BVCY6[c*V!c|!2%7xRTgG.lgccZr.');
define('SECURE_AUTH_KEY',  '`K^ K,`0* xzpXcXPNchKe{BKUGeE%tRa)0O2!GZbS<+jPG[801!^N.Hp^=Z5T)}');
define('LOGGED_IN_KEY',    ']20kw;!Ic#]aq%%-7NgC_E 6[SKR(,+]uWBwIwHCFO wZ55O0HQE0HNzIsA$QJ>T');
define('NONCE_KEY',        '7=pcEQ-|+*6|281M5:c6Mm,>ALd7{{JZ%,*<%}e_!pF/mD$ cokMZh5nW|OOT-0^');
define('AUTH_SALT',        ',p*qlh@_/qgM,Mn9;%g-~xEAAq;|XbP`~6/3$x;M/Ai8 Fj;&ZB]*Cd@foR>/>vz');
define('SECURE_AUTH_SALT', 'w@>v+g|m@dTgFe?xv%SD6l&^d2j$ngc*XpOxebFs]Xj02xs7xGIJNo ++a [QkEg');
define('LOGGED_IN_SALT',   '*,Ibv)HAI@f$2M$<5sZs(#ux3@p/z.j3u=B+K@YN-#FR*]Fa?e_zwTK&*EdHBz-2');
define('NONCE_SALT',       ';9xEwIga~72zb!hk(NVFN[<}Ubfp#9HVa|j9J8lhl_]w|0uf:0@R-(shicfIb/E5');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
