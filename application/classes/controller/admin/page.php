<?php defined('SYSPATH') or die('No direct script access');

class Controller_Admin_Page extends Controller_Admin_Application {

	public $pages;

	public function action_index()
	{
		$pages = ORM::factory('page')->get_all();
		$this->template->content = View::factory('admin/pages/page')
			->bind('pages', $pages);
	}

	public function action_manage()
	{

		$this->template->content = View::factory('admin/forms/page')
			->bind('post', $post)
			->bind('select_page', $select_page)
			->bind('navs', $navs)
			->bind('select_status', $select_status)
			->bind('errors', $errors);

		// Get id if for edit
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);

		// Load pages model
		$pages = ORM::factory('page', $id);

		// Load pulldowns
		$select_page = ORM::factory('page')->get_for_pulldown();
		$select_status = $pages->select_status;
		$navs = ORM::factory('nav')->get_for_pulldown();

		if($pages->loaded())
		{
			$date_published = date('m/d/Y', $pages->date_published);
			if ($pages->date_expired != 0) { $date_expired = date('m/d/Y', $pages->date_expired); } else { $date_expired = $pages->date_expired; }

			$post['id'] = $pages->id;
			$post['parent_id'] = $pages->parent_id;
			$post['nav_id'] = $pages->nav_id;
			$post['head_code'] = $pages->head_code;
			$post['description'] = $pages->description;
			$post['slug'] = $pages->slug;
			$post['browser_title'] = $pages->browser_title;
			$post['page_title'] = $pages->page_title;
			$post['status'] = $pages->status;
			$post['date_published'] = $date_published;
			$post['date_expired'] = $date_expired;
		}

		if(!empty($_POST))
		{
			// Convert date
			$_POST['date_published'] = strtotime($_POST['date_published']);
			$_POST['date_expired'] = strtotime($_POST['date_expired']);

			$values = Arr::extract($_POST, array('parent_id', 'nav_id', 'head_code', 'description', 'slug', 'browser_title', 'page_title', 'status', 'date_published', 'date_expired', 'id'));
			$pages->values($values);

			try
			{

				$pages->save();

				Session::instance()->set('message', 'You navigation has been added/updated. | <a href="page/manage/">Add Another</a>');	
				$this->request->redirect('/admin/page/');

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
		$pages = ORM::factory('page', $id);

		if($this->request->param('var', false) == 'Y3s')
		{
			$pages->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(url::site() . 'admin/page/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . url::site() . 'admin/nav/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(url::site() . 'admin/page/');
		}

	}

}