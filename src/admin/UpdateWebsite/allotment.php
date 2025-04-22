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
            <div class="column side" style="height: 800px"></div>
            <div class="column middle">
                <h1>Allotments</h1>
                <hr>
                
                <div class="row">
                    <!-- Form to submit date -->
                    <form action="getallotment.php" method="post">
                        <div class="col-md-1">
                            <h5>Date:</h5>
                        </div>
                        <div class="col-md-3">
                            <?php
                            if(isset($_SESSION['date'])) {
                                echo '<input type="date" name="date" class="form-control" value="'.$_SESSION['date'].'"required>';
                            } else {
                                echo '<input type="date" name="date" class="form-control" required>';
                            }
                            ?>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-md-2" align="right">
                            <input type ="submit" value="Get Allotment"  class="btn btn-warning">
                        </div>
                    </form>
                    
                    <!-- Form to add allotment -->
                    <form action="addallotment.php" method="post">
                        <div class="row">
                            <div class="col-md-6" align="right">
                                <input type ="submit" value="Add Allotment"  class="btn btn-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div><br>
                    </form>
                </div>


                <!-- Table of Allotments in the selected hotel -->
                <?php
                if(isset($_SESSION['date'])) { //Shows table if the date is selected
                    echo '
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Hotel</th>
                                <th>Room Name</th>
                                <th>Allotment</th>
                                <th>Rooms Left</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';

                            $stmt = $conn->prepare("SELECT TblRoomAvailable.Allotment as al, TblRoomAvailable.Available as av, TblRoomType.RoomName as rn, TblRoomType.RoomType as rID, TblRoomType.HotelID as hID
                            FROM TblRoomAvailable
                            INNER JOIN TblRoomType
                            ON TblRoomType.RoomType=TblRoomAvailable.Roomtype
                            WHERE TblRoomAvailable.Date=:d
                            ORDER BY TblRoomType.HotelID ASC");

                            $stmt->bindParam(':d', $_SESSION['date']);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo '<tr>';
                                    //Hotel
                                    echo'<td>';
                                        switch ($row["hID"]) {
                                            case 1:
                                                echo 'New Siam I';
                                            break;
                                            case 2:
                                                echo 'New Siam II';
                                            break;
                                            case 3:
                                                echo 'New Siam III';
                                            break;
                                            case 4:
                                                echo 'New Siam River Side';
                                            break;
                                            case 5:
                                                echo 'New Siam Palace Ville';
                                            break;
                                        }
                                    echo '</td>';
                                    //Room Type
                                    echo("<td>".$row["rn"]."</td>");
                                    //Allotment
                                    echo("<td>".$row["al"]."</td>");
                                    //Room Name
                                    echo("<td>".$row["av"]."</td>");

                                    //Button that takes staff to a page for editing individual rooms of the selected hotel & roomtype
                                    echo('<td>
                                    <form action="editallotment.php" method="get">
                                        <button name="roomtypeID" type="submit" value="'.$row["rID"].'" class="btn">Edit</button>
                                    </form>
                                    </td>');
                                echo '</tr>';
                            }
                        echo '</tbody>
                    </table>
                    ';
                }
                ?>

            </div>
            <div class="column side" style="height: 800px"></div>
        </div>
    </body>
</html>

