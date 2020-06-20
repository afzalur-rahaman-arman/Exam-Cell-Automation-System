<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table student(

name varchar(100) not null,
id varchar(100) not null,
email varchar(100) not null,
sem varchar(100) not null,
sec varchar(100) not null,
session varchar(100) not null,
address varchar(200) not null

)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
echo "Try again";

$conn->close();

?>