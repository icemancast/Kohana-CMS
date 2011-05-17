<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/account', array('class' => 'form')); ?>

<fieldset>
	
<legend>All Fields required</legend>

<p>
	<?= Form::label('email', 'Email'); ?>
	<?= Form::input('email', !empty($post['email']) ? $post['email'] : '', array('id' => 'email' )); ?>
</p>