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
    <title>Add Job for <?php echo $_SESSION['company_name'] ?></title>
    <link rel="stylesheet" href="CSS/companyaddjob.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<header>
    <div class="logo"><h1><?php echo $_SESSION['company_name'] ?></h1></div>
</header>
<br>
<br>
<br>
    <div class="container mt-5"> 
    <?php include('message.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Job Add
                            <a href="companypage.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <div class="mb-3">
                                 <label>Job Name</label>
                                 <input type="text" class="form-control" name="jobname">
                            </div>
                            <div class="mb-3">
                                 <label>Company Email</label>
                                 <input type="email" class="form-control" name="jobemail">
                            </div>
                            <div class="mb-3">
                                 <label>Interview Session</label>
                                 <input type="text" class="form-control" name="jobinterview">
                            </div>
                            <div class="mb-3">
                                 <label>Job Description</label>
                                 <textarea  rows="5" cols="80" class="form-control" name="jobdesc"></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Job Scope</label>
                              <textarea  rows="5" cols="80" class="form-control" name="jobscope"></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Job Address</label>
                              <input type="text" class="form-control" name="jobadd">
                            </div>
                            <div class="mb-3">
                              <label>Job Duration</label>
                              <input type="text" class="form-control" name="jobdur">
                            </div>
                            <div class="mb-3">
                              <label>Company Name</label>
                              <select class="form-control" name="company_name">
                                <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=".$row["name"].">".$row["name"]."</option>";
                                    }
                                ?>
                             </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_job" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>