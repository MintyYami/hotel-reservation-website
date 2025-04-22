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
            <div class="column side"></div>
            <div class="column middle">
                <h1>Add New Room Type</h1>
                <hr>
                
                <!-- Delete Room Type Button -->
                <form onSubmit="if(!confirm('Are you sure you want to delete this room type? This action cannot be undone.')){return false;}" action="deleteroomtypeprocess.php" method="post">
                    <div class="col-md-9"></div>
                    <div class="col-md-2" align="right">
                        <?php
                            echo '<button name="deleteroomtypeid" type="submit" value="'.$_GET["roomtypeID"].'" class="btn btn-danger">Delete Room Type</button>'
                        ?>
                    </div>
                </form><br><br>

                <form action="editroomtypeprocess.php" align="right" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Room Type ID:</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <h5>
                                <?php
                                    echo $_GET["roomtypeID"]
                                ?>
                            </h5>
                        </div>
                        <div class="col"></div>
                    </div>

                    <?php
                        //For retrieving information of the room type that is being edit
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblRoomType WHERE RoomType = :id");
                        $stmt->bindParam(':id', $_GET["roomtypeID"]);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<div class="row align-items-center">';
                                //Select hotel where to room will be for
                                echo'<div class="col-md-2" align="center">
                                    <h5>Hotel:</h5>
                                </div>
                                <div class="col-md-3">
                                    <select name="hotel" class="form-control" required>
                                        <option value="" disabled></option>';
                                        switch($row["HotelID"]){
                                            case "1":
                                                echo'
                                                <option value="1" selected="selected">New Siam I</option>
                                                <option value="2">New Siam II</option>
                                                <option value="3">New Siam III</option>
                                                <option value="4">New Siam River Side</option>
                                                <option value="5">New Siam Palace Ville</option>';
                                            break;
                                            case "2":
                                                echo'
                                                <option value="1">New Siam I</option>
                                                <option value="2" selected="selected">New Siam II</option>
                                                <option value="3">New Siam III</option>
                                                <option value="4">New Siam River Side</option>
                                                <option value="5">New Siam Palace Ville</option>';
                                            break;
                                            case "3":
                                                echo'
                                                <option value="1">New Siam I</option>
                                                <option value="2">New Siam II</option>
                                                <option value="3" selected="selected">New Siam III</option>
                                                <option value="4">New Siam River Side</option>
                                                <option value="5">New Siam Palace Ville</option>';
                                            break;
                                            case "4":
                                                echo'
                                                <option value="1">New Siam I</option>
                                                <option value="2">New Siam II</option>
                                                <option value="3">New Siam III</option>
                                                <option value="4" selected="selected">New Siam River Side</option>
                                                <option value="5">New Siam Palace Ville</option>';
                                            break;
                                            case "5":
                                                echo'
                                                <option value="1">New Siam I</option>
                                                <option value="2">New Siam II</option>
                                                <option value="3">New Siam III</option>
                                                <option value="4">New Siam River Side</option>
                                                <option value="5" selected="selected">New Siam Palace Ville</option>';
                                            break;
                                        }
                                    echo'</select>
                                </div>';
                                //Room Capacity
                                echo'<div class="col-md-2"></div>
                                <div class="col-md-2" align="center">
                                    <h5>Capacity:</h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="capacity" class="form-control" max="9" min="0" value="'.$row["Capacity"].'" placeholder="'.$row["Capacity"].'">
                                </div>
                            </div>';

                            echo'<div class="row align-items-center">';
                                //Room Name
                                echo'<div class="col-md-2" align="center">
                                    <h5>Room Name:</h5>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="roomname" class="form-control" maxlength="30" value="'.$row["RoomName"].'" placeholder="'.$row["RoomName"].'">
                                </div>
                                <div class="col-md-2"></div>';
                                //Room Price
                                echo'<div class="col-md-2" align="center">
                                    <h5>Price:</h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="price" maxlength="4" class="form-control" value="'.$row["Price"].'" placeholder="'.$row["Price"].'">
                                </div>
                            </div>';

                            echo'<div class="row align-items-center">';
                                //Room Description
                                echo'<div class="col-md-2" align="center">
                                    <h5>Room Description:</h5>
                                </div>
                                <div class="col-md-5">
                                    <textarea type="text" name="description" rows="4" maxlength="1000" class="form-control" placeholder="'.$row["RoomDescription"].'">'.$row["RoomDescription"].'</textarea>
                                    <p style="color:grey; font-size:12px;">1000 characters max.</p>
                                </div>';
                                //Room Amount
                                echo'<div class="col-md-2" align="center">
                                    <h5>Room Amount:</h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="rAmount" class="form-control" max="999" min="0" value="'.$row["RoomAmount"].'" placeholder="'.$row["RoomAmount"].'">
                                </div>
                                <div class="col"></div>
                            </div>';


                            //Post StaffID to the next page
                            echo '<input type="text" name="editid" class="hidden" value="'.$_GET["roomtypeID"].'">';

                            //Submit button
                            echo'<div class="row align-items-center">
                                <div class="col-md-12" align="center">
                                    <br>
                                    <input type ="submit" value="Submit"  class="btn btn-warning btn-lg">
                                </div>
                            </div>';
                        }

                    ?>
                </form>

            </div>
            <div class="column side" style="background-color:#f1f1f1;"></div>
        </div>

    </body>
</html>