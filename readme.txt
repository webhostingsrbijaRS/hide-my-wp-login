=== Hide My WP Login ===
Contributors: djordjeb
Tags: login, security, custom login, wp-login, wp-admin
Requires at least: 6.2
Tested up to: 6.2
Requires PHP: 8.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Allows users to set a custom login URL and redirect wp-admin to a 404 error page.

== Description ==

"Hide My WP Login" allows WordPress site owners to change their login URL from the default "wp-admin" to something custom of their choosing. This is especially useful for added security, preventing automated bots from attempting to login to the default URL. 

Main Features:

* Change your WordPress login URL to something unique.
* Redirection of wp-admin to a 404 error page when accessed.
* Improved safety from automated bots and malicious actors.

== Installation ==

1. Upload `hide-my-wp-login` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to the main dashboard menu and click on 'Hide My WP Login'
4. Set your custom login URL and save changes.
5. Remember the new login URL! You'll need it to access your dashboard.

== Frequently Asked Questions ==

= What if I forget my custom login URL? =

If you forget your custom login URL, you can deactivate the plugin by accessing your server via FTP and navigating to the `/wp-content/plugins/` directory and deleting the `hide-my-wp-login` folder.

= Is this plugin compatible with other security plugins? =

While "Hide My WP Login" should work with most other plugins, always make sure to test on a staging site if you're using multiple security-focused plugins.

== Screenshots ==

1. The main settings page where you can set your custom login URL.

== Changelog ==

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =
Initial release. No upgrade notices.

== Additional Notes ==

Thank you for using Hide My WP Login. We strive to offer simple solutions for WordPress users and appreciate your feedback and support.
