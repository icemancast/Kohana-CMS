<?

class Controller_Site_Event extends Controller_Site_Default {
	
	public function action_index()
	{
		
		$var = $this->request->param('var');
		
		if(!empty($var))
		{
			
			$category = strtolower($var);
			$category = ORM::factory('category')->where('category_title', '=', $category)->find();
			
			if(!($category->loaded()))
			{ 
				
				// Load event by slug
				$event = ORM::factory('event')->get_event_with_slug($var);
				
				// Check if event image exists
				Kohana::load(APPPATH . 'classes/helper/vendor/awssdk/sdk.class.php');
				$s3 = new AmazonS3();
				$response = $s3->get_object('cbcimages', 'events/' . $event->event_image);
				$image_true = $response->isOK();
				
				$this->template->browser_title = $event->event_title . ' @ CBC';
				$this->template->page_title = $event->event_title;
				$this->template->content = View::factory('site/pages/eventsingle')
					->bind('event', $event)
					->bind('image_true', $image_true);
				
				// If nothing loads and neither category nor slug exist redirecto to events home
				if(!($event->loaded()))
				{
					$this->request->redirect('events');
				}
				
			}
			else
			{
				// Load events by category selected
				$events = ORM::factory('event')->get_for_page($category->id);
				$this->template->browser_title = 'Community Bible Church Events';
				$this->template->page_title = 'Events at Community Bible Church';
				$this->template->content = View::factory('site/pages/event')
					->bind('events', $events);
			}
			
		}
		else
		{
			// Load all events
			$events = ORM::factory('event')->get_for_page();
			$this->template->browser_title = 'Community Bible Church Events';
			$this->template->page_title = 'Events at Community Bible Church';
			$this->template->content = View::factory('site/pages/event')
				->bind('events', $events);
		}
				
		// Show all events by closest dates if no slug constants for all options
		$nav = ORM::factory('nav')->get_mainnav();
		$this->template->leftnav = View::factory('site/blocks/eventleftnav');
		$this->template->nav = View::factory('site/blocks/nav')
			->bind('nav', $nav);
	}
	
}