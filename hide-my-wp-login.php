<?php
/*
 * Plugin Name:       Hide My WP Login
 * Plugin URI:        https://github.com/webhostingsrbijaRS/hide-my-wp-login/
 * Description:       Allows users to set a custom login URL.
 * Version:           1.0
 * Requires at least: 6.2
 * Requires PHP:      8.0
 * Author:            WebHostingSrbija
 * Author URI:        https://www.webhostingsrbija.rs/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/webhostingsrbijaRS/hide-my-wp-login/
 * Domain Path:       /languages/
 * Text Domain:       hide-my-wp-login
 */
function hmwlp_add_admin_menu() {
    $menu_slug = admin_url('options-permalink.php#hide-my-wp-login');
    add_menu_page(
        __('Hide WP Login Settings', 'hide-my-wp-login'),   // Page title
        __('WP Login Settings', 'hide-my-wp-login'),       // Menu title
        'manage_options',                                  // Capability required
        $menu_slug,                                        // Menu slug
        '',                                                // Callback function, none needed here as we're linking
        'dashicons-admin-links',                           // Icon URL, using default link icon
        80                                                 // Position in menu
    );
}
add_action('admin_menu', 'hmwlp_add_admin_menu');

// Set up the plugin's localization.
function hmwlp_load_textdomain() {
    load_plugin_textdomain('hide-my-wp-login', false, basename(dirname(__FILE__)) . '/languages/');
}
add_action('init', 'hmwlp_load_textdomain');

// Register the setting for our custom login slug.
function hmwlp_register_settings() {
    register_setting('permalink', 'hmwlp_login_slug', 'sanitize_text_field');

    // Add the setting field to the permalinks page.
    add_settings_field('hmwlp_login_slug', __('Custom login slug', 'hide-my-wp-login'), 'hmwlp_setting_callback_function', 'permalink', 'optional');
}
add_action('admin_init', 'hmwlp_register_settings');

// Display the input for the custom login slug.
function hmwlp_setting_callback_function() {
    $value = get_option('hmwlp_login_slug');
    echo '<input type="text" name="hmwlp_login_slug" value="' . esc_attr($value) . '" />';
    echo '<p id="hide-my-wp-login" class="description">' . __('Specify a custom slug to replace the default "wp-login.php".', 'hide-my-wp-login') . '</p>';
}

function hmwlp_login_form_action($url, $path) {
    $custom_login_url = get_option('hmwlp_login_slug');

    if ($path == 'wp-login.php' && !empty($custom_login_url) && strpos($_SERVER['REQUEST_URI'], $custom_login_url) !== false) {
        $url = home_url($custom_login_url);
    }

    return $url;
}
add_filter('site_url', 'hmwlp_login_form_action', 10, 2);

function hmwlp_custom_login_redirect() {
    // If the user is logged in, just return and do nothing.
    if (is_user_logged_in()) return;

    $request_uri = $_SERVER['REQUEST_URI'];

    // Send users to a 404 page if they try to access wp-admin or wp-login.php directly.
    if (strpos($request_uri, 'wp-admin') !== false || strpos($request_uri, 'wp-login.php') !== false) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include(get_query_template('404'));
        die();
    }

    $custom_login_url = get_option('hmwlp_login_slug');
    if (empty($custom_login_url)) return;

    if (strpos($request_uri, $custom_login_url) !== false) {
        global $user_login,$error;
        $user_login = '';
        $error = '';
        require(ABSPATH . 'wp-login.php');
        die();
    }
}

add_action('init', 'hmwlp_custom_login_redirect');


function hmwlp_save_custom_option() {
    if (isset($_POST['hmwlp_login_slug'])) {
        update_option('hmwlp_login_slug', sanitize_text_field($_POST['hmwlp_login_slug']));
    }
}
add_action('admin_init', 'hmwlp_save_custom_option', 20);

function hmwlp_logout_redirect($logout_url, $redirect) {
    return home_url('/');
}
add_filter('logout_redirect', 'hmwlp_logout_redirect', 10, 2);

function hmwlp_add_settings_link($actions, $plugin_file) {
    static $plugin;

    if (!isset($plugin)) {
        $plugin = plugin_basename(__FILE__);
    }

    // Check if the passed $plugin_file is the plugin we're targeting
    if ($plugin == $plugin_file) {
        $settings_link = '<a href="' . admin_url('options-permalink.php#hide-my-wp-login') . '">' . __('Settings', 'hide-my-wp-login') . '</a>';
        // Add the link to the list
        array_unshift($actions, $settings_link);
    }

    return $actions;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'hmwlp_add_settings_link', 10, 2);


