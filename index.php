<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <!-- login form goes here -->

    <div class="container">
      <div class="row">
        <form class="form-horizontal" method="post" action="login.php">
          <div class="form-group" >
            <label for="userName" class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "user_name" id="userName" placeholder="User Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" id="submitButton" class="btn btn-default">Sign in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- login form ends -->

    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>