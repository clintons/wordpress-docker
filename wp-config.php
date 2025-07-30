<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress');

/** MySQL database username */
define('DB_USER', getenv('WORDPRESS_DB_USER') ?: 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: 'password');

/** MySQL hostname */
define('DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'db');

/** WordPress URL settings */
define('WP_HOME', getenv('WP_HOME') ?: 'https://jtwg.dwdbcnc.net');
define('WP_SITEURL', getenv('WP_SITEURL') ?: 'https://jtwg.dwdbcnc.net');

/** Handle SSL termination by Cloudflare */
if (isset($_SERVER['HTTP_CF_VISITOR'])) {
    $cf_visitor = json_decode($_SERVER['HTTP_CF_VISITOR'], true);
    if ($cf_visitor && $cf_visitor['scheme'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
    }
} elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
} elseif (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') {
    $_SERVER['HTTPS'] = 'on';
}

/** Enable WP Debugging */
define('WP_DEBUG', getenv('WP_DEBUG') === 'true');
define('WP_DEBUG_LOG', getenv('WP_DEBUG_LOG') === 'true');
define('WP_DEBUG_DISPLAY', getenv('WP_DEBUG_DISPLAY') === 'true');

/** Force SSL for Admin Area */
define('FORCE_SSL_ADMIN', getenv('FORCE_SSL_ADMIN') !== 'false');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         getenv('WP_AUTH_KEY') ?: 'put your unique phrase here');
define('SECURE_AUTH_KEY',  getenv('WP_SECURE_AUTH_KEY') ?: 'put your unique phrase here');
define('LOGGED_IN_KEY',    getenv('WP_LOGGED_IN_KEY') ?: 'put your unique phrase here');
define('NONCE_KEY',        getenv('WP_NONCE_KEY') ?: 'put your unique phrase here');
define('AUTH_SALT',        getenv('WP_AUTH_SALT') ?: 'put your unique phrase here');
define('SECURE_AUTH_SALT', getenv('WP_SECURE_AUTH_SALT') ?: 'put your unique phrase here');
define('LOGGED_IN_SALT',   getenv('WP_LOGGED_IN_SALT') ?: 'put your unique phrase here');
define('NONCE_SALT',       getenv('WP_NONCE_SALT') ?: 'put your unique phrase here');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('WP_TABLE_PREFIX') ?: 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>