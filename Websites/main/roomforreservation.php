<?php
if($_POST["datein"] >= $_POST["dateout"]) {
    echo
    '<script>
        alert("The entered date is not valid!")
        window.location.href="addreservation.php";
    </script>';
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
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <?php
        include_once "navbar.php";
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle" style="padding: 20px;">
                <h1>Reserve Room</h1>
                <hr>

                <!-- Row for input labels -->
                <div class="row">
                    <!-- Selected Check In Date -->
                    <div class="col-md-3">
                        <h5>Check In:</h5>
                    </div>
                    <!-- Selected Check Out Date -->
                    <div class="col-md-3">
                        <h5>Check Out:</h5>
                    </div>
                    <!-- Selected Hotel -->
                    <div class="col-md-3">
                        <h5>Hotel:</h5>
                    </div>
                    <!-- Button to go to next page -->
                    <div class="col-md-3" align="right">
                        <form action="reservationform.php" method="POST" id="reserverooms">
                            <button name="hID" type="submit" value="
                            <?php
                            echo $_POST["hotel"];
                            ?>
                            " class="btn btn-warning">Next</button>
                        </form>
                    </div>
                </div>

                <!-- Row for data -->
                <div class="row">
                    <!-- Selected Check In Date -->
                    <div class="col-md-3">
                        <?php
                        echo '<input type="text" name="Din" form="reserverooms" class="form-control" value="'.$_POST["datein"].'" readonly="readonly">';
                        ?>
                    </div>
                    <!-- Selected Check Out Date -->
                    <div class="col-md-3">
                        <?php
                        echo'<input type="text" name="Dout" form="reserverooms" class="form-control" value="'.$_POST["dateout"].'" readonly="readonly">';
                        ?>
                    </div>
                    <!-- Selected Hotel -->
                    <div class="col-md-3">
                        <?php
                        echo '<input type="text" name="hID" form="reserverooms" class="form-control" value="';
                        switch($_POST["hotel"]) {
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
                        echo '" readonly="readonly">';
                        ?>
                    </div>
                </div>
                <br>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Room</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("connection.php");

                        //Finding rooms for selected date and hotel
                        $stmt1 = $conn->prepare("SELECT *
                        FROM TblRoomType
                        INNER JOIN TblRoomAvailable
                        ON TblRoomAvailable.Roomtype=TblRoomType.RoomType
                        WHERE TblRoomType.HotelID=:hotel AND TblRoomAvailable.Date=:d");
                        $stmt1->bindParam(':d', $_POST["datein"]);
                        $stmt1->bindParam(':hotel', $_POST["hotel"]);
                        $stmt1->execute();

                        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");

                                //Show room name
                                echo("<td>".$row1["RoomName"]."</td>");
                                //Show room capacity
                                echo("<td>".$row1["Capacity"]."</td>");
                                //Show room price
                                echo("<td>".$row1["Price"]."</td>");
                                //Show Availability
                                echo("<td>".$row1["Available"]."</td>");
                                //Input for number of rooms needed
                                echo('<td>
                                <input type="number" name="'.$row1["Roomtype"].'" form="reserverooms" class="form-control" value="0" min="0" max="'.$row1["Available"].'">
                                </td>');

                            echo("</tr>");
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

