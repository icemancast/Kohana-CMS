<?php defined('SYSPATH') or die('No direct script access');

class Controller_App_Sermon extends Controller {
	
	public function action_index()
	{
		
		$load_sermon = ORM::factory('sermon');
		//$sermons = $load_sermon->where('cupertino', '=', '1')->find_all();
		
		$sermons = $load_sermon->find_iphone_video();
		//$sermon_count = $sermons->count_all();
		
		$json = '{"basePageUrl":"bundle://App.bundle","sermons":[';
		
		foreach($sermons as $sermon)
		{
			
			$imagePath = 'http://cupertino.lightcastmedia.com/cbcmedia/' . $sermon->lightcast_id . '/thumbnail.jpg';
			$pageUrl = 'http://customers.lightcastmedia.com/cupertino/3073/' . $sermon->lightcast_id . '.m3u8';
			
			$title = Helper_Json::clean_json_value($sermon->title);
			$speaker = Helper_Json::clean_json_value($sermon->speaker);
			$description = Helper_Json::clean_json_value($sermon->description);
			
			$json .= '{"title": ' . $title . ',"speaker": ' . $speaker . ',"description": ' . $description . ',"duration": "' . $sermon->duration . '","date": "' . $sermon->date . '","imagePath": "' . $imagePath . '","pageURL": "' . $pageUrl . '"},';
			
		}
		
		$json .= ']}';
			
		echo $json;
		
		//echo json_encode($sermon_array);
		
		// http://cupertino.lightcastmedia.com/cbcmedia/37950/thumbnail.jpg
		// http://customers.lightcastmedia.com/cupertino/3073/37950.m3u8
		
		
		// {
		// 										"basePageUrl":"bundle://App.bundle",
		// 										"sermons": 
		// 										[
		// 											{
		// 												"title": "Sermon 1",
		// 												"imagePath": "media.png",
		// 												"pageURL": "http://customers.lightcastmedia.com/cupertino/3073/37950.m3u8"
		// 											},
		// 											{
		// 												"title": "Sermon 2",
		// 												"imagePath": "media.png",
		// 												"pageURL": "http://customers.lightcastmedia.com/cupertino/3073/37950.m3u8"
		// 											},
		// 											{
		// 												"title": "Sermon 3",
		// 												"imagePath": "media.png",
		// 												"pageURL": "http://customers.lightcastmedia.com/cupertino/3073/37950.m3u8"
		// 											}
		// 										]
		// 										}
		
		
		
	}
	
}