<?php defined('SYSPATH') or die('No direct script access.');

class Model_Page extends ORM {
	
	protected $_has_one = array(
		'user' => array('model', 'user'),
		'url_id' => array('model', 'url'),
	);
	
	protected $_has_many = array(
		'content' => array('model', 'content'),
	);
	
	protected $_belongs_to = array(
		'nav' => array('model', 'nav'),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'slug' => array(
				array('not_empty'),
			),
			'browser_title' => array(
				array('not_empty'),
			),
			'page_title' => array(
				array('not_empty'),
			),
			'date_published' => array(
				array('not_empty'),
			),
		);
	}
	
	public $select_status = array(
		'draft' => 'draft',
		'published' => 'published',
		'pending' => 'pending',
		'archive' => 'archive',
	);
	
	public function get_all()
	{
		return $this->order_by('date_modified', 'desc')->find_all();
	}
	
	public function get_for_pulldown()
	{
		// Create select none. Not all pages have parents.
		$select_none = array('None');
		$pages = $this->find_all()->as_array('id', 'page_title');
		$page_array = array_merge($select_none, $pages);
		return $page_array;
	}
	
}