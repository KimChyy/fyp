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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="CSS/studentpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/adminpage.css">
</head>
<body>
<header>
        <a href="studentpage.php" class="logo">UMP IAS</a>

        <nav class="navbar">
            <ul>
                <li><a href="studentrg.php">User</a></li>
                <li><a href="studentit.php">Job</a></li>
                <li><a href="#"><b><?php echo $_SESSION['admin_name'] ?></b></a>
                <ul>
                    <li><a href="adminprofile.php">Profile</a></li>
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

    <div class="container mt-5"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Job Details
                            <a href="adminjob.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM job WHERE id='$id'";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $job = mysqli_fetch_array($query_run);
                                ?>
                                    <input type="hidden" name="id" value="<?= $job['id'];?>">

                                    <div class="mb-3">
                                      <label>Job Name</label>
                                      <p class="form-control">
                                      <?= $job['jobname']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                      <label>Company Email</label>
                                      <p class="form-control">
                                      <?= $job['jobemail']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                      <label>Interview type</label>
                                      <p class="form-control">
                                      <?= $job['jobinterview']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                      <label>Job Description</label>
                                      <p class="form-control">
                                      <?= $job['jobdesc']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                       <label>Job Scope</label>
                                       <p class="form-control">
                                      <?= $job['jobscope']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                       <label>Job Address</label>
                                       <p class="form-control">
                                      <?= $job['jobadd']; ?>
                                      </p>
                                    </div>
                                    <div class="mb-3">
                                       <label>Job Duration</label>
                                       <p class="form-control">
                                      <?= $job['jobdur']; ?>
                                      </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No such Id found</h4>";
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
