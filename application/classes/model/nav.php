<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Nav extends ORM {
	
	//protected has one user
	protected $_has_one = array(
		'user' => array('model', 'user'),
	);
	
	protected $_has_many = array(
		'urls' => array('model', 'url'),
	);
	
	protected $_belongs_to = array(
		'user' => array(),
	);
	
	public $nav_select = array(
		'0' => 'Not Main',
		'1' => 'Yes Main',
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
	
	public function get_mainnav()
	{
		return $this->where('mainnav', '=', '1')
			->order_by('sort', 'asc')
			->find_all();
	}
	
}