<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"text/css href="style.css">
    
<style>


</style>
</head>
<body>

<?php
include_once "navbar.php";  
?>

<div class="row">
<div class="column side"></div>
<div class="column middle text-center">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
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
    </div>

    <div class="item">
      <img src="Slider/Home/IMG_3.jpg">
    </div>

    <div class="item">
      <img src="Slider/Home/IMG_4.jpeg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<div class="column side"></div>

</body>
</html> 

