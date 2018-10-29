<?php

/**
* 
*/
class DB
{

	public static function connect($value='')
	{
		// create a new PDO connection
		$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
		// PDO::ATTR_ERRMODE: Error reporting.
		// PDO::ERRMODE_EXCEPTION: Throw exceptions.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set this so pdo will show us
        															   // the error when we perform DB operations

        return $pdo;
	}

	public static function run($sql, $args = NULL)
    {
        if (!$args) // if no parameter
        {
        	// run the query straight away without parameter binding
             return DB::connect()->query($sql);
        }
        // prepare the sql query
        $stmt = DB::connect()->prepare($sql);
        // execute the query with bind parameter values
        $stmt->execute($args);
        return $stmt;
    }
}