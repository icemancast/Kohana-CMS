<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/event/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('event_title', '* Event Title'); ?>
	<?= Form::input('event_title', !empty($post['event_title']) ? $post['event_title'] : '', array('id' => 'event_title' )); ?>
</p>

<!--
	TODO need to figure out what I am going to do with images. Maybe use s3 service and just use a path here. Do i upload to s3? Do I give access to a folder with event images? Also create 1 size for event graphics maybe close to square.
-->

<p>
	<?= Form::label('image', 'Image path'); ?>
	<?= Form::input('image', !empty($post['image']) ? $post['image'] : '', array('id' => 'image' )); ?>
</p>

<p>
	<?= Form::label('description', '* Event Description'); ?>
	<?= Form::textarea('description', !empty($post['description']) ? $post['description'] : '', array('id' => 'description' )); ?>
</p>

<p>
	<?= Form::label('registration_url', 'Registration Url'); ?>
	<?= Form::input('registration_url', !empty($post['registration_url']) ? $post['registration_url'] : '', array('id' => 'registration_url' )); ?>
</p>

<p>
	<?= Form::label('tags', '* Tags'); ?>
	<?= Form::input('tags', !empty($post['tags']) ? $post['tags'] : '', array('id' => 'tags' )); ?>
	<small>(Separate by commma)</small>
</p>

<p>
	<?= Form::label('slug', '* Slug'); ?>
	<?= Form::input('slug', !empty($post['slug']) ? $post['slug'] : '', array('id' => 'slug' )); ?>
</p>

<p>
	<?= Form::label('date_event', '* Event Date'); ?>
	<?= Form::input('date_event', !empty($post['date_event']) ? $post['date_event'] : '', array('id' => 'date_event', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('date_eventend', 'Event End Date'); ?>
	<?= Form::input('date_eventend', !empty($post['date_eventend']) ? $post['date_eventend'] : '0', array('id' => 'date_eventend', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('event_time', '* Event Time'); ?>
	<?= Form::input('event_time', !empty($post['event_time']) ? $post['event_time'] : '', array('id' => 'event_time', 'class' => 'timepicker' )); ?> <small>(Format HH:mm - 24 hour)</small>
</p>

<p>
	<?= Form::label('date_published', '* Date published'); ?>
	<?= Form::input('date_published', !empty($post['date_published']) ? $post['date_published'] : '', array('id' => 'date_published', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('date_expired', 'Date expired'); ?>
	<?= Form::input('date_expired', !empty($post['date_expired']) ? $post['date_expired'] : '0', array('id' => 'date_expired', 'class' => 'datepicker' )); ?>
	<small>(put "0" to use event date as expiration)</small>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>