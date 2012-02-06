<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open($post_url, array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('category_title', '* Category Title'); ?>
	<?= Form::input('category_title', !empty($post['category_title']) ? $post['category_title'] : '', array('id' => 'category_title' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', !empty($post['id']) ? $post['id'] : ''); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>