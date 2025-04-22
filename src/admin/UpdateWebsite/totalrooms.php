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
                <h1>Total Rooms</h1>
                <hr>

                <!-- Button to add new room -->
                <form action="addroom.php" align="right">
                    <input type ="submit" value="Add New Room"  class="btn btn-warning">
                </form>

                <!-- Select hotel for which room types will be shown -->
                <form action="getroomtype.php" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <select name="hotel" class="form-control">
                                <?php
                                //Choose hotel 1 as default so that there is no error for retriving room type
                                if(!isset($_SESSION['hotel'])) {
                                    $_SESSION['hotel'] = "1";
                                }

                                //Select hotel
                                if($_SESSION['hotel'] == "1"){
                                    echo'<option value="1" selected>New Siam I</option>';
                                } else {
                                    echo'<option value="1">New Siam I</option>';
                                }
                                if($_SESSION['hotel'] == "2"){
                                    echo'<option value="2" selected>New Siam II</option>';
                                } else {
                                    echo'<option value="2">New Siam II</option>';
                                }
                                if($_SESSION['hotel'] == "3"){
                                    echo'<option value="3" selected>New Siam III</option>';
                                } else {
                                    echo'<option value="3">New Siam III</option>';
                                }
                                if($_SESSION['hotel'] == "4"){
                                    echo'<option value="4" selected>New Siam River Side</option>';
                                } else {
                                    echo'<option value="4">New Siam River Side</option>';
                                }
                                if($_SESSION['hotel'] == "5"){
                                    echo'<option value="5" selected>New Siam Palace Ville</option>';
                                } else {
                                    echo'<option value="5">New Siam Palace Ville</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            <input type ="submit" value="Get Room Types" class="btn btn-warning">
                        </div><br>
                    </div>
                </form>

                <!-- Select room type for which rooms will be shown -->
                <form action="gettotalrooms.php" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <?php
                                //Select Room type
                                echo
                                '<select name="rtype" class="form-control">
                                    <option value="0">All Room Types</option>';

                                    $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID=:hotelid");
                                    $stmt->bindParam(':hotelid', $_SESSION['hotel']);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo'<option value="'.$row["RoomType"].'"';
                                        if($row["RoomType"] == $_SESSION["roomtype"]){
                                            echo ' selected';
                                        }
                                        echo '>'.$row["RoomName"].'</option>';
                                    }
                                echo '</select>';
                            ?>
                        </div>
                        
                        <div class="col">
                            <input type ="submit" value="Get Rooms" class="btn btn-warning">
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Type</th>
                            <th>Room Number</th>
                            <th>Room Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_SESSION['roomtype'])) { //Shows table if the room type is selected

                            if($_SESSION['roomtype'] == "0"){ //Show all rooms in the selected hotel
                                $stmt1 = $conn->prepare("SELECT TblRoomTotal.RoomNum as rNu, TblRoomTotal.Roomtype as rT, TblRoomType.RoomName as rNa, TblRoomTotal.RoomID as rID
                                FROM TblRoomTotal 
                                INNER JOIN TblRoomType
                                ON TblRoomType.RoomType=TblRoomTotal.Roomtype
                                WHERE TblRoomType.HotelID=:hID
                                ORDER BY TblRoomType.HotelID ASC");
                            } else { //Show the rooms in the selected hotel and room type
                                $stmt1 = $conn->prepare("SELECT TblRoomTotal.RoomNum as rNu, TblRoomTotal.Roomtype as rT, TblRoomType.RoomName as rNa, TblRoomTotal.RoomID as rID
                                FROM TblRoomTotal 
                                INNER JOIN TblRoomType
                                ON TblRoomType.RoomType=TblRoomTotal.Roomtype
                                WHERE TblRoomType.HotelID=:hID
                                AND TblRoomType.RoomType=:roomT
                                ORDER BY TblRoomType.HotelID ASC");
                                $stmt1->bindParam(':roomT', $_SESSION['roomtype']);
                            }
                            $stmt1->bindParam(':hID', $_SESSION['hotel']);
                            $stmt1->execute();
                            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
                            {
                                echo("<tr>");
                                    //Room Type
                                    echo("<td>".$row["rT"]."</td>");
                                    //Room Number
                                    echo("<td>".$row["rNu"]."</td>");
                                    //Room Name
                                    echo("<td>".$row["rNa"]."</td>");
    
                                    //Button that takes staff to a page for editing individual rooms of the selected hotel & roomtype
                                    echo('<td>
                                    <form action="editroom.php" method="get">
                                        <button name="roomID" type="submit" value="'.$row["rID"].'" class="btn">Edit</button>
                                    </form>
                                    </td>');
                                echo("</tr>");
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="column side" style="height: 1150px"></div>
        </div>
    </body>
</html>

