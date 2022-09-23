<?php
require_once("connect.php");
$table = "complaint_form_detail";
$msg = "";
$color = "";
$id = $_GET['id'];
$sql = "update " . $table . " set status=1 where id =" . $id;
$res = mysqli_query($conn, $sql);
if (!$res) {
    echo "Record not Added" . mysqli_error($conn);
} else {
    //echo "Records Added Successfully in ".$table;
    header("Location:admindatashow.php");
}
