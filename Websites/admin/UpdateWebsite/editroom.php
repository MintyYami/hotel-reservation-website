<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../Login/logout.php");
}
if ($_SESSION['role'] != 1) {
    header("Location:../Home/home.php");
}
include_once("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php";
        ?>
        <div class="row">
            <div class="column side" style="height: 1150px"></div>
            <div class="column middle">
                <h1>Edit Room</h1>
                <hr>

                <!-- Button to delete account-->
                <form onSubmit="if(!confirm('Are you sure you want to delete this account? This action cannot be undone.')){return false;}" action="deleteroomprocess.php" method="post">
                    <div class="col-md" align="right">
                        <?php
                            echo '<button name="deleteid" type="submit" value="'.$_GET["roomID"].'" class="btn btn-danger">Delete Room</button>'
                        ?>
                    </div>
                </form>
                
                <!-- Show Room ID -->
                <div class="row">
                    <div class="col-md-2" align="center">
                        <h5>Room ID:</h5>
                    </div>
                    <div class="col-md-3" align="center">
                        <h5>
                            <?php
                            echo $_GET["roomID"];
                            ?>
                        </h5>
                    </div>
                </div>

                <!-- Show Hotel -->
                <div class="row">
                    <div class="col-md-2" align="center">
                        <h5>Hotel:</h5>
                    </div>
                    <div class="col-md-3" align="center">
                        <h5>
                            <?php
                            //Get hotel of room type that the room belong to
                            $stmt1 = $conn->prepare("SELECT TblRoomType.HotelID as hID
                            FROM TblRoomType
                            INNER JOIN TblRoomTotal
                            ON TblRoomTotal.Roomtype=TblRoomType.RoomType
                            WHERE TblRoomTotal.RoomID=:id");

                            $stmt1->bindParam(':id', $_GET["roomID"]);
                            $stmt1->execute();
                            
                            //Output the hotel
                            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                $hotelid = $row1["hID"]; //Get hotel ID
                                switch($hotelid) {
                                    case '1':
                                        echo 'New Siam I';
                                    break;
                                    case '2':
                                        echo 'New Siam II';
                                    break;
                                    case '3':
                                        echo 'New Siam III';
                                    break;
                                    case '4':
                                        echo 'New Siam River Side';
                                    break;
                                    case '5':
                                        echo 'New Siam Palace Ville';
                                    break;
                                }
                            }
                            ?>
                        </h5>
                    </div>
                </div>

            
            <form action="editroomprocess.php" method="post">
                <!-- Input for Room Type -->
                <div class="row">
                    <div class="col-md-2" align="center">
                        <h5>Room Type:</h5>
                    </div>
                    <div class="col-md-3" align="center">
                        <?php
                        $stmt2 = $conn->prepare("SELECT * FROM TblRoomType WHERE TblRoomType.HotelID=:hotel");
                        $stmt2->bindParam(':hotel', $hotelid);
                        $stmt2->execute();
                        
                        //Select input for room type
                        echo '<select name="rt" class="form-control" required>';
                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                echo '<option value="'.$row2["RoomType"].'"';

                                    //Find room type that the room current belongs to
                                    $stmt3 = $conn->prepare("SELECT * FROM TblRoomTotal WHERE RoomID=:room");
                                    $stmt3->bindParam(':room', $_GET["roomID"]);
                                    $stmt3->execute();
                                    //Make the current room type selected
                                    while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                        if ($row3["Roomtype"] == $row2["RoomType"])
                                        echo ' selected="selected"';
                                    }

                                echo'>'.$row2["RoomName"].'</option>';
                            }
                        echo '</select>';
                        ?>
                    </div>
                </div>
                
                <!-- Input for Room Number -->
                <div class="row">
                    <div class="col-md-2" align="center">
                        <h5>Room Number:</h5>
                    </div>
                    <div class="col-md-3" align="center">
                        <?php
                        $stmt4 = $conn->prepare("SELECT * FROM TblRoomTotal WHERE RoomID=:room");
                        $stmt4->bindParam(':room', $_GET["roomID"]);
                        $stmt4->execute();
                        
                        while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                            echo '<input type="text" name="roomNum" class="form-control" maxlength="3" value="'.$row4["RoomNum"].'" placeholder="'.$row4["RoomNum"].'">';
                        }
                        ?>
                    </div>
                </div><br>
                
                <!-- Submit Button -->
                <div class="row align-items-center">
                    <div class="col-md-5" align="center">
                        <?php
                            echo '<button name="roomID" type="submit" value="'.$_GET["roomID"].'" class="btn btn-warning btn-lg">Save</button>'
                        ?>
                    </div>
                </div>
            </form>
            </div>
            <div class="column side" style="height: 1150px"></div>
        </div>
    </body>
</html>

