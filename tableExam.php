<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table exam(

subjectname varchar(100) not null,
subjectcode varchar(100) not null primary key,
date  varchar(100) not null,
time varchar(100) not null,
sem varchar(100) not null,
session varchar(100) not null,
examname  varchar(100) not null

)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
echo "Try again";

$conn->close();

?>