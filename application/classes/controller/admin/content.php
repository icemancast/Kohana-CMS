<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Content extends Controller_Admin_Application {
	
	public $assert_auth = array('login', 'editor');
	
	public $assert_auth_actions = array(
		'delete' => array('admin'),
	);
	
	public function action_index()
	{
		$contents = ORM::factory('content')->get_all();
		$this->template->content = View::factory('admin/pages/content')
			->bind('contents', $contents);
	}

	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/content')
			->bind('post', $post)
			->bind('select_page', $select_page)
			->bind('select_status', $select_status)
			->bind('errors', $errors);
		
		// Get id if for edit
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		
		// Load pages model
		$contents = ORM::factory('content', $id);
		
		// Load pulldowns
		$select_page = ORM::factory('page')->get_for_pulldown();
		$select_status = $contents->select_status;
		
		if($contents->loaded())
		{
			$date_published = date('m/d/Y', $contents->date_published);
			if ($contents->date_expired != 0) { $date_expired = date('m/d/Y', $contents->date_expired); } else { $date_expired = $contents->date_expired; }
			
			$post['id'] = $contents->id;
			$post['page_id'] = $contents->page_id;
			$post['content_title'] = $contents->content_title;
			$post['content'] = $contents->content;
			$post['status'] = $contents->status;
			$post['sort'] = $contents->sort;
			$post['date_published'] = $date_published;
			$post['date_expired'] = $date_expired;
		}
		
		if(!empty($_POST))
		{
			// Convert date
			$_POST['date_published'] = strtotime($_POST['date_published']);
			$_POST['date_expired'] = strtotime($_POST['date_expired']);
			
			$values = Arr::extract($_POST, array('id', 'user_id', 'page_id', 'content_title', 'content', 'status', 'sort', 'date_published', 'date_expired'));
			$contents->values($values);
			
			try
			{
				
				$contents->save();
				
				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="content/manage/">Add Another</a>');	
				$this->request->redirect('/admin/content/');
				
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
		$contents = ORM::factory('content', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$contents->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/content/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/content/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/content/');
		}

	}
	
}