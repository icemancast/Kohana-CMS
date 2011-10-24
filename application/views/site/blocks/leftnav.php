<ul id="left-nav" class="grid_3">
<?php

echo $page->nav->nav_title;

echo '<br /><br />';

foreach ($url as $link)
{
	echo $link->url_title;
}
?>
</ul>