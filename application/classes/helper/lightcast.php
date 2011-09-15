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
			
			/*
			
			echo 'working...<br /><br />';
			
			foreach($channel_array as $array)
			{
				$video_db = ORM::factory('sermon');
				$video_db->where('lightcast_id', '=', $array['id'])->find();
				
				if($video_db->loaded())
				{
					// Check to see if cupertino is set to 1 and update database
					if ($array['cupertino'] == 1 && $video_db->cupertino == 0)
					{
						$video_db->cupertino = 1;
						$video_db->save();
					}
				}
				else
				{
					$video_db->lightcast_id = $array['id'];
					$video_db->podcast_id = 1;
					$video_db->speaker_id = 1;
					$video_db->title = $array['title'];
					$video_db->description = $array['description'];
					$video_db->file_size = $array['size'];
					$video_db->duration = $array['duration'];
					$video_db->cupertino = $array['cupertino'];
					$video_db->lightcast_location = $array['embed']['location'];
					$video_db->lightcast_code = $array['embed']['code'];
					$video_db->date = strtotime($array['updated']);
					
					$video_db->save();
					
				}
				
			}
			
			echo 'ET phoned home :)';
			
			*/
		
		}
		
	}
	
}