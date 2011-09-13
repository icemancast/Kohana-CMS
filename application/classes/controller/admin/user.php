<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_Application {
	
	public $assert_auth = FALSE;
	
	public $assert_auth_actions = array(
		'create' => array('admin'),
	);
	
	public function action_index()
	{
		$this->template->content = View::factory('admin/user/info')
			->bind('user', $user);
		
		// Load user information
		$user = Auth::instance()->get_user();
		
		// if user not logged in redirect to login page
		if(!$user)
		{
			Request::current()->redirect('admin/user/login');
		}
	}
	
	public function action_create()
	{
		$this->template->content = View::factory('admin/user/create')
			->bind('errors', $errors)
			->bind('message', $message);
		
		// Check if form is submitted if request was an actual post method
		if(HTTP_Request::POST == $this->request->method())
		{
			
			try {
				// create the user with form values
				$user = ORM::factory('user')->create_user($this->request->post(), array(
					'username',
					'password',
					'email',
				));
			
				// grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
			
				// reset values so form is not sticky
				$_POST = array();
			
				// set a success a message
				$message = "You have added a user '{$user->username}' to the database";
				
			} catch (ORM_Validation_Exception $e) {
				
				// Set failure message
				$message = 'There were errors, please see form below.';
				
				// Set errors using custom messages
				$errors = $e->errors('models');
				
			}
		}
	}
	
	public function action_login()
	{
		$this->template->content = View::factory('admin/user/login')
			->bind('message', $message);
			
		if(HTTP_Request::POST == $this->request->method())
		{
			// See if remember is selected and set to true else false
			$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
			
			// Attempt to login user
			$user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
			
			// If successful, redirect user
			if($user)
			{
				$user = Auth::instance()->get_user();
				$this->_session->set('user_id', $user->id);
				Request::current()->redirect('admin/dashboard');
			}
			else
			{
				$message = 'Login failed';
			}
		}
	}
	
	public function action_logout()
	{
		// Log user out
		Auth::instance()->logout();
		
		// Redirect to login page
		Request::current()->redirect('admin/user/login');
	}
	
	public function action_noaccess()
	{
		$this->template->page_title = 'Sorry :(';
		$this->template->content = View::factory('admin/user/noaccess');
	}
	
}