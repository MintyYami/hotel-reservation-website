<?php
session_start();
if (!isset($_SESSION['role'])) {   
    header("Location:Login/logout.php");
}
$_SESSION['currentpage'] = $_SERVER['SCRIPT_NAME'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
        /* Style the button that is used to open and close the collapsible content */
        .collapsible {
        background-color: #F1F1F1;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border-style: solid solid none solid;
        border-color: white;
        border-width: 5px;
        text-align: left;
        outline: none;
        font-size: 15px;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active, .collapsible:hover {
        background-color: #C0C0C0;
        }

        /* Style the collapsible content. Note: hidden by default */
        .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: white;
        }
        </style>
        
    </head>

    <body>
        <?php
            if($_SESSION['role'] == 1) {
                include_once "Nav/navbaradmin.php";
            }else{
                include_once "Nav/navbar.php";
            }
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle text-center">
                <h1>Home</h1>
                <hr>
                

                <!--  -->


                <script>
                    <?php
                    $_SESSION["allreservedrooms"] = array('1'=>2,'3'=>1,'2'=>8);

                    echo 'console.log("'.$_SESSION["allreservedrooms"].'")';

                    array_push($_SESSION["allreservedrooms"], 1, $_SESSION["allreservedrooms"][1] + 1);

                    ?>

                    function dateList(start, end) {
                        for(var arr=[],day=new Date(start); day<=end; day.setDate(day.getDate()+1)){
                            var currentday = new Date(day);
                            var dd = currentday.getDate();
                            var mm = currentday.getMonth() + 1; //January is 0
                            var yyyy = currentday.getFullYear();

                            if (dd < 10) {
                            dd = '0' + dd;
                            }
                            if (mm < 10) {
                            mm = '0' + mm;
                            } 
                            currentday = yyyy + '-' + mm + '-' + dd;
                            arr.push(currentday);
                        }
                        return arr;
                    };

                    dates = dateList(new Date("2021-01-01"), new Date("2021-01-06"))
                    dates.forEach(function (date) {
                    console.log(date)
                    })

                    function getDates(startDate, stopDate) {
                        var dateArray = [];
                        var currentDate = moment(startDate);
                        var stopDate = moment(stopDate);
                        while (currentDate < stopDate) {
                            dateArray.push( moment(currentDate).format('YYYY-MM-DD') )
                            currentDate = moment(currentDate).add(1, 'days');
                        }
                        return dateArray;
                    }

                    d = getDates(new Date("2021-02-01"), new Date("2021-02-06"))
                    d.forEach(function (date) {
                    console.log(date)
                    })

                </script>

                <h2>Collapsibles</h2>

                <p>A Collapsible:</p>
                <button type="button" class="collapsible">Open Collapsible</button>
                <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

                <p>Collapsible Set:</p>
                <button type="button" class="collapsible">Open Section 1</button>
                <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <button type="button" class="collapsible">Open Section 2</button>
                <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <button type="button" class="collapsible">Open Section 3</button>
                <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

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

            <div class="slideshow-container">

            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img_nature_wide.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img_snow_wide.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img_mountains_wide.jpg" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>

            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
            </div>

            <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
            showSlides(slideIndex += n);
            }

            function currentSlide(n) {
            showSlides(slideIndex = n);
            }

            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            }
            </script>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

