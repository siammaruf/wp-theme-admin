<?php
/**
 * Plugin Name: KC : Admin (KCA)
 * Description: A WordPress plugin for manage theme admin settings
 * Plugin URI: https://cofixer.com/kc-admin
 * Author: Siam Maruf
 * Author URI: https://siammaruf.com
 * Version: 1.0.0
 * License: GPL3 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: kca
 */

if ( ! defined('ABSPATH') ){
	exit;
}

require __DIR__.'/vendor/autoload.php';

use Cofixer\KCA\Admin;
use Cofixer\KCA\Api;
use Cofixer\KCA\Installer;

/*
 * Main Plugin Class
 */
final class Cofixer_kca_Plugin{
	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class constructor
	 */
	private function __construct(){
		$this->define_constants();
		register_activation_hook(__FILE__,[$this,'activate']);
		add_action('plugins_loaded',[$this, 'init_plugin']);
	}


	/**
	 * Initializes a singleton instance
	 *
	 * @retun  Cofixer_Plugin
	 */
	public static function init(): Cofixer_kca_Plugin|bool
	{
		static $instance = false;
		if ( !$instance ){
			$instance = new self();
		}
		return $instance;
	}

	/**
	 * Define the required plugin constance
	 *
	 * @retun void
	 */
	public function define_constants(): void{
		define('CF_KCA_PLUGIN_VERSION', self::version);
		define('CF_KCA_PLUGIN_FILE', __FILE__);
		define('CF_KCA_PLUGIN_PATH', __DIR__);
		define('CF_KCA_PLUGIN_URL', plugins_url('',CF_KCA_PLUGIN_FILE));
		define('CF_KCA_PLUGIN_ASSETS', CF_KCA_PLUGIN_URL.'/assets');
	}

	/**
	 * Initialize the plugin
	 *
	 * @retun void
	 */
	public function init_plugin(): void{
		if (is_admin()){
			new Admin();
		}
		new Api();
	}

	/**
	 * On plugin activation
	 *
	 * @retun void
	 */
	public function activate(): void{
		( new Installer() )->run();
	}
}

/**
 * Initialize the main plugin
 *
 * @retun Cofixer_Plugin
 */

function cofixer_kca_plugin(): Cofixer_kca_Plugin|bool{
	return Cofixer_kca_Plugin::init();
}

//Kick-off the plugin
cofixer_kca_plugin();