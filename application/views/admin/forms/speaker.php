<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/speaker/manage', array('class' => 'form')); ?>

<fieldset>

<legend>* required</legend>

<p>
	<?= Form::label('console_id', 'Console ID'); ?>
	<?= Form::input('console_id', !empty($post['console_id']) ? $post['console_id'] : '', array('id' => 'console_id' )); ?>
</p>

<p>
	<?= Form::label('name', '* Speaker Name'); ?>
	<?= Form::input('name', !empty($post['name']) ? $post['name'] : '', array('id' => 'name' )); ?>
</p>
	
<p>
	<?= Form::label('title', '* Speaker Title'); ?>
	<?= Form::input('title', !empty($post['title']) ? $post['title'] : '', array('id' => 'title' )); ?>
</p>

<p>
	<?= Form::label('slug', '* Speaker Slug'); ?>
	<?= Form::input('slug', !empty($post['slug']) ? $post['slug'] : '', array('id' => 'slug' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>