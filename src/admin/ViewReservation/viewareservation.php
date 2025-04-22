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

        //retrieve information of selected reservation
        include_once("../connection.php");
        $stmt = $conn->prepare("SELECT *
        FROM TblReservation
        INNER JOIN TblRoomType
        ON TblRoomType.RoomType=TblReservation.Roomtype
        WHERE ReservationID=:rID");

        $stmt->bindParam(':rID', $_GET["resID"]);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $ID = $row["ReservationID"];
            $checkin = $row["DateIn"];
            $checkout = $row["DateOut"];
            $roomtype = $row["RoomName"];
            $rNum = $row["RoomNum"];
            $rTime = $row["ArrivalTime"];
            $fName = $row["FirstName"];
            $lName = $row["LastName"];
            $email = $row["Email"];
            $require = $row["Requirements"];

            //Get hotel
            switch($row["HotelID"]) {
                case 1:
                    $hotel = 'New Siam I';
                break;
                case 2:
                    $hotel = 'New Siam II';
                break;
                case 3:
                    $hotel = 'New Siam III';
                break;
                case 4:
                    $hotel = 'New Siam River Side';
                break;
                case 5:
                    $hotel = 'New Siam Palace Ville';
                break;
            }
        }
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle">
                <h1>Reserve Room</h1>
                <hr>
                
                <!-- Button to cancel reservation-->
                <form onSubmit="if(!confirm('Are you sure you want to cancel this reservation? This action cannot be undone.')){return false;}"  action="deletereservation.php" method="post" align="right">
                    <?php
                    echo '<button name="rID" type="submit" value="'.$ID.'" class="btn btn-danger">Cancel Reservation</button>';
                    ?>
                </form>

                <div class="row">
                    <!-- Lable -->
                    <h3 style="padding-left: 20px;">Reservation ID: 
                        <?php
                        echo $_GET["resID"];
                        ?>
                    </h3><br>

                    <form action="updatereservation.php" method="post" id="reservation">
                        <div class="row">
                            <!-- Left Column (Input for guest information) -->
                            <div class="col-md-6">
                                <!-- Check in-->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Check in:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="dIn" class="form-control" value="<?php echo $checkin;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Check out -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Check out:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="dOut" class="form-control" value="<?php echo $checkout;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Arrival Time -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Arrival time:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="time" name="Atime" class="form-control" value="<?php echo $rTime;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Hotel -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Hotel:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="hotel" class="form-control" value="<?php echo $hotel;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Room Name -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Room Type:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="rtype" class="form-control" value="<?php echo $roomtype;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Room Number -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Room Number:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="roomnum" class="form-control"  value="<?php echo $rNum;?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column (Total price for reservation)-->
                            <div class="col-md-6" style="padding-right: 30px;">
                                <!-- First Name -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>First Name:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $fName;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Last Name:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $lName;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Email:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>" readonly="readonly">
                                    </div>
                                </div>
                                <!-- Extra Requirements -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Extra Requirements:</h5>
                                    </div>
                                    <div class="col-md-8" align="right">
                                        <textarea type="text" name="requirement" rows="4" class="form-control" readonly="readonly"><?php echo $require;?></textarea>
                                        <p style="color:grey; font-size:12px;">1000 characters max.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>
                <div align="center">
                    <?php
                    echo '<button name="rID" type="submit" value="'.$ID.'" class="btn btn-warning" form="reservation">Update Rsservation</button>';
                    ?>
                </div>
            </div>
            <div class="column side"></div>
        </div>
    </body>
</html>
