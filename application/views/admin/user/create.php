<h2>Create a New User</h2>
<?php if ($message) : ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<li><?= $message; ?></li>
</ul>
<?php ?>
<?php endif; ?>

<?= Form::open('admin/user/create', array('class' => 'form')); ?>

<p>
<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
 <small class="small-error"><?= Arr::get($errors, 'username'); ?></small>
</p>

<p>
<?= Form::label('email', 'Email Address'); ?>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
 <small class="small-error"><?= Arr::get($errors, 'email'); ?></small>
</p>

<p>
<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>
 <small class="small-error"><?= Arr::path($errors, '_external.password'); ?></small>
</p>

<p>
<?= Form::label('password_confirm', 'Confirm Password'); ?>
<?= Form::password('password_confirm'); ?>
 <small class="small-error"><?= Arr::path($errors, '_external.password'); ?></small>
</p>

<p>
<label>&nbsp;</label>
<?= Form::submit('create', 'Create User', array('class' => 'button ui-corner-all')); ?>
<?= Form::close(); ?>
</p>

<p>Or <?= HTML::anchor('admin/user/login', 'login'); ?> if you already have an account.</p>