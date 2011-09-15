<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Cron_Sermon extends Controller {
	
	public function action_index()
	{
		if(isset($_SERVER['HTTP_HOST'])) {
			//exit();
		}
		
		$channel = $this->request->param('var', FALSE);
		$speaker = ORM::factory('speaker')->get_speaker($channel);
		
		$lightcast_sermons = Helper_Lightcast::stream($speaker->console_id);
		$lightcast_sermons = array_reverse($lightcast_sermons);
		
		foreach($lightcast_sermons as $lightcast_sermon)
		{
			
			$sermon = ORM::factory('sermon')->where('lightcast_id', '=', $lightcast_sermon['id'])->find();
			
			if(!$sermon->loaded())
			{
				$values['lightcast_id'] = $lightcast_sermon['id'];
				$values['speaker_id'] = $speaker->id;
				$values['title'] = $lightcast_sermon['title'];
				$values['description'] = $lightcast_sermon['description'];
				$values['file_size'] = $lightcast_sermon['size'];
				$values['cupertino'] = $lightcast_sermon['cupertino'];
				$values['lightcast_location'] = $lightcast_sermon['embed']['location'];
				$values['lightcast_code'] = $lightcast_sermon['embed']['code'];

				$sermon->values($values);
				$sermon->save();
			}
			
		}
		
		
		
		
		
		
		/*
		
		// load sermon orm object
		$sermons = ORM::factory('sermon');
		
		// load all lightcast ids
		foreach($lightcast_sermons as $lightcast_sermon)
		{
			$ids[] = $lightcast_sermon['id'];
		}
		
		$current_sermons = $sermons->find_all();
		foreach($current_sermons as $current_sermon)
		{
			// get rid of records already in database
			$key = array_search($current_sermon->lightcast_id, $ids);
			unset($ids[$key]);
		}
		
		// loop through existing records needing to be inserted
		foreach($ids as $key => $value)
		{
			
			$sermons = ORM::factory('sermon');
			
			$values['lightcast_id'] = $lightcast_sermons[$key]['id'];
			$values['speaker_id'] = $speaker->id;
			$values['title'] = $lightcast_sermons[$key]['title'];
			$values['description'] = $lightcast_sermons[$key]['description'];
			$values['file_size'] = $lightcast_sermons[$key]['size'];
			$values['cupertino'] = $lightcast_sermons[$key]['cupertino'];
			$values['lightcast_location'] = $lightcast_sermons[$key]['embed']['location'];
			$values['lightcast_code'] = $lightcast_sermons[$key]['embed']['code'];
			
			$sermons->values($values);
			$sermons->save();
		}
		
		///var_dump($ids);
		
				/*
				$values['lightcast_id'] = $lightcast_sermon['id'];
				$values['speaker_id'] = $speaker->id;
				$values['title'] = $lightcast_sermon['title'];
				$values['description'] = $lightcast_sermon['description'];
				$values['file_size'] = $lightcast_sermon['size'];
				$values['cupertino'] = $lightcast_sermon['cupertino'];
				$values['lightcast_location'] = $lightcast_sermon['embed']['location'];
				$values['lightcast_code'] = $lightcast_sermon['embed']['code'];
				
				$sermons->values($values);
				$sermons->save();
				*/
			// } 
			// 			else
			// 			{
			// 				echo 'not<br />';
			// 			}
			// 		}
		
		
			
			// if(!$sermons->loaded())
			// 			{
			// 				
			// 				
			// 				$values['lightcast_id'] = $lightcast_sermon['id'];
			// 				$values['speaker_id'] = $speaker->id;
			// 				$values['title'] = $lightcast_sermon['title'];
			// 				$values['description'] = $lightcast_sermon['description'];
			// 				$values['file_size'] = $lightcast_sermon['size'];
			// 				$values['cupertino'] = $lightcast_sermon['cupertino'];
			// 				$values['lightcast_location'] = $lightcast_sermon['embed']['location'];
			// 				$values['lightcast_code'] = $lightcast_sermon['embed']['code'];
			// 				
			// 				$sermons->values($values);
			// 				$sermons->save();
			// 				
			// 			}
					
	}
	
}