<?php
define( 'WP_CACHE', true );
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
define('DB_NAME', "wordpress_news");

/** MySQL database username */
define('DB_USER', "root");

/** MySQL database password */
define('DB_PASSWORD', "");

/** MySQL hostname */
define('DB_HOST', "localhost");

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
define('AUTH_KEY',         '9Plkh8nWe.[(gh?k)m&AM1/$ VaG@uUA`$3cV/ Sk1;yuR!_0O|eLEz.J=/2O0v&');
define('SECURE_AUTH_KEY',  '?9Q#QE:DbqBnyBKk{78;iR3SasR1EH#wiRrL:#3]B~9owf!#Q4AXiTTr-2g=nK/f');
define('LOGGED_IN_KEY',    '`FU+kqhlfdX?(I6ouly&%dc=dVRbW7h3?Ua-=dAdoPMleJS]Uj=neUVuW? Q+>~^');
define('NONCE_KEY',        '=@9O`Zv>^b,7Nm?717%}_&X,?zfecO?`(/}`aiNQEG<7JgF;$8Tm8cj<k9>@J+nr');
define('AUTH_SALT',        'y/hT;xxmN8YyQ@81yl2(o^3oLYa+sn}lYk.BaWPT6C,_ZB!_vA;>.PO,9zYZn<.C');
define('SECURE_AUTH_SALT', 'Q@V^g5}*n.f^$GjID-d_wJ05hg4BRvzQCC+4P,@4}yu%SOD_-i7tI9Qtj]ouPWR^');
define('LOGGED_IN_SALT',   '$<yfl^uS@{q`#hb`)2X;dOW9_6)Kc&fUmD8F;=4w!KV7Ck5<oU&!N-~wn5>?^v6T');
define('NONCE_SALT',       'Nc5f3^II;sa:stRZsi)1uP%0L1dv@k}R-4(?7rcF,}ud2@zX6P55m5J+h(q%!wyL');

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
