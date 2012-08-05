<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front extends Controller {

	public $template = 'default';

	public $layout;

	public $view = NULL;

	public function before()
	{
		parent::before();

		I18n::lang('ru');

		View::template($this->template);

		try
		{
			$this->view = View::factory(strtolower($this->request->controller().'/'.$this->request->action()));
		}
		catch (View_Exception $e)
		{
			// Do nothing
		}

		if ($this->request->is_initial() AND ! $this->request->is_ajax())
		{
			$this->layout = View::factory('layout');
		}
	}

	public function after()
	{
		if ($this->request->is_initial())
		{
			$this->layout->view = $this->view;
			$this->response->body($this->layout);
		}
		else
		{
			$this->response->body($this->view);
		}

		parent::after();
	}
}
