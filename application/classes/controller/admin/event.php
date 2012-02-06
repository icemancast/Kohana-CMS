<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Event extends Controller_Admin_Application {
	
	public $assert_auth = array('login', 'editor');
	
	public $assert_auth_actions = array(
		'delete' => array('admin'),
	);

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
			->bind('errors', $errors)
			->bind('select_status', $select_status)
			->bind('select_category', $select_category);
		
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		$events = ORM::factory('event', $id);
		
		$select_status = $events->select_status;
		$select_category = ORM::factory('category')->get_for_pulldown();
		
		if($events->loaded())
		{
			$event_date = date('m/d/Y', $events->event_date);
			$event_time = date('H:i', $events->event_date);
			
			$date_published = date('m/d/Y', $events->date_published);
			
			if ($events->registration_deadline != 0) { $registration_deadline = date('m/d/Y', $events->registration_deadline); } else { $registration_deadline = $events->registration_deadline; }
			
			if ($events->date_expired != 0) { $date_expired = date('m/d/Y', $events->date_expired); } else { $date_expired = $events->date_expired; }
			
			if ($events->event_end != 0) { $event_end = date('m/d/Y', $events->event_end); } else { $event_end = $events->event_end; }
			
			$post['id'] = $events->id;
			$post['user_id'] = $this->_session->get('user_id');
			$post['category_id'] = $events->category_id;
			$post['event_title'] = $events->event_title;
			$post['event_image'] = $events->event_image;
			$post['event_who'] = $events->event_who;
			$post['event_what'] = $events->event_what;
			$post['event_date'] = $event_date;
			$post['event_end'] = $event_end;
			$post['event_time'] = $event_time;
			$post['event_where'] = $events->event_where;
			$post['event_cost'] = $events->event_cost;
			$post['registration_url'] = $events->registration_url;
			$post['registration_deadline'] = $events->registration_deadline;
			$post['status'] = $events->status;
			$post['date_published'] = $date_published;
			$post['date_expired'] = $date_expired;
		}
		
		if(!empty($_POST))
		{
			$values = Arr::extract($_POST, array('id', 'user_id', 'category_id', 'event_title', 'event_image', 'event_who', 'event_what', 'event_date', 'event_end', 'event_time', 'event_where', 'event_cost', 'registration_url', 'registration_deadline', 'slug', 'status', 'date_published', 'date_expired'));
			$events->values($values);
			
			try
			{
				
				/*
					TODO Make sure all fields are in order. Also look at using fields in model.
				*/
				// Convert date
				$events->user_id = $this->_session->get('user_id');
				
				$events->event_date = strtotime($_POST['event_date'] . ' ' . $_POST['event_time']);
				$events->event_end = strtotime($_POST['event_end']);
				$events->registration_deadline = strtotime($_POST['registration_deadline']);
				$events->date_published = strtotime($events->date_published);
				$events->date_expired = strtotime($_POST['date_expired']);

				if(empty($_POST['event_image'])) { $events->event_image = date('Ymd') . '-' . Url::title($_POST['event_title']) . '.jpg'; }
				$events->slug = Url::title($_POST['event_title']);
								
				// Save event
				$events->save();
				
				Session::instance()->set('message', 'You event has been added/updated. Please name the image for this event ' . $events->event_image . ' | <a href="event/manage/">Add Another</a>');	
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
		$event = ORM::factory('event', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$event->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/event/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/event/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/event/');
		}

	}
	
}