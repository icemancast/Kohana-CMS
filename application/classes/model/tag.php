<?php defined('SYSPATH') or die ('No direct script access');

class Model_Tag extends ORM {
	
	protected $_has_one = array(
		'user' => array('model', 'user'),
	);
	
	protected $_has_many = array(
		'events' => array(
			'model' => 'event',
			'through' => 'events_tags',
		),
	);
	
	 protected $_created_column = array('column' => 'date_created', 'format' => TRUE);
	 protected $_updated_column = array('column' => 'date_modified', 'format' => TRUE);

	public function tags_to_array($comma_values)
	{
		// Separate values
		$comma_values = trim(str_replace(', ', ',', strtolower($comma_values)));
		$tags_array = explode(',', $comma_values);
		
		// Check if in database and if not add it
		foreach($tags_array as $value)
		{
			// Make all keywords singular
			$tags[] = Inflector::singular($value);
			
		}
		
		return $tags;
	}
	
}