<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['student_name'])){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Webinar</title>
    <link rel="stylesheet" href="CSS/studentit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>
<body>
<header>
        <a href="studentpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="#">Resume Generator</a></li>
                <li><a href="#">Intern Webinar</a></li>
                <li><a href="#">Career Advice</a></li>
                <li><a href="#"><b><?php echo $_SESSION['student_name'] ?></b></a>
                <ul>
                    <li><a href="studentprofile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <div class="container">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><video src="CSS/videos/iw1.mp4"  controls></video></div>
                <div class="swiper-slide"><video src="CSS/videos/iw2.mp4" controls></video></div>
                <div class="swiper-slide"><video src="CSS/videos/iw3.mp4" controls></video></div>
                <div class="swiper-slide"><video src="CSS/videos/iw4.mp4" controls></video></div>


            </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {

        loop: true,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    </script>
</body>
</html>