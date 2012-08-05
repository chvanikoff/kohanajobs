<div id="header">
	<p id="identity">
		<?= HTML::anchor('/', HTML::image('img/layout/kohanajobs.png', array('alt' => 'Kohana Jobs')), NULL, TRUE, FALSE); ?>
	</p><!-- #identity -->

	<p id="post">
		<?= HTML::anchor(Route::url('create', NULL, TRUE), HTML::image('img/layout/post.png', array('alt' => 'Добавить вакансию!')), array('title' => 'Это бесплатно!')); ?>
	</p><!-- #post -->
</div><!-- #header -->