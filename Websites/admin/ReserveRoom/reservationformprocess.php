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

//For adding new reservations
$stmt1 = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID=:hotel");
$stmt1->bindParam(':hotel', $_SESSION["hID"]);
$stmt1->execute();

while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
    if(isset($_SESSION["allreservedrooms"][$row1["RoomType"]])) { //see if the room type is in the array

        //For each room type, add a new reservation of that room type for the amount of the rooms being booked
        for($x = 0; $x < $_SESSION["allreservedrooms"][$row1["RoomType"]]; $x++) {
            $stmt = $conn->prepare("INSERT INTO TblReservation (DateIn,DateOut,Roomtype,FirstName,LastName,Email,ArrivalTime,Requirements)VALUES (:di,:do,:rt,:fn,:ln,:em,:ar,:rq)");

            $stmt->bindParam(':di', $_SESSION["din"]);
            $stmt->bindParam(':do', $_SESSION["dout"]);
            $stmt->bindParam(':rt', $row1["RoomType"]);
            $stmt->bindParam(':fn', $_POST["firstname"]);
            $stmt->bindParam(':ln', $_POST["lastname"]);
            $stmt->bindParam(':em', $_POST["email"]);
            $stmt->bindParam(':ar', $_POST["Atime"]);
            $stmt->bindParam(':rq', $_POST["requirement"]);

            $stmt->execute();
        }

        $datearray = dateList($_SESSION["din"],$_SESSION["dout"]);

        //For each day reserved, decrease the number of rooms avaliable in TblRoomAvailable by the number of amount reserved
        foreach ($atearray as $day) {
            
            //Finding the initial num of room left
            $stmt2 = $conn->prepare("SELECT TblRoomAvailable.Available FROM TblRoomAvailable WHERE Date=:d AND Roomtype=:rtype");
            $stmt2->bindParam(':d', $day);
            $stmt2->bindParam(':rtype', $row1["RoomType"]);
            $stmt2->execute();

            
            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){

                $stmt3 = $conn->prepare("UPDATE TblRoomAvailable SET Available=:av WHERE Date=:d AND Roomtype=:rtype");
                $stmt3->bindParam(':d', $day);
                $stmt3->bindParam(':rtype', $row1["RoomType"]);

                //Decrease num of rooms available by the num of rooms roomed to get new num of rooms available
                $newavailable = $row2["Available"] - $_SESSION["allreservedrooms"][$row1["RoomType"]];
                
                $stmt3->bindParam(':av', $newavailable);
                $stmt3->execute();

            }            
        }

    }
}

unset($_SESSION['din']);
unset($_SESSION['dout']);
unset($_SESSION['hID']);

$conn=null;
header('Location: addreservation.php');
?>

