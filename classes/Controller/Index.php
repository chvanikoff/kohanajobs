<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Front {
	public function GET_index()
	{
		$this->view->jobs = ORM::factory('job')->find_all();
	}
} // End Welcome
