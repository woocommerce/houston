<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Integrates Houston with the p2-likes plugin
 * http://wordpress.org/plugins/p2-likes/
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