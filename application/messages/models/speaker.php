<?php defined('SYSPATH') or die ('No direct script access.');

return array(
	
	'console_id' => array(
		'numeric' => 'Console ID must be numeric... that means a number',
	),
	'name' => array(
		'not_empty' => 'What\'s the speaker name?',
	),
	'title' => array(
		'not_empty' => 'Does the speaker have a title?',
	),
	'slug' => array(
		'not_empty' => 'Slug just means a short name reference.',
	),
	
);