<?php defined('SYSPATH') or die('No direct script access');

class Model_Speaker extends ORM {
	
	protected $_has_many = array(
		'sermon' => array('model' => 'sermon'),	
	);
	
	protected $_has_one = array(
		'podcast' => array('model' => 'podcast');
	);
	
}