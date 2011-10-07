<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title><?= $browser_title; ?></title>

<link href='http://fonts.googleapis.com/css?family=Give+You+Glory&v2' rel='stylesheet' type='text/css'>
<?php foreach ($styles as $style): ?>
<link rel="stylesheet" type="text/css" media="<?= $style['media']; ?>" href="<?= URL::base() ?>media/site/css/<?= $style['name']; ?>.css" />
<?php endforeach; ?>

<?php foreach ($scripts as $script): ?>
<script type="text/javascript" src="<?= $script; ?>"></script>
<?php endforeach; ?>

</head>

<body>
	<div id="wrapper" class="container_12">
		<div id="header">
			<a href="<?= URL::base(); ?>" id="brand"></a>
			
			<!-- timer code -->
			
			<!-- search bar -->
		</div>
		<ul id="nav" class="container_12">
			<li>test</li>
			<li>adsf</li>
		</ul>
		
		<ul id="left-nav">
			<li>adsf</li>
			<li>adsf</li>
		</ul>
		
		<h1><?= $page_title; ?></h1>
		<p><?= $content; ?></p>
	</div>
</body>
</html>