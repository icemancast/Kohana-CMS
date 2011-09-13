<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Sermon extends Controller_Admin_Application {
	
	public $assert_auth = array('login', 'editor');
	
	public $assert_auth_actions = array(
		'delete' => array('admin'),
	);
	
	public function action_index()
	{
		$sermons = ORM::factory('sermon')->get_all();
		$this->template->content = View::factory('admin/pages/sermon')
			->bind('sermons', $sermons);
	}
	
	public function action_uploads()
	{
		$this->template->content = View::factory('admin/pages/sermon_uploads')
			->bind('sermons', $sermons);
		
		$sermons = file_get_contents('http://customers.lightcastmedia.com/api/consoleListVideos?output=json&console=1779185131&client=3073');
		
		$lightcast_array = json_decode($sermons, true);
		
		$sermons = $lightcast_array['response']['data'];
	}
	
	public function action_manage()
	{
		
		$this->template->content = View::factory('admin/forms/sermon')
			->bind('test', $test);
		
		$sermons = file_get_contents('http://customers.lightcastmedia.com/api/consoleListVideos?output=json&console=1779185131&client=3073');
		
		$lightcast_array = json_decode($sermons, true);
		
		$test = $lightcast_array['response']['data'];
		
		// foreach ($video_data_array as $video)
		// 		{
		// 			echo $video['title'] . '<br /><br />';
		// 		}
		
	}
	
}