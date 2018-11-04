<?php

/**
* Model class for User
*/
class User
{
	public $table = 'users';
	/*
	* Attributes
	* ----------
	* if you want to use private then you should have setter and getter
	* or using PHP magic methods, __SET and __GET
	*/
	public $id;
	public $name;
	public $email;
	public $password;

	/**
	* Static method All()
	* this method will retrieve all user data in database 
	* and will return the data as array of user object
	*/
	public static function All()
	{
		$query = "SELECT * FROM users";

		try {
			// use static method run() from class DB 
	    	if ($stmt = DB::run($query)) { // this will run the build query

	    		// assign all of the data fetch from database to variable data
				$users = $stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
														    // in order for pdo to retrieve the data from database

				// return the array of users filled with user array
				return $users;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	/**
	* Static method getById()
	* this method will retrieve 1 row of data from database
	* based on the id passed to the method
	* @param int id
	*/
	public static function getById($id)
	{
		$query = "SELECT * FROM users WHERE id = :id LIMIT 1";
		$param = [':id' => $id]; // the parameter that will be bind by pdo

		try {
			// use static method run() from class DB 
	    	if ($stmt = DB::Run($query, $param)) { // this will run the build query

				// need to use fetch to retrieve only 1 row of data
				$user = $stmt->fetch(PDO::FETCH_ASSOC); // this will retrieve the row of data
													    // that is associated to the passed id

				// return the user object
				return $user;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function save()
	{
		$query = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";
		$param = [ // the parameter that will be bind by pdo
			':name' => $this->name,
			':email' => $this->email,
			':password' => $this->password
			];	
		
		try { 
			// use static method run() from class DB
	    	if ($stmt = DB::Run($query, $param)) { // we dont use fetch() or fetchAll() here
												   // because no data will be return when we
				                                   // perform update operation
	    		return true;
	    	};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function update()
	{
		$query = "UPDATE `users` SET `name`=:name, `email`=:email, `password`=:password WHERE `id`=:id";
		$param = [ // the parameter that will be bind by pdo
			':name' => $this->name,
			':email' => $this->email,
			':password' => $this->password,
			':id' => $this->id
			];	
		
		try {
			// use static method run() from class DB
	    	if ($stmt = DB::Run($query, $param)) { // we dont use fetch() or fetchAll() here
												   // because no data will be return when we
				                                   // perform update operation
	    		return true;
	    	};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function delete()
	{
		$query = "DELETE FROM $this->table WHERE id=:id";
		$param = [':id' => $this->id]; // the parameter that will be bind by pdo

		try {
			// use static method run() from class DB
			if ($stmt = DB::Run($query, $param)) { // we dont use fetch() or fetchAll() here
												   // because no data will be return when we
				                                   // perform delete operation
				return true;
			}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public static function searchable($where_column, $data)
	{
		$query = "SELECT * FROM users WHERE `name` LIKE :where_param";
		echo $where_param = "%$data%";
		$param = [':where_param' => $where_param];

		try {
			// use static method run() from class DB
			if ($stmt = DB::Run($query, $param)) { 

				echo $stmt->queryString;

				// assign all of the data fetch from database to variable data
				$users=$stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
														 // in order for pdo to retrieve the data from database

				if ($data == NULL) {
					$return = 'no data found';

					return $return;
				}

				// return the array of users filled with user array
				return $users;
			}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}