<?php defined('SYSPATH') or die('No direct script access');

abstract class Controller_Site_Default extends Controller_Template {
	
	public $template = 'site/layout/layout';
	
	public $assert_auth = FALSE;
	
	public $assert_auth_actions = FALSE;
	
	protected $_session;
	
	public function before()
	{
		
		parent::before();
		
		$this->_user_auth();
		
		if($this->auto_render)
		{
			$this->template->browser_title 	= 'Community Bible Church';
			$this->template->page_title 	= 'Community Bible Church';
			$this->template->content 		= '';
			$this->template->styles 		= array(
				array(
					'name' => 'style',
					'media' => 'screen',
				),
			);
			$this->template->scripts 		= array(
				'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js',
			);
			$this->template->head_code		= ''; // Not sure if i need this
			$this->template->navigation		= ''; // Not sure if i need this either
		}
		
		$this->_session = Session::instance();
		
	}
	
	protected function _user_auth()
	{
		$action_name = $this->request->action();
		
		if (($this->assert_auth !== FALSE && Auth::instance()->logged_in($this->assert_auth) === FALSE) || (is_array($this->assert_auth_actions) && array_key_exists($action_name, $this->assert_auth_actions) && Auth::instance()->logged_in($this->assert_auth_actions[$action_name]) === FALSE))
		{
			if (Auth::instance()->logged_in())
			{
				$this->request->redirect('admin/noaccess');
			}
			else
			{
				$this->request->redirect('admin/user/login');
			}
		}
	}
	
}