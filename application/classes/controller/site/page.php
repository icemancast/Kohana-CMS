<?php

class Controller_Site_Page extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$slug = $this->request->param('slug');
		
		if(empty($slug))
		{			
			$nav = ORM::factory('nav')->get_mainnav();
			$this->template->set_filename('site/layout/home');
			$this->template->nav = View::factory('site/blocks/nav')
				->bind('nav', $nav);
			
			// Show home page if no slug appended
			$this->template->content = View::factory('site/pages/home');
		}
		elseif(!empty($slug))
		{
			
			$page = ORM::factory('page')->get_page_with_slug($slug);
			
			// If page exists then load it
			if($page->loaded())
			{				
				$contents = $page->contents->order_by('sort', 'asc')->find_all();
				$url = ORM::factory('url')->get_url_for_page($page->nav->id);
				
				Kohana::load(APPPATH . 'classes/helper/vendor/awssdk/sdk.class.php');
				$s3 = new AmazonS3();
				
				$content_config = Kohana::$config->load('content');
				$headers = $s3->get_object_list('cbcimages', array(
					'prefix' => 'headers/' . $slug . '/',
				));
				$shift_array = array_shift($headers);
				
				// Code to check for directory if headers, if so then create slideshow.
				if(!empty($headers))
				{
					foreach($headers as $header)
					{
						$photos[] = $content_config['short_codes']['[IMAGES]'] . $header;
					}
					$this->template->photos = $photos;
				}
				
				$nav = ORM::factory('nav')->get_mainnav();
				$this->template->nav = View::factory('site/blocks/nav')
					->bind('nav', $nav);
					
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
				throw new HTTP_Exception_404('Page not found.');
				
			}
			
		}
		
	}
	
}