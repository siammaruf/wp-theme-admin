<?php
namespace Cofixer\KCA;

use Cofixer\KCA\Admin\Menu;
use Cofixer\KCA\Admin\Assets;

/**
 * The admin class
 */
class Admin{
	/**
	 * Initialize the class
	 */
	public function __construct(){
		new Menu();
		new Assets();
	}
}