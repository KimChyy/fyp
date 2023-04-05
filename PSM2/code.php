<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['company_name'])){
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
        header("location: companypage.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Deleted Successfully";
        header("location: companypage.php");
        exit(0);
    }
}

if(isset($_POST['update_job']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $jobname = mysqli_real_escape_string($conn, $_POST['jobname']);
    $jobemail = mysqli_real_escape_string($conn, $_POST['jobemail']);
    $jobinterview = mysqli_real_escape_string($conn, $_POST['jobinterview']);
    $jobdesc = mysqli_real_escape_string($conn, $_POST['jobdesc']);
    $jobscope = mysqli_real_escape_string($conn, $_POST['jobscope']);
    $jobadd = mysqli_real_escape_string($conn, $_POST['jobadd']);
    $jobdur = mysqli_real_escape_string($conn, $_POST['jobdur']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);

    $query = "UPDATE job SET jobname='$jobname', jobemail='$jobemail', jobinterview = '$jobinterview', jobdesc='$jobdesc', jobscope='$jobscope', jobadd='$jobadd', jobdur='$jobdur', Company_name='$company_name' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Job Updated Successfully";
        header("location: companypage.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Updated";
        header("location: companypage.php");
        exit(0);
    }
}

if(isset($_POST['save_job']))
{
    $jobname = mysqli_real_escape_string($conn, $_POST['jobname']);
    $jobemail = mysqli_real_escape_string($conn, $_POST['jobemail']);
    $jobinterview = mysqli_real_escape_string($conn, $_POST['jobinterview']);
    $jobdesc = mysqli_real_escape_string($conn, $_POST['jobdesc']);
    $jobscope = mysqli_real_escape_string($conn, $_POST['jobscope']);
    $jobadd = mysqli_real_escape_string($conn, $_POST['jobadd']);
    $jobdur = mysqli_real_escape_string($conn, $_POST['jobdur']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);

    $query = " INSERT INTO job (jobname,jobemail,jobinterview,jobdesc,jobscope,jobadd,jobdur,Company_name) VALUES ('$jobname','$jobemail','$jobinterview', '$jobdesc','$jobscope','$jobadd','$jobdur','$company_name')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Job created successfully";
        header("location:companyaddjob.php");
        exit(0);
    }else
    {
        $_SESSION['message'] = "Job not successfully";
        header("location:companyaddjob.php");
        exit(0);
    }
}
?>