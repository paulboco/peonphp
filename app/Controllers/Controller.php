<?php

namespace App\Controllers;

use Config;

/**
* The Base Controller
*/
abstract class Controller {

	/**
	 * The Application Name
	 *
	 * @var string
	 */
	protected $appName;

	/**
	 * Create a new controller
	 */
	public function __construct()
	{
		$this->appName = Config::APP_NAME;
	}


}