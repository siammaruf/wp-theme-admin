<?php

namespace Cofixer\KCA\Admin;

use Cofixer\KCA\Helpers\AssetsHelpers;

class Assets{
	public function __construct(){
		if (isset($_GET['page']) && $_GET['page'] == 'cf-kca-admin' ){
			add_action("admin_enqueue_scripts",[$this,'register_all_scripts']);
		}
	}

	/**
	 * Register Scripts and Styles
	 * @return void
	 */
	public function register_all_scripts(): void{
		$scripts = $this->register_scripts();
		$styles = $this->register_styles();

		new AssetsHelpers($scripts,$styles);
	}

	public function register_scripts(): array{
		return [
			'cf-kca-manifest' => [
				'src'       => CF_KCA_PLUGIN_URL . '/assets/js/manifest.js',
				'deps'      => [],
				'version'   => \filemtime( CF_KCA_PLUGIN_PATH . '/assets/js/manifest.js' ),
				'in_footer' => true
			],
			'cf-kca-vendor' => [
				'src'       => CF_KCA_PLUGIN_URL . '/assets/js/vendor.js',
				'deps'      => [ 'cf-kca-manifest' ],
				'version'   => \filemtime( CF_KCA_PLUGIN_PATH . '/assets/js/vendor.js' ),
				'in_footer' => true
			],
			'cf-kca-admin' => [
				'src'       => CF_KCA_PLUGIN_URL . '/assets/js/admin.js',
				'deps'      => [ 'cf-kca-vendor' ],
				'version'   => \filemtime( CF_KCA_PLUGIN_PATH . '/assets/js/admin.js' ),
				'in_footer' => true,
				'localize'  => [
					'adminUrl'  => admin_url( '/' ),
					'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
					'apiUrl'    => home_url( '/wp-json' ),
					'apiNonce'     => wp_create_nonce('wp_rest'),
				]
			],
		];
	}

	public function register_styles(): array{
		return [
			'cf-kca-style' => [
				'src' => CF_KCA_PLUGIN_URL . '/assets/css/style.css'
			],
			'cf-kca-admin' => [
				'src' => CF_KCA_PLUGIN_URL . '/assets/css/admin.css'
			],
		];
	}
}