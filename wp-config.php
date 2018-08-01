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
define('DB_NAME', 'hydrographica');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '870918');

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
define('AUTH_KEY',         '4uori5pvrepw5fct4sywlduw4v63rq6mxopbcvcbhyxpvlx1ukeh8ugiwwhc4vyd');
define('SECURE_AUTH_KEY',  'xmokwpyekdxbg1bgvt1ootjlli6je5qrqi7eqdqqv4ecg9vx8yf11ohunpserjar');
define('LOGGED_IN_KEY',    '8dfl0nqfar0fcqv9pkjnr6ibhjlnb4uejmgpbikzb3fpvjzk30lmu8eksvrspsrz');
define('NONCE_KEY',        'bu1s9h8o2l7r1dyhzvhyhavwfjyoxhtyxysw4x8nstjcctryvlgnzponqelxuf3h');
define('AUTH_SALT',        'jedomtxtxn98iwhsbpdtpmplsrqtgtohfv5f5q0j2qyqoy4yfgm0gewnpimdkdzc');
define('SECURE_AUTH_SALT', 'd1ic1lzg3nasebqgasfrmz3s3ikewxyunqnaamvykaq70byoxi3tluu0rm1ucljj');
define('LOGGED_IN_SALT',   'llmmnkdwmxdnj0zclleczg49iec5rng185gdxcthmeq8z8sxq2dbc0fb2walsjzn');
define('NONCE_SALT',       'eccpmwtcv6f20g0nr0bdb2l6dqmmf15dhattghwlaogfzjcxyioswk2wexkg8oly');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wptv_';

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

define('FS_METHOD', 'direct');
