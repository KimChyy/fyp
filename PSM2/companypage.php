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
    <title>Hi!,<?php echo $_SESSION['company_name'] ?></title>
    <link rel="stylesheet" href="CSS/companypage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body>

<header>
    <input type="checkbox" name="" id="chk1">
    <div class="logo"><h1>UMP IAS</h1></div>
    <ul>
        <li><a href="companyprofile.php"><?php echo $_SESSION['company_name'] ?></a></li>
        <li><a href="index.php">Logout</a></li>
    </ul>
    <div class="menu">
        <label for="chk1">
            <i class="fa fa-bars"></i>
        </label>
    </div>
</header>
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
                        <h4 >Job Details
                            <a href="companyaddjob.php" class="btn btn-primary float-end">Add Job</a>
                        </h4>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM job WHERE Company_name = '".$_SESSION['company_name']."'";
                        $query_run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($query_run)>0)
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
                                <td>
                                    <a href="companyviewjob.php?id=<?= $job['id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="companyeditjob.php?id=<?= $job['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="code.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_job" value="<?= $job['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                </tr>
                                <?php
                            }
                        }else
                        {
                            echo"<h5> No record found </h5>";
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