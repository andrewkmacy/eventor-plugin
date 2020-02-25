<?php
/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Eventor
 * Plugin URI:        https://github.com/andrewkmacy/eventor-plugin
 * Description:       A lightweight Events plugin, including Speakers and Exhibitors.
 * Version:           1.0.0
 * Author:            Andrew K Macy
 * Author URI:        https://andrewkmacy.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 // If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EVENTOR_VERSION', '1.0.0' );

/**
 * The core plugin classes that are used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . './inc/events/eventor-events.php';
require_once plugin_dir_path( __FILE__ ) . './inc/speakers/eventor-speakers.php';

function enventor_enqueue_styles() {
	wp_enqueue_style( 'eventor-css', plugins_url( 'style.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'enventor_enqueue_styles' );