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

<!-- <script type="text/javascript">
/*<![CDATA[*/
	// onload
	$(function() {
		$("body").addGrid(12, {img_path: '<? //= URL::base(); ?>media/site/images/'});
	});
/*]]>*/
</script> -->

</head>

<body>
	<div id="wrapper" class="container_12">
		<div id="header">
			<a href="<?= URL::base(); ?>" id="brand"></a>
			
			<!-- timer code -->
			<div id="online-service"></div>
			
			<!-- search bar -->
			<?= $search ?>
			
		</div><!--end of header -->
		
		<?= $nav; ?>
		
		<span class="clear"></span>
		
		<?= $leftnav; ?>
		
		<div id="photos" class="grid_9">
			
			<!-- <div id="sermon" class="grid_5 alpha left-nav-content">
							<p>test this stuff</p>
						</div>
						
						<div id="times" class="grid_5 alpha left-nav-content">
							<p>#2nd content here</p>
						</div> -->
			
			<img src="<?= URL::base(); ?>media/site/images/content/headers/header.jpg" height="454" width="738" />
		</div><!--end of slidshow -->
		
		<div id="banners" class="grid_12">
			<?= $banners; ?>
		</div><!--end of banners -->
		
		<div id="footer" class="grid_12">
		 <?= $footer; ?>
		</div><!--end of footer -->
		
	</div><!--end of wrapper -->
</body>
</html>