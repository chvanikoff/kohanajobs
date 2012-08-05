<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Kohana Jobs • Работа для разработчиков, использующих Kohana</title>
	<?= HTML::style('css/reset.css', array('media' => 'screen, projection')); ?>
	<?= HTML::style('css/layout.css', array('media' => 'screen, projection')); ?>
	<!--[if lte IE 6]><?= HTML::style('css/ie/layout-ie6.css', array('media' => 'screen, projection')); ?><![endif]-->
	<!--[if lte IE 7]><?= HTML::style('css/ie/layout-ie7.css', array('media' => 'screen, projection')); ?><![endif]-->
	<?= HTML::style('css/print.css', array('media' => 'print')); ?>
<!--	<link rel="alternate" type="application/rss+xml" title="50 последних вакансий для Kohana разработчиков" href="http://feeds2.feedburner.com/rukohanajobs" />-->
	<link rel="shortcut icon" href="<?= HTML::get_file_path('img/layout/favicon.png'); ?>" />
</head>

<body class="">
	<?= View::factory('header'); ?>
	<?php if(($message = Session::instance()->get_once('message')) !== NULL) : ?>
	<div id="flash">
	    <p><?php echo $message; ?></p>
	</div>
	<?php endif; ?>
	<div id="main" class="clearfix">
		<div id="content">
			<?= $view; ?>
		</div><!-- #content -->

		<div id="sidebar">
			<?= View::factory('sidebar'); ?>
		</div><!-- #sidebar -->
	</div><!-- #main -->

	<?= View::factory('footer'); ?>
</body>
</html>

<!-- Do you want such beautiful markup and CSS as well? Contact this guy: geert{at}idoe.be -->