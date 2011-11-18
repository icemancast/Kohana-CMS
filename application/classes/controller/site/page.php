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
				$url = ORM::factory('url')
					->where('nav_id', '=', $page->nav->id)->find_all();
				
				// Code to check for directory if headers, if so then create slideshow.
				$directory = DOCROOT . 'media/site/images/content/headers/' . $slug;
				
				if(is_dir($directory))
				{
					$handle = opendir($directory);
					while(false !== ($file = readdir($handle)))
					{
						if($file !== '.' && $file != '..' && $file != '.DS_Store')
						{
							$photos[] = URL::base() . 'media/site/images/content/headers/' . $slug  . '/' . $file;
						}
					}
					closedir($handle);
					$this->template->photos = $photos;
				}
				
				// So we can hilight current page
				//$current_page = $this->request->uri();
				
				$this->template->browser_title = $page->browser_title;
				$this->template->page_title = $page->page_title;
				
				// Load vars to nav
				$this->template->leftnav = View::factory('site/blocks/leftnav')
				->bind('url', $url)
				->bind('page', $page)
				->bind('current_page', $current_page); 
				
				// Load vars to page
				$this->template->content = View::factory('site/pages/page')
					->bind('page', $page)
					->bind('contents', $contents);
				
			}
			else
			{
				$message = 'Sorry page not found try the main navigation on top :)';
				
				// Page not found send to 404
				$this->template->page_title = 'Page not found';
				$this->template->content = View::factory('site/errors/404')
					->bind('message', $message);
			}
		}
		
	}
	
}