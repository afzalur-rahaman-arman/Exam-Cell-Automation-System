<?php

$conn = mysqli_connect("localhost","root",'', "ecautomationsystem");

$sql="create table result(

sem varchar(100) not null,
id varchar(100) not null,
subject varchar(100) not null,
subjectcode varchar(100) not null,



)";