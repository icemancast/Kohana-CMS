<ul id="left-nav" class="alpha grid_3">
	<li class="nav-title"><a href="<?php echo URL::base() . 'events/'; ?>">All Events</a></li>
<?php

$categories = ORM::factory('category')->get_all();

foreach($categories as $category)
{
	$url = URL::base() . 'events/' . $category->category_title;
	$current_url = Request::current()->uri();
	$current_url = str_replace('events/', '', $current_url);
	
	$class = $category->category_title == $current_url ? ' class="current-uri" ' : '';
	
	//$class = ($page->slug == $link->url) ? ' class="current-uri" ' : '';
	echo '<li><a href="' . $url . '"' . $class . '>' . ucfirst($category->category_title) . '</a></li>
	';
}

?>
</ul>