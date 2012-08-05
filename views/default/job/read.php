<h1><?php echo $job->title; ?></h1>

<p class="minor intro">
    <span class="date"><?php echo Common::get_date_phrase_to_read_job($job->created); ?></span>
    Работа в <?php echo $job->company; ?>
</p>

<p>
    <strong><?php echo $job->location; ?></strong>
    <br />
    <?php echo $job->description; ?>
<h2>Как <span>с нами</span> связаться</h2>

<p>
    <strong><?php echo $job->apply; ?></strong>
</p>
<?php if (Request::current()->route() === 'read') : ?>
<p class="minor push-down">Не забудьте упомянуть, что Вы нашли эту вакансию на <a href="http://www.kohanajobs.ru">KohanaJobs.ru</a>. Спасибо.</p>

<p class="hide4print"><?php echo HTML::anchor(NULL, 'к списку вакансий'); ?></p>
<?php endif; ?>