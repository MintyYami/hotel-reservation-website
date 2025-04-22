<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="style.css">
    </head>
    <body>

        <?php
        include_once "navbar.php";  
        ?>

        <div class="row">
            <div class="column side" style="height: 1050px;"></div>
            <div class="column middle">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Images for slider -->
                    <div class="carousel-inner">
                        <div class="item active">
                        <img src="Slider/Home/IMG_1.jpeg">
                        <div class="carousel-caption">
                            <h3>Welcome to New Siam Hotel</h3>
                            <p>Experience Bangkok like never before!</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Home/IMG_2.jpeg">
                        <div class="carousel-caption">
                            <p>Swim in a pool with the view of the Chao Phraya River</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Home/IMG_3.jpg">
                        <div class="carousel-caption">
                            <p>Modern and reasonable pricing</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Home/IMG_4.jpeg">
                        <div class="carousel-caption">
                            <p>Restaurant integrated</p>
                        </div>
                        </div>
                    </div>

                    <!-- Left and right buttons to control the slider -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div style="padding: 20px;">
                    <h3>History of New Siam</h3>
                    <hr>
                    <p>In 1984, we opened the original Siam Guest House at the corner of Khaaosan road. Although the rooms were very small, we kept them neat and clean. We were also always helpful and friendly to the guests. As our guest house built better reputation and become more popular, we were able to open a nicer guest house in a quieter location behind the Chanasongkram Temple. We name this building the New Siam Guest House, which eventually became <i>New</i> Siam I. Currently we now have up to five accommodation buildings, called New Siam I, New Siam II, New Siam III, New Siam Riverside and New Siam Palace View, and has now upgraded from the status of guest houses to hotels.</p>
                    <br>

                    <h3>Location</h3>
                    <hr>
                    <p>All of the New Siam hotels are located between the Chanasongkram Temple and the Chao Phraya River. This situated the hotels right at the heart of the Old City in Bangkok, and is close to many important attractions, including the Grand Palace, Wat Pra Kaew (The Temple of the Emerald Buddha), Wat Pho (The temple with the great reclining Buddha), Wat Arun (the Temple of Dawn), Thammasat University, the National Art Gallery, the National Museum and the National Theater.</p>
                </div>

            </div>
            <div class="column side" style="height: 1050px"></div>
        </div>

    </body>
</html>

