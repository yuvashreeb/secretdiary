<?php

$link=mysqli_connect("localhost","dbuser","123","yuva");
if(mysqli_connect_error()){
    die("could not connect to databse");
}
$query= "INSERT INTO reg_users VALUES('saimanasa','saimanasa15@gmail.com','sai@115','')";
$query= "INSERT INTO reg_users VALUES('saipriya','saipriya15@gmail.com','saipriya@115','')";
mysqli_query($link,$query);


?>