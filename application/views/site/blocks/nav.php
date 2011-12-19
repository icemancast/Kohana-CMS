<ul id="nav">
<?php

foreach($nav as $navitem)
{
	echo '<li><a href="">' . $navitem->nav_title . '</a>
		<ul>
			';
	foreach($navitem->urls->find_all() as $url)
	{
		echo '<li><a href="' . $url->url . '">' . $url->url_title . '</a></li>
		';
	}
	echo '</ul>';	
}

?>
</ul><!--end of nav -->