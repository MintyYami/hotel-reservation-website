<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("DELETE FROM TblRoomTotal WHERE RoomID=:id");
$stmt->bindParam(':id', $_POST["deleteid"]);
$stmt->execute();

header('Location: totalrooms.php');
?>
