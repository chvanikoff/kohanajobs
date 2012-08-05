<?php

/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @copyright 2010
 */

class Common {
    public static function get_count_jobs_title($num)
    {
        switch ($num % 10)
        {
            case 1 :
                return 'Доступна '.Common::num_to_word($num).' вакансия';
                break;
            
            case 2 :
            case 3 :
            case 4 :
                return 'Доступно '.Common::num_to_word($num).' вакансии';
            
            default :
                return 'Доступно '.Common::num_to_word($num).' вакансий';
        }
    }
    
    public static function num_to_word($num)
    {
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
        
        if (array_key_exists($num, $words))
        {
            return $words[$num];
        }
        
        $less_num = $num - 1;
        
        while ( ! array_key_exists($less_num, $words))
        {
            $less_num--;
        }
        
        return $words[$less_num].' '.$words[($num % 10)];
    }
    
    public static function get_date_phrase($time = NULL)
    {
        ($time === NULL) AND $time = date('d.m.Y');
        
        $timestamp = strtotime($time);
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        ($month[0] === '0') AND $month = $month[1];
        $year = date('Y', $timestamp);
        
        $monthes = array(
            1 => 'январь',
            'февраль',
            'март',
            'апрель',
            'май',
            'июнь',
            'июль',
            'август',
            'сентябрь',
            'октябрь',
            'ноябрь',
            'декабрь',
        );
        
        $year = ($year !== date('Y', time())) ? ' ('.$year.')' : NULL;
        
        return $monthes[$month].', '.$day.$year;
    }
    
    public static function get_date_phrase_to_read_job($date = NULL)
    {
        ($date === NULL) AND ($date = date('d.m.Y'));
        
        $timestamp = strtotime($date);
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        ($month[0] === '0') AND $month = $month[1];
        $year = date('Y', $timestamp);
        
        $monthes = array(
            1 => 'января',
            'февраля',
            'марта',
            'апреля',
            'мая',
            'июня',
            'июля',
            'августа',
            'сентября',
            'октября',
            'ноября',
            'декабря',
        );
        
        return $day.' '.$monthes[$month].', '.$year;
    }
    
    public static function image_new($time)
    {
        return (((time() - strtotime($time)) / (60*2*24)) < 3)
            ? HTML::image('layout/new.gif', array('alt' => 'new', 'width' => 22, 'height' => 9))
            : NULL;
    }
    
    public static function get_url($url)
    {
        if ($url === NULL)
        {
            return 'http://';
        }

        return (strpos($url, 'http') !== 0)
			? $url
			: 'http://'.$url;
    }
}