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
<H1>Exam Schedule</H1>
    <form action="addExam.php" method="POST">
      
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
            <input type="sec" name="subjectCode">
          </th>
        </tr>

        
        <tr>
          <th>
            Sem
          </th>
          <th>
            <input type="text" name="sem" value="<?php $sem=$_POST["sem"];if($sem)echo "$sem"; ?>">
          </th>
        </tr>
        <tr>
          <th>
           Date 
          </th>
          <th>
            <input type="text" name="date" value="<?php $date=$_POST["date"];if($date)echo "$date"; ?>">
          </th>
        </tr>
        <tr>
          <th>
           Time
          </th>
          <th>
            <input type="text" name="time" value="<?php $time=$_POST["time"];if($time)echo "$time"; ?>">
          </th>
        </tr>
        <tr>
          <th>
            Session
          </th>
          <th>
            <input type="text" name="session"   value="<?php $session=$_POST["session"];if($session)echo "$session"; ?>">
          </th>
        </tr>
         <tr>
          <th>
          Exam Name
          </th>
          <th>
            <input type="txt" name="examName" value=" <?php $exam=$_POST["exameName"];if($exam) echo "$exam"; ?>">
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

$subjectCode=$_POST["subjectCode"];
$subjectName=$_POST["subjectName"];
$sem=$_POST["sem"];
$date=$_POST["date"];
$time=$_POST["time"];
$session=$_POST["session"];
$examName=$_POST["examName"];

if($sem){
$sql="insert into exam( sem, subjectName, subjectCode,date , time, session, examname) values( '$sem',  '$subjectName','$subjectCode','$date','$time','$session','$examName' )";
if (mysqli_query($conn,$sql)) {
 echo "<br><br><center>Successfully added</center>";
}
else
{
  echo "Not added";
}
}


?>

<?php

if ('a'>'b') {
	echo "ri";
}

?>

