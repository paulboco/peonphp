<?php

class Router 
{
	/**
	 * The Controller
	 */
	protected $controller;

	/**
	 * The Controller's Method
	 */
	protected $method;


	/**
	 * Class Constructor
	 */
	public function __construct() {
		$this->parseUri();
	}	

	/**
	 * Dispatch The Route
	 */
	public function dispatch()
	{
		require(path() . "/http/controllers/{$this->controller}.php");

		call_user_func_array(
			array(
				new $this->controller, 
				$this->method
			), 
			array());
	}

	/**
	 * Parse The URI
	 *
	 * @return array
	 */
	private function parseUri()
	{
		$parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
	
		$this->controller = $parts[0];
		$this->method = $parts[1];
	}
}
