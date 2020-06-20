
<?php
$conn= mysqli_connect("localhost", "root", '', "ecautomationsystem");

$ID=$_POST["ID"];
$SEM=$_POST["sem"];

  echo "<table>
  <tr>
    <th></th> <th><h1>BGC Trust University Bangladesh</h1><b><h5>";
echo "(Session:";
 $sql = "SELECT * FROM marks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo  $row["session"];
        break;
    }
}
echo ")</h5></b><p>Marksheet</p></center></th><th></th></tr>";
 
 
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
 
 $sql = "SELECT * FROM marks where sem='$SEM'";
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
echo "</tr>";


echo "<tr><td><center>GPA : ";


$cgpa=0;
$credit1=0;
$credit=0;
$gpa=0;
$sql="select * from marks where sem='$SEM' AND id='$ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $m=$row["marks"];
        $subjectCode=$row["subjectcode"];
        if($m>79 && $m<=100)
            $gpa=4.0;
            elseif ($m>75 && $m<80) 
            $gpa = 3.75;
            elseif ($m>75 && $m<80) 
            $gpa = 3.75;
            elseif ($m>70 && $m<=75) 
            $gpa = 3.50;
            elseif ($m>=66 && $m<=70) 
            $gpa = 3.25;
            elseif ($m>=61 && $m<=65) 
            $gpa = 3.00;
            elseif ($m>=56 && $m<=60) 
            $gpa = 2.75;
            elseif ($m>=51 && $m<=55) 
            $gpa =2.50;
            elseif ($m>=46 && $m<=50) 
            $gpa =2.25;
            elseif ($m>=41 && $m<=45) 
            $gpa =2.00;
            else
                $gpa=0.00;
        
        $sql1="SELECT * FROM subject where subjectcode='$subjectCode' and sem='$SEM'";
        $result1=$conn->query($sql1);
        if($result1->num_rows>0)
        $row=$result1->fetch_assoc();
        $credit=$row["credit"];
        $credit1+=$credit;
        $cgpa+=$credit*$gpa;
    }
}
$totalGpa=0.0;
$totalGpa=$cgpa/$credit1;
echo "<b>". $totalGpa."</b>";

echo "</center></td>";

/*
echo "<td align='center'>Total CGPA : ";

 $sql1="SELECT * FROM gpa where sem!='$SEM'";
 if (mysqli_query($conn, $sql1)) {
$sql="insert into gpa(sem, id, gpa) values ('$SEM', '$ID', '$totalGpa')";
if (mysqli_query($conn, $sql))
{}
}

$sumGpa=0.0;
$count=0;
$sql= "select * from gpa where id='$ID' ";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
        $sumGpa=$sumGpa+$row["gpa"];
        $count=$count + 1;
    }
}
    echo "<b>".$sumGpa/$count."</b></td>
    **/
    echo "</tr>";
echo "</table>";

echo "<table border='1'> ";
echo "<tr>";
echo "<th>Subject Name</th><th>Subject Code</th><th>Marks</th>";
echo "</tr>";

$sql="SELECT * FROM marks where sem='$SEM' and id='$ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    	echo "<tr><td align='right'> ";
        echo  $row["subjectname"];
        echo "</td>";
        echo "<td align='left'> ";
        echo  $row["subjectcode"];
        echo "</td>";
        echo "<td align='Center'> ";
        echo  $row["marks"];
        echo "</td></tr>";

    }
}
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
<br>
<br>
<br>
<br>
<a href="index1.php">Go To Previous page</a>
