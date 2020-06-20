<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table gpa(

sem varchar(100) not null primary key,
id varchar(100) not null,
gpa float(4.00) not null

)";


if (mysqli_query($conn,$sql)) {
	echo "Sucessfull";
}

else
echo "Try again";

$conn->close();

?>