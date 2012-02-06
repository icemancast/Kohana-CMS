<ul id="nav" class="left width-site">
	
	<?php if (Auth::instance()->logged_in() && $user = Auth::instance()->get_user()) : ?>
		
	<li><a href="<?= url::base(); ?>admin/nav">Navigation</a>
		<ul>
			<li><a href="<?= url::base(); ?>admin/nav/manage/">Add Navigation</a></li>
			<li><a href="<?= url::base(); ?>admin/url/">View Urls</a></li>
			<li><a href="<?= url::base(); ?>admin/url/manage/">Add Urls</a></li>
		</ul>
	</li>
	<li><a href="<?= url::base(); ?>admin/page">Pages</a>
		<ul>
			<li><a href="<?= url::base(); ?>admin/page/manage">Add a Page</a></li>
			<li><a href="<?= url::base(); ?>admin/content/">View Content</a></li>
			<li><a href="<?= url::base(); ?>admin/content/manage/">Add Content</a></li>
		</ul>
	</li>
	<li><a href="<?= url::base(); ?>admin/event">Events</a>
		<ul>
			<li><a href="<?= url::base(); ?>admin/event/manage">Add an Event</a></li>
		</ul>
	</li>
	<li><a href="<?= url::base(); ?>admin/sermon">Sermons</a>
		<ul>
			<!-- <li><a href="<?= url::base(); ?>admin/sermon/manage">Add a Sermon</a></li> -->
			<li><a href="<?= url::base(); ?>admin/podcast">View Podcast Feeds</a></li>
			<li><a href="<?= url::base(); ?>admin/podcast/manage">Add a Podcast Feed</a></li>
			<li><a href="<?= url::base(); ?>admin/speaker">View Speakers</a></li>
			<li><a href="<?= url::base(); ?>admin/speaker/manage">Add a Speaker</a></li>
		</ul>
	</li>
	
	<li><a href="<?= url::base(); ?>admin/category">Categories</a>
		<ul>
			<li><a href="<?= url::base(); ?>admin/category/add">Add Category</a></li>
		</ul>
	</li>
	
	<?php endif; ?>
	
</ul>