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
        <title>View FAQ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php"
        ?>

        <div class="row">

            <div class="column side"></div>
            <div class="column middle">
                <h1>View FAQ</h1>
                <hr>
                
                <?php
                include_once("../connection.php");

                $stmt = $conn->prepare("SELECT * FROM TblFAQ");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo
                    '<button type="button" class="collapsible">'.$row["Question"].'</button>
                    <div class="content">
                        <br>
                        <p>'.$row["Answer"].'</p>
                        <div align="right">
                            <form action="editfaq.php" method="get">
                                <button name="faqID" type="submit" value="'.$row["FAQID"].'" class="btn">Edit</button>
                            </form>
                        </div>
                    </div>';
                }
                ?>

                <script>
                var coll = document.getElementsByClassName("collapsible");
                var i;

                for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                            content.style.display = "none";
                        } else {
                            content.style.display = "block";
                        }
                    });
                }
                </script>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

