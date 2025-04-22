<?php
session_start();
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$NumRoomUsed = 0;

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

//Search for number of rooms that are already booked to find the number of rooms still available
$stmt1 = $conn->prepare("SELECT * FROM TblReservation WHERE TblReservation.Roomtype=:rt");

$stmt1->bindParam(':rt', $_POST["roomID"]);
$stmt1->execute();

while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){

    $dateArr = dateList($row["DateIn"],$row["DateOut"]);
    foreach ($dateArr as $i) {
        if($i == $_SESSION['date']) {
            $NumRoomUsed++;
        }
    }

}

//Update table
$stmt2 = $conn->prepare("UPDATE TblRoomAvailable SET Allotment=:al, Available=:av WHERE Date=:d AND RoomType=:rID");

$stmt2->bindParam(':al', $_POST['allotment']);
$roomleft = $_POST['allotment'] - $NumRoomUsed;
$stmt2->bindParam(':av', $roomleft);
$stmt2->bindParam(':d', $_SESSION['date']);
$stmt2->bindParam(':rID', $_POST["roomID"]);

$stmt2->execute();

//Alert that change is succesfully updated and direct user back to alloment page
echo
'<script>
    alert("Changes saved");
    window.location.href="allotment.php";
</script>';

?>