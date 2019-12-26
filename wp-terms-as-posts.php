<?php
/** Plugin Name: WP Terms as Posts
 * Plugin URI: https://github.com/davidnaviaweb/wp-terms-as-posts
 * Description: This plugin renders the terms edition screen like the posts edition screen just with the less CSS as possible and a bit of JS.
 * Version: 1.1
 * Author: David Navia
 * Author URI: https://davidnaviaweb.com
 * License: WTFPLv2
 * License URI: http://www.wtfpl.net/txt/copying/
 *
 * @package WordPress
 * @subpackage WP_Terms_as_Posts
 * @since 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_TERMS_AS_POSTS_VERSION', '1.1' );

add_action(
	'admin_enqueue_scripts',
	function () {

		global $pagenow;

		if ( 'edit-tags.php' === $pagenow ) {
			wp_enqueue_style( 'wp-terms-as-posts-list', plugin_dir_url( __FILE__ ) . 'assets/css/wp-terms-as-posts-list.css', array(), WP_TERMS_AS_POSTS_VERSION );
			wp_style_add_data( 'wp-terms-as-posts-list', 'rtl', 'replace' );
		}

		if ( 'term.php' === $pagenow ) {

			wp_enqueue_style( 'wp-terms-as-posts-single', plugin_dir_url( __FILE__ ) . 'assets/css/wp-terms-as-posts-single.css', array(), WP_TERMS_AS_POSTS_VERSION );
			wp_style_add_data( 'wp-terms-as-posts-single', 'rtl', 'replace' );

			wp_register_script( 'wp-terms-as-posts-single', plugin_dir_url( __FILE__ ) . 'assets/js/wp-terms-as-posts-single.js', array(), WP_TERMS_AS_POSTS_VERSION, true );
			wp_localize_script( 'wp-terms-as-posts-single', 'wp_tap', array( 'update' => __( 'Update' ) ) );
			wp_enqueue_script( 'wp-terms-as-posts-single' );
		}
	},
	100
);

add_action(
	'plugins_loaded',
	function() {
		load_plugin_textdomain( 'wp-terms-as-posts', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
);
