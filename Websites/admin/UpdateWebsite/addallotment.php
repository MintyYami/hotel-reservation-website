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
            <div class="column side" style="height: 1200px"></div>
            <div class="column middle">
                <h1>Add Allotment</h1>
                <hr>
                
                <br>
                <form action="addallotmentprocess.php" method="post" id="addallotment">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <h5>Date:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-8" align="right">
                            <input type ="submit" value="Add Allotment" class="btn btn-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </form><br>

                <!-- Table for showing room types in New Siam I -->
                <h3>New Siam I</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
                            <th>Allotment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID='1'");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");
                                //Input for allotment
                                echo("<td><input type='number' name='".$row["RoomType"]."' form='addallotment' class='form-control' maxlength='3' value='0' min='0' max='".$row["RoomAmount"]."' required></td>");
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Table for showing room types in New Siam II -->
                <h3>New Siam II</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
                            <th>Allotment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID='2'");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");
                                //Input for allotment
                                echo("<td><input type='number' name='".$row["RoomType"]."' form='addallotment' class='form-control' maxlength='3' value='0' min='0' max='".$row["RoomAmount"]."' required></td>");
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Table for showing room types in New Siam III -->
                <h3>New Siam III</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
                            <th>Allotment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID='3'");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");
                                //Input for allotment
                                echo("<td><input type='number' name='".$row["RoomType"]."' form='addallotment' class='form-control' maxlength='3' value='0' min='0' max='".$row["RoomAmount"]."' required></td>");
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Table for showing room types in New Siam River Side -->
                <h3>New Siam River Side</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
                            <th>Allotment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID='4'");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");
                                //Input for allotment
                                echo("<td><input type='number' name='".$row["RoomType"]."' form='addallotment' class='form-control' maxlength='3' value='0' min='0' max='".$row["RoomAmount"]."' required></td>");
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Table for showing room types in New Siam Palace Ville -->
                <h3>New Siam Palace Ville</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
                            <th>Allotment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID='5'");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");
                                //Input for allotment
                                echo("<td><input type='number' name='".$row["RoomType"]."' form='addallotment' class='form-control' maxlength='3' value='0' min='0' max='".$row["RoomAmount"]."' required></td>");
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="column side" style="height: 1200px"></div>
        </div>
    </body>
</html>

