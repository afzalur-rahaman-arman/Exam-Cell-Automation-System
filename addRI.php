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



<br><br><br>

<center>
<H1>Add Student</H1>
    <form action="addRI.php" method="POST">
      
      <table>
        
        <tr>
          <th>
            Student ID
          </th>
          <th>
            <input type="text" name="id" value="<?php $id=$_POST["id"]; if($id) echo $id; ?>">
          </th>
        </tr>
        <tr>
          <th>
            Subject
          </th>
          <th>
            <input type="text" name="subject">
          </th>
        </tr>

        <tr>
          <th>
            Subject Code
          </th>
          <th>
            <input type="text" name="subjectCode">
          </th>
        </tr>

        <tr><td></td><td><input type="submit" name="submit"></td></tr>
      </table>

    </form>
</center>





<br>
<br>
</body>
</html>



<?php

$conn= mysqli_connect("localhost", "root", '', "ecautomationsystem");
$id=$_POST["id"];
$subject=$_POST["subject"];
$subjectCode=$_POST["subjectCode"];

if($subjectCode){
$sql="insert into ri(id, subject, subjectcode) values('$id', '$subject', '$subjectCode' )";
if (mysqli_query($conn,$sql)) {
 echo "<br><br><center>Successfully added</center>";
}
else
{
  echo "<p style='background-color: red' >Not added</p>";
}
}


?>