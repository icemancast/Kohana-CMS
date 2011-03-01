<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Default extends Controller_Template {
	
	public $template = 'admin/layout';
	
	public function before()
	{
		
		parent::before();
		
		if($this->auto_render)
		{
			// Initialize my empty values
			$this->template->page_title = 'CBC Admin area';
			$this->template->content	= '';
			$this->template->styles		= array();
			$this->template->scripts	= array();
			
			// Load nav
			$this->template->nav = View::factory('admin/blocks/mainnav')->render();
			
		}
	}
	
	
}