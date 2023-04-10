<?php

namespace Cofixer\KCA\Admin;

class Menu{

	/**
	 * Initialize the class
	 */
	function __construct(){
		add_action('admin_menu',[$this,'admin_menu']);
	}

	/**
	 * Register menu Page
	 * @return void
	 */
	public function admin_menu(): void{
		global $submenu;

		$capability = "manage_options";
		$slug       = "cf-kca-admin";

		$hook = add_menu_page(
			__("KC Admin","ksa"),
			__("KC Admin","ksa"),
			$capability,
			$slug,
			[ $this, "menu_page_template" ],
			CF_KCA_PLUGIN_ASSETS.'/images/manager.png',
			2
		);

		if (current_user_can($capability)){
			$submenu[ $slug ][] = [ __("Settings","ksa"), $capability, "admin.php?page=". $slug ."#/" ];
			//$submenu[ $slug ][] = [ __("Settings","ksa"), $capability, "admin.php?page=". $slug ."#/settings" ];
			//$submenu[ $slug ][] = [ __("About","ksa"), $capability, "admin.php?page=". $slug ."#/about" ];
		}
	}

	/**
	 * Render Main Page
	 * @return void
	 */
	public function menu_page_template(): void{
		echo "<div class='wrap'><div id='cf-kca-admin-app'></div></div>";
	}
}