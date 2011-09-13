<?php defined('SYSPATH') or die('No direct script access');

class Model_Podcast extends ORM {
	
	protected $_has_one = array(
		'speaker' => array('model' => 'speaker')
	);
	
	protected $_has_many = array(
		'sermons' => array('model' => 'sermon')
	);
	
	protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);
	
	public function rules()
	{
		return array(
			'podcast_title' => array(
				array('not_empty'),
			),
			'podcast_author' => array(
				array('not_empty'),
			),
			'link' => array(
				array('not_empty'),
			),
			'description' => array(
				array('not_empty'),
			),
			'summary' => array(
				array('not_empty'),
			),
			'owner_name' => array(
				array('not_empty'),
			),
			'owner_email' => array(
				array('not_empty'),
			),
			'image' => array(
				array('not_empty'),
			),
			'image_title' => array(
				array('not_empty'),
			),
			'image_link' => array(
				array('not_empty'),
			),
			'image_width' => array(
				array('not_empty'),
				array('numeric'),
				array('max_length', array(':value', 4)),
			),
			'image_height' => array(
				array('not_empty'),
				array('numeric'),
				array('max_length', array(':value', 4))
			),
			'image_itunes' => array(
				array('not_empty'),
			),
			'category' => array(
				array('not_empty'),
			),
			'category_itunes' => array(
				array('not_empty'),
			),
			'subcategory_itunes' => array(
				array('not_empty'),
			),
			'keywords' => array(
				array('not_empty'),
			),
		);
	}
 
}