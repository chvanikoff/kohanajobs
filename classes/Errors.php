<?php
/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */
 
class Errors {
	private static $storage = array();

	public static function add($key, $error = NULL)
	{
		if ($error === NULL)
		{
			if ($key instanceof ORM_Validation_Exception)
			{
				$key = $key->errors('');
			}
			is_array($key) OR $key = array($key);

			foreach ($key as $_key => $error)
			{
				Errors::add($_key, $error);
			}
		}
		else
		{
			Errors::$storage[$key] = $error;
		}
	}

	public static function get($key = NULL)
	{
		if ($key === NULL)
		{
			return empty(Errors::$storage) ? NULL : Arr::flatten(Errors::$storage);
		}

		return isset(Errors::$storage[$key]) ? 'error' : NULL;
	}
}