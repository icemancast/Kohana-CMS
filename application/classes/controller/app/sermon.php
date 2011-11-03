<?php defined('SYSPATH') or die('No direct script access');

class Controller_App_Sermon extends Controller {
	
	public function action_index()
	{
		
		##### USE JSON_ENCODE 
		##### AND USE $this->response->body($json); to output
		
		
		$this->response->headers(array('Content-Type' => 'application/json', 'Cache-Control' => 'no-cache'));
		
		$load_sermon = ORM::factory('sermon');
		//$sermons = $load_sermon->where('cupertino', '=', '1')->find_all();
		
		$sermons = $load_sermon->find_iphone_video();
		//$sermon_count = $sermons->count_all();
		
		$json = '{
		"responseCode" : "0",
		"model" : [
		';
		
		foreach($sermons as $sermon)
		{
			
			$imagePath = 'http://cupertino.lightcastmedia.com/cbcmedia/' . $sermon->lightcast_id . '/thumbnail.jpg';
			$pageUrl = 'http://customers.lightcastmedia.com/cupertino/3073/' . $sermon->lightcast_id . '.m3u8';
			
			$title = Helper_Json::clean_json_value($sermon->sermon_title);
			$speaker = Helper_Json::clean_json_value($sermon->speaker);
			$description = Helper_Json::clean_json_value($sermon->description);
			
			$json .= '{"title": ' . $title . ',"speaker": ' . $speaker . ',"description": ' . $description . ',"duration": "' . $sermon->duration . '","date": "' . $sermon->date_sermon . '","imagePath": "' . $imagePath . '","pageURL": "' . $pageUrl . '"},';
			
		}
		
		$json .= ']}';
			
		echo $json;
		
	}
	
}