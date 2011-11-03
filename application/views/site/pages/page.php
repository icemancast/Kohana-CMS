<?php

	foreach($contents as $content)
	{
		
		echo '<div class="content-block grid_9">';
			echo '<h2>' . $content->content_title . '</h2>';
			echo $content->content;
		echo '</div>';
	};