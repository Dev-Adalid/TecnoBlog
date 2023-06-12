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
define( 'DB_NAME', 'blog-art' );

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
define( 'AUTH_KEY',         'Y45QK?9/5|M^Y0q/TY@{f,yP-mw;UFtZCv9#<Z}eYPD7e :vOuB4q5Gt<!I{&061' );
define( 'SECURE_AUTH_KEY',  'j~X2E.Hn](@F={y<vt<h@>a}H2HDb6rQ~/q4$%|q#|Hg$oHh*;NYAe>.roaG#1.>' );
define( 'LOGGED_IN_KEY',    'VbOZO32`+gG|<$7iPV[R1?VF?[>f~sU=w=Y,{.g<M@5t/{/suZhIDskvx/p?o^nz' );
define( 'NONCE_KEY',        'bo#>bgZ w8=my[8ydVMoPr;]qP!^O_IDFdS%fru~Ud&YhGqj/,b}c|l%Pa@7og;?' );
define( 'AUTH_SALT',        'k*):eOo2A! ,9_/?Yy1!`|t!(4l4+$fo=i7$,3=gr;eG1l|D]p!^*j-<jjC__%P>' );
define( 'SECURE_AUTH_SALT', '4^1xmG=bX4!f=i7$E?8Iy.M2d)XLQ{B0#%nzSr%X{vFErh*VBWGfnorQ$%[VpfI9' );
define( 'LOGGED_IN_SALT',   'RHw5/Q?z@uU_|hPeZ#n)[:_ka&x9~aJX[VkO~F[@[-)R*DHmMnw$@,d_~isHEF^)' );
define( 'NONCE_SALT',       'C9h^c{X/*eT?_(K;_>@z_3Ea;k:5_k;YEyDza#S@5T:4`A^<s+6J2SF{>ag/Iw6l' );

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
