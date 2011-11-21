<?php

	foreach($contents as $content)
	{
		
		echo '<div class="content-block grid_9">';
			echo ($content->content_title ? '<h2>' . $content->content_title . '</h2>' : '');
			echo Helper_Content::setup($content->content);
		echo '</div>';
	};