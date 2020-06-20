

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
$email=$_POST["email"];
if ($email) {
  $sql="select * from users where email='$email'";
  if (mysqli_query($conn, $sql)) {
    

echo "</div>
  <div class='header'>
    <h2>Update password</h2>
  </div>
     
  <form method='post' action='login1.php'>
    <div class='input-group'>
        <label>Email</label>
        <input type='email' name='email' value='".$email."'>
    </div>
    <div class='input-group'>
        <label>Enter new password</label>
        <input type='password' name='password1'>
    </div>
    <div class='input-group'>
        <label>Confirm password</label>
        <input type='password' name='password2'>
    </div>
    <div class='input-group'>
        <button type='submit' class='btn btn-primary' name='submit' >Submit</button>
    </div>

  </form>";
  }
}
?>

</body>
</html>





