<?php
require_once("connect.php");
$table = "vehicle_details";
$msg = "";
$color = "";
$id = $_GET['id'];
$sql = "delete from " . $table . " where id =" . $id;
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo "Record not Added" . mysqli_error($conn);
} else {
    //echo "Records Added Successfully in ".$table;
    header("Location:vehiclestatus.php");
}
