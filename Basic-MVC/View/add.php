<?php

require_once '../libs/Bootstrap.php';
require_once '../Controller/UserController.php';

$controller = new UserController();

if (isset($_POST['submit'])) {
	$users = $controller->add();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <main>
    <section class="container" style="padding: 50px">
      <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">General Elements</h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <form action="" method="post" role="form">
              <!-- text input -->
              <div class="form-group">
                <label>Name</label> <input class="form-control" name="name" placeholder="Enter Full Name" type="text">
              </div>
              <div class="form-group">
                <label>E-Mail</label> <input class="form-control" name="email" placeholder="Enter E-Mail Address" type="text">
              </div>
              <div class="form-group">
                <label>Password</label> <input class="form-control" name="password" placeholder="Enter Password" type="password">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" name="submit" placeholder="" type="submit">
              </div>
            </form>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </section>
  </main>
</body>
</html>