<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['student_name'])){
    header('location:login.php');
}

if(isset($_POST['submit'])) {
    
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    // $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'umpias2600@gmail.com';                 // SMTP username
    $mail->Password = 'kqvijyddhuqtgnyd';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('umpias2600@gmail.com', 'UMP IAS');
    $mail->addAddress($_POST['company_email']);     // Add a recipient             // Name is optional
    $mail->addReplyTo('umpias2600@gmail.com');

    if(isset($_FILES['resume']) && $_FILES['resume']['error'] == 0){
        $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);
    }
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Application Form For Internship by {$_POST['name']}";
    $mail->Body = "From: " . trim($_POST['email']) . "<br>" . nl2br($_POST['introduction']);
    
    if(!$mail->send()) {
        echo "<script>alert('Message could not be sent. Mailer Error: " . $mail->ErrorInfo . "')</script>";
    } else {
        echo "<script>alert('Message has been sent')</script>";
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <link rel="stylesheet" href="CSS/applyform.css">
</head>
<body>
<header>
        <a href="studentpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="studentrg.php">Resume Generator</a></li>
                <li><a href="studentit.php">Industrial Talk</a></li>
                <li><a href="studentiw.php">Intern Webinar</a></li>
                <li><a href="studentca.php">Career Advice</a></li>
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
    <br>
    <div class="container">
        <form method="post" role="form" enctype="multipart/form-data">
            <h3>Application Form</h3>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <input type="email" id="company_email" name="company_email" placeholder="Company Email" required>
            <input type="text" name="introduction" id="introduction" placeholder="Briefly Introduce Yourself" required>
            Upload your resume<input type="file" id="resume" name="resume" required>
            <button type="submit" id="submit" name="submit">Apply</button>
        </form>
    </div>
</body>
</html>