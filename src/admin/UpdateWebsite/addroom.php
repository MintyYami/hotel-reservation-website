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
                <h1>Add Room</h1>
                <hr>

                <!-- Select hotel for which room types can be selected -->
                <form action="addroom.php" method="get">
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Hotel:</h5>
                        </div>
                        <div class="col-md-3">
                            <select name="hotel" class="form-control">
                                <?php

                                //Select hotel
                                if($_GET["hotel"] == "1"){
                                    echo'<option value="1" selected>New Siam I</option>';
                                } else {
                                    echo'<option value="1">New Siam I</option>';
                                }
                                if($_GET["hotel"] == "2"){
                                    echo'<option value="2" selected>New Siam II</option>';
                                } else {
                                    echo'<option value="2">New Siam II</option>';
                                }
                                if($_GET["hotel"] == "3"){
                                    echo'<option value="3" selected>New Siam III</option>';
                                } else {
                                    echo'<option value="3">New Siam III</option>';
                                }
                                if($_GET["hotel"] == "4"){
                                    echo'<option value="4" selected>New Siam River Side</option>';
                                } else {
                                    echo'<option value="4">New Siam River Side</option>';
                                }
                                if($_GET["hotel"] == "5"){
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
                
                <!-- Show the rest of the form when hotel is selected-->
                <?php
                if(isset($_GET["hotel"])){
                    echo '<form action="addroomprocess.php" method="post">';
                        //Select Room Type
                        echo
                        '<div class="row align-items-center">
                            <div class="col-md-2" align="center">
                                <h5>Room Type:</h5>
                            </div>
                            <div class="col-md-3">
                                <select name="roomType" class="form-control" required>
                                    <option value="" disabled selected></option>';
                                    $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID=:hotelid");
                                    $stmt->bindParam(':hotelid', $_GET["hotel"]);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo'<option value="'.$row["RoomType"].'">'.$row["RoomName"].'</option>';
                                    }
                                echo '</select>
                            </div>
                        </div><br>';
                        //Room Number
                        echo
                        '<div class="row align-items-center">
                            <div class="col-md-2" align="center">
                                <h5>Room Number:</h5>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="roomNum" class="form-control" maxlength="3" required>
                            </div>
                            <div class="col"></div>
                        </div><br>';
                        //Post HotelID to the next page
                        echo '<input type="text" name="hotelid" class="hidden" value="'.$_GET["hotel"].'">';
                        // Submit Button
                        echo
                        '<div class="row align-items-center">
                            <div class="col-md-2"></div>
                            <div class="col">
                                <input type ="submit" value="Add Room" class="btn btn-warning">
                            </div><br>
                        </div><br>
                    
                    </form>';
                }
                ?>
            </div>
            <div class="column side" style="height: 1150px"></div>
        </div>
    </body>
</html>

