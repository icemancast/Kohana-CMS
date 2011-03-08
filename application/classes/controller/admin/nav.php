<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Nav extends Controller_Admin_Auth {
	
	public $navs;
	
	public function action_index()
	{
		
		$navs = ORM::factory('nav')->get_all();
		$this->template->content = View::factory('admin/pages/nav')
			->bind('navs', $navs);

	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/nav')
			->bind('post', $post)
			->bind('errors', $errors);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$nav = ORM::factory('nav', $id);
		
		if($nav->loaded())
		{
			$post['title'] = $nav->title;
			$post['id'] = $nav->id;
		}
		
		if(!empty($_POST))
		{
			
			$values = Arr::extract($_POST, array('title', 'id'));
			$nav->values($values);
			
			try
			{
				
				$nav->save();
				
				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="nav/manage/">Add Another</a>');	
				$this->request->redirect('/admin/nav/');
				
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
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