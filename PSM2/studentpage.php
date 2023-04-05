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
    <title>Hi!,<?php echo $_SESSION['student_name'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="CSS/studentpage.css">
</head>
<body>
    <header>
        <a href="studentpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="resume.php">Resume Generator</a></li>
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
    <br>
    <br>
    <br>
    <div class="container mt-4">

    <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Internship Job</h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Job Name</th>
                                <th>Company Email</th>
                                <th>Interview type</th>
                                <th>Job Description</th>
                                <th>Job Scope</th>
                                <th>Job Address</th>
                                <th>Job Duration</th>
                                <th>Company Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM job";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $job)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $job['jobname']; ?></td>
                                            <td><?= $job['jobemail']; ?></td>
                                            <td><?= $job['jobinterview']; ?></td>
                                            <td><?= $job['jobdesc']; ?></td>
                                            <td><?= $job['jobscope']; ?></td>
                                            <td><?= $job['jobadd']; ?></td>
                                            <td><?= $job['jobdur']; ?></td>
                                            <td><?= $job['Company_name']; ?></td>
                                            <td>
                                                <a href="studentapplyform.php" class="btn btn-success btn-sm">Apply</a>
                                                <a href="studentviewjob.php?id=<?= $job['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                                else 
                                {
                                    echo "<h5> No Record Found</h5>";
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>    
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>    
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
} );
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
