# Hide My WP Login

**Contributors:** WebHostingSrbija  
**Plugin Name:** Hide My WP Login  
**Plugin URI:** https://github.com/webhostingsrbijaRS/hide-my-wp-login/  
**Description:** Allows users to set a custom login URL and redirect wp-admin to a 404 error page.  
**Version:** 1.0  
**Requires at least:** WordPress 6.2  
**Requires PHP:** 8.0  
**License:** GPL v2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  
**Author:** WebHostingSrbija  
**Author URI:** https://www.webhostingsrbija.rs/  

## Description

Hide My WP Login is a WordPress plugin that allows users to change their login URL for added security. Instead of the default `wp-login.php`, users can define a custom path, making it harder for attackers to find the login page. Additionally, attempts to access `wp-admin` will be redirected to a 404 error page unless the user is logged in.

## Features

- Set a custom login URL.
- Redirect `wp-admin` access attempts to a 404 error page for non-logged-in users.

## Installation

### Manual Installation

1. Download the latest release from the GitHub repository.
2. Extract the `hide-my-wp-login.zip` file.
3. Upload the `hide-my-wp-login` folder to the `/wp-content/plugins/` directory.
4. Activate the plugin through the 'Plugins' menu in WordPress.
5. Navigate to the "Hide My WP Login" menu in your WordPress dashboard to configure the custom login URL.

## Frequently Asked Questions

### How do I set a custom login URL?

After activating the plugin, navigate to the "Hide My WP Login" menu in your WordPress dashboard. There you can define your custom login URL.

### I forgot my custom login URL. How can I recover it?

If you forget your custom login URL, you can deactivate the plugin via FTP by renaming or deleting the `hide-my-wp-login` folder from the `/wp-content/plugins/` directory. Once deactivated, the default `wp-login.php` path will work again. Remember to reactivate or reinstall the plugin after you've regained access.

## Changelog

### 1.0
- Initial release.

## Support

For support or any questions related to the "Hide My WP Login" plugin, please visit [WebHostingSrbija](https://www.webhostingsrbija.rs/).
