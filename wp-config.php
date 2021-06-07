<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

define('WP_ALLOW_MULTISITE', true);
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
define( 'DB_NAME', 'bitnami_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'bn_wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'd3e0800469' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:3307' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '2b1781cc2caf66f23a01504b8d95a4f940f9796b435562697f079b835b880166');
define('SECURE_AUTH_KEY',  'dd69b20684a37b4cde5e0a471e8c24d312c4d9937a32f73e5825b5a98ff54e42');
define('LOGGED_IN_KEY',    '1b7eb32981fde1ba411efe5e33a86531e389b5baf4af62797fe10c7bfff16f3c');
define('NONCE_KEY',        '1ab99670200c105b7df23dfd8eb90071843277edb0bb6477c8809c695092499f');
define('AUTH_SALT',        'a58051a98164c90c5a30c6a6bfae94525d04411a0f4755deb8e2cfa3b6503080');
define('SECURE_AUTH_SALT', 'e16f930115bdf439d574e1ea9a44bb00f722af76f2db241d0700ac7277c6f127');
define('LOGGED_IN_SALT',   '0473a77d17b31ddf34e36af9faab7b562f545ad7ff7524ab5f3acfd802a9256e');
define('NONCE_SALT',       '6395ac0a66fbdd7c658fd5d3ed92f08e98146be73694a84ab9d04a6e28b68801');
define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', false);
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

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

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );


/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('WP_TEMP_DIR', 'C:\Bitnami\wordpressmultisite-5.7.2-0/apps/wordpress/tmp');


//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/

if ( !defined( 'WP_CLI' ) ) {
    // remove x-pingback HTTP header
    add_filter('wp_headers', function($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    });
    // disable pingbacks
    add_filter( 'xmlrpc_methods', function( $methods ) {
            unset( $methods['pingback.ping'] );
            return $methods;
    });
    add_filter( 'auto_update_translation', '__return_false' );
}
