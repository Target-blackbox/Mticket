<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'if0_37267762_wp807' );

/** Database username */
define( 'DB_USER', '37267762_1' );

/** Database password */
define( 'DB_PASSWORD', '8SN5(!p2Bv' );

/** Database hostname */
define( 'DB_HOST', 'sql203.byetcluster.com' );

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
define( 'AUTH_KEY',         '3uzqmt7bppgtwgmlqccasthopw07ao5wfvfhazkvqvgknaqof2lnrdhk9ubjnn9l' );
define( 'SECURE_AUTH_KEY',  'wnl1gkf9kuazawaukwi7aizwovfmelw0ihdldpstk3pakqgltuoes1m5eqoolq4a' );
define( 'LOGGED_IN_KEY',    '5ygqisxnqq7czgktazvuzvtf1b4pyzqgilhu9uvokrf7qtreqbis2fgwo6yf2pp5' );
define( 'NONCE_KEY',        '1uhrt3ebbj4zriwhzljfhmev4pj5pdz0dwewbllqlnfwbnjazhizabo2as3uf5bs' );
define( 'AUTH_SALT',        'fnfumatjvdlryvhl13uqm5u1drwcnbc6qsr7qo4dwvwk3c7gai5znnle9msp5ysm' );
define( 'SECURE_AUTH_SALT', 'bznffrro7l8bqgezbcxfnvb5yz6qyunxyudngbstbszbhldkpqsl1rsenl30zrw1' );
define( 'LOGGED_IN_SALT',   'tg8rxh9uccimb1sa0xngve0vgh8xyvyfempluhrc4do5plbcboyczrwmlwlff1ah' );
define( 'NONCE_SALT',       '0cek81rernetupvssb1ahwnggrkixd0i9r9yqcv4ofjuijvnc0kp92wfzdgwilcp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpcg_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
