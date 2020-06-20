<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table users(

id varchar(100) not null,
email varchar(100) not null,
password varchar(100) not null
)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
echo "Try again";

$conn->close();

?>