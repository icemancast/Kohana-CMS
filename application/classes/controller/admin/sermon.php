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
	
	public function action_manage()
	{
		$this->template->content = View::factory('admin/forms/sermon')
			->bind('post', $post)
			->bind('errors', $errors)
			->bind('podcast_select', $podcast_select)
			->bind('speaker_select', $speaker_select)
			->bind('mp3_file', $mp3_file);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$sermon = ORM::factory('sermon', $id);
		
		$podcast_select = ORM::factory('podcast')->get_for_pulldown();
		$speaker_select = ORM::factory('speaker')->get_for_pulldown();
		
		if($sermon->loaded())
		{
			$podcast_var = '';
			
			if($sermon->speaker_id == 1){ $podcast_var = 'main'; } // Robert / main
			if($sermon->speaker_id == 2){ $podcast_var = 'central'; } // Coach / central
			if($sermon->speaker_id == 3){ $podcast_var = 'one'; } // Chris / one
			
			$date_sermon = date('m/d/Y', $sermon->date_sermon);
			$mp3_file = date('Ymd') . '_' . $podcast_var . '.mp3';
			
			$post['id'] = $sermon->id;
			$post['user_id'] = $this->_session->get('user_id');
			$post['lightcast_id'] = $sermon->lightcast_id;
			$post['podcast_id'] = $sermon->podcast_id;
			$post['speaker_id'] = $sermon->speaker_id;
			$post['sermon_title'] = $sermon->sermon_title;
			$post['description'] = $sermon->description;
			$post['file_size'] = $sermon->file_size;
			$post['duration'] = $sermon->duration;
			$post['cupertino'] = $sermon->cupertino;
			$post['lightcast_location'] = $sermon->lightcast_location;
			$post['lightcast_code'] = $sermon->lightcast_code;
			$post['mp3_file'] = $sermon->mp3_file;
			$post['keywords'] = $sermon->keywords;
			$post['date_sermon'] = $date_sermon;
		}
		
		if(!empty($_POST))
		{
			$_POST['user_id'] = $this->_session->get('user_id');
			
			$values = Arr::extract($_POST, array('id', 'user_id', 'lightcast_id', 'podcast_id', 'speaker_id', 'sermon_title', 'description', 'file_size', 'duration', 'cupertino', 'lightcast_location', 'lightcast_code', 'mp3_file', 'keywords', 'date_sermon'));
			$sermon->values($values);
			
			try
			{
				
				$sermon->save();
				
				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="nav/podcast/">Add Another</a>');	
				$this->request->redirect('/admin/podcast/');
				
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
				$post = $values;
			}
		}
		
	}
	
}