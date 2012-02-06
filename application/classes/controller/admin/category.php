<?php defined('SYSPATH') or die ('No direct script access.');

class Controller_Admin_Category extends Controller_Admin_Application {
	
	public $assert_auth = array('login', 'editor');
	
	public $assert_auth_action = array(
		'delete' => array('admin'),
	);
	
	public function action_index()
	{
		
		//$urls = ORM::factory('url')->get_all();
		$categories = ORM::factory('category')->get_all();
		$this->template->page_title = 'Category admin area';
		$this->template->content = View::factory('admin/pages/category')
			->bind('categories', $categories);

	}
	
	public function action_add()
	{		
		$post_url = Request::current()->uri();
		
		$this->template->content = View::factory('admin/forms/category')
			->bind('post', $post)
			->bind('errors', $errors)
			->bind('post_url', $post_url);
			
		if(!empty($_POST))
		{
			$category = ORM::factory('category');
			$_POST['user_id'] = $this->_session->get('user_id');
			$_POST['category_title'] = UTF8::strtolower($_POST['category_title']);
			
			$values = Arr::extract($_POST, array('user_id', 'category_title'));
			
			$category->values($values);

			try
			{

				$category->save();

				Session::instance()->set('message', 'You category has been added. | <a href="category/add/">Add Another</a>');	
				$this->request->redirect('/admin/category/');

			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
				$post = $values;
			}
		}
		
		
	}
	
	public function action_edit()
	{
		
		$this->template->content = View::factory('admin/forms/category')
			->bind('post', $post)
			->bind('errors', $errors)
			->bind('post_url', $post_url);
			
		// Get id
		$id = (!empty($_POST)) ? $_POST['id'] : $this->request->param('id', FALSE);
		
		$post_url = Request::current()->uri();
		$post_url = str_replace('/'. $id, '', $post_url);
		
		if(empty($id))
		{
			Session::instance()->set('message', 'No ID given to edit a category.');
			$this->request->redirect('/admin/category');
		}
		
		$category = ORM::factory('category', $id);
		
		if($category->loaded())
		{
			$post['id'] = $category->id;
			$post['user_id'] = $this->_session->get('user_id');
			$post['category_title'] = $category->category_title;
		}
		
		if(!empty($_POST))
		{
			$_POST['user_id'] = $this->_session->get('user_id');
			$_POST['category_title'] = UTF8::strtolower($_POST['category_title']);
			$values = Arr::extract($_POST, array('id', 'user_id', 'category_title'));
			$category->values($values);
			
			try
			{
				$category->save();
				Session::instance()->set('message', 'Category has been updated.');
				$this->request->redirect('admin/category');
			}
			catch(ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
				$post = $values;
			}
		}
		
	}

	public function action_delete()
	{
		$id = $this->request->param('id', false);
		$category = ORM::factory('url', $id);
		
		if($this->request->param('var', false) == 'Y3s')
		{
			$category->delete();
			Session::instance()->set('message', 'Item ' . $id . ' has been deleted.');
			$this->request->redirect(URL::site() . 'admin/category/');
		}
		else
		{
			Session::instance()->set('message', 'Are you sure you want to delete item ' . $id . '? <a href="' . URL::site() . 'admin/category/delete/' . $id . '/Y3s">Yes</a>.');
			$this->request->redirect(URL::site() . 'admin/url/');
		}

	}
	
}