<?php
/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */
 
class Controller_Job extends Controller_Front {

	public function GET_list()
	{
		$this->view->jobs = ORM::factory('job')->find_all();
	}

	public function GET_create()
	{
		$this->view->post = array();
	}
	public function POST_create()
	{
		$this->view->post = $this->request->post();
		try
		{
			$job = ORM::factory('job')->values($this->request->post(), array(
				'company', 'location', 'url', 'email', 'title', 'description', 'apply',
			));
			$terms_validation = $job->get_terms_validation($this->request->post());
			if ($this->request->post('preview') === NULL)
			{
				$job->create($terms_validation);
				Mailer::factory('job')->send('confirmation', $job);
				Session::instance()->set('message', 'На Ваш email была отправлена ссылка для подтверждения размещения объявления.');
				$this->redirect(Route::url('default', NULL, TRUE).'#flash');
			}
			$job->check($terms_validation);
			$this->view->job = $job;
		}
		catch (ORM_Validation_Exception $e)
		{
			Errors::add($e);
		}
	}

	public function GET_read()
	{
		$job = ORM::factory('job', $this->request->param('id'));
		$job->ensure_loaded();
		$this->view->job = $job;
	}

	public function GET_update()
	{
		$job = ORM::factory('job', $this->request->param('id'));
		$job->ensure_loaded();
		$this->view->post = $job;
	}
	public function POST_update()
	{
		$job = ORM::factory('job', $this->request->param('id'));
		$job->ensure_loaded();
		$this->view->post = $job;
	}

	public function GET_delete()
	{

	}
	public function POST_delete()
	{

	}

	public function GET_confirm()
	{
		$job = ORM::factory('job', $this->request->param('id'));
		$job->ensure_loaded();
		if ($job->confirmation !== $this->request->param('confirmation'))
		{
			throw new HTTP_Exception_404;
		}
		$job->confirmation = DB::NULL();
		$job->update();
		Session::instance()->set('message', 'Ура! Ваша вакансия опубликована, смотрите ниже!');
		Mailer::factory('job')->send('info', $job);

		$this->redirect(Route::url('read', array('id' => $job->id)));
	}
}