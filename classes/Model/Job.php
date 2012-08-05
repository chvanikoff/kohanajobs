<?php
/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */

class Model_Job extends ORM {

	public function rules()
	{
		return array(
			'company' => array(
				array('not_empty'),
			),
			'location' => array(
				array('not_empty'),
			),
			'website' => array(
				array('url'),
			),
			'email' => array(
				array('not_empty'),
				array('email'),
			),
			'title' => array(
				array('not_empty'),
			),
			'description' => array(
				array('not_empty'),
			),
			'apply' => array(
				array('not_empty'),
			),
		);
	}

	public function get_terms_validation($values)
	{
		return Validation::factory($values)->rule('terms', 'not_empty');
	}

	public function create_job($data)
	{
		return $this->values($data)->create();
	}

	/**
	 * @param $jobs
	 * @return string
	 * @todo переписать этот метод по-человечески!
	 */
	public function get_count_title($jobs)
	{
		$count = ($jobs instanceof Database_Result)
				? $jobs->count()
				: count($jobs);
		$rem = $count % ($count <= 20 ? 20 : 10);

		static $words = array(
			'ноль',
			'одна',
			'две',
			'три',
			'четыре',
			'пять',
			'шесть',
			'семь',
			'восемь',
			'девять',
			'десять',
			'одиннадцать',
			'двенадцать',
			'тринадцать',
			'четырнадцать',
			'пятнадцать',
			'шестнадцать',
			'семнадцать',
			'восемнадцать',
			'девятнадцать',
			'двадцать',
			30 => 'тридцать',
			40 => 'сорок',
			50 => 'пятьдесят',
			60 => 'шестьдесят',
			70 => 'семьдесят',
			80 => 'восемьдесят',
			90 => 'девяносто',
			100 => 'сто',
		);

		if (isset($words[$count]))
		{
			$word = $words[$count];
		}
		else
		{
			$tmp = $count;
			while ( ! isset($words[--$tmp]));
			$word = $words[$tmp].' '.$words[$count - $tmp];
		}
		switch ($rem)
		{
			case 1 :
				return 'Есть '.$word.' вакансия';
			case 2 :
			case 3 :
			case 4 :
				return 'Есть '.$word.' вакансии';
			default :
				return 'Есть '.$word.' вакансий';
		}
	}

	public function build_uri()
	{
		return Route::url('read', array('id' => $this->id), TRUE);
	}

	private $dont_filter = array('email', 'created', 'updated', 'password', 'confirmation');

	public function values(array $values, array $expected = NULL)
	{
		if (($values['url'] = Common::get_url($values['url'])) === 'http://')
		{
			unset($expected[array_search('url', $expected)]);
		}

		foreach ($expected as $field)
		{
			if (isset($values[$field]) AND ! in_array($field, $this->dont_filter))
			{
				$values[$field] = Text::auto_link_emails(htmlspecialchars($values[$field]));
			}
		}

		$values['description'] = nl2br(preg_replace('#\*{2,}(.*?)\*{2,}#usi', '<b>$1</b>', $values['description']));

		return parent::values($values, $expected);
	}
}