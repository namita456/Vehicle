<?php
session_start();
if(!isset($_SESSION["usrnmd"])){
    header("Location:index.php");
    exit();
}

?>