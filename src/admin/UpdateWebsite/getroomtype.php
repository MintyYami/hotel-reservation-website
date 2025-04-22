<?php
session_start();
include_once("../connection.php");

$_SESSION['hotel'] = $_POST["hotel"];
$_SESSION['roomtype'] = 0;

header("Location: totalrooms.php");
$conn=null;
?>