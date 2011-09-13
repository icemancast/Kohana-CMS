<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Cron_Sermon extends Controller {
	
	public function action_index()
	{
		$sermons = file_get_contents('http://customers.lightcastmedia.com/api/consoleListVideos?output=json&console=1779185131&client=3073');
		
		$lightcast_array = json_decode($sermons, true);
		
		$sermons = $lightcast_array['response']['data'];
		
		
	}
	
}