<?php

class Input
{
	public static $errors = [];
	/**
	 * Check if a given value was passed in the request
	 *
	 * @param string $key index to look for in request
	 * @return boolean whether value exists in $_POST or $_GET
	 */
	public static function has($key)
	{
		if(isset($_REQUEST[$key])) {
		return true;
		} else {
		return false; 
		}
	}

	/**
	 * Get a requested value from either $_POST or $_GET
	 *
	 * @param string $key index to look for in index
	 * @param mixed $default default value to return if key not found
	 * @return mixed value passed in request
	 */
	public static function get($key, $default = null)
	{
		if(isset($_REQUEST[$key]) == true){
		return $_REQUEST[$key];
		} else {
		return null;
		}
	}

	// Update your Input class with two new methods: (PHP IV : Exceptions (Throwing))
	// public static function getString($key)
	public static function getString($key, $min=0, $max=10000)
	{
		if(!self::has($key)) {
			throw new OutOfRangeException("Request does not contain key: '{$key}'");
		}
		$value = self::get($key);
		
		if (gettype($value) != 'string') {
			throw new DomainException("Value {$value} is not a string");
		}
		if (strlen($value) < $min || strlen($value) > $max) {
			throw new LengthException("Length must be between {$min} and {$max}");
		}
		if (!is_int($min) && !is_int($max)) {
			throw new InvalidArgumentException("Value at index '{$key}' is the wrong type");
		}
		
		return $value;
	}

	// public static function getNumber($key)

	public static function getNumber($key, $min=0, $max=100000)
	{
			
		if (!self::has($key)) {
			throw new OutOfRangeException("Request does not contain key: '{$key}'");
		}
		$value = self::get($key);
		if ($value < $min || $value > $max) {
			throw new RangeException("Number must be between {$min} and {$max}");
		}
		if (!is_int($value) && !is_int($min) && !is_int($max)){
			throw new InvalidArgumentException("Value '{$value}' is not a number!");
		}
		return (int)$value;
	}

	///////////////////////////////////////////////////////////////////////////
	//                      DO NOT EDIT ANYTHING BELOW!!                     //
	// The Input class should not ever be instantiated, so we prevent the    //
	// constructor method from being called. We will be covering private     //
	// later in the curriculum.                                              //
	///////////////////////////////////////////////////////////////////////////
	private function __construct() {}
}
