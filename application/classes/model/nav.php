<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Nav extends ORM {
	
	//protected has one user
	protected $_has_one = array(
		'user' => array('model', 'user'),
	);
	
	protected $_has_many = array(
		'url' => array('model', 'url'),
	);
	
	protected $_belongs_to = array(
		'user' => array(),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		
		return array(
			'nav_title' => array(
				array('not_empty'),
			),
		);
	}

	public function filters()
	{
		return array(
			'nav_title' => array(
				array('trim'),
			),
		);
	}
	
	public function labels()
	{
		return array(
			'id' => 'id',
			'nav_title' => 'Title',
		);
	}
	
	public function get_all()
	{
		return $this->order_by('date_created', 'desc')->find_all();
	}
	
	public function get_for_pulldown()
	{
		return $this->find_all()->as_array('id', 'nav_title');
	}
	
}