<?php

include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt1 = $conn->prepare("SELECT * FROM TblRoomType");
    $stmt1->execute();

    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){ //For each room type, the allot entered for that room will be added to the database

        $stmt2 = $conn->prepare("INSERT INTO TblRoomAvailable (Date,Roomtype,Allotment,Available)VALUES (:d,:roomtype,:allotment,:available)");
        $stmt2->bindParam(':d', $_POST["date"]);
        $stmt2->bindParam(':roomtype', $row["RoomType"]);

        //Finding the allotment of the room type
        $roomtype = $row["RoomType"];
        echo 'rType:'.$roomtype.'   ';

        echo 'allotment'.$_POST[$roomtype].'   ';
        $stmt2->bindParam(':allotment', $_POST[$roomtype]);

        $stmt2->bindParam(':available', $_POST[$roomtype]);
        
        $stmt2->execute();
    }


$conn=null;

header('Location: addallotment.php');

?>