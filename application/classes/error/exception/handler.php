<?php defined('SYSPATH') or die ('No direct script access.');

class Error_Exception_Handler
{
    public static function handle(Exception $e)
    {
        switch (get_class($e))
        {
            case 'HTTP_Exception_404':
                $response = new Response;
                $response->status(404);

                $view 					= new View('site/error/404');
				$view->browser_title 	= 'Page not found';
				$view->page_title 		= 'This page no longer exists';
				$view->leftnav			= View::factory('site/blocks/homeleftnav')->render();
				$view->search			= View::factory('site/blocks/search')->render();
				$view->banners			= View::factory('site/blocks/banners')->render();
				$view->footer			= View::factory('site/blocks/footer')->render();
				$view->styles			= array(
					array(
						'name'	=> 'style',
						'media'	=> 'screen',
					)
				);
				
				$nav = ORM::factory('nav')->get_mainnav();
				$view->nav = View::factory('site/blocks/nav')
					->bind('nav', $nav);
				
                $view->content = 'Either this page does not exist or it has been removed. Webmaster has been notified.';
                echo $response->body($view)->send_headers()->body();

				// Log error
				Kohana::$log->add(Log::ERROR, '{ REQUESTED URL: ' . Request::current()->url() . ' } --> '. $e);
				
                return TRUE;
                break;

            default:
                return Kohana_Exception::handler($e);
                break;
        }
    }
}