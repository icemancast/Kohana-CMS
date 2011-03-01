<?php defined('SYSPATH') or die('No direct script access');

class Model_Sermon extends ORM {
	
	protected $_belongs_to = array(
		'speaker' => array('model' => 'speaker'),
		'podcast' => array('model' => 'podcast'),
	);
	
}