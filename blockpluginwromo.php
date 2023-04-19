<?php
/**
 * Plugin Name:       BlockPluginWromo
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.3
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blockpluginwromo
 *
 * @package           create-block
 */

/**
 * Load all translations for our plugin from the MO file.
 */
add_action( 'init', 'blockpluginwromo_load_textdomain' );

/**
 * Loads our plugin's translated strings.
 *
 * @since 1.0.0
 */
function blockpluginwromo_load_textdomain() {
	load_plugin_textdomain( 'blockpluginwromo', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Enqueues the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function blockpluginwromo_editor_assets() {
	wp_enqueue_script(
		'blockpluginwromo-editor-script', // Handle.
		plugins_url( 'build/index.js', __FILE__ ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);
	wp_enqueue_style(
		'blockpluginwromo-editor-style', // Handle.
		plugins_url( 'build/editor.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'build/editor.css' ) // Version: File modification time.
	);
}
add_action( 'enqueue_block_editor_assets', 'blockpluginwromo_editor_assets' );

/**
 * Enqueues the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function blockpluginwromo_script() {
	wp_enqueue_script(
		'blockpluginwromo-script', // Handle.
		plugins_url( 'build/index.js', __FILE__ ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);
	wp_enqueue_style(
		'blockpluginwromo-style', // Handle.
		plugins_url( 'build/style.css', __FILE__ ), // Block editor CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'build/style.css' ) // Version: File modification time.
	);
}
add_action( 'enqueue_block_assets', 'blockpluginwromo_script' );


