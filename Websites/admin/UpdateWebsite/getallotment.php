<?php
session_start();
include_once("../connection.php");

$_SESSION['date'] = $_POST["date"];

header("Location: allotment.php");
$conn=null;
?>

