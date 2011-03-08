<?php

class Controller_Crud extends Controller
{
	protected $crudModel = 'nav';
	protected $primaryKey = 'id';
	
	public function delete()//$model, $id)
	{
		$model = request::instance()->param('model');
		$id = request::instance()->param('id');

		if ($id != null)
		{
			$object = ORM::factory($model)->find($id);

			$params = array(
				'action' => 'delete',
				'object' => $object,
			);
			
			$ret = ORM::factory($model)->delete($id);
		}
	}
	
	public function create()//$model)
	{
		$model = request::instance()->param('model');
		
		$className = 'Model_' . $model;

		$object = new $className;
		
		$fields = array_keys($object->as_array());
		$values = array();
		
		foreach ($fields as $field)
		{
			$value = null;
			
			if (array_key_exists($field, $_REQUEST))
			{
				$value = $_REQUEST[$field];
			}
			
			if ($value != null)
			{
				$object->{$field} = $value;
			}
			
			$values[$field] = $value;
		}
		
		$object->created_at = time();
		$object->modified_at = time();
		
		//$object->values($values);
		
		$isValid = true;
		
	/*	if (method_exists($object, 'validate'))
		{
			$isValid = $object->validate($values);
		}
		
		Kohana::log('debug', "is $model valid? " . var_export($isValid, true));
		*/
		if ($isValid)
		{
			$object->save();
			
			echo $object->pk();

			$params = array(
				'action' => 'create',
				'object' => $object,
			);
		}
	}

	public function edit() //$model, $id)
	{
		$model = request::instance()->param('model');
		$id = request::instance()->param('id');
		
		$object = ORM::factory($model)->find($id);
		
		if ($object->loaded())
		{
			$objectValues = $object->as_array();
			$fields = array_keys($objectValues);

			foreach ($fields as $field)
			{
				if ($field != $object->primary_key())
				{
					if (isset($_REQUEST[$field]))
					{
						$object->{$field} = $_REQUEST[$field];
					}
				}
				
				$object->modified_at = time();
				
				$object->save();
				
				$params = array(			
					'action' => 'edit',
					'object' => $object,
					'original' => $objectValues,
					'updated' => $object->as_array(),
				);
			}
		}
	}

	public function view()//$model, $id)
	{
		$this->read();//$model, $id);
	}
	
	public function read()//$model, $id)
	{
		$model = request::instance()->param('model');
		$id = request::instance()->param('id');
		
		$object = ORM::factory($model)->find($id);
		
		if ($object->loaded())
		{
			echo json_encode($object->as_array());
		}
	}
}
