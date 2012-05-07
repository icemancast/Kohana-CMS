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
			$this->template->photos		 	= '';
			$this->template->page_title 	= 'Community Bible Church';
			$this->template->content 		= '';
			$this->template->styles 		= array(
				array(
					'name' => 'style',
					'media' => 'screen',
				),
			);
			
			// Development scripts
			$this->template->scripts 		= array(
				'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
				// URL::base() . 'media/site/js/plugin.jquery.countdown.js',
				URL::base() . 'media/site/js/plugin.jquery.cycle.lite.js',
				// URL::base() . 'media/site/js/plugin.jquery.toggleValue.min.js',
				// URL::base() . 'media/site/js/common.js',
				'http://use.typekit.com/juo3kpm.js',
				// URL::base() . 'media/site/js/dev-plugin.jquery.960grid-1.0.js',
			);
			
			// Production scripts
			/*
			$this->template->scripts 		= array(
				'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js',
				URL::base() . 'media/site/js/common.js',
			);*/
			
			$this->template->head_code		= ''; // Not sure if i need this
			// $this->template->nav			= View::factory('site/blocks/nav')->render();
			$this->template->search			= View::factory('site/blocks/search')->render();
			$this->template->banners		= View::factory('site/blocks/banners')->render();
			$this->template->footer			= View::factory('site/blocks/footer')->render();
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