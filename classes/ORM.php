<?php
/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */
 
class ORM extends Kohana_ORM {
	public function ensure_loaded($code = 404)
	{
		if ( ! $this->loaded())
		{
			$exception = 'HTTP_Exception_'.$code;
			throw new $exception;
		}
	}
}