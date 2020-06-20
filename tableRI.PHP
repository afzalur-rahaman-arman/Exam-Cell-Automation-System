<?php

$conn= mysqli_connect("localhost", "root", '', "ecautomationsystem");

$sql ="create table ri(

id varchar(11) not null, 
subject varchar(50) not null,
subjectcode varchar(11) not null

)";


if (mysqli_query($conn, $sql)) {
	echo "Successfull...............!!!!!!!!!";
}
?>