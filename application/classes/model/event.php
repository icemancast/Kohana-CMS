<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Event extends ORM {
	
	//protected has one user
	protected $_has_one = array(
		'user' => array('model', 'user'),
	);
	
	protected $_has_many = array(
		'tags' => array(
			'model' => 'tag',
			'through' => 'tags_events',
		),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		
		return array(
			'event_title' => array(
				array('not_empty'),
			),
			'description' => array(
				array('not_empty'),
			),
			'tags' => array(
				array('not_empty'),
			),
			'slug' => array(
				array('not_empty'),
			),
			'date_event' => array(
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
		return $this->order_by('date_event', 'desc')->find_all();
	}
	
}