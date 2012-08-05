<h1><?= ORM::factory('job')->get_count_title($jobs); ?></h1>

<table cellspacing="0" summary="List of all Kohana jobs (most recent first)">
	<tr class="skip">
		<th>Дата</th>
		<th>Вакансия</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($jobs as $job) : ?>
	<tr class="alt<?= ($i % 2 === 0 ? 1 : 2); ?>">
		<td class="date">
			<?= Common::get_date_phrase($job->created); ?>
		</td>
		<td>
			<strong><?= HTML::anchor($job->build_uri(), $job->title, array('title' => $job->title), TRUE, FALSE); ?></strong>
			<br /><span class="minor">в компанию</span> <?= $job->company; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($i); ?>
</table>