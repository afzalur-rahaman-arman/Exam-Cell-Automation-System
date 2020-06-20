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
<H1>Add Mark</H1>
    <form action="addMark.php" method="POST">
      
      <table>
        
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
            ID
          </th>
          <th>
            <input type="text" name="id" value="<?php $id=$_POST["id"];if($id)echo "$id"; ?>">
          </th>
        </tr>
        <tr>
          <th>
            Marks
          </th>
          <th>
            <input type="number" name="marks">
          </th>
        </tr>
        
        <tr>
          <th>
            Subject 
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
            <input type="text" name="subjectCode">
          </th>
        </tr>
        <tr>
          <th>
            Sec
          </th>
          <th>
            <input type="sec" name="sec"  value="<?php $sec=$_POST["sec"];if($sec)echo "$sec"; ?>">
          </th>
        </tr>

        <tr>
          <th>
            Session
          </th>
          <th>
            <input type="text" name="session"value="<?php $session=$_POST["session"];if($session)echo "$session"; ?>">
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
$id=$_POST["id"];
$sem=$_POST["sem"];
$sec=$_POST["sec"];
$session=$_POST["session"];
$marks=$_POST["marks"];

$count=0;
if($sem){
  $sql="select * from marks where id='$id' and subjectCode='$subjectCode' and subjectName='$subjectName' limit 1";

if (mysqli_query($conn, $sql)) {
       $result = $conn->query($sql);
       if ($result->num_rows ==1) 
    {

      $row = $result->fetch_assoc();
        
        if($row["marks"]>0) {
          $count=2;
        if($row["marks"]<$marks)
        {

           $sql2="update marks set marks='$marks' where id='$id' and subjectCode='$subjectCode' and subjectName='$subjectName' limit  1";
           if (mysqli_query($conn, $sql2) )
           {
           
      echo "<br><br><center>Successfully Updated..........</center>";
           }
        }
    }
}


}

    if($row["marks"]==0)
    {
        $sql5="insert into marks( id, sem, sec, session, subjectName, subjectCode,marks) values( '$id', '$sem', '$sec', '$session', '$subjectName','$subjectCode', '$marks' )";

if (mysqli_query($conn,$sql5)) {
 echo "<br><br><center>Successfully added</center>";
}
else
{
  echo "Not added";
  }

}
}

?>