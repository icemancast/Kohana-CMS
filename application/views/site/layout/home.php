<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title><?= $browser_title; ?></title>

<meta name="description" content="{description}" />

<?php foreach ($styles as $style): ?>
<link rel="stylesheet" type="text/css" media="<?= $style['media']; ?>" href="<?= URL::base() ?>media/site/css/<?= $style['name']; ?>.css" />
<?php endforeach; ?>

<?php foreach ($scripts as $script): ?>
<script type="text/javascript" src="<?= $script; ?>"></script>
<?php endforeach; ?>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</head>

<body>
	<header id="header">
		<div id="head" class="container_16">
			<a href="<?= URL::base(); ?>" id="brand"><div>COMMUNITY BIBLE CHURCH</div></a>
		
			<section id="icons-top">
				<ul>
					<li><a id="newsletter" href=""></a></li>
					<li><a id="twitter" href=""></a></li>
					<li><a id="facebook" href=""></a></li>
					<li>
						<div id="top-search">
							<form>
								<input name="search" type="text"> 
								<input type="submit" value="Go">
							</form>						
					</li>
				</ul>
				
			</section><!-- end of icon top section -->
			
			<div class="clear"></div>

			<nav>
				<ul id="nav">
					<li><a href="#">About Us</a>
						<ul>
							<li><a href="#">About CBC</a></li>
							<li><a href="#">Service Times</a></li>
							<li><a href="#">Our Locations</a></li>
							<li><a href="#">Baptism</a></li>
							<li><a href="#">Membership</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Staff</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</li>
					<li><a href="#">Sermons</a>
					<ul>
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
					</ul>
					</li>
					<li><a href="#">Events</a>
					</li>
					<li><a href="#">Ministries</a>
					<ul>
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
					</ul>
					</li>
					<li><a href="#">Get Connected</a>
					<ul>
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
					</ul>
					</li>
					
					<li><a href="#">Giving</a>
					<ul>
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	
	<section id="home-pics" class="slideshow">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-001.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-002.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-003.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-004.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-005.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-006.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-007.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-008.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-009.jpg">
		<img src="<?= URL::base(); ?>media/site/images/content/headers/home/20120501-010.jpg">
	</section>
	
	<section id="events">
		<div class="container_16">
			<header id="clickme">Current Events</header>
		</div>
		<div id="event-area">
			<div id="event-items" class="container_16">
				<ul>
					<li>
						<a href="#">
						<div class="title">Mancation</div>
						<div class="time">8:00am / </div>
						<div class="location">CBC Central</div>
						</a>
					</li>
					<li>
						<a href="#">
						<div class="title">God's View</div>
						<div class="time">8:00am / </div>
						<div class="location">CBC Central</div>
						</a>
					</li>
					<li>
						<a href="#">
						<div class="title">Upward Soccer</div>
						<div class="time">8:00am / </div>
						<div class="location">CBC Central</div>
						</a>
					</li>
					<li>
						<a href="#">
						<div class="title">Vacation Bible School</div>
						<div class="time">8:00am / </div>
						<div class="location">CBC Central</div>
						</a>
					</li>
				</ul>
			</div>	
		</div>
	</section>
	
<script>

(function() {
	
	// Slide show ----------------------------//
	$(".slideshow").cycle({
		fx: 'fade',
		speed: 1000,
		timeout:  2500
	});
	
	// Slide drawer ---------------------------//
	var slideEvents = {
		
		container: $('#events'),
		
		config: {
			fullHeight: 137,
			hiddenHeight: 28
		},
		
		toggle: function() {
			// check height then call function
			var div = slideEvents.container,
				divHeight = div.height(),
				fullHeight = slideEvents.config.fullHeight,
				hiddenHeight = slideEvents.config.hiddenHeight;
						
			(divHeight === fullHeight) ? slideEvents.slide( div, hiddenHeight ): slideEvents.slide( div, fullHeight );
			
		},
		
		slide: function( div, height, speed ) {
			div.animate({
				'height': height
			}, speed || 300 );
		},
		
	};
	
	setTimeout(function() {
		slideEvents.slide( $('#events'), slideEvents.config.hiddenHeight, 1000 );
	}, 5000);
	
	$('#clickme').on('click', slideEvents.toggle);
	
	// Hover Forms ---------------------------//
	// var hoverForms = {
	// 		
	// 		container: $('li.hover-form');
	// 		
	// 		config: {
	// 			
	// 		}
	// 		
	// 		
	// 		
	// 	}
	
})();
	
</script>

</body>
</html>