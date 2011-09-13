<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Podcast extends Controller_Admin_Application {
	
	public $assert_auth = array('editor');
	
	public $assert_auth_actions = array(
		'delete' => array('admin'),
	);
	
	public function action_index()
	{
		$podcasts = ORM::factory('podcast')->find_all();
		$this->template->content = View::factory('admin/pages/podcast')
			->bind('podcasts', $podcasts);
			
		$user_id = $this->_session->get('user_id');
	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/podcast')
			->bind('post', $post)
			->bind('errors', $errors);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$podcast = ORM::factory('podcast', $id);
		
		if($podcast->loaded())
		{
			$post['id'] = $podcast->id;
			$post['user_id'] = $this->_session->get('user_id');
			$post['podcast_title'] = $podcast->podcast_title;
			$post['podcast_author'] = $podcast->podcast_author;
			$post['link'] = $podcast->link;
			$post['description'] = $podcast->description;
			$post['subtitle'] = $podcast->subtitle;
			$post['summary'] = $podcast->summary;
			$post['owner_name'] = $podcast->owner_name;
			$post['owner_email'] = $podcast->owner_email;
			$post['image'] = $podcast->image;
			$post['image_title'] = $podcast->image_title;
			$post['image_link'] = $podcast->image_link;
			$post['image_width'] = $podcast->image_width;
			$post['image_height'] = $podcast->image_height;
			$post['image_itunes'] = $podcast->image_itunes;
			$post['category'] = $podcast->category;
			$post['category_itunes'] = $podcast->category_itunes;
			$post['subcategory_itunes'] = $podcast->subcategory_itunes;
			$post['keywords'] = $podcast->keywords;
		}
		
		
		if(!empty($_POST))
		{
			$_POST['user_id'] = $this->_session->get('user_id');
			
			$values = Arr::extract($_POST, array('id', 'user_id', 'podcast_title', 'podcast_author', 'link', 'description', 'subtitle', 'summary', 'owner_name', 'owner_email', 'image', 'image_title', 'image_link', 'image_width', 'image_height', 'image_itunes', 'category', 'category_itunes', 'subcategory_itunes', 'keywords'));
			$podcast->values($values);
			
			try
			{
				
				$podcast->save();
				
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
	
	public function action_delete()
	{
		$id = $this->request->param('id', false);
		$nav = ORM::factory('nav', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$nav->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/nav/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/nav/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/nav/');
		}

	}
}