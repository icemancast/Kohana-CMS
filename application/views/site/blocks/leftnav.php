<ul id="left-nav" class="alpha grid_3">
<?php

echo '		<li class="nav-title"><a href="' . URL::base() . $page->slug . '">' . $page->nav->nav_title . '</a></li>
	';

foreach ($url as $link)
{
	echo '	<li><a href="' . $link->url . '">' . $link->url_title . '</a></li>
	';
}
?>
	</ul>
