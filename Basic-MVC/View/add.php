<?php

require_once '../libs/Bootstrap.php';

$controller = new UserController();

if (isset($_POST['submit'])) {
	$users = $controller->add();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<main class="container">
	<div class="row">
		<!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="" role="form">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter ...">
                  </div>
                   <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter ...">
                  </div>
                   <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" placeholder="">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
	</div>
</main>
</body>
</html>