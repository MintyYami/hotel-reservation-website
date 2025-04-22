<?php

include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("INSERT INTO TblRoomType (HotelID,Capacity,RoomName,RoomDescription,Price,RoomAmount)VALUES (:hID,:cap,:rname,:rdes,:price,roomAmount)");

$stmt->bindParam(':hID', $_POST["hotel"]);
$stmt->bindParam(':cap', $_POST["capacity"]);
$stmt->bindParam(':rname', $_POST["roomname"]);
$stmt->bindParam(':rdes', $_POST["description"]);
$stmt->bindParam(':price', $_POST["price"]);
$stmt->bindParam(':roomAmount', $_POST["rAmount"]);

$stmt->execute();

$conn=null;

header('Location: roomtypes.php');

?>