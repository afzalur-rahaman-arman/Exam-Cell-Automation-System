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

<br>
<br>

<center>
<H1>Add Subject</H1>
    <form action="addSubject.php" method="POST">
      
      <table>
        
        <tr>
          <th>
            Subject Name
          </th>
          <th>
            <input type="text" name="subjectName">
          </th>
        </tr>
        <tr>
          <th>
            Subject Code
          </th>
          <th>
            <input type="text" name="subjectCode" >
          </th>
        </tr>
        <tr>
          <th>
            Sem
          </th>
          <th>
            <input type="text" name="sem" value="<?php $sem= $_POST["sem"]; if($sem) echo $sem; ?>">
          </th>
        </tr>
        <tr>
          <th>
            Credit
          </th>
          <th>
            <input type="number" name="credit"    value="<?php $credit= $_POST["credit"]; if($credit) echo $credit; ?>">
          </th>
        </tr>
        <tr><td></td><td><input type="submit" name="submit"></td></tr>
      </table>
    </form>
</center>



</body>
</html>


<?php

$conn= mysqli_connect("localhost", "root", '', "ecautomationsystem");
$subjectName=$_POST["subjectName"];
$subjectCode=$_POST["subjectCode"];
$sem=$_POST["sem"];
$credit=$_POST["credit"];

if($sem){
$sql="insert into subject(subjectname, subjectcode, sem, credit ) values('$subjectName', '$subjectCode', '$sem','$credit' )";
if (mysqli_query($conn,$sql)) {
 echo "Successfully added";
}
else
{
  echo "Not added";
}
}


?>