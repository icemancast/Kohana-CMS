<h2>Info for user "<?= $user->username; ?>"</h2>

<ul>
	<li>Email: <?= $user->email; ?></li>
	<li>Nuumber of logins: <?= $user->logins; ?></li>
	<li>Last login: <?= Date::fuzzy_span($user->last_login); ?></li>
</ul>

<p><?= HTML::anchor('admin/user/logout', 'Logout'); ?></p>