<?php

class Controller_Site_Page extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$this->template->content = View::factory('site/pages/page')
			->bind('page', $page)
			->bind('contents', $contents);
			
		$slug = $this->request->param('slug');
		$page = ORM::factory('page')->get_page_with_slug($slug);
		
		$contents = $page->contents->find_all();
		
		$this->template->browser_title = $page->browser_title;
		$this->template->page_title = $page->page_title;
	}
	
}