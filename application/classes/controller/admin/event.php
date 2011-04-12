<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Event extends Controller_Admin_Auth {
	
	/*
		TODO Probably need to add status to event for draft, published.
	*/
	public function action_index()
	{
		
		$events = ORM::factory('event')->get_all();
		$this->template->content = View::factory('admin/pages/event')
			->bind('events', $events);

	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/event')
			->bind('post', $post)
			->bind('errors', $errors);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$events = ORM::factory('event', $id);
		
		if($events->loaded())
		{
			$date_event = date('m/d/Y', $events->date_event);
			$event_time = date('HH:i', $events->date_event);
			$date_published = date('m/d/Y', $events->date_published);
			if ($events->date_expired != 0) { $date_expired = date('m/d/Y', $events->date_expired); } else { $date_expired = $events->date_expired; }
			if ($events->date_eventend != 0) { $date_eventend = date('m/d/Y', $events->date_eventend); } else { $date_eventend = $events->date_eventend; }
			
			$post['id'] = $events->id;
			$post['event_title'] = $events->event_title;
			$post['image'] = $events->image;
			$post['description'] = $events->description;
			$post['registration_url'] = $events->registration_url;
			$post['tags'] = $events->tags;
			$post['slug'] = $events->slug;
			$post['date_event'] = $date_event;
			$post['date_eventend'] = $date_eventend;
			$post['event_time'] = $event_time;
			$post['date_published'] = $date_published;
			$post['date_expired'] = $date_expired;
		}
		
		if(!empty($_POST))
		{
			/*
				TODO Make sure all fields are in order. Also look at using fields in model.
			*/
			// Convert date
			$_POST['date_event'] = strtotime($_POST['date_event'] . ' ' . $_POST['event_time']);
			$_POST['date_published'] = strtotime($_POST['date_published']);
			$_POST['date_expired'] = strtotime($_POST['date_expired']);
			
			$tags = str_replace(', ', ',', trim($_POST['tags']));
			$_POST['tags'] = json_encode(explode(',', $tags));
			
			$values = Arr::extract($_POST, array('id', 'event_title', 'image', 'description', 'registration_url', 'tags', 'slug', 'date_event', 'date_published', 'date_expired'));
			$events->values($values);
			
			try
			{
				
				$events->save();
				
				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="event/manage/">Add Another</a>');	
				$this->request->redirect('/admin/event/');
				
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
				$post = $values;
			}
		}
		
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id', false);
		$nav = ORM::factory('nav', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$nav->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/nav/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/nav/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/nav/');
		}

	}
	
}