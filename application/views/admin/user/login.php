<h2>Login</h2>
<?php if ($message) : ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<li><?= $message; ?></li>
</ul>
<?php endif; ?>

<?= Form::open('admin/user/login', array('class' => 'form')); ?>

<p>
<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
</p>

<p>
<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>
</p>

<p>
<?= Form::label('remember', 'Remember Me'); ?>
<?= Form::checkbox('remember'); ?> <small>(Remembers for 2 weeks)</small>
</p>

<p>
<label>&nbsp;</label>
<?= Form::submit('login', 'Login', array('class' => 'button ui-corner-all')); ?>
<?= Form::close(); ?>
</p>

<p>Or <?= HTML::anchor('admin/user/create', 'create a new account'); ?></p>
