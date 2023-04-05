<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/studentprofile.css">
</head>
<body>
<header>
        <a href="adminpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#"><b><?php echo $_SESSION['admin_name'] ?></b></a>
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                </li>
            </ul>
        </nav>
    </header>
    <h1><?php echo $_SESSION['admin_name'] ?></h1>

    <form action="" method="post">
        <?php
        $query = "SELECT * FROM user WHERE name = '{$_SESSION["admin_name"]}'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="profile">

            <div class="inputbox">
                <span class="details">Name :</span>
                <input type="text" id="admin_name" name="admin_name" value="<?php echo $row['name']?>" disabled required><br><br>
            </div>

            <div class="inputbox">
                <span class="details">Email :</span>
                <input type="email" id="admin_email" name="admin_email" value="<?php echo $row['email']?>" disabled required><br><br>
            </div>

            <div class="inputbox">
                <span class="details">Password :</span>
                <input type="password" id="admin_password" name="admin_password" value="<?php echo $row['password']?>" disabled required><br><br>
            </div>

        <?php

            }
        }
        ?>
    </form>
    </div>
</body>
</html>