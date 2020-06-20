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



<?php



$conn= mysqli_connect( "localhost", "root", '', "ecautomationsystem");

$password1=$_POST["password1"];
$password2=$_POST["password2"];
$email=$_POST["email"];
if ($password1) {
if ($password2==$password1) {

	$password = md5($password1);
  $sql="UPDATE users
SET password='$password'
WHERE email='$email'";
  if (mysqli_query($conn, $sql)) {


echo "<br><h1><i><center>Welcome!!!<br></i></center></h1>


</div>
  <div class='header'>
    <h2>Login</h2>
  </div>
     
  <form method='post' action='login.php'>";

     include('errors.php');

    echo "<div class='input-group'>
        <label>ID</label>
        <input type='text' name='id' >
    </div>
    <div class='input-group'>
        <label>Password</label>
        <input type='password' name='password'>
    </div>
    <div class='input-group'>
        <button type='submit' class='btn btn-primary' name='login_user' >Login</button>
    </div>

<a href='forgetPassword.php'>Forget Password</a>


    <p>
        Not yet a member? <a href='register.php'>Sign up</a>
    </p>
  </form>";
  }
 }
}

?>
</body>
</html>