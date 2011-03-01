<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Nav extends Controller_Admin_Auth {
	
	public $navs;
	
	public function action_index()
	{
		
		$navs = ORM::factory('nav')->order_by('date_modified', 'desc')->find_all();
		$this->template->content = View::factory('admin/pages/nav')
			->bind('navs', $navs);

	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/nav')
			->bind('post', $post)
			->bind('errors', $errors);
		
		$id = $this->request->param('id', FALSE);
		$nav = ORM::factory('nav', $id);
		
		if($nav->loaded())
		{
			$post['title'] = $nav->title;
		}
		
		if(!empty($_POST))
		{
			
			$values = Arr::extract($_POST, array('title'));
			$nav->values($values);
			
			if($nav->check())
			{

				$nav->save();
				
				Session::instance()->set('message', $id . ' - You navigation has been added/updated. | <a href="nav/manage/">Add Another</a>');
				
				$message = Session::instance()->get('message');
				echo $message;
			}
			else
			{
				$errors = $nav->validate()->errors('msg_errors');
			}
		}
		
	}
	
}