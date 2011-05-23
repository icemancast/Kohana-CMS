<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Admin_Account extends Controller_Admin_Auth {
	
	public function action_index()
	{
		$this->template->content = View::factory('admin/forms/login')
			->bind('post', $post)
			->bind('errors', $errors);
		
		if(!empty($_POST))
		{
			$values = Arr::extract($_POST, array('email', 'password'));
			
			try
			{
				$validate = Validation::factory($values)
					->rule()
			}
			catch('......?' $e)
			{
				$errors = $e->errors('models');
			}
		}
		
	}
	
}