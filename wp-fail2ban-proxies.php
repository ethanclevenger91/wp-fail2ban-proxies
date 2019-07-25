<?php
/*
Plugin Name: WP Fail2ban Proxies
Plugin URI: https://sternerstuffdesign.com/wp-fail2ban-proxies
Description: Add support for popular proxies to WP Fail2ban
Version: 1.0.0
Author: Ethan Clevenger
Author URI: https://sternerstuffdesign.com
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once( plugin_dir_path(__FILE__) . 'vendor/autoload.php' );

$wpFail2banProxiesUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/ethanclevenger91/wp-fail2ban-proxies/',
	__FILE__,
	'wp-fail2ban-proxies'
);

//Optional: If you're using a private repository, specify the access token like this:
$wpFail2banProxiesUpdateChecker->setAuthentication('your-token-here');

$wpFail2banProxiesUpdateChecker->getVcsApi()->enableReleaseAssets();

if( is_plugin_active( 'wp-fail2ban/wp-fail2ban.php' ) ) {
	$this->whitelistActiveProxies();
}

function wpf2bproxies_whitelist_active_proxies() {
	/**
	 * Only one proxy whitelist should be defined at a time
	 */
	if( defined('CLOUDFLARE_ENABLED') && CLOUDFLARE_ENABLED === true ) {
		new SternerStuffWordPress\WPFail2banProxies\CloudflareIps;
	}
	if( defined('FASTLY_ENABLED') && FASTLY_ENABLED === true ) {
		new SternerStuffWordPress\WPFail2banProxies\FastlyIps;
	}
}