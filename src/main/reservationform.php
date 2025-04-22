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

        //Change hotal name back to hotel ID
        switch($_POST["hID"]) {
            case 'New Siam I':
                $hotel = 1;
            break;
            case 'New Siam II':
                $hotel = 2;
            break;
            case 'New Siam III':
                $hotel = 3;
            break;
            case 'New Siam River Side':
                $hotel = 4;
            break;
            case 'New Siam Palace Ville':
                $hotel = 5;
            break;
        }

        //Creating session variablews to pass dates and hotelID into the next page
        $_SESSION["hID"] = $hotel;
        $_SESSION["dout"] = $_POST["Dout"];

        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle" style="padding: 20px;">
                <h1>Reserve Room</h1>
                <hr>

                <!-- Row for input labels -->
                <div class="row">
                    <div style="text-align:center">
                        <div class="col-md-4">
                            <h5>Check In: 
                                <i>
                                <?php
                                echo $_POST["Din"];
                                $_SESSION["din"] = $_POST["Din"];
                                ?>
                                </i>
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Check Out:
                                <i>
                                <?php
                                echo $_POST["Dout"];
                                ?>
                                </i>
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Hotel: 
                                <i>
                                <?php
                                echo $_POST["hID"];
                                ?>
                                </i>
                            </h5>
                        </div>
                    </div>
                </div><hr>
                
                <div class="row">
                    <form action="reservationformprocess.php" method="post" id="reservation">
                        <div class="row">
                            <!-- Left Column (Input for guest information) -->
                            <div class="col-md-6">
                                <!-- Lable -->
                                <h3 style="padding-left: 20px;">Guest information</h3>

                                <!-- First Name -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>First Name:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="firstname" class="form-control" maxlength="30" required>
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Last Name:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="lastname" class="form-control" maxlength="30" required>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Email:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="email" class="form-control" maxlength="30" required>
                                    </div>
                                </div>
                                <!-- Arrival Time -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Arrival time:</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="time" name="Atime" class="form-control" max="21:00" required>
                                    </div>
                                </div>
                                <!-- Extra Requirements -->
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        <h5>Extra Requirements:</h5>
                                    </div>
                                    <div class="col-md-8" align="right">
                                        <textarea type="text" name="requirement" rows="4" maxlength="1000" class="form-control"></textarea>
                                        <p style="color:grey; font-size:12px;">1000 characters max.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column (Total price for reservation)-->
                            <div class="col-md-6" style="padding-right: 30px;">
                                <!-- Lable -->
                                <h3>Price</h3>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php
                                        include_once("connection.php");

                                        $totalprice = 0;

                                        //Find room type for the selected hotel
                                        $stmt1 = $conn->prepare("SELECT * FROM TblRoomType WHERE HotelID=:hotel");
                                        $stmt1->bindParam(':hotel', $hotel);
                                        $stmt1->execute();

                                        //Array to get room types and room amount to add to reservation
                                        //Format [RoomType => NumOfRoom]
                                        $_SESSION["allreservedrooms"] = [];

                                        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                                            echo("<tr>");
                                                //Show total rooms booked and total price
                                                if($_POST[$row1["RoomType"]] > 0) { //Only show room type that has at least one room booked
                                                    //Show room name
                                                    echo("<td>".$row1["RoomName"]."</td>");
                                                    //Show room price
                                                    echo("<td>".$row1["Price"]."</td>");
                                                    //Show amount of rooms booked
                                                    echo("<td>".$_POST[$row1["RoomType"]]."</td>");

                                                    //Add cost of room type * num of rooms to total price
                                                    $totalprice = $totalprice + ($row1["Price"]*$_POST[$row1["RoomType"]]);

                                                    //Add room type and amount of rooms to array
                                                    $_SESSION["allreservedrooms"][$row1["RoomType"]] = $_POST[$row1["RoomType"]];
                                                }
                                            echo("</tr>");
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-5" align="right">
                                        <?php
                                        echo '<b>Total Price:</b>';
                                        ?>
                                    </div>
                                    <div class="col-md-3" align="left">
                                        <?php
                                        echo '<p>'.$totalprice.'</p>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>
                <div align="center">
                    <input type ="submit" value="Submit Reservation"  class="btn btn-warning" form="reservation">
                </div>
            </div>
            <div class="column side"></div>
        </div>
    </body>
</html>

