<?php defined('SYSPATH') or die('No direct script access');

class Model_Sermon extends ORM {
	
	protected $_belongs_to = array(
		'speaker' => array('model' => 'speaker'),
		'podcast' => array('model' => 'podcast'),
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public $sermon_status_select = array(
		'inactive' => 'inactive',
		'active' => 'active',
	);
	
	public function find_iphone_video()
	{
		return $this->where('cupertino', '=', '1')->find_all();
	}
	
	public function get_all()
	{
		return $this->order_by('date_sermon', 'desc')->find_all();
	}
	
}