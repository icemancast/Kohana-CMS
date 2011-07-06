<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Sermon extends Controller_Admin_Application {
	
	
	public function action_index()
	{
		$sermons = file_get_contents('http://customers.lightcastmedia.com/api/consoleListVideos?output=json&console=1779185131&client=3073');
		
		$lightcast_array = json_decode($sermons, true);
		
		$video_data_array = $lightcast_array['response']['data'];
		
		
		foreach ($video_data_array as $video)
		{
			echo $video['title'] . '<br /><br />';
		}

		
	}
	
}