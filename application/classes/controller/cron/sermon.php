<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Cron_Sermon extends Controller {
	
	public function action_index()
	{
		if(isset($_SERVER['HTTP_HOST'])) {
			// redirect to home page if accessed via browser
			//$this->request->redirect('/');
		}
		
		$channel = $this->request->param('var', FALSE);
		$speaker = ORM::factory('speaker')->get_speaker($channel);
		
		$lightcast_sermons = Helper_Lightcast::stream($speaker->console_id);
		$lightcast_sermons = array_reverse($lightcast_sermons);
				
		echo 'working... ';
		
		foreach($lightcast_sermons as $lightcast_sermon)
		{
			
			$sermon = ORM::factory('sermon')->where('lightcast_id', '=', $lightcast_sermon['id'])->find();
			
			if(!$sermon->loaded())
			{
				$values['lightcast_id'] = $lightcast_sermon['id'];
				$values['podcast_id'] = $speaker->podcast->id;
				$values['speaker_id'] = $speaker->id;
				$values['sermon_title'] = $lightcast_sermon['title'];
				$values['description'] = $lightcast_sermon['description'];
				$values['file_size'] = $lightcast_sermon['size'];
				$values['duration'] = $lightcast_sermon['duration'];
				$values['cupertino'] = $lightcast_sermon['cupertino'];
				$values['lightcast_location'] = $lightcast_sermon['embed']['location'];
				$values['lightcast_code'] = $lightcast_sermon['embed']['code'];
				$values['date_sermon'] = strtotime($lightcast_sermon['updated']);

				$sermon->values($values);
				$sermon->save();
			}
		}
		
		echo 'done :)';			
	
	}
	
}