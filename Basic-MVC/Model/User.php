<?php

/**
* Model class for User
*/
class User
{
	protected $table = 'users';
	protected $id;
	protected $attributes = [
	//  $key => $value
		'name' => '',
		'email' => '',
		'password' => ''
	];

	// override magic method to set properties
	public function __set($attribute, $value)
	{
		if (array_key_exists($attribute, $this->attributes)) {
			$this->attributes[$attribute] = $value;
		}
	}

	// override magic method to retrieve properties
	public function __get($attribute)
	{
		if ($attribute == 'id') {
			return $this->id;
		} else {
			return $this->attributes[$attribute];
		}
	}

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
				$data=$stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
														 // in order for pdo to retrieve the data from database

	    		// create an empty array of users
				$users = []; // we will place user object in the array
				
				// foreach row of data in database
				foreach ($data as $row) { // each row of data will be placed into variable $row

					// create new user object
					$user = new User();

					// foreach column of data in the database as (column name) => (value of the column)
					foreach ($row as $column => $value) { 
						if ($column == 'id') { // check if the column is called id
							// assign the value of column id to user class attribute id
							$user->id = $value;
						}
						if (array_key_exists($column, $user->attributes)) { // check if the column exist in the class atributes

							// if exist, assign the value of that column to the class attributes
							$user->$column = $value;
						}
					}
					// add the object user to the array of users we created earlier
					array_push($users, $user);
				}

				// return the array of users filled with user objects
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

	    		// create new user object
				$user = new User();

				// assign the passed id to user object's id(attribute)
				$user->id = $id; // we don't need to get the id from database because the passed id is
								 // the same as the id in the data that we have retrieved from
								 // database

				// need to use fetch to retrieve only 1 row of data
				$data = $stmt->fetch(PDO::FETCH_ASSOC); // this will retrieve the row of data
													    // that is associated to the passed id

				// foreach column of the data as (column name) => (value of the column)
				foreach ($data as $column => $value) { // $column is the key of this array 
													   // $value is the value of this array
					
					// check if the attributes for the column exist
					if (array_key_exists($column, $user->attributes)) { // array_key_exist() will check if there is a
																		// key of user attributes array that has the same 
						                                                // value(name) of the column

						// assign the value to user's object attributes
						$user->$column = $value;
					}
				}

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
}