<?php

namespace Cofixer\KCA;

/**
 * Installer class
 */
class Installer{
	/**
	 * Run the installer
	 *
	 * @return void
	 */
	public function run(): void
	{
		$this->add_version();
	}

	/**
	 * Add time and version on DB
	 */
	public function add_version(): void{
		$installed = get_option( 'cf_kca_installed' );

		if ( ! $installed ) {
			update_option( 'cf_kca_installed', time() );
		}

		update_option( 'cf_kca_version', CF_PLUGIN_VERSION );
	}
}