<?php

require_once '../Model/User.php';

/**
* 
*/
class ViewController extends Controller
{

	public function index($value='')
	{
		$users = User::All();

		return $users;
	}

	public function add($value='')
	{
		$user = new User();

		$user->name = $_POST['name'];
		$user->email = $_POST['email'];
		$user->password = $_POST['password'];

		$user->save();

		Session::setFlash(['Success'], 'success');
		return $this->redirect('index.php');
	}

	public function update($value='')
	{
		$model = User::getById(1);

		$model->name = '1';
		$model->email = '1';
		$model->password = '1';

		$model->save();
		return $model;
	}

	public function destroy($value='')
	{
		$model = User::getById(4);
		$model->delete();

		$this->redirect('http://localhost/mvc-2/view/View.php');
	}
}