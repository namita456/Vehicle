<?php
$host="localhost";
$user="root";
$pwd="";
$database="test";

$conn=mysqli_connect($host,$user,$pwd);
if(!conn){
    echo mysql_error();
    else
    echo "connected"; 
}
?>