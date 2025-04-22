<?php
include_once("../connection.php");
session_start();

array_map("htmlspecialchars", $_POST);

//Function for checking all the dates for the period of stay so that I can check the reversation against each day
function dateList($DateFrom,$DateTo)
{
    $aryRange = [];

    //Format date
    $iDateFrom = mktime(1, 0, 0, substr($DateFrom, 5, 2), substr($DateFrom, 8, 2), substr($DateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($DateTo, 5, 2), substr($DateTo, 8, 2), substr($DateTo, 0, 4));

    while ($iDateFrom<$iDateTo) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); //Append date into array
        $iDateFrom += 86400; //Add 24 hours
    }
    
    return $aryRange;
}

//Array for reservations
$_SESSION["reservationArray"] = [];

//Find reservations belonging to selected hotel and includes the date of selected date
$stmt1 = $conn->prepare("SELECT * FROM TblReservation
INNER JOIN TblRoomType
ON TblRoomType.RoomType=TblReservation.Roomtype
WHERE TblRoomType.HotelID=:hotel");
$stmt1->bindParam(':hotel', $_POST["hotel"]);
$stmt1->execute();

while  ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
    $datearray = dateList($row1["DateIn"],$row1["DateOut"]);
    
    foreach($datearray as $day) {
        if($_POST["day"] == $day) {
            //Add reservation ID to array
            array_push($_SESSION["reservationArray"], $row1["ReservationID"]);
        }
    }
}

$conn=null;
header('Location: viewreservation.php');

?>
