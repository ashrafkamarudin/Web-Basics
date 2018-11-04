<?php

require_once '../libs/Bootstrap.php';
require_once '../Controller/UserController.php';

if (isset($_GET['q'])) {
	$controller = new UserController();

	$users = $controller->search();

	echo "<pre>";
	var_dump($users);
	echo "</pre>";
}

?>