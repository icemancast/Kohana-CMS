<?php defined('SYSPATH') or die('No direct script access.');

class Helper_Lightcast {
	
	static public function stream($channel_id = NULL)
	{
		
		if(isset($channel_id))
		{
			$lightcast = Kohana::config('lightcast');
			
			$get_channel = file_get_contents('http://customers.lightcastmedia.com/api/consoleListVideos?output=json&console=' . $channel_id . '&client=' . $lightcast['client_id'] . '&limit=300');
		
			$channel_array = json_decode($get_channel, TRUE);
			$channel_array = $channel_array['response']['data'];
			
			return $channel_array;
		}
		
	}
	
}