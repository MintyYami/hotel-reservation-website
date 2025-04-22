<?php
session_start();
if(!isset($_SESSION['role'])) {
    header("Location:../Login/logout.php");
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
        <link rel="stylesheet" href="../style.css" type="text/css">
    </head>

    <body>
        <?php
        if($_SESSION['role'] == 1) {
            include_once "../Nav/navbaradmin.php";
        }else{
            include_once "../Nav/navbar.php";
        }
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle">
                <h1>Reservation</h1>
                <hr>
                
                <form action="viewreservationprocess.php" method="post">
                    <!-- row for input labels -->
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Date:</h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Hotel:</h5>
                        </div>
                    </div>

                    <!-- row for input box -->
                    <div class="row align-items-center">
                        <!-- Date -->
                        <div class="col-md-4">
                            <input type="date" name="day" class="form-control" required>
                        </div>
                        <!-- Hotel -->
                        <div class="col-md-4">
                            <select name="hotel" class="form-control" required>
                                <option value="" disabled selected="selected"></option>
                                <option value="1" >New Siam I</option>
                                <option value="2">New Siam II</option>
                                <option value="3">New Siam III</option>
                                <option value="4">New Siam River Side</option>
                                <option value="5">New Siam Palace Ville</option>
                            </select>
                        </div>
                        <div class="col" align="center">
                            <input type ="submit" value="Get Rooms"  class="btn btn-warning">
                        </div>
                    </div>
                </form><br>

                <!-- Table for showing tReservation -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ReservationID</th>
                            <th>DateIn</th>
                            <th>DateOut</th>
                            <th>Roomtype</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");

                        if(isset($_SESSION["reservationArray"])) {

                            foreach($_SESSION["reservationArray"] as $res) {
                                $stmt = $conn->prepare("SELECT * FROM TblReservation WHERE ReservationID=:ID");
                                $stmt->bindParam(':ID', $res);
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo("<tr>");

                                        //Show reservation ID
                                        echo("<td>".$row["ReservationID"]."</td>");
                                        //Show date in
                                        echo("<td>".$row["DateIn"]."</td>");
                                        //Show date out
                                        echo("<td>".$row["DateOut"]."</td>");
                                        //Show room type
                                        echo("<td>".$row["Roomtype"]."</td>");
                                        //Show guest first name
                                        echo("<td>".$row["FirstName"]."</td>");
                                        //Show guest last name
                                        echo("<td>".$row["LastName"]."</td>");
                                        //Button to more info
                                        echo("
                                        <td>
                                            <form action='viewareservation.php' method='get'>
                                                <button name='resID' type'submit' value=".$row["ReservationID"]." class='btn btn-warning'>More</button>
                                            </form>
                                        </td>");

                                    echo("</tr>");
                                }

                            }
                        }

                        //unset reservation array
                        unset($_SESSION['reservationArray']);
                        ?>
                    </tbody>
                </table>


            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

