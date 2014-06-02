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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'scalalux_new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'u}-O> 8*sO<r[~i8h &)|M)Eg~|$+F<:SB^hRN].nXX]vbw`G:=kEJ+yV)wS&8}a');
define('SECURE_AUTH_KEY',  'a8D!b=^/:bj*aItqEABZ|>)}2bnrh;T:hdWBs!GPjs}wO!1YZ#~=@=BJA|1{kl^z');
define('LOGGED_IN_KEY',    'W1u9fX5E`f^]iv$k491HaJ-_sqE>%s;C~u0i[G[w:`S@H iF ;y{/-P/p[$0=+Z$');
define('NONCE_KEY',        'u||Hg46`[qh~pwK_?V+X;>?!~nd3)8kv=81)Vp[y^]=Q+(fA@VRXyX0on_vTcayU');
define('AUTH_SALT',        'd]-GJRa-dR;l3[8+e,L/}7X&[VU-[}fb$$}F3t}+|7kcSc>k2v+t(wF}9-NA-ZiP');
define('SECURE_AUTH_SALT', '!wlk_]|SkO.uGfU!Kh$K.A5?nj};t=$X)L!g+nNWK0FxJ%)3@EGj>>Ye ~X+umHj');
define('LOGGED_IN_SALT',   'V-gh2d[SGkt&c*;+7cerXb_46-mcW4HVgM]G+;L1>Au5Z5}QYswu4kQ|-o`(Q#O{');
define('NONCE_SALT',       'nC.l*%8gqil+jc1KQw/%f2kjZE qQ+C@J*7M8/_j ]3~Q$PU@Qyoijsw!y>[GG- ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sc_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
