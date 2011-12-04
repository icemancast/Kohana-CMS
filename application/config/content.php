<?php defined('SYSPATH') or die('No direct script access');

return array(
	'short_codes' => array(
		'[URL_BASE]'	=> URL::base(),
		'[APPPATH]' 	=> APPPATH,
		'[IMAGES]' => 'http://images.communitybible.com/',
		'[S3-VIDEOS]' => 'http://videos.communitybible.com/',
	)
);	