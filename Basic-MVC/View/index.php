<?php

require_once '../libs/Bootstrap.php';
require_once '../Controller/UserController.php';

$controller = new UserController();

$users = $controller->index();

if (isset($_POST['delete'])) {
  $controller->destroy($_POST['delete']);
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
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <? Session::Flash(); ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users Table <a class="btn btn-primary pull-right" href="add.php">Create</a></h3>
            </div><!-- /.card-header -->
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
                    <tr>
                      <td><? echo $user->id; ?></td>
                      <td><? echo $user->name; ?></td>
                      <td><? echo $user->email; ?></td>
                      <td>
                        <a href="update.php?id=<?php echo $user->id; ?>" class="btn btn-success pull-left" style="margin-right: 5px">Edit</a>
                        <form method="POST" action="">
                          <input type="hidden" name="delete" value="<? echo $user->id; ?>">
                          <input type="submit" name="btnDelete" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?')">
                        </form>
                      </td>
                      </tr>
                  </tr><? } ?>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div>
      </div><!-- /.row -->
    </section>
  </main>
</body>
</html>