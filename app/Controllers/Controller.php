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
		$this->request = $_REQUEST;
	}

	/**
	 * Get Request Variables
	 *
	 * @param  string  $key
	 * @return array|string
	 */
	protected function request($key = null, $default = null)
	{
		if (is_null($key)) {
			return $this->request;
		}

		if (isset($this->request[$key])) {
			return $this->request[$key];
		}

		return $default;
	}


}