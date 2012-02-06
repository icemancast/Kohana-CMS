<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Category extends ORM {

	protected $_has_many = array(
		'events' => array('model', 'event'),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'category_title' => array(
				array('not_empty'),
			),
		);
	}

	public function get_all()
	{
		return $this->order_by('category_title', 'asc')->find_all();
	}
	
	public function get_for_pulldown()
	{
		return $this->find_all()->as_array('id', 'category_title');
	}
	
}