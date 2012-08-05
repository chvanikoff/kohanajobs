<?php

/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */

class Mailer_Job extends Mailer {

    public function confirmation($job)
    {
        $this->to = $job->email;
        $this->subject = 'Подтверждение размещения вакансии на KohanaJobs.ru';
        $this->view = 'job/confirmation';
        $this->data = array('job' => $job);
    }

    public function info($job)
    {
        $this->to = $job->email;
        $this->subject = 'Ваша вакансия успешно размещена на KohanaJobs.ru';
        $this->view = 'job/info';
        $this->data = array('job' => $job);
    }
}