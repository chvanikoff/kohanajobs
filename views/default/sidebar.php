<p class="intro">
	Этот сайт является официальным порталом поиска работы для Kohana программистов.
</p>

<h2>Что <span>такое</span> Kohana?</h2>
<p>
	<a href="http://kohanaphp.com">Kohana</a> это офигенный PHP&nbsp;5 фреймворк.
	Он компактный, быстрый и использует <abbr title="Hierarchical Model View Controller">HMVC</abbr> паттерн.
	<a href="http://kohanaframework.org">(узнать больше)</a>
</p>


<h2>Зачем <span>размещать</span> здесь вакансию?</h2>
<p>
	Вы ограничиваете круг поисков PHP программистами, имеющими опыт работы с Kohana.
	А еще это бесплатно.
	<?= HTML::anchor(Route::url('create', NULL, TRUE), 'Разместить!'); ?>
</p>

<?php if (Request::current()->route() !== 'faq') : ?>
<p class="push-down"><?= HTML::anchor(Route::url('faq', NULL, TRUE), 'Читать <abbr title="Frequently Asked Questions">FAQ</abbr>'); ?></p>
<?php endif; ?>