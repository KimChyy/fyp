<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['company_name'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['company_name'] ?>, Profile</title>
    <link rel="stylesheet" href="CSS/companyprofile.css">
</head>
<body>
<header>
    <div class="logo"><h1><?php echo $_SESSION['company_name'] ?></h1></div>
    <ul>
        <li><a href="companyupdateprofile.php">Edit profile</a></li>
        <li><a href="companypage.php">Back</a></li>
    </ul>
</header>
<br>
<br>
<br>
<br>
<br>
    <h1>IAS UMP</h1>

    <form action="" method="post">
        <?php
        $query = "SELECT * FROM user WHERE name = '{$_SESSION["company_name"]}'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="profile">

            <div class="inputbox">
                <span class="details">Company Name :</span>
                <input type="text" id="company_name" name="company_name" value="<?php echo $row['name']?>" disabled required><br><br>
            </div>

            <div class="inputbox">
                <span class="details">Company Email :</span>
                <input type="email" id="company_email" name="company_email" value="<?php echo $row['email']?>" disabled required><br><br>
            </div>

            <div class="inputbox">
                <span class="details">Company Password :</span>
                <input type="password" id="company_password" name="company_password" value="<?php echo $row['password']?>" disabled required><br><br>
            </div>

        <?php

            }
        }
        ?>
    </form>
    </div>
</body>
</html>