<?php defined('SYSPATH') or die('No direct script access');

class Model_Podcast extends ORM {
	
	protected $_has_one = array(
		'speaker' => array('model' => 'speaker')
	);
	
	protected $_has_many = array(
		'sermon' => array('model' => 'sermon')
	);
}