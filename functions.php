<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add a new sidebar beneath the post box.
 */
register_sidebar( array(
	'name'          => __( 'Beneath Post Box', 'Houston' ),
	'id'            => 'beneath-post-box',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' )
);


/**
 * Tweak p2
 */
add_action( 'init', 'houston_custom' );
function houston_custom() {
	remove_action( 'wp_enqueue_scripts', 'p2_iphone_style', 1000 );
}

add_action( 'admin_init', 'houston_customise_p2_settings', -1 );
function houston_customise_p2_settings() {
	unregister_setting( 'p2ops', 'p2_background_image' );
}



/**
 * Add the search widget to the nav
 */
function new_nav_menu_items( $items, $args ) {
	if ( $args->theme_location == 'primary' ) {
		$homelink 	= the_widget( 'WP_Widget_Search' );
		$items 		= $items . $homelink;
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );


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


add_filter( 'the_content', 'houston_reply_link', 50 );
function houston_reply_link( $content ) {
	global $user_ID;

	$post_type  = get_post_type();
	$id 		= get_the_ID();
	$reply_link = '';

	if ( comments_open() && ( $post_type == 'post' || $post_type == 'page' ) ) {
		if ( get_option( 'comment_registration' ) && ! $user_ID ) {
			$reply_link = '<p class="reply"><a rel="nofollow" href="' . site_url( 'wp-login.php?redirect_to=' . urlencode( get_permalink() ) ) . '">' . esc_html( 'Please log in to reply', 'houston' ) . '</a></p>';
		} else {
			$reply_link = '<p class="reply"><a rel="nofollow" title="Reply" class="comment-reply-link main-reply" href="' . get_permalink() . '#respond" onclick="return addComment.moveForm(&quot;comments-' . $id . '&quot;, &quot;0&quot;, &quot;respond&quot;, &quot;' . $id . '&quot;)">Reply</a></p>';
		}
	}

	return $content . $reply_link;
}


add_filter( 'comment_text', 'houston_comment_reply_link', 50 );
function houston_comment_reply_link( $content ) {
	global $user_ID;

	$id 		= get_the_ID();
	$commentid 	= get_comment_ID();
	$reply_link = '';

	if ( comments_open() ) {
		if ( get_option( 'comment_registration' ) && ! $user_ID ) {
			$reply_link = '<p class="reply"><a rel="nofollow" href="' . site_url( 'wp-login.php?redirect_to=' . urlencode( get_permalink() ) ) . '">' . esc_html( 'Please log in to reply', 'houston' ) . '</a></p>';
		} else {
			$reply_link = '<p class="reply"><a rel="nofollow" title="Reply" class="comment-reply-link main-reply" href="' . get_permalink() . '#respond" onclick="return addComment.moveForm(&quot;commentcontent-' . $commentid . '&quot;, &quot;' . $commentid . '&quot;, &quot;respond&quot;, &quot;' . $id . '&quot;)">Reply</a></p>';
		}
	}

	return $content . $reply_link;
}


/**
 * Integrations
 * Include logic that integrates Houston with third party plugins
 */

/**
 * p2-likes
 * http://wordpress.org/plugins/p2-likes/
 */
if ( defined( 'P2LIKES_URL' ) ) {
	require_once( get_stylesheet_directory() . '/includes/integrations/p2-likes/p2-likes.php' );
}