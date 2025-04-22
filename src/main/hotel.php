<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hotel & Reservation</title>
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
            <div class="column side" style="height: 3400px"></div>
            <div class="column middle">

                <!-- Image slider -->
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
                        <img src="Slider/Hotel/IMG_1.jpeg">
                        <div class="carousel-caption">
                            <h3>Book your room now!</h3>
                            <p>Or see more information on each hotel below</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Hotel/IMG_2.jpg">
                        <div class="carousel-caption">
                            <p>Enjoy the lounge</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Hotel/IMG_3.jpeg">
                        <div class="carousel-caption">
                            <p>Take advantage of the hotel amenities</p>
                        </div>
                        </div>

                        <div class="item">
                        <img src="Slider/Hotel/IMG_4.jpeg">
                        <div class="carousel-caption">
                            <p>Clean and comfortable beds</p>
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
                    <!-- Book Reservation -->
                    <form action="addreservation.php" align="right">
                        <input type ="submit" value="Book Reservation" class="btn btn-warning btn-lg">
                    </form>

                    <!-- Nes Siam I -->
                    <div class="row" style="padding: 20px;">
                        <h3>New Siam I</h3>
                        <hr>
                        
                        <p>New Siam I is an inexpensive guest house which is clean and provide guests with friendly services and a range of different types of rooms. There are single rooms with fans and shared bathrooms, and there are double rooms with either a fan and shared bathrooms or air-conditioning and a private bathroom with a hot shower. All of the rooms are clean and lit with bright tile floors and a window. There is a restaurant on the ground floor with a small tropical garden and a fishpond, and room service is available on demand.</p>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-ok"></span> restaurant</p>
                            <p><span class="glyphicon glyphicon-ok"></span> coffee bar</p>
                            <p><span class="glyphicon glyphicon-ok"></span> internet access</p>
                            <p><span class="glyphicon glyphicon-ok"></span> laundry service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> counter tour service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> safe and locker service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> luggage storage service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> airport taxi service</p>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <p><b>Location</b></p>
                            <p>21 New Siam Guest House, <p>
                            <p>Soi Chana Songkhram, Phra Arthit Road, </p>
                            <p>Chana Songkhram, Phra Nakhon, </p>
                            <p>Bangkok 10200, Thailand</p>
                            <br>
                            <p><b>Tel:</b> +66 2282 4554</p>
                        </div>
                    </div>
                    <!-- Nes Siam II -->
                    <div class="row" style="padding: 20px;">
                        <h3>New Siam II</h3>
                        <hr>
                            
                        <p>New Siam II is a lovely guest house with bright, clean rooms, friendly service, an elevator and a swimming pool. There are double rooms (each with a double bed), twin rooms (each with two single beds) and triple rooms (with three single beds). All rooms have a clean private bathroom, cable television, a safe, a large window, and a keycard lock. The double and twin rooms either have a fan or air-conditioning, while the triple rooms are all air-conditioned. The air-conditioned rooms all have hot-water showers. There is a restaurant on the ground floor, and room service is available on demand.</p>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-ok"></span> restaurant</p>
                            <p><span class="glyphicon glyphicon-ok"></span> coffee bar</p>
                            <p><span class="glyphicon glyphicon-ok"></span> internet access</p>
                            <p><span class="glyphicon glyphicon-ok"></span> laundry service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> counter tour service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> safe and locker service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> luggage storage service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> satellite and cable TV</p>
                            <p><span class="glyphicon glyphicon-ok"></span> swimming pool with jacuzzi</p>
                            <p><span class="glyphicon glyphicon-ok"></span> airport taxi service</p>
                            
                        </div>
                        <div class="col-md-6">
                            <br>
                            <p><b>Location</b></p>
                            <p>50 New Siam 2 Guest House, <p>
                            <p>Trok Rong Mai, Phra Arthit Road, </p>
                            <p>Chana Songkhram, Phra Nakhon, </p>
                            <p>Bangkok 10200, Thailand</p>
                            <br>
                            <p><b>Tel:</b> +66 2629 0101</p>
                        </div>
                    </div>
                    <!-- Nes Siam III -->
                    <div class="row" style="padding: 20px;">
                        <h3>New Siam III</h3>
                        <hr>
                            
                        <p>New Siam III is located in the center of the tourist area. Spacious and private atmosphere, clean, modern and friendly staffs, new building with full facilities, air conditioner., television, refrigerator, safe in room. Every room has window, nice decoration and keycard lock. There are double room, twin room and triple room (three single bed). All rooms have a clean private bathroom. Coffee corner and internet service on the ground floor.</p>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-ok"></span> restaurant</p>
                            <p><span class="glyphicon glyphicon-ok"></span> coffee bar</p>
                            <p><span class="glyphicon glyphicon-ok"></span> internet access</p>
                            <p><span class="glyphicon glyphicon-ok"></span> laundry service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> counter tour service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> safe and locker service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> luggage storage service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> airport taxi service</p>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <p><b>Location</b></p>
                            <p>7 New Siam 3 Guest House, <p>
                            <p>Soi Ram Butri, Chakrabongse Road, </p>
                            <p>Chana Songkhram, Phra Nakhon, </p>
                            <p>Bangkok 10200, Thailand</p>
                            <br>
                            <p><b>Tel:</b> +66 2629 4844</p>
                        </div>
                    </div>
                    <!-- Nes Siam River Side -->
                    <div class="row" style="padding: 20px;">
                        <h3>New Siam River Side</h3>
                        <hr>
                            
                        <p>New Siam River Side is the luxury Guesthouse that located on the Chaophaya River, in tourist area of Bangkok, near the Grand Palace. The Building is water cool air conditioned with a good restaurant and a beautiful swimming pool next to the river. A breakfast buffet is offered to you with our proud. The bed are of the highest quality latex foam rubber, as used in the best hotels, and each room is equipped with cable TV, a safe bedside control and a refrigerator. High-Speed Internet access is available in all guest room.(All room are none smoking)</p>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-ok"></span> restaurant</p>
                            <p><span class="glyphicon glyphicon-ok"></span> coffee bar</p>
                            <p><span class="glyphicon glyphicon-ok"></span> internet access</p>
                            <p><span class="glyphicon glyphicon-ok"></span> laundry service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> counter tour service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> safe and locker service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> luggage storage service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> satellite and cable TV</p>
                            <p><span class="glyphicon glyphicon-ok"></span> swimming pool with jacuzzi</p>
                            <p><span class="glyphicon glyphicon-ok"></span> airport taxi service</p>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <p><b>Location</b></p>
                            <p>21 New Siam Riverside, <p>
                            <p>Phra Arthit Road, </p>
                            <p>Chana Songkhram, Phra Nakhon, </p>
                            <p>Bangkok 10200, Thailand</p>
                            <br>
                            <p><b>Tel:</b> +66 2629 3535</p>
                        </div>
                    </div>
                    <!-- Nes Siam Palace Ville -->
                    <div class="row" style="padding: 20px;">
                        <h3>New Siam Palace Ville</h3>
                        <hr>
                            
                        <p>New Siam Palace View is an excellent choice if you are looking for a calm and quiet location near Khao San Road area that still puts you close to the action of city. It is located within easy walking distance of many of Bangkok's must-see destinations including: Khao San Road, the Grand Palace, the Temple of the Dawn, and a number of museums.</p>
                        <P>New Siam Palace View offers impeccable service and all the essential amenities to invigorate travellers. Free Wi-Fi in all rooms, 24-hour front desk, luggage storage, Wi-Fi in public areas, and a laundry service are just a few of the facilities that set New Siam Palace View apart from other hotels in the city.</p>
                        <P>The hotel features 100 beautifully appointed guest rooms that come with: air conditioning, television, Wi-Fi, hot water, mini-fridge, balcony, and in room safe. The hotel also offers fantastic facilities including a beautiful outdoor pool to help you unwind and cool off after a busy day in the city.</p>
                        <div class="col-md-6">
                            <p><span class="glyphicon glyphicon-ok"></span> restaurant</p>
                            <p><span class="glyphicon glyphicon-ok"></span> coffee bar</p>
                            <p><span class="glyphicon glyphicon-ok"></span> internet access</p>
                            <p><span class="glyphicon glyphicon-ok"></span> laundry service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> counter tour service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> safe and locker service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> luggage storage service</p>
                            <p><span class="glyphicon glyphicon-ok"></span> satellite and cable TV</p>
                            <p><span class="glyphicon glyphicon-ok"></span> swimming pool with jacuzzi</p>
                            <p><span class="glyphicon glyphicon-ok"></span> airport taxi service</p>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <p><b>Location</b></p>
                            <p>54, 56, 58 New Siam Palace Ville, <p>
                            <p>Trok Rong Mai, Chao Fa Road, </p>
                            <p>Chana Songkhram, Phra Nakhon, </p>
                            <p>Bangkok 10200, Thailand</p>
                            <br>
                            <p><b>Tel:</b> +66 2282 4142</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column side" style="height: 3400px"></div>

    </body>
</html>

