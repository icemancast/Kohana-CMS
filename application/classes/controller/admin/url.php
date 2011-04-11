<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Url extends Controller_Admin_Auth {
	
	public $nav_urls;
	
	public function action_index()
	{
		
		$urls = ORM::factory('url')->get_all();
		$this->template->content = View::factory('admin/pages/url')
			->bind('urls', $urls);

	}
	
	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/url')
			->bind('post', $post)
			->bind('navs', $navs)
			->bind('status_select', $status_select)
			->bind('errors', $errors);
		
		// Get id if for edit
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		
		// Load nav model
		$url = ORM::factory('url', $id);
		
		// Load variables
		$status_select = $url->status_select;
		$navs = ORM::factory('nav')->get_for_pulldown();
		
		if($url->loaded())
		{
			$date_published = date('m/d/Y', $url->date_published);
			$date_expired = date('m/d/Y', $url->date_expired);
			
			$post['id'] = $url->id;
			$post['nav_id'] = $url->nav_id;
			$post['url_title'] = $url->url_title;
			$post['url'] = $url->url;
			$post['status'] = $url->status;
			$post['sort'] = $url->sort;
			$post['date_published'] = $date_published;
			$post['date_expired'] = $date_expired;
		}
		
		if(!empty($_POST))
		{
			// Convert date
			$_POST['date_published'] = strtotime($_POST['date_published']);
			$_POST['date_expired'] = strtotime($_POST['date_expired']);
			
			$values = Arr::extract($_POST, array('nav_id', 'url_title', 'url', 'status', 'sort', 'date_published', 'date_expired', 'id'));
			$url->values($values);
			
			try
			{
				
				$url->save();
				
				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="url/manage/">Add Another</a>');	
				$this->request->redirect('/admin/url/');
				
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
			}
		}
		
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id', false);
		$url = ORM::factory('url', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$url->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/url/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/url/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/url/');
		}

	}
	
}