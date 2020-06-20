
<?php
$conn= mysqli_connect("localhost", "root", '', "ecautomationsystem");
$ID=$_POST["ID"];


  echo "<table>
  <tr>
    <th></th> <th><h4>BGC Trust University Bangladesh</h1></center><center><h5>Office of the Controller of Examinations<h5>BGC Bidyanagar, Chandanaish, Chattagram</h5><b><h5>";
 $sql = "SELECT * FROM exam";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  $row["examname"];
        break;
    }
} echo "(Session:";
 $sql = "SELECT * FROM exam";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  $row["session"];
        break;
    }
}
echo ")</h5></b><p>Admit Card</p></center></th><th></th></tr>";
 
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

echo "<table border='1'>
    <tr>
        <th>Regular</th>
        <th>Retake/Improvement</th>
    </tr>
    <tr>
        <td>
            <table border='1'>
                <tr>
                    <th>Subject</th>
                    <th>Subject Code</th>
                </tr>";

       $sql="SELECT * FROM exam where sem='$SEM'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
    	echo "<tr>
            <td align='right'> ";
        echo  $row["subjectname"];
        echo "</td>";
        echo "<td align='left'> ";
        echo  $row["subjectcode"];
        echo "</td>
            </tr>";
        }
}
       echo "</table>
           </td>";
    
echo "<td>
            <table border='1'>
                <tr>
                    <th>Subject </th>
                    <th>Subject Code</th>
                </tr>";

                $sql="SELECT * FROM ri where id='$ID'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td align='right'> ";
        echo  $row["subject"];
        echo "</td>";
        echo "<td align='left'> ";
        echo  $row["subjectcode"];
        echo "</td>
        </tr>";
    }
    }
        echo "</table>
        </td>";
         

echo "</tr> " ;
         echo "</table>";
?>
<br>
<br>
<br>
<br>

<button onclick="myFunction()">Print this page</button>
<script>
function myFunction()
{
window.print();
}
</script>
<br><br><br>
<a href="index1.php">Go To Previous page</a>

</body>
</html>