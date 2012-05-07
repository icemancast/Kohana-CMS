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
	
	<div id="wrapper">
	<header id="header">
		<div id="head" class="container_16">
			<a href="#" id="brand"><div>COMMUNITY BIBLE CHURCH</div></a>			
			<section id="icons-top">
				<ul>
					<li><a id ="newsletter" href=""> </a><li>
					<li><a id ="twitter" href=""> </a></li>
					<li><a id ="facebook" href=""> </a></li>
					<li><a id="search" href=""> </a></li>
				</ul>
				
			</section>
			
			<div class="clear"></div>
			
			<nav>
				<ul>
					<li><a href="#">Sermons</a>
					<ul>
						<div class="pointer">
						
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
						</div>
					</ul>
					</li>
					<li><a href="#">Events</a>
					<ul>
						<div class="pointer">
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
						</div>
					</ul>
					</li>
					<li><a href="#">Ministries</a>
					<ul>
						<div class="pointer">
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
						</div>
					</ul>
					</li>
					<li><a href="#">Get Connected</a>
					<ul>
						<div class="pointer">
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
						</div>
					</ul>
					</li>
					<li><a href="#">About Us</a>
						<ul>
							<div class="pointer">
							<li><a href="#">About CBC</a></li>
							<li><a href="#">Service Times</a></li>
							<li><a href="#">Our Locations</a></li>
							<li><a href="#">Baptism</a></li>
							<li><a href="#">Membership</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Staff</a></li>
							<li><a href="#">Contact</a></li>
							</div>
						</ul>
					<li><a href="#">Giving</a>
					<ul>
						<div class="pointer">
						<li><a href="#">item1</a></li>
						<li><a href="#">item2</a></li>
						<li><a href="#">item3</a></li>
						<li><a href="#">item4</a></li>
						</div>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	
	<section id="content" class="container_16">
		
		<div id="title" class="grid_16">
			<nav class="quicknav">
				<ul>
					<li><a href="#"><img src="images/icon-events-sm.png"> <span>Events</span></a></li>
					<li><a href="#"><img src="images/icon-contact-sm.png"> <span>Contact</span></a></li>
					<li><a href="#"><img src="images/icon-newsletter-sm.png"><span> Newsletter</span></a></li>
				</ul>
			</nav>
			<h1><?= $page_title; ?>.</h1>
			
			<p class="condensed">CBC'S PASTORAL CARE MINISTRY IS COMMITTED TO OFFERING SOLUTIONS FOR YOUR PRESENT NEEDS WHILE STRENGTHENING YOU FOR THE FUTURE.</p>
			<p class="copy">We are committed to bringing Christ-centered ministries: To encourage you as an individual to grow in Christ. To enrich your life with biblical teaching within a healing community. To empower you to experience God's healing and direction in your life. We hope you will become familiar with the many ways we are here to serve you.</p>
			
		</div>
	</section>
	<p class="clear">
	<section class="subcontent">
			<div id="header-pics">
				
						<div class="slideshow content-slideshow">
								<img src="images/headers/pastoral_care/pc-1.jpg" width="940" height="350" />
								<img src="images/headers/pastoral_care/pc-2.jpg" width="940" height="350" />
			                    <img src="images/headers/pastoral_care/pc-3.jpg" width="940" height="350" />
								<img src="images/headers/pastoral_care/pc-4.jpg" width="940" height="350" />
								<img src="images/headers/pastoral_care/pc-5.jpg" width="940" height="350" />
			                    <img src="images/headers/pastoral_care/pc-6.jpg" width="940" height="350" />
								<img src="images/headers/pastoral_care/pc-7.jpg" width="940" height="350" />
						</div>
				
			
			
			</div>

			<div id="subnav">
				<ul class="subnav condensed container_16">
					
		
					<li><a href="#">Counseling</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li><a href="#">Leadership</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li><a href="#">Life Recovery</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li><a href="#">Marriage &amp; Family</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li class="margin-right50"><a href="#">Mentoring</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li class="margin-right50"><a href="#">Prayer Ministry</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					<li class="margin-right50"><a href="#">Support Group</a>
						<ul>
							<li><a href="#">item1</a></li>
							<li><a href="#">item2</a></li>
							<li><a href="#">item3</a></li>
							<li><a href="#">item4</a></li>
						</ul>
					</li>
					</ul>
			</div>	
			
			<div class="container_16">
				<p class="condensed">Anger, Faith, Self-Esteem, Sin, Premarital &amp; Marital Issues, Discouragement, Loneliness, Grief & Loss, Parenting Issues.</p>
				<p class="copy">Experience a compassionate listening and sound biblical advice in a confidential counseling session. Typical sessions last 45-50 minutes. Counselors will make recommendations for follow-up appointments and participation in other support ministries of CBC. To request an appointment, call us at (210) 253-5971.</p>
				
				
				<p id="att" class="condensed">If you are in crisis, Call 1-800-273-8255 or (210) 223-SAFE.</p>
			
			</div>
	
	</section>

	
	<footer>
	</footer>
	
	
	
	
	
	
	
	
	

			<?php 
		
				
		
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