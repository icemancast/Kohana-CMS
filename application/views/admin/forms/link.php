<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= $error; ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/nav/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('title', '* Nav Title'); ?>
	<?= Form::input('title', !empty($post['title']) ? $post['title'] : '', array('id' => 'title' )); ?>
</p>

<p>
	<?= Form::label('test', '* Nav test'); ?>
	<?= Form::input('test', !empty($post['test']) ? $post['test'] : '', array('id' => 'test' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>