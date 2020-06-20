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
<body style="background-color: #00FA9A">

​
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="login.php" >Home</a>
  <a href="examSchedule.php" class="navbar-brand"> Exam Schedule</a>
  <a class="navbar-brand" href="index1.php?logout='1'" style="color: red;">Logout</a>

</nav>

<br>
<br>
<H1>Welcome!</H1>

<?php
$conn=mysqli_connect("localhost", "root", '', "ecautomationsystem");
$ID=$_SESSION['id'];
  echo "<table><tr><th></th><th></th> <th></th></tr>";
 
echo "<tr><td>Name    :  </td>";
echo "<td>";
 $sql = "SELECT * FROM student where id='$ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  $row["name"];
        break;
    }
}
echo "</td>";

echo "<td  rowspan='4'> ";

$sql="SELECT * FROM images where id='$ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      
      echo "<img src='".$row['image']."' width='100' height='100'>";
    }
}
echo "</td></tr>";






echo "<tr> <td>ID   :  </td><td> $ID</td></tr>";

 echo "<tr><td>Semester : </td>";
 echo "<td>";
 $SEM="";
 $sql = "SELECT * FROM student where id='$ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $SEM=$row["sem"];
        echo  $row["sem"];
        break;
    }
}
echo "</td> </tr>";
echo "<tr><td> Program : </td>";

echo "<td> Bachelor of Science(Honours) in Computer Sci</td>";
echo "</tr></table>";
?>


<center>
    <?php  if (isset($_SESSION['id'])) : ?>
   <form action="printAdmitCard.php" method="POST">
      <h1><u> Admit Card</u> </h1> <input type="text" name="ID" value="<?php echo $_SESSION['id']; ?>">
      <input type="submit" value="Submit">
    <?php endif ?>
</center>
</form>
</table>
</center>
<br>
<br>

<center>

  <h1><u>Marksheet</u></h1>
    <?php  if (isset($_SESSION['id'])) : ?>
   <form action="printMarksheet.php" method="POST">
      <label>Semester</label><input type="text" name="sem" placeholder="Enter Your Semester">
      <h3> </h3> <input type="text" name="ID" value="<?php echo $_SESSION['id']; ?>">
      <input type="submit" value="Submit">
    <?php endif ?>
</center>
</form>
</center>
</body>
</html>