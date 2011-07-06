<ul id="user-nav">
	
	<?php if(Auth::instance()->logged_in() && $user = Auth::instance()->get_user()) : ?>
	
	<li>Hello <?= $user->username; ?> | <a href="<?= url::base(); ?>admin/user/logout">Logout</a></li>
		
	<?php else: ?>
		
	<li><a href="<?= url::base(); ?>admin/user/login">Login</a></li>
		
	<?php endif; ?>
	
</ul>