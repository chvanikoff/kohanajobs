<?php defined('SYSPATH') or die('No direct script access.');

class Controller extends Kohana_Controller {
	/**
	 * Executes the given action and calls the [Controller::before] and [Controller::after] methods.
	 *
	 * Can also be used to catch exceptions from actions in a single place.
	 *
	 * 1. Before the controller action is called, the [Controller::before] method
	 * will be called.
	 * 2. Next the controller action will be called.
	 * 3. After the controller action is called, the [Controller::after] method
	 * will be called.
	 *
	 * @throws  HTTP_Exception_404
	 * @return  Response
	 */
	public function execute()
	{
		// Execute the "before action" method
		$this->before();

		// Determine the action to use
		$action = ($this->request->method() === Request::POST ? 'POST' : 'GET').'_'.$this->request->action();

		// If the action doesn't exist, it's a 404
		if ( ! method_exists($this, $action))
		{
			if ( ! $this->view instanceof View)
			{
				throw HTTP_Exception::factory(404,
					'The requested URL :uri was not found on this server.',
					array(':uri' => $this->request->uri())
				)->request($this->request);
			}
		}
		else
		{
			// Execute the action itself
			$this->{$action}();
		}

		// Execute the "after action" method
		$this->after();

		// Return the response
		return $this->response;
	}
}
