<?php
/** Plugin Name: WP Terms as Posts
 * Plugin URI: https://github.com/davidnaviaweb/wp-terms-as-posts
 * Description: This plugin renders the terms edition screen like the posts edition screen just with the less CSS as possible and a bit of JS.
 * Version: 1.0
 * Author: David Navia
 * Author URI: https://davidnaviaweb.com
 * License: WTFPLv2
 * URI: http://www.wtfpl.net/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_enqueue_scripts', function () {
	global $pagenow;
	if ( 'edit-tags.php' === $pagenow ) {
		wp_enqueue_style( 'wp-terms-as-posts-list', plugin_dir_url( __FILE__ ) . 'css/wp-terms-as-posts-list.css', [] );
	}
	if ( 'term.php' === $pagenow ) {
		wp_enqueue_style( 'wp-terms-as-posts-single', plugin_dir_url( __FILE__ ) . 'css/wp-terms-as-posts-single.css', [] );
		wp_register_script( 'wp-terms-as-posts-single', plugin_dir_url( __FILE__ ) . 'js/wp-terms-as-posts-single.js', [] );
		wp_localize_script( 'wp-terms-as-posts-single', 'wp_tap', [ 'publish' => __( 'Publish' ) ] );
		wp_enqueue_script( 'wp-terms-as-posts-single' );
	}
}, 100 );