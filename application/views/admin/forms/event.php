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
	<?= Form::label('category_id', '* Category'); ?>
	<?= Form::select('category_id', $select_category, !empty($post['category_id']) ? $post['category_id'] : ''); ?>
</p>

<p>
	<?= Form::label('event_title', '* Event Title'); ?>
	<?= Form::input('event_title', !empty($post['event_title']) ? $post['event_title'] : '', array('id' => 'event_title' )); ?>
</p>

<!--
	TODO need to figure out event_what I am going to do with images. Maybe use s3 service and just use a path here. Do i upload to s3? Do I give access to a folder with event images? Also create 1 size for event graphics maybe close to square.
-->
<p>
	<?= Form::label('event_who', 'Event for who:'); ?>
	<?= Form::input('event_who', !empty($post['event_who']) ? $post['event_who'] : '', array('id' => 'event_who' )); ?>
</p>

<p>
	<?= Form::label('event_what', '* What is event:'); ?>
	<?= Form::textarea('event_what', !empty($post['event_what']) ? $post['event_what'] : '', array('id' => 'event_what' )); ?>
</p>

<p>
	<?= Form::label('event_date', '* Event Date'); ?>
	<?= Form::input('event_date', !empty($post['event_date']) ? $post['event_date'] : '', array('id' => 'event_date', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('event_time', '* Event Time'); ?>
	<?= Form::input('event_time', !empty($post['event_time']) ? $post['event_time'] : '', array('id' => 'event_time', 'class' => 'timepicker' )); ?> <small>(Format HH:mm - 24 hour)</small>
</p>

<p>
	<?= Form::label('event_end', 'Event End Date'); ?>
	<?= Form::input('event_end', !empty($post['event_end']) ? $post['event_end'] : '0', array('id' => 'event_end', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('event_where', '* Where is event:'); ?>
	<?= Form::textarea('event_where', !empty($post['event_where']) ? $post['event_where'] : '', array('id' => 'event_where' )); ?>
</p>

<p>
	<?= Form::label('event_cost', 'Cost:'); ?>
	<?= Form::input('event_cost', !empty($post['event_cost']) ? $post['event_cost'] : '', array('id' => 'event_cost' )); ?>
</p>

<p>
	<?= Form::label('registration_url', 'Registration Url'); ?>
	<?= Form::input('registration_url', !empty($post['registration_url']) ? $post['registration_url'] : '', array('id' => 'registration_url' )); ?>
</p>

<p>
	<?= Form::label('registration_deadline', 'Registration Deadline'); ?>
	<?= Form::input('registration_deadline', !empty($post['registration_deadline']) ? $post['registration_deadline'] : '', array('id' => 'registration_deadline', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('status', '* Event Status'); ?>
	<?= Form::select('status', $select_status, !empty($post['status']) ? $post['status'] : ''); ?>
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
	<?= Form::hidden('event_image', $post['event_image']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>