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
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="form-container">
    <header>
        <a href="index.php" class="logo">UMP IAS</a>
    </header>
        <form action="" method="post">
            <h3>Login Now</h3>
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
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </div>
</body>
</html>