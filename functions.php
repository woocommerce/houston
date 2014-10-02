<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Get the theme version.
 * Return version defined in style.css
 *
 * @return string version.
 * @since 0.1.0
 */
function apollo_get_theme_version() {
	$theme = wp_get_theme( basename( get_bloginfo( 'stylesheet_directory' ) ) );
	return $theme->version;
}

/**
 * Add a new sidebar beneath the post box.
 */
add_action( 'widgets_init', 'houston_register_sidebar' );
function houston_register_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Beneath Post Box', 'Apollo' ),
		'id'            => 'beneath-post-box',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' )
	);
}


/**
 * Tweak p2
 */
add_action( 'init', 'houston_custom' );
function houston_custom() {
	remove_action( 'wp_enqueue_scripts', 'p2_iphone_style', 1000 );
}


/**
 * Add the search widget to the nav
 */
function houston_new_nav_menu_items( $items, $args ) {
	if ( $args->theme_location == 'primary' ) {
		$homelink 	= the_widget( 'WP_Widget_Search' );
		$items 		= $items . $homelink;
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'houston_new_nav_menu_items', 10, 2 );

/**
 * Add Sass stylesheet
 */
function apollo_enqueue_scripts() {
	
	$version = apollo_get_theme_version();
	
	// Styles
	wp_enqueue_style( 'apollo-styles', get_stylesheet_directory_uri() . "/assets/css/theme.css", array(), $version );
	
	// Scripts
	wp_register_script( 'apollo-scripts', get_stylesheet_directory_uri() . "/assets/js/theme.js", array( 'jquery', 'p2' ), $version, true );
	
	// Localize Script / Data
	$ct_scripts_data_array = array();
	$ct_script_data = apply_filters( 'apollo_scripts_data', $ct_scripts_data_array );
	wp_localize_script( 'apollo-scripts', 'ct_scripts', $ct_script_data );;
	
	wp_enqueue_script( 'apollo-scripts' );
}

add_action( 'wp_enqueue_scripts', 'apollo_enqueue_scripts' );

/**
 * Add js to the frontend
 */
add_action( 'wp_enqueue_scripts', 'houston_scripts', 999 );
function houston_scripts() {
	wp_enqueue_script( 'woo-p2-script', get_stylesheet_directory_uri() . '/js/script.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '', true );
	wp_dequeue_script( 'iphone' );
}


/**
 * Add viewport meta
 */
add_action( 'wp_head', 'houston_viewport_meta' );
function houston_viewport_meta() {
?>
	<!--  Mobile viewport scale | Disable user zooming as the layout is optimised -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
}


/**
 * Integrations
 * Include logic that integrates Apollo with third party plugins
 */

/**
 * p2-likes
 * http://wordpress.org/plugins/p2-likes/
 */
if ( defined( 'P2LIKES_URL' ) ) {
	require_once( get_stylesheet_directory() . '/includes/integrations/p2-likes/p2-likes.php' );
}
