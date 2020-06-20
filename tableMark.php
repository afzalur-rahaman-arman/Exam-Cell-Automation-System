f<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table marks(

id varchar(100) not null,
sem varchar(100) not null,
sec varchar(100) not null,
subjectname varchar(200) not null,
subjectcode varchar(200) not null,
session varchar(200) not  null,
marks int(100) not null

)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
echo "Try again";

$conn->close();

?>