<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) >0){

        $row = mysqli_fetch_array($result);
        
        if($row['role'] == 'student'){
            
            $_SESSION['student_name'] = $row['name'];
            header('location:studentpage.php');

        }elseif($row['role'] == 'company'){
            
            $_SESSION['company_name'] = $row['name'];
            header('location:companypage.php');

        }elseif($row['role'] == 'admin'){
            
            $_SESSION['admin_name'] = $row['name'];
            header('location:adminpage.php');
        }
    }else {
        $error[] = 'Incorrect email or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">UMP IAS</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="service.php">SERVICES</a></li>
                    <li><a href="report.php">REPORT</a></li>
                </ul>
            </div>
        </div>
            <div class="content">
                <h1>Internship <br><span>Application</span> System</h1>
                <p>This is my final year project Web application. This is <br>
                   an internship application system for UMP undergraduate student<br>
                   to find their suitable <b>INTERNSHIP</b> placement to complete their bachelor studies.</p>

                   <button class="cn"><a href="register.php">REGISTER</a></button>                   

                <div class="form">
                   <form action="" method="post">
                   <h2>Login now</h2>
                       <?php
                            if(isset($error)){
                               foreach($error as $error){
                               echo '<span class="error-msg">'.$error.'</span>';
                               };
                            };
                        ?>
                       <input type="email" name="email" required placeholder="Enter your email">
                       <input type="password" name="password" required placeholder="Enter your password">
                       <input type="submit" name="submit" value="Login now" class="form-btn">
                </form>
            </div> 
       </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="Script/chat.js"></script>
<script src="Script/responses.js"></script>
</html>