<?php

namespace Cofixer\KCA;
use WP_REST_Controller;
use Cofixer\KCA\Api\Settings_Route;

/**
 * Rest Api Handler
 */
class Api extends WP_REST_Controller{
	/**
	 * Construct Function
	 */
	public function __construct(){
		add_action( 'rest_api_init',[ $this, 'register_rest_routes' ] );
	}

	/**
	 * Register API routes
	 */
	public function register_rest_routes(){
		( new Settings_Route())->register_routes();
	}
}