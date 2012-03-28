<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title><?= $browser_title; ?></title>

<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<?php foreach ($styles as $style): ?>
<link rel="stylesheet" type="text/css" media="<?= $style['media']; ?>" href="<?= URL::base() ?>media/site/css/<?= $style['name']; ?>.css" />
<?php endforeach; ?>

<?php foreach ($scripts as $script): ?>
<script type="text/javascript" src="<?= $script; ?>"></script>
<?php endforeach; ?>

<script type="text/javascript">
/*<![CDATA[*/
	// onload
	$(function() {
		$("body").addGrid(12, {img_path: 'media/site/images/'});
	});
/*]]>*/
</script>

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
		
		<div id="inner-wrapper" class="grid_12">
		
			<?php 
		
				// Left navigation
				echo $leftnav;
		
				// Check if image headers and if so make slide show
				if(!empty($photos))
				{
					echo '		<div class="photo-slideshow grid_9">
						';
					foreach($photos as $photo)
					{
						echo '<img src="' . $photo . '" height="300" width="738" />
							';
					}
					echo '</div><!--end of photo slideshow -->
						';
				}
			?>
		
			<div class="content grid_9 omega">
				
				<h1 class="grid_9"><?= $page_title; ?></h1>
		
				<?= $content; ?>
				
			</div><!--end of content -->
			
		</div><!--end of inner wrapper -->
		
		
		<div id="footer" class="grid_12">
		 <?= $footer; ?>
		</div><!--end of footer -->
		
	</div><!--end of wrapper -->
</body>
</html>