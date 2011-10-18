<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Cron_Timer extends Controller {
	
	public function action_index()
	{
		// The time now
		$now = strtotime('now');

		$media_social = file_get_contents('http://www.mediasocial.tv/Services/EventInfo.ashx/18');

		$media_social_time = explode(',', $media_social);

		$time_scheduled = trim(str_replace('CurrentServerTime', '', $media_social_time[1]));

		$show_time = $time_scheduled - $media_social_time[0];
		echo $show_time;
	}
	
}