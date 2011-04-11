<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Event extends ORM {
	
	//protected has one user
	protected $_has_one = array(
		'user' => array('model', 'user'),
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
			'date_expired' => array(
				array('not_empty'),
			),
		);
	}
	
	public function get_all()
	{
		return $this->order_by('date_event', 'desc')->find_all();
	}
	
}