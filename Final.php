<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./style/Final.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/LOGO (1).png" />
    <title>K2K_Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!--navigation bar-->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
            </div>
            <a href=""><img class="logo" src="./images/LOGO (1).png"></a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Home</a></li>
                <li><a href="./contactus.html">Contact Us</a></li>
                <li><a href="./gallery.html">Gallery</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--image container-->
    <div class="wrapper">

        <div class="carousel">

            <button type="button" id="carousel-arrow-prev" class="carousel-arrow carousel-arrow-prev"></button>
            <button type="button" id="carousel-arrow-next" class="carousel-arrow carousel-arrow-next"></button>

            <img id="carousel-0" class="carousel-img carousel-img-displayed" src="./images/k1.jpg" alt="image1" />
            <img id="carousel-1" class="carousel-img carousel-img-noDisplay" src="./images/k2.jpg" alt="image2" />
            <img id="carousel-2" class="carousel-img carousel-img-noDisplay" src="./images/k3.jpg" alt="image3" />
            <img id="carousel-3" class="carousel-img carousel-img-noDisplay" src="./images/k4.jpg" alt="image4" />
            <img id="carousel-4" class="carousel-img carousel-img-noDisplay" src="./images/k5.jpg" alt="image5" />

        </div>

    </div>

    <script type="text/javascript">
    document.getElementById('carousel-arrow-next').addEventListener('click', carouselSwipe, false);
    document.getElementById('carousel-arrow-prev').addEventListener('click', carouselSwipe, false);

    function carouselSwipe() {

        var currentImg = document.getElementsByClassName('carousel-img-displayed')[0].id.substring(9);
        var newImg = parseInt(currentImg);

        if (this.id == 'carousel-arrow-next') {
            newImg++;
            if (newImg >= document.getElementsByClassName('carousel-img').length) {
                newImg = 0;
            }
        } else if (this.id == 'carousel-arrow-prev') {
            newImg--;
            if (newImg < 0) {
                newImg = document.getElementsByClassName('carousel-img').length - 1;
            }
        }

        document.getElementById('carousel-' + currentImg).className = 'carousel-img carousel-img-hidden';

        var displayedCarousel = document.getElementById('carousel-' + newImg);
        displayedCarousel.className = 'carousel-img carousel-img-hidden';
        setTimeout(function() {
            displayedCarousel.className = 'carousel-img carousel-img-displayed';
        }, 20);

        setTimeout(function() {
            document.getElementById('carousel-' + currentImg).className = 'carousel-img carousel-img-noDisplay';
        }, 520);

    }
    </script>

    <h4 style="background-color:skyblue; font-family: sans-serif;">
        <marquee> Dear wanderers! Kindly note: Due to covid protocol we have only limited dates per week. Thank you for
            your
            co-operation. ALL RIGHTS RESERVED @K2K </marquee>
    </h4>

    <!--container-->
    <div class="row">
        <div class="column">
            <div class="image">
                <img class="image_img" src="./images/con1.jpg" alt="1" height="273px" style="padding-left: 10px;">
                <div class="image_overlay">
                    <div class="image_title">Karavali</div>
                    <p class="image_description"><a href="Karavali.html"> The coastal regions of Karnataka</a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="image-2">
                <img class="image_img-2" src="./images/con2.jpg" alt="2">
                <div class="image_overlay-2">
                    <div class="image_title-2">Malenadu</div>
                    <p class="image_description-2"><a href="Malenadu.html"> The rain lands of Karnataka</a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="image-3">
                <img class="image_img-3" src="./images/con3.jpg" alt="3">
                <div class="image_overlay-3">
                    <div class="image_title-3">Bayaluseeme</div>
                    <p class="image_description-3"><a href="Bayaluseeme.html"> The Open lands of Karnataka</a></p>
                </div>
            </div>
        </div>

        <!--footer-->
        <footer class="footer-distributed">

            <div class="footer-left">
                <a href="home.html"><img src="./images/LOGO (1).png"></a>
                <h3>K2K</h3>

                <p class="footer-links">
                    <a href="#">Live</a> |
                    <a href="#">Love</a> |
                    <a href="#">Travel</a>
                </p>
                <p class="footer-company-name">© 2021 K2K Pvt. Ltd.</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>#36, Lalbagh Road</span> Bengaluru - 560047</p>
                </div>

                <div id="cs">
                    <i class="fa fa-phone"></i>
                    <p>+91 9108678437</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:pavankumar.vj09@gmail.com">exploreK2K@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>About the company</span> We strive to provide quality serice to customers who love wandering
                    in nature
                </p>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </footer>
</body>

</html>