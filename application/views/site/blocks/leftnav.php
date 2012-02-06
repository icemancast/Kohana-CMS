<ul id="left-nav" class="alpha grid_3">
<?php

$i = 1;

if(!empty($url))
{

	foreach ($url as $link)
	{
		if ($i != 1)
		{
		
			// check if current page
			$class = $page->slug == $link->url ? ' class="current-uri" ' : '';
			echo '	<li><a href="' . URL::base() . $link->url . '"' . $class . '>' . $link->url_title . '</a></li>
			';
	
		}
		else
		{
			echo '	<li class="nav-title"><a href="' . URL::base() . $link->url . '">' . $link->url_title . '</a></li>';
		}
	
		$i++;
	
	}
}
?>
	</ul>