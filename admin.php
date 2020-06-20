<?php 
  session_start(); 

  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    
  	session_destroy();
  	unset($_SESSION['id']);
  	header("location: login.php");
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
 <title>Registration system PHP and MySQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #00fa9a">
​
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="admin.php" >Home</a>
  <a class="navbar-brand" href="addStudent.php">Add Student</a>
  <a class="navbar-brand" href="addMark.php">Add Mark</a>
    <a class="navbar-brand" href="addExam.php">Exam Schedule </a>
    <a class="navbar-brand" href="addSubject.php">Add Subject</a>
  <a class="navbar-brand" href="addRI.php" style="color: yellow">Retake/Improvement</a>
  <a class="navbar-brand" href="index1.php?logout='1'" style="color: red;">Logout</a>

</nav>

<br>
<br>

<b><i><h4>Welcome!! <br></h4><h5>Now you are in Admin Panel...!!</h5></i></b>

</body>
</html>