<?php

class Controller_Site_Content extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$this->template->content = View::factory('site/pages/content')
			->bind('block', $block);
			
		$block = ORM::factory('content')->find_all();
				
	}
	
}