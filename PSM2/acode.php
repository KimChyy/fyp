<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login.php');
}

if(isset($_POST['delete_job']))
{
    $id = mysqli_real_escape_string($conn, $_POST['delete_job']);
    $query = "DELETE FROM job WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Job Deleted Successfully";
        header("location: adminjob.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Deleted Successfully";
        header("location: adminjob.php");
        exit(0);
    }
}

if(isset($_POST['delete_user']))
{
    $id = mysqli_real_escape_string($conn, $_POST['delete_user']);
    $query = "DELETE FROM job WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Job Deleted Successfully";
        header("location: adminuser.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Deleted Successfully";
        header("location: adminuser.php");
        exit(0);
    }
}

?>