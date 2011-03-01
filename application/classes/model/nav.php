<?php defined('SYSPATH') or die ('No direct script access.');

class Model_Nav extends ORM {
	
	//protected has one user
	
	protected $_rules = array
	(
		
		'title' => array(
			'not_empty' => NULL,
		),
		
	);

	protected $_filters = array
	(
		'title' => array(
			'trim' => NULL,
			'stripslashes' => NULL
		),
	);
	
	public $fields = array
	(
		'id',
		'title',
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	
	//protected $_created_column = array('column')
	
/*
	public function validate_create($post)
	{
		$array = Validate::factory($post)
			->rules('title', $this->_rules['title'])
			->filter('title', 'trim')
			->filter('title', 'stripslashes');
		
		return $array;
	}
	*/
	/*
	public function save_it($field, $id)
	{
		
		// Get and save user id
		// FOR NOW USER ID 1 TILL LOGIN CREATED

		// Date
		$today = date('Y-m-d H:i:s');
		$date_string = strtotime($today);
		
		$this->user_id = '1';
		$this->title = $field['title'];
		if ($id == NULL) { $this->date_created = $date_string; }
		$this->date_modified = $date_string;
		
		return $this->save();
		
	}
	
	/*public function get_one($id)
	{
		return $this->find($id);
	}*
	
	public function get_all()
	{
		return $this->find_all();
	}
	*/
	
}