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
		
		$json_array = array();
		$json_array['responseCode'] = '0';
		
		$i = 0;
		
		foreach($sermons as $sermon)
		{	
			
			$title = Helper_Json::clean_json_value($sermon->sermon_title);
			$speaker = Helper_Json::clean_json_value($sermon->speaker);
			$description = Helper_Json::clean_json_value($sermon->description);
			
			$json_array['model'][$i]['title'] = $title;
			$json_array['model'][$i]['speaker'] = $speaker;
			$json_array['model'][$i]['description'] = $description;
			$json_array['model'][$i]['duration'] = $sermon->duration;
			$json_array['model'][$i]['date'] = $sermon->date_sermon;
			
			$json_array['model'][$i]['imagePath'] = 'http://cupertino.lightcastmedia.com/cbcmedia/' . $sermon->lightcast_id . '/thumbnail.jpg';
			$json_array['model'][$i]['pageUrl'] = 'http://customers.lightcastmedia.com/cupertino/3073/' . $sermon->lightcast_id . '.m3u8';
			$i++;
			
		}
		
		$json = json_encode($json_array);
		$this->response->body($json);
	
	}
	
}