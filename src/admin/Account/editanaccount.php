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
        <title>Edit Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php"
        ?>

        <div class="row">

            <div class="column side"></div>
            <div class="column middle">
                <h1>Edit Account</h1>
                <hr>
                
                <!-- Button to delete account-->
                <form onSubmit="if(!confirm('Are you sure you want to delete this account? This action cannot be undone.')){return false;}" action="deleteaccountprocess.php" method="post">
                    <div class="col-md" align="right">
                        <?php
                            echo '<button name="deleteid" type="submit" value="'.$_GET["editid"].'" class="btn btn-danger">Delete Account</button>'
                        ?>
                    </div>
                </form>

                <form action="editanaccountprocess.php" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Staff ID:</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <h5>
                                <?php
                                    echo $_GET["editid"]
                                ?>
                            </h5>
                        </div>
                        <div class="col"></div>
                    </div>

                    <?php
                        //For retrieving information of the account that is being edit
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblStaff WHERE StaffID = :id");
                        $stmt->bindParam(':id', $_GET["editid"]);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            //Show staff forename
                            echo
                            '<div class="row align-items-center">
                                <div class="col-md-2" align="center">
                                    <h5>First Name:</h5>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="staffnamef" class="form-control" value="'.$row["StaffNameF"].'" placeholder="'.$row["StaffNameF"].'">
                                </div>
                                <div class="col"></div>
                            </div>';
                            //Show staff surname
                            echo
                            '<div class="row align-items-center">
                                <div class="col-md-2" align="center">
                                    <h5>Last Name:</h5>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="staffnamel" class="form-control" value="'.$row["StaffNameL"].'" placeholder="'.$row["StaffNameL"].'">
                                </div>
                                <div class="col"></div>
                            </div>';
                            //Show staff surname
                            echo
                            '<div class="row align-items-center">
                                <div class="col-md-2" align="center">
                                    <h5>Password:</h5>
                                </div>
                                <div class="col-md-3">
                                <input type="password" name="password" class="form-control" placeholder="Enter to change">
                                </div>
                                <div class="col"></div>
                            </div>';
                            //Show staff role
                            echo
                            '<div class="row align-items-center">
                                <div class="col-md-2" align="center">
                                    <h5>Last Name:</h5>
                                </div>
                                <div class="col-md-3">';
                                    switch($row["Role"]){
                                        case "0":
                                            echo'
                                            <input type="radio" name="role" value="recept" checked> Receptionist<br>
                                            <input type="radio" name="role" value="admin"> Administrator<br><br>';
                                        break;
                                        case "1":
                                            echo'
                                            <input type="radio" name="role" value="recept"> Receptionist<br>
                                            <input type="radio" name="role" value="admin" checked> Administrator<br><br>';
                                        break;
                                    }
                                echo'</div>
                                <div class="col"></div>
                            </div>';
                            //Post StaffID to the next page
                            echo '<input type="text" name="editid" class="hidden" value="'.$_GET["editid"].'">';
                        }
                    ?>

                    <div class="row align-items-center">
                        <div class="col-md-5" align="center">
                            <input type ="submit" value="Save"  class="btn btn-warning btn-lg">
                            <div class="col"></div>
                        </div>
                    </div><br>

                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

