<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Speaker extends Controller_Admin_Application {
	
	public $assert_auth = array('admin');
	
	public $assert_auth_actions = array(
		'delete' => array('admin'),
	);

	public function action_index()
	{
		
		$speakers = ORM::factory('speaker')->find_all();
		$this->template->content = View::factory('admin/pages/speaker')
			->bind('speakers', $speakers);

	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/speaker')
			->bind('post', $post)
			->bind('errors', $errors);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$speaker = ORM::factory('speaker', $id);
		
		if($speaker->loaded())
		{
			$post['id'] = $speaker->id;
			$post['user_id'] = $this->_session->get('user_id');
			$post['console_id'] = $speaker->console_id;
			$post['name'] = $speaker->name;
			$post['title'] = $speaker->title;
			$post['slug'] = $speaker->slug;
			
		}
		
		if(!empty($_POST))
		{
			$_POST['user_id'] = $this->_session->get('user_id');
			
			$values = Arr::extract($_POST, array('id', 'user_id', 'console_id', 'name', 'title', 'slug'));
			$speaker->values($values);
			
			try
			{		
				$speaker->save();
				
				Session::instance()->set('message', 'You speaker has been added/updated. | <a href="speaker/manage/">Add Another</a>');	
				$this->request->redirect('/admin/speaker/');			
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
				$post = $values;
			}
		}
		
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id', false);
		$speaker = ORM::factory('speaker', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$speaker->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/speaker/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/speaker/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/speaker/');
		}

	}
	
}