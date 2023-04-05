<?php
@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $role = $_POST['role'];

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) >0){

        $error[] = 'User already exist!';

    }else{
        
        if($pass != $cpass){
            $error[] = 'Password not matched!';
        }else{
            $insert = "INSERT INTO user (name, email, password, role) VALUES  ('$name','$email','$pass','$role')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <div class="form-container">
    <header>
        <a href="index.php" class="logo">UMP IAS</a>
    </header>
        <form action="" method="post">
            <h3>Register Now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" require placeholder="Enter your name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <select name="role">
                <option value="#">Choose your role</option>
                <option value="student">Student</option>
                <option value="company">Company</option>
            </select>
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>