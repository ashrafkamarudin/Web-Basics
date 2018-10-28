<?php

/**
* 
*/
class User extends Model
{
	protected $table = 'users';
	protected $id;
	protected $fields = [
		'name' => '',
		'email' => '',
		'password' => ''
	];
}