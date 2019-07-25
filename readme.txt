=== WP Fail2ban Proxies ===
Contributors: eclev91
Requires at least: 5.0
Tested up to: 5.2.2
Requires PHP: 7.0

Add support for popular proxies to the [WP Fail2ban](https://wordpress.org/plugins/wp-fail2ban/) plugin.

== Installation ==
0. Have the [WP Fail2ban plugin](https://wordpress.org/plugins/wp-fail2ban/) installed and active.
1. Upload plugin in WordPress dashboard
2. Activate plugin
3. Add either `define('CLOUDFLARE_ENABLED', true);` or `define('FASTLY_ENABLED', true);` to your `wp-config.php` file.


== Description ==
If your traffic runs through a proxy service like Cloudflare or Fastly, all incoming traffic is coming from their IPs. When fail2ban blocks a brute force attack, it uses these IP addresses, which can cause valid users to get blocked as well!

WP Fail2ban supports adding proxy IP addresses to its configuration and will inspect the X-Forwarded-For header on requests in this case.

This plugin automatically updates the published IP addresses for popular proxy services so that WP Fail2ban plays nicely with them. When those services update their IP ranges, the plugin automatically fetches them.

== FAQ ==
= How to use? =
This plugin currently supports Cloudflare and Fastly. Only activate support for one at a time. To enable support, and add either `define('CLOUDFLARE_ENABLED', true);` or `define('FASTLY_ENABLED', true);` to your `wp-config.php` file.
= Does this plugin support "X"? =
If you're using a proxy or CDN this plugin doesn't already support, contact ethan@sternerstuffdesign.com to inquire about adding support.

== Changelog ==
= 1.0.0 =
* Initial release