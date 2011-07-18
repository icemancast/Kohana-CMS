<?php

class Controller_Site_Page extends Controller_Site_Default {
	
	public function action_index()
	{
		$this->template->content = View::factory('site/pages/home');
		
		//$pages = ORM::factory('page')->get_page_with_slug('test');		
	}
	
	
}