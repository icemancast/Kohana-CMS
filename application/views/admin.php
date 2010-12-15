<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?= $page_title; ?></title>

<?= HTML::style('media/css/base.css') . "\n"; ?>
<?= HTML::style('media/css/style.css') . "\n"; ?>
<?= HTML::style('media/css/jquery-ui-1.8.4.custom.css') . "\n"; ?>
<?= HTML::script('media/js/jquery-1.4.2.min.js') . "\n"; ?>
<?= HTML::script('media/js/jquery-ui-1.8.4.custom.min.js') . "\n"; ?>

</head>

<body>

<div id="wrapper" class="width-site">
	
	<div id="header" class="width-site">
		<a href="<?= url::base(); ?>" id="brand"></a>
		
		<div id="admin" class="right">
			
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
	<p class="footer-text left">&#169; 2010  Community Bible Church | (210) 496-5096 | 2477 North Loop 1604 East San Antonio, TX 78232 | Problems? <a href="mailto:webmaster@communitybible.com">webmaster@communitybible.com</a></p>

</div>
</body>
</html>