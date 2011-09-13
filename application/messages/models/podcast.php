<?php defined('SYSPATH') or die ('No direct script access.');

return array(
	
	'podcast_title' => array(
		'not_empty' => 'Yo fill out the title.',
	),
	'podcast_author' => array(
		'not_empty' => 'Who\'s the author :)',
	),
	'link' => array(
		'not_empty' => 'Link must be filled in.',
	),
	'description' => array(
		'not_empty' => 'Description must be filled',
	),
	'summary' => array(
		'not_empty' => 'Summary must be filled in',
	),
	'owner_name' => array(
		'not_empty' => 'Who done dis? Who\'s the author.',
	),
	'owner_email' => array(
		'not_empty' => 'Come on give me an email.',
	),
	'image' => array(
		'not_empty' => 'Fo real? How can a podcast not have an image.',
	),
	'image_title' => array(
		'not_empty' => 'Don\'t forget the image title.',
	),
	'image_link' => array(
		'not_empty' => 'Please input a image link',
	),
	'image_width' => array(
		'not_empty' => 'How wide is the image?',
		'numeric' => 'Ah, ah, ah has to be a number for width.',
		'max_length' => 'You reached the maximum length for width.',
	),
	'image_height' => array(
		'not_empty' => 'How tall is the image',
		'numeric' => 'Ah, ah, ah has to be a number for height.',
		'max_length' => 'You reached the maximum length for height.',
	),
	'image_itunes' => array(
		'not_empty' => 'Set the itunes iMage :)',
	),
	'category' => array(
		'not_empty' => 'How do I know what category it belongs to.',
	),
	'category_itunes' => array(
		'not_empty' => 'Please choose a itunes category',
	),
	'subcategory_itunes' => array(
		'not_empty' => 'Please choose a subcategory',
	),
	'keywords' => array(
		'not_empty' => 'Give me some keywords to work with.',
	),
	
);