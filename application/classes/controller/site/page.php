<?php

class Controller_Site_Page extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$slug = $this->request->param('slug');
		
		if(empty($slug))
		{			
			$this->template->set_filename('site/layout/home');
			
			// Show home page if no slug appended
			$this->template->content = View::factory('site/pages/home');
		}
		elseif(!empty($slug))
		{
			
			$page = ORM::factory('page')->get_page_with_slug($slug);
			
			// If page exists then load it
			if($page->loaded())
			{
				
				$contents = $page->contents->find_all();
				$url = ORM::factory('url', $page->nav->id)->find_all();
				
				$this->template->browser_title = $page->browser_title;
				$this->template->page_title = $page->page_title;
				
				$this->template->leftnav = View::factory('site/blocks/leftnav')
					->bind('url', $url)
					->bind('page', $page)
					->render();
					
				$this->template->content = View::factory('site/pages/page')
					->bind('page', $page)
					->bind('contents', $contents);
				
			}
			else
			{
				// Page not found send to 404
				echo 'not found';
			}
		}
		
	}
	
}