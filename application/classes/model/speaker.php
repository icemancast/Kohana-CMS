<?php defined('SYSPATH') or die('No direct script access');

class Model_Speaker extends ORM {
	
	protected $_has_one = array(
		'podcast' => array('model' => 'podcast'),
	);
	
	protected $_has_many = array(
		'sermons' => array('model' => 'sermon'),	
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty'),
			),
			'title' => array(
				array('not_empty'),
			),
		);
	}
	
}