<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/url/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('nav_id', '* Parent Nav'); ?>
	<?= Form::select('nav_id', $navs, !empty($post['nav_id']) ? $post['nav_id'] : ''); ?>
</p>

<p>
	<?= Form::label('url_title', '* Url Title'); ?>
	<?= Form::input('url_title', !empty($post['url_title']) ? $post['url_title'] : '', array('id' => 'url_title' )); ?>
</p>

<p>
	<?= Form::label('url', '* Url'); ?>
	<?= Form::input('url', !empty($post['url']) ? $post['url'] : '', array('id' => 'url' )); ?>
</p>

<p>
	<?= Form::label('status', '* Url Status'); ?>
	<?= Form::select('status', $status_select, !empty($post['status']) ? $post['status'] : ''); ?>
</p>

<p>
	<?= Form::label('sort', '* Sort'); ?>
	<?= Form::input('sort', !empty($post['sort']) ? $post['sort'] : '0', array('id' => 'sort' )); ?>
</p>

<p>
	<?= Form::label('date_published', '* Date published'); ?>
	<?= Form::input('date_published', !empty($post['date_published']) ? $post['date_published'] : '', array('id' => 'date_published', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('date_expired', '* Date expired'); ?>
	<?= Form::input('date_expired', !empty($post['date_expired']) ? $post['date_expired'] : '0', array('id' => 'date_expired', 'class' => 'datepicker' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>