<?php

class Controller_Site_Page extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$this->template->content = View::factory('site/pages/page')
			->bind('pages', $pages);
			
		$slug = $this->request->param('slug');
		$pages = ORM::factory('page')->get_page_with_slug($slug);
		
		$this->template->browser_title = $pages->browser_title;
		$this->template->page_title = $pages->page_title;
	}
	
}