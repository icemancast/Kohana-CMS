<?php defined('SYSPATH') or die('No direct script access');

class Controller_App_Sermon extends Controller {
	
	public function action_index()
	{
		$sermons = ORM::factory('sermon')->find_all();
		
		//var_dump($sermons);
		
		foreach($sermons as $key => $value)
		{
			echo $sermon['title'];
		}
		
	}
	
}