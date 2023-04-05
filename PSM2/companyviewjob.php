<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['company_name'])){
    header('location:login.php');
}
$sql="SELECT * FROM user WHERE role = 'company'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
    <link rel="stylesheet" href="CSS/companyviewjob.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="logo"><h1>UMP IAS</h1></div>
</header>
<br>
<br>
<br>
    <div class="container mt-5"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Job Details
                            <a href="companypage.php" class="btn btn-danger float-end">BACK</a>
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