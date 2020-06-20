<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #00FA9A">


<br><h1><i><center>Welcome!!!<br></i></center></h1>

</div>
  <div class="header">
    <h2>Login</h2>
  </div>
     
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>ID </label>
        <input type="text" name="id" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div class="input-group">
      <label></label><label></label><label></label>
        <button type="submit" class="btn btn-success" name="login_user" >Login</button>
    </div>

<a href="forgetPassword.php">Forget Password</a>


    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>