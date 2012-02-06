<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Event extends ORM {
	
	//protected has one user
	protected $_has_one = array(
		'user' => array('model', 'user'),
		'category' => array('model', 'category'),
	);
	
	protected $_belongs_to = array(
		'category' => array('model', 'category'),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		
		return array(
			'event_title' => array(
				array('not_empty'),
			),
			'event_what' => array(
				array('not_empty'),
			),
			'event_date' => array(
				array('not_empty'),
			),
			'date_published' => array(
				array('not_empty'),
			),
		);
	}
	
	public $select_status = array(
		'inactive' => 'inactive',
		'active' => 'active',
	);
	
	public function get_all()
	{
		return $this->order_by('event_date', 'desc')->find_all();
	}
	
	public function get_for_page($category_id = '')
	{
		$now = strtotime('now');
		
		if(!empty($category_id))
		{
			// Load events for this category
			return $this->where('status', '=', 'active')
				->and_where('category_id', '=', $category_id)
				->and_where('date_published', '<', $now)
				->order_by('event_date', 'asc')
				->find_all();
		}
		else
		{
			return $this->where('status', '=', 'active')
				->and_where('date_published', '<', $now)
				->order_by('event_date', 'asc')
				->find_all();
		}
	}
	
	public function get_event_with_slug($slug)
	{
		return $this->where('slug', '=', $slug)
			->find();
	}
	
}