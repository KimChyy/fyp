<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="CSS/report.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container mt-5"> 
    <?php include('message.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Report
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form name="submit-to-google-sheet">
                            <div class="mb-3">
                                 <label>Name:</label>
                                 <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                 <label>Email:</label>
                                 <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                 <label>Message:</label>
                                 <textarea  rows="3" cols="50" class="form-control" name="message" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Send</button>
                            </div>
                            <span id="success"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbxwYkoTup_2YqU0HjuyBzglFGT8iBjNYjn-D4JTLWEbADnLlRRLuXfIcdDziyW5N-tggg/exec'
  const form = document.forms['submit-to-google-sheet']
  const success = document.getElementById('success')
  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
        success.innerHTML = "Admin received your report, thank you for your report.";
      })
      .catch(error => console.error('Error!', error.message))
  })
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>    
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>