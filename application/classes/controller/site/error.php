<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Site_Error extends Controller_Site_Default {
	
	public function before()
	{
		parent::before();
		
		$this->template->page = URL::site(rawurlencode(Request::$initial->uri()));
		
		// Internal request only!
		if(Request::$initial !== Request::$current)
		{
			if($message = rawurlencode($this->request->param('message')))
			{
				$this->template->message = $message;
			}
		}
		else
		{
			$this->request->action(404);
		}
		
		$this->response->status((int) $this->request->action());
	}
	
	public function action_404()
	{
		$this->template->browser_title = '404 Not Found';
		$htis->template->content = View::factory('error/404');
		
		// Here we check to see if a 404 came from our website. This allows the
		// webmaster to find broken links and update them in a shorter amount of time.
	//	if (isset ($_SERVER['HTTP_REFERER']) AND strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== FALSE)
	//	{
			// Set a local flag so we can display different messages in our template.
			$this->template->local = TRUE;
	//	}
		
		//HTTP Status code.
	//	$this->response->status(404);
	}
	
}