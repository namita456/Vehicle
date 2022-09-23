<?php
require("constant.php");
//to establish connection with server
$conn=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
/*if(!$conn)
{
    echo mysqli_connect_error;
}
else{
    echo "Connection Established<br/>";
}*/
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>