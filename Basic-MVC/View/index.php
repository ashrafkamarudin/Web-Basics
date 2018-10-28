<?php

require_once '../libs/Bootstrap.php';

$controller = new ViewController();

$users = $controller->index();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>

<main class="container">
	<!-- /.row -->
        <div class="row">
          <div class="col-12">

          	<? Session::Flash(); ?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                	<thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>action</th>
                  </tr>
                	</thead>
                	<tbody>
                		<? foreach ($users as $user) { ?>
                			<tr>
                			<td><? echo $user->id; ?></td>
                			<td><? echo $user->name; ?></td>
                			<td><? echo $user->email; ?></td>
                			<td>
                				<form method="POST">
                					<input type="hidden" name="delete" value="<? echo $user->id; ?>">
                					<input type="submit" name="btnDelete" value="Delete">
                				</form>
                			</td>
                			</tr>
                		<? } ?>
                	</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
</main>

</body>
</html>