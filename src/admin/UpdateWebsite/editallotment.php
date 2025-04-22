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
                <h1>Edit Allotment</h1>
                <hr>
                
                <br>
                <div class="row">
                    <!-- Date -->
                    <div class="col-md-1">
                        <h5>Date:</h5>
                    </div>
                    <div class="col-md-2">
                        <h5><i>
                            <?php
                                echo $_SESSION['date'];
                            ?>
                        </i></h5>
                    </div>
                    <!-- Room Type -->
                    <div class="col-md-2">
                        <h5>Room Type:</h5>
                    </div>
                    <div class="col-md-1">
                        <h5><i>
                            <?php
                            echo $_GET["roomtypeID"];
                            ?>
                        </i></h5>
                    </div>
                    <!-- Allotment (to be changed) -->
                    <div class="col-md-2">
                        <h5>Allotment:</h5>
                    </div>
                    <form action="editallotmentprocess.php" method="post">
                        <div class="col-md-2">
                            <?php
                            $stmt1 = $conn->prepare("SELECT TblRoomAvailable.Allotment as am, TblRoomType.RoomAmount as rm
                            FROM TblRoomAvailable
                            INNER JOIN TblRoomType ON TblRoomType.RoomType=TblRoomAvailable.Roomtype
                            WHERE TblRoomAvailable.Date=:d AND TblRoomAvailable.Roomtype=:rType");
                            $stmt1->bindParam(':d', $_SESSION['date']);
                            $stmt1->bindParam(':rType', $_GET["roomtypeID"]);
                            $stmt1->execute();
                        
                            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)){ 
                                echo '<input type="number" name="allotment" class="form-control" value="'.$row["am"].'" min="0" max="'.$row["rm"].'" required>';
                            }
                            ?>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-md-2">
                            <button type ="submit" name="roomID" value=
                            <?php
                                echo $_GET["roomtypeID"];
                            ?>
                            class="btn btn-warning">Save Allotment</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column side" style="height: 800px"></div>
        </div>
    </body>
</html>

