<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

// Check if room number in the hotel is already taken or not
$repeatRoomNum = false;

$stmt1 = $conn->prepare("SELECT TblRoomTotal.RoomNum as rNum
FROM TblRoomTotal
INNER JOIN TblRoomType
ON TblRoomTotal.Roomtype=TblRoomType.RoomType
WHERE TblRoomType.HotelID=:hID");
$stmt1->bindParam(':hID', $_POST['hotelid']);
$stmt1->execute();

while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
    if($row["rNum"] == $_POST['roomNum']){
        $repeatRoomNum = true;
    }
}

//Add room if room number isn't taken
if(!$repeatRoomNum) {
    $stmt2 = $conn->prepare("INSERT INTO TblRoomTotal (Roomtype, RoomNum) VALUES (:rType, :rNum)");
    $stmt2->bindParam(':rType', $_POST['roomType']);
    $stmt2->bindParam(':rNum', $_POST['roomNum']);

    $stmt2->execute();

    //Alert to tell staff that room is added sucessfully
    echo
    '<script>
        alert("Room added!")
        window.location.href="addroom.php";
    </script>';

} else { //Show alert that the room number is already taken
    echo
    '<script>
        alert("The room number '.$_POST['roomNum'].' for hotel ';

        switch($_POST['hotelid']){
            case"1":
                echo'New Siam I';
            break;
            case"2":
                echo'New Siam II';
            break;
            case"3":
                echo'New Siam III';
            break;
            case"3":
                echo'New Siam RiverSide';
            break;
            case"3":
                echo'New Siam Palace Ville';
            break;
        }
        echo ' is already in use")

        window.location.href="addroom.php";
    </script>';
}

?>