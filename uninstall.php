<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package Hide_My_WP_Login
 */

// If uninstall is not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Remove options set by the plugin.
delete_option( 'hmwlp_login_slug' );
