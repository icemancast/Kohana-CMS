<?php

	$now = strtotime('now');
	
	foreach($events as $event)
	{
		$event_date = date('F j, Y', $event->event_date) . ' @ ' . date('g:ia', $event->event_date);
		
		if($event->registration_deadline !=0)
		{
			$registration_deadline = date('F j, Y', $event->registration_deadline);
		}
		
		if($event->event_end != 0)
		{
			$event_date .= '-' . date('F j, Y', $event->event_end);
		}
		
		echo '<div class="content-block grid_9">';
		echo '<h3>' . $event->event_title . '</h3>';
		echo '<p><em>For who:</em> ' . $event->event_who . '<br />
			<em>When:</em> ' . $event_date . '<br />
			<em>Where:</em> ' . $event->event_where . '<br />
			<em>Cost:</em> $' . $event->event_cost . '<br />';
			
		if(!empty($event->registration_url))
		{
			echo '<a href="' . $event->registration_url . '" class="btn-register">Register Now</a>';
		}
			
		if($event->registration_deadline != 0)
		{
			echo ' <em>Registration Deadline:</em> ' . $registration_deadline;
			
		}
		echo '</p>';
		echo '<p>' . $event->event_what . '</p>';
		echo '</div>';
	};