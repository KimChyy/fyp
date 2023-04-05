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
    <title>Career Advice</title>
    <link rel="stylesheet" href="CSS/studentca.css">
</head>
<body>
<header>
        <a href="studentpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="#">Resume Generator</a></li>
                <li><a href="#">Intern Webinar</a></li>
                <li><a href="#">Industrial Talk</a></li>
                <li><a href="#"><b><?php echo $_SESSION['student_name'] ?></b></a>
                <ul>
                    <li><a href="studentprofile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div class="hero">
        <h1>Career Advice</h1>
        <div class="review-box">
            <div id="slide">
                <div class="card">
                    <div class="profile">
                       <a href="https://www.flexjobs.com/blog/post/top-10-career-blogs/"><img src="CSS/images/pic1.jpg" alt=""></a> 
                       <div>
                            <h3>Charlotte Grainger</h3>
                            <p>Blogger</p>
                       </div>
                    </div>
                    <p>What are nonverbal communication skills? Definition and examples</p>
                </div>
                <div class="card">
                    <div class="profile">
                       <a href="https://www.topcv.com/career-advice/what-are-people-skills-definition-and-examples"><img src="CSS/images/pic2.jpg" alt=""></a> 
                       <div>
                            <h3>Laura Slingo</h3>
                            <p>Blogger</p>
                       </div>
                    </div>
                    <p>What are people skills? Definition and examples</p>
                </div>
                <div class="card">
                    <div class="profile">
                       <a href="https://www.topcv.com/career-advice/emergent-strategy-explained-and-how-it-can-boost-your-business-prospects"><img src="CSS/images/pic3.jpg" alt=""></a> 
                       <div>
                            <h3>Elizabeth Openshaw</h3>
                            <p>Blogger</p>
                       </div>
                    </div>
                    <p>Emergent strategy explained - and how it can boost your business prospects</p>
                </div>
                <div class="card">
                    <div class="profile">
                       <a href="https://www.topcv.com/career-advice/how-you-can-develop-strong-work-ethics-and-why-it-matters"><img src="CSS/images/pic4.jpg" alt=""></a> 
                       <div>
                            <h3>Charlotte Grainger</h3>
                            <p>Blogger</p>
                       </div>
                    </div>
                    <p>How you can develop strong work ethics and why it matters</p>
                </div>
             </div> 
              <div class="sidebar">
                <img src="CSS/images/up-arrow.png" id="upArrow">
                <img src="CSS/images/down-arrow.png" id="downArrow">
              </div> 
        </div>
    </div>

    <script>
        var slide = document.getElementById("slide");
        var upArrow = document.getElementById("upArrow");
        var downArrow = document.getElementById("downArrow");

        let x = 0;

        upArrow.onclick = function(){
            if(x > "-900"){
                x = x - 300;
                slide.style.top = x + "px";
            }
        }
        downArrow.onclick = function(){
            if(x < 0){
                x = x + 300;
                slide.style.top = x + "px";
            }
        }
    </script>
</body>
</html>