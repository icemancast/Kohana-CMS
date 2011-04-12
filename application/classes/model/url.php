<?php defined('SYSPATH') or die('No direct script access.');

class Model_Url extends ORM {
	
	protected $_has_one = array(
		'nav' => array('model', 'nav'),
		'user' => array('model', 'user'),
		'page' => array('page', 'page'),
	);
	
	protected $_belongs_to = array(
		'nav' => array(),
		'user' => array(),
	);
	
	public $status_select = array(
		'inactive' => 'inactive',
		'active'   => 'active',
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'url_title' => array(
				array('not_empty'),
			),
			'url' => array(
				array('not_empty'),
			),
			'sort' => array(
				array('not_empty'),
			),
			'date_published' => array(
				array('not_empty'),
			),
			
		);
	}
	
	public function get_all()
	{
		return $this->order_by('sort', 'asc')->find_all();
	}
	
}