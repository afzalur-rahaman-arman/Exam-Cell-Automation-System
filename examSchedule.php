

<?php

echo "<h1 align='center'> BGC Trust University Bangladesh</h1>";
echo "<H4 align='center'> Exam Schedule</h4>";




echo "<table border='1'>
	<tr>
		<th>
			Date
		</th>
		<th>
			Subject
		</th>
		<th>
			Time
		</th>
		<th>
		Sem
		</th>
	</tr>";

$conn=mysqli_connect("localhost", "root", '', "ecautomationsystem");
$sql = "SELECT * FROM exam";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["date"]."</td>";
        echo "<td>". $row["subjectname"]."</td>";
        echo "<td>".$row["time"]."</td>";
        echo "<td>".$row["sem"]."</td></tr>";
    }
}
echo "</table>";


$conn->close();
?>

<br><br>

<button onclick="myFunction()">Print this page</button>
<script>
function myFunction()
{
window.print();
}
</script>
<br><br>


<a href="index1.php">Back Home page</a>