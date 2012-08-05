<h1>Добавление новой вакансии</h1>
<?php if (($errors = Errors::get()) !== NULL) : ?>
<div id="formerrors" class="errorbox">
    <h2>Вы допустили ошибки при заполнении формы</h2>
    <ul>
        <?php foreach ($errors as $field => $error) : ?>
        <li>
            <label for="<?php echo $field; ?>"><?php echo $error; ?></label>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php elseif (isset($job)) : ?>
<p><?php echo HTML::anchor('#jobform', 'пропустить предпросмотр'); ?></p>
<div id="preview">
	<?= View::factory('job/read', array('job' => $job)); ?>
</div>
<?php endif; ?>
<?= form::open(Request::detect_uri().'#formerrors', array('id' => 'jobform')); ?>
<?php if (isset($remove_button)) : ?>
<fieldset>
    <legend>Remove</legend>
    <p>
        <?= HTML::anchor(Route::url('delete_job', array('id' => Arr::get($post, 'id'), 'password' => Arr::get($post, 'password')), TRUE), 'удалить объявление', array('class' => 'delete')); ?>
    </p>
</fieldset>
<?php endif; ?>
<fieldset>
    <legend>О компании</legend>

    <p class="clearfix <?= Errors::get('company'); ?>">
        <label for="company">Компания<abbr title="обязательное поле">*</abbr></label>
        <input id="company" name="company" type="text" value="<?= HTML::chars(Arr::get($post, 'company')); ?>" maxlength="100" size="30" />
        <small>Например: “RDR studio” (или Ваше имя)</small>
    </p>

    <p class="clearfix <?= Errors::get('location'); ?>">
        <label for="location">Регион<abbr title="обязательное поле">*</abbr></label>
        <input id="location" name="location" type="text" value="<?= HTML::chars(Arr::get($post, 'location')); ?>" maxlength="100" size="30" />
        <small>Например: “Санкт-Петербург, Россия” или “Донецк, Украина”</small>
    </p>

    <p class="clearfix <?= Errors::get('website'); ?>">
        <label for="website">Сайт</label>
        <input id="website" name="url" type="text" value="<?= strpos(($url = Arr::get($post, 'url')), 'http') === FALSE ? 'http://'.$url : $url; ?>" maxlength="100" size="30" />
        <small>Например: “http://www.kohanajobs.ru/”</small>
    </p>

    <p class="clearfix <?= Errors::get('email'); ?>">
        <label for="email">Email<abbr title="обязательное поле">*</abbr></label>
        <input id="email" name="email" type="text" value="<?= HTML::chars(Arr::get($post, 'email')); ?>" maxlength="100" size="30" />
        <small>
            Этот email не будет опубликован.<br />
            Он будет использован для отправления ссылки подтверждения, а также для возможности редактирования/удаления объявления в дальнейшем.
        </small>
    </p>
</fieldset>

<fieldset>
    <legend>О вакансии</legend>

    <p class="clearfix <?= Errors::get('title'); ?>">
        <label for="title">Название вакансии<abbr title="обязательное поле">*</abbr></label>
        <input id="title" name="title" type="text" value="<?= HTML::chars(Arr::get($post, 'title')); ?>" maxlength="100" size="50" />
        <small>Например: “PHP/MySQL разработчик для создания биллинг-системы”</small>
    </p>

    <p class="clearfix <?= Errors::get('description'); ?>">
        <label for="description">Описание вакансии<abbr title="обязательное поле">*</abbr></label>
        <textarea id="description" name="description" cols="50" rows="10"><?= HTML::chars(Arr::get($post, 'description')); ?></textarea>
        <small>HTML не доступен, только **жирный шрифт**</small>
    </p>

    <p class="clearfix <?= Errors::get('apply'); ?>">
        <label for="apply">Как связаться<abbr title="обязательное поле">*</abbr></label>
        <input id="apply" name="apply" type="text" value="<?= HTML::chars(Arr::get($post, 'apply')); ?>" maxlength="200" size="50" />
        <small>Например: “Отправлять резюме на jobs@company.com”</small>
    </p>
</fieldset>

<fieldset>
    <legend>Публикация</legend>

    <p class="switch clearfix <?= Errors::get('terms'); ?>">
	    <?= Form::checkbox('terms', 1, Arr::get($post, 'terms') === '1', array('id' => 'terms')); ?>
        <label for="terms">
            Я понимаю, что опубликованная мной вакансия может быть удалена, если позиция в ней связана с "контентом для взрослых", незаконной работой, или незаконной дейтельностью компании.
        </label>
    </p>

    <p>
        <input class="main" type="submit" value="Публикация" />
        или <input name="preview" type="submit" value="Предпросмотр" />
    </p>
</fieldset>
<?= form::close(); ?>