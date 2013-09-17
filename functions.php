<?php
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


/**
 * Tweak p2 likes
 */
add_action( 'init', 'houston_likes_custom' );
function houston_likes_custom() {
	// Removes the 'like' button from posts and comments
	remove_action( 'p2_action_links', 'p2_likes_action_links' );
	remove_filter( 'comment_reply_link', 'p2_likes_comment_reply_link', 99, 4 );

	// Adds our own 'like' button with some simple markup tweaks
	add_action( 'p2_action_links', 'houston_likes_action_links' );
	add_filter( 'comment_reply_link', 'houston_likes_comment_reply_link', 5, 4 );
}

function houston_likes_action_links() {
	global $post;
	global $current_user;
	$postmeta = get_post_meta( $post->ID, '_p2_likes', true );
	$users = p2_likes_generate_users_html($postmeta);
	$like_count = ( $postmeta ? count($postmeta) : 0 );
	$like_text = ( $postmeta && in_array( $current_user->ID, $postmeta ) ? __( 'Unlike', 'p2-likes' ) : __( 'Like', 'p2-likes' ) );
	echo " | <div class='p2-likes-link'><a rel='nofollow' class='p2-likes-post p2-likes-post-".$post->ID."' href='". get_permalink($post). "' title='".$like_text."' onclick='p2Likes(0,".$post->ID."); return false;'><span class='p2-likes-like'>".$like_text."</span><span class='p2-likes-count'>".$like_count."</span></a><div class='p2-likes-box'>".$users."</div></div>";
}

function houston_likes_comment_reply_link( $link, $args, $comment, $post ) {
	global $post;
	global $comment;
	global $current_user;
	$commentmeta = get_comment_meta( $comment->comment_ID, '_p2_likes', true );
	$users = p2_likes_generate_users_html($commentmeta);
	$like_count = ( $commentmeta ? count($commentmeta) : 0 );
	$like_text = ( $commentmeta && in_array( $current_user->ID, $commentmeta ) ? __( 'Unlike', 'p2-likes' ) : __( 'Like', 'p2-likes' ) );
	$output = " | <div class='p2-likes-link'><a rel='nofollow' class='p2-likes-link p2-likes-comment p2-likes-comment-".$comment->comment_ID."' href='". get_permalink($post). "' title='".$like_text."' onclick='p2Likes(1,".$comment->comment_ID."); return false;'><span class='p2-likes-like'>".$like_text."</span><span class='p2-likes-count'>".$like_count."</span></a><div class='p2-likes-box'>".$users."</div></div>";
	return $link . $output;
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