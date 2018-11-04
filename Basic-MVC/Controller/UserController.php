<?php

require_once '../Model/User.php';

/**
* 
*/
class UserController
{

	public function index($value='')
	{
		// assign the returned values(array of user object) to variable users
		$users = User::All(); // we use the static method All() that we
							  // created in user model to retrieve all 
							  // data for user
		return $users;
	}

	public function add($value='')
	{
		// create new user object
		$user = new User();

		// set the attributes of user object
		$user->name = $_POST['name'];
		$user->email = $_POST['email'];
		$user->password = $_POST['password'];

		// save new user into database
		$user->save();

		// set message
		Session::setFlash(['New record succesfully added'], 'success');
		return $this->redirect('index.php');
	}

	public function get($id)
	{
		// get user object associate with $id
		$user = User::getById($id);

		// return user object with the user details
		return $user;
	}

	public function update($id)
	{
		// get user data associate with $id
		$findUser = User::getById($id);

		// update/set the attributes of the user
		$user = new User();
		$user->id = $findUser['id'];
		$user->name = $_POST['name'];
		$user->email = $_POST['email'];
		$user->password = $_POST['password'];

		// update the user data in database
		$user->update();

		// set message
		Session::setFlash(['The record has been updated'], 'success');

		// redirect the page
		return $this->redirect('index.php');
	}

	public function destroy($id)
	{
		// get user data associate with $id
		$findUser = User::getById($id);

		// update/set the attributes of the user
		$user = new User();
		$user->id = $findUser['id'];
		// delete the user
		$user->delete();

		// set message
		Session::setFlash(['The record has been successfully deleted'], 'success');

		// redirect the page
		return $this->redirect('index.php');
	}

	public function search($value='')
	{
		
		$users = User::Searchable('name', $_GET['q']);

		return $users;
	}

	public function redirect($url) {
        header('Location: '.$url);
        exit();
    }
}