<?php definded('SYSPATH') or die ('No direct script access');

class Controller_Error_Handler extends Controller_Site_Default {

	public function before()
	{
		parent::before();
	
		$this->template->page = URL::site(rawurldecode(Request::$initial->uri()));
	
		// Internal request only
		if(Request::$initial !== Request::$current)
		{
			if($message = rawurldecode($this->request->param('message')))
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
		$this->template->title = '404 Not Found';
	
		if(isset($_SERVER['HTTP_SERVER']) AND strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== False)
		{
			$this->template->local = TRUE;
		}
	
		// HTTP Status code
		$this->response->status(404);
	}
}