<?php defined('SYSPATH') or die('No direct script access');

class Model_Content extends ORM {
	
	protected $_has_one = array(
		'user' => array('model', 'user'),
		'page' => array('model', 'page'),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'content_title' => array(
				array('not_empty'),
			),
			'content' => array(
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
	
}