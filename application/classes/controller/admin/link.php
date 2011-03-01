<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Link extends Controller_Admin_Auth {
	
	public function action_index()
	{
		
	}
	
	public function action_manage($id = NULL)
	{
		$this->template->content = View::factory('admin/forms/link')
			->bind('post', $post)
			->bind('errors', $errors);
		
		if(!empty($_POST))
		{
			$nav = ORM::factory('nav', $id);
			$field = $nav->values($_POST);
			
			// LEFT HERE WANTING TO PASS FIELDS IF FIELD IS OPTIONAL
			$this->template->content->post = Validate::factory($_POST);
			
			if($nav->check())
			{
				$nav->save_nav($field, $id);
			}
			else
			{
				$this->template->content->errors = $nav->validate()->errors('msg_errors');
			}
		}
		
		// Create db object
		//$nav = ORM::factory('nav');
		
		//$this->template->content->post = Validate::factory($_POST);
		//$this->template->content->post = $nav->values($_POST);
		
		/*
		
		if($post->check())
		{
			$nav->save_nav($post, $id);	
		}
		else
		{
			$this->template->content->errors = $post->errors('msg_errors');
		}
		*/
		
	}
	
}