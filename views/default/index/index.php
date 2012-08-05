<p id="rss-jobs">
	<a class="clean" href="http://feeds2.feedburner.com/kohanajobs" title="Subscribe to the RSS feed">
		<img alt="RSS feed" src="http://www.kohanajobs.com/img/layout/feed-icon-10x10.png" width="10" height="10" />
		RSS
	</a>
</p>

<?= Request::factory('jobs/all')->execute()->body(); ?>