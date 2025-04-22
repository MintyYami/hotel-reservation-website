<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../Login/logout.php");
}
if ($_SESSION['role'] != 1) {
    header("Location:../Home/home.php");
}
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
                <h1>Room Types</h1>
                <hr>
                
                <!-- Button to add new room type -->
                
                <form action="addroomtype.php" align="right">
                    <input type ="submit" value="Add New Room Type"  class="btn btn-warning">
                </form>
                
                <!-- Table for showing room types in New Siam I -->
                <h3>New Siam I</h3>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room Types</th>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
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

                                //Show room type
                                echo("<td>".$row["RoomType"]."</td>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editroomtype.php" method="get">
                                    <button name="roomtypeID" type="submit" value="'.$row["RoomType"].'" class="btn">Edit</button>
                                </form>
                                </td>');

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
                            <th>Room Types</th>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
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

                                //Show room type
                                echo("<td>".$row["RoomType"]."</td>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editroomtype.php" method="get">
                                    <button name="roomtypeID" type="submit" value="'.$row["RoomType"].'" class="btn">Edit</button>
                                </form>
                                </td>');
                                
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
                            <th>Room Types</th>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
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

                                //Show room type
                                echo("<td>".$row["RoomType"]."</td>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editroomtype.php" method="get">
                                    <button name="roomtypeID" type="submit" value="'.$row["RoomType"].'" class="btn">Edit</button>
                                </form>
                                </td>');
                                
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
                            <th>Room Types</th>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
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

                                //Show room type
                                echo("<td>".$row["RoomType"]."</td>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editroomtype.php" method="get">
                                    <button name="roomtypeID" type="submit" value="'.$row["RoomType"].'" class="btn">Edit</button>
                                </form>
                                </td>');
                                
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
                            <th>Room Types</th>
                            <th>Room Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Room Amount</th>
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

                                //Show room type
                                echo("<td>".$row["RoomType"]."</td>");
                                //Show room name
                                echo("<td>".$row["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row["Capacity"]."</td>");
                                //Show price of room
                                echo("<td>".$row["Price"]."</td>");
                                //Show amount of rooms
                                echo("<td>".$row["RoomAmount"]."</td>");

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editroomtype.php" method="get">
                                    <button name="roomtypeID" type="submit" value="'.$row["RoomType"].'" class="btn">Edit</button>
                                </form>
                                </td>');
                                
                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="column side" style="height: 1150px"></div>
        </div>

    </body>
</html>

