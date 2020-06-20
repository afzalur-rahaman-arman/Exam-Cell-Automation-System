<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table subject(

subjectname varchar(100) not null,
subjectcode varchar(100) not null,
sem varchar(100) not null,
credit int(10) not null
)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
{
	echo "Try again";
}


$conn->close();

?>