<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("DELETE FROM TblRoomType WHERE RoomType=:id");
$stmt->bindParam(':id', $_POST["deleteroomtypeid"]);
$stmt->execute();

header('Location: roomtypes.php');
?>