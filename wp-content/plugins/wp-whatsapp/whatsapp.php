<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WP Chat App
 * Plugin URI:        https://ninjateam.org/wordpress-whatsapp-chat
 * Description:       Integrate your WhatsApp experience directly into your website. This is one of the best way to connect and interact with your customer.
 * Version:           3.1.4
 * Author:            NinjaTeam
 * Author URI:        https://ninjateam.org
 * Text Domain:       ninjateam-whatsapp
 * Domain Path:       /languages
 */
namespace NTA_WhatsApp;

defined('ABSPATH') || exit;

define('NTA_WHATSAPP_VERSION', '3.1.4');
define('NTA_WHATSAPP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('NTA_WHATSAPP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NTA_WHATSAPP_BASE_NAME', plugin_basename(__FILE__));

if (file_exists(dirname(__FILE__) . '/includes/Cross.php')) {
    require_once dirname(__FILE__) . '/includes/Cross.php';
}

if (file_exists(dirname(__FILE__) . '/includes/Review.php')) {
    require_once dirname(__FILE__) . '/includes/Review.php';
}

spl_autoload_register(
	function ( $class ) {
		$prefix   = __NAMESPACE__; // project-specific namespace prefix
		$base_dir = __DIR__ . '/includes'; // base directory for the namespace prefix

		$len = strlen( $prefix );
		if ( strncmp( $prefix, $class, $len ) !== 0 ) { // does the class use the namespace prefix?
			return; // no, move to the next registered autoloader
		}

		$relative_class_name = substr( $class, $len );

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $base_dir . str_replace( '\\', '/', $relative_class_name ) . '.php';

		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

add_action('plugins_loaded', 'NTA_WhatsApp\\init');
    
function init()
{
	Plugin::activate();
    PostType::getInstance();
    I18n::loadPluginTextdomain();
    Shortcode::getInstance();
    Popup::getInstance();
    Settings::getInstance();
    Upgrade::getInstance();
    Support\WPML::getInstance();
    Support\Woocommerce::getInstance();
    if ( function_exists( 'register_block_type' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'blocks/src/init.php';
    }
}

register_activation_hook(__FILE__, array('NTA_WhatsApp\\Plugin', 'activate'));
register_deactivation_hook(__FILE__, array('NTA_WhatsApp\\Plugin', 'deactivate'));