
<?php



$conn= mysqli_connect( "localhost", "root", '', "ecautomationsystem");

$password1=$_POST["password1"];
$password2=$_POST["password2"];
$email=$_POST["email"];

if ($password1) {
if ($password2==$password1) {
  $sql="UPDATE users
SET password='$password1'
WHERE email='$email'";
  if (mysqli_query($conn, $sql)) {
    header('location: login1.php');
  }
 }
}

?>