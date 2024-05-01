<?php

$host="localhost";
$user="root";
$pass="";
$db="Dashboard";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Connection error: ".$conn->connect_error;
}
?>