<?php defined('SYSPATH') or die ('No direct script access.');

abstract class Controller_Admin_Application extends Controller_Template {
	
	public $template = 'admin/layout';
	
	public $assert_auth = FALSE;
	
	public $assert_auth_actions = FALSE;
	
	protected $_session;
	
	public function before()
	{
		
		parent::before();
		
		$this->_user_auth();
		
		if($this->auto_render)
		{
			// Initialize my empty values
			$this->template->page_title = 'CBC Admin area';
			$this->template->content	= '';
			$this->template->styles		= array();
			$this->template->scripts	= array();
			
			// Load user nav
			$this->template->user_nav = View::factory('admin/blocks/user_nav')->render();
			
			// Load nav
			$this->template->nav = View::factory('admin/blocks/mainnav')->render();
			
		}
		
		$this->_session = Session::instance();
		
	}
	
	protected function _user_auth()
	{
		$action_name = $this->request->action();
		
		if(($this->assert_auth !== FALSE && Auth::instance()->logged_in($this->assert_auth) === FALSE) || (is_array($this->assert_auth_actions)) && array_key_exists($action_name, $this->assert_auth_actions) && Auth::instance()->logged_in($this->assert_auth_actions[$action_name] === FALSE))
		{
			if(Auth::instance()->logged_in())
			{
				$this->request->redirect('admin/noaccess');
			}
			else
			{
				$this->request->redirect('admin/auth/login');
			}
		}
	}
	
	
}