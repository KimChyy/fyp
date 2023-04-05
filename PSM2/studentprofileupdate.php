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
    <title>Edit Job</title>
</head>
<body>
    <div class="update-profile">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM 'user' WHERE id = '$id'")
        or die('query failed');
        if(mysqli_num_rows($select) >0){
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>
    </div>
</body>
</html>