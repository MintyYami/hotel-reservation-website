<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("UPDATE TblRoomType SET HotelID=:hotelid, Capacity=:capacity, RoomName=:rname, RoomDescription=:rdes, Price=:price, RoomAmount=:roomAmount WHERE RoomType=:typeid");

$stmt->bindParam(':hotelid', $_POST["hotel"]);
$stmt->bindParam(':capacity', $_POST["capacity"]);
$stmt->bindParam(':rname', $_POST["roomname"]);
$stmt->bindParam(':rdes', $_POST["description"]);
$stmt->bindParam(':price', $_POST["price"]);
$stmt->bindParam(':typeid', $_POST["editid"]);
$stmt->bindParam(':roomAmount', $_POST["rAmount"]);

$stmt->execute();

echo
'<script>
    alert("Changes saved");
    window.location.href="editroomtype.php?roomtypeID='.$_POST["editid"].'";
</script>';

?>