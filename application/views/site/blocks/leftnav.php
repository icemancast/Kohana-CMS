<ul id="left-nav" class="alpha grid_3">
<?php

echo '		<li class="nav-title"><a href="' . URL::base() . $page->slug . '">' . $page->nav->nav_title . '</a></li>
	';

foreach ($url as $link)
{
	// check if current page
	$class = $page->slug == $link->url ? ' class="current-uri" ' : '';
	echo '	<li><a href="' . URL::base() . $link->url . '"' . $class . '>' . $link->url_title . '</a></li>
	';
}
?>
	</ul>