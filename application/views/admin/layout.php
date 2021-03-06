<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?= $page_title; ?></title>

<?= HTML::style('media/admin/css/base.css') . "\n"; ?>
<?= HTML::style('media/admin/css/style.css') . "\n"; ?>
<?= HTML::style('media/admin/css/jquery-ui-1.8.4.custom.css') . "\n"; ?>

<?= HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js') . "\n"; ?>
<?= HTML::script('media/admin/js/jquery-ui-1.8.4.custom.min.js') . "\n"; ?>

<?= HTML::script('media/admin/js/markitup/jquery.markitup.js') . "\n"; ?>
<?= HTML::script('media/admin/js/markitup/sets/default/set.js') . "\n"; ?>

<?= HTML::style('media/admin/js/markitup/skins/simple/style.css') . "\n"; ?>
<?= HTML::style('media/admin/js/markitup/sets/default/style.css') . "\n"; ?>


<script type="text/javascript"> 
	
	$(document).ready(function()
		{
			$(".markItUp").markItUp(mySettings);
			$(".datepicker").datepicker();
			// $(".time").timepickr();
		}
	);
	
</script>

</head>

<body>

<div id="wrapper" class="width-site">
	
	<div id="header" class="width-site">
		<a href="<?= url::base(); ?>admin" id="brand"></a>
		
		<div id="admin" class="right">
			<?= $user_nav; ?>
		</div>
		
	</div>
	
	<?= $nav; ?>

    <div id="content" class="left width-site">
	
		<h1 class="size1of2 left"><?= $page_title; ?></h1>
		
		<div id="breadcrumbs" class="size1of3 right">
			
		</div>
    
      	<div id="main-content" class="ui-corner-all width-site left">
			<div class="content-round">
				<div>
					<?= $content; ?>
				</div>
			</div>
        </div>
        
	</div>
</div>
<div id="footer" class="width-site">
	<p class="footer-text left">&#169; <?php echo '2010 - ' . date('Y'); ?>  Community Bible Church | <a href="mailto:webmaster@communitybible.com">webmaster@communitybible.com</a></p>

</div>
</body>
</html>