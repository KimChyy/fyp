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
    <title>Resume Generator</title>
    <link rel="stylesheet" href="CSS/resume.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" id="cv-form">
        <h1 style="color: #fff;" class="text-center my-2">Resume Generator</h1>
        <p style="color: #fff;" class="text-center">By Internship Application System</p>
    
        <div class="row">
            <div class="col-md-6">
                <h3 style="color: #fff;">Personal Information</h3>
                    <div class="form-group">
                        <label style="color: #fff;" for="nameField">Your Name</label>
                        <input type="text" id="nameField" placeholder="Enter your name" class="form-control"/>
                    </div>
                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="contactField">Your Contact Number</label>
                        <input type="text" id="contactField" placeholder="Enter your contact number" class="form-control"/>
                    </div>
                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="addressField">Your Address</label>
                        <textarea type="text" id="addressField" placeholder="Enter your address" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label style="color: #fff;" for="">Select your profile picture</label>
                        <input id="imgField" type="file" class="form-control">
                    </div>

                    <p style="color: #fff;" class="text-secondary my-3">Important Links</p>

                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="fbField">Facebook</label>
                        <input type="text" id="fbField" placeholder="Your Facebook Link" class="form-control"/>
                    </div>
                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="linkedField">LinkedIn</label>
                        <input type="text" id="linkedField" placeholder="Your Linkedin Link" class="form-control"/>
                    </div>
                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="emailField">Email</label>
                        <input type="text" id="emailField" placeholder="Your Email" class="form-control"/>
                    </div>
            </div>
            <div class="col-md-6">
                <h3 style="color: #fff;">Professional Information</h3>
                    <div class="form-group mt-2">
                        <label style="color: #fff;" for="">Objective</label>
                        <textarea id="objectiveField" rows="5" placeholder="Your Objective" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-2" id="we">
                        <label style="color: #fff;" for="">Work Experience</label>
                        <textarea rows="3" placeholder="Your Work Experience" class="form-control weField"></textarea>

                         <div class="container text-center mt-2" id="weAddButton">
                            <button onclick="addNewWEField()" class="btn btn-primary btn-sm">Add</button>
                         </div>
                    </div>

                    <div class="form-group mt-2" id="aq">
                        <label style="color: #fff;" for="">Academic Qualification</label>
                        <textarea rows="3" placeholder="Your Academic Qualification" class="form-control eqField"></textarea>

                         <div class="container text-center mt-2" id="aqAddButton">
                            <button onclick="addNewAQField()" class="btn btn-primary btn-sm">Add</button>
                         </div>
                    </div>
            </div>
        </div>

        <div class="container text-center mt-3">
            <button onclick="generateCV()" class="btn btn-primary btn-lg">Generate Resume</button>
        </div>
    </div>


    <div class="container" id="cv-template">
        <div class="row">
            <div class="col-md-4 text-center py-5 background">

            <img src="https://media.istockphoto.com/id/1393750072/vector/flat-white-icon-man-for-web-design-silhouette-flat-illustration-vector-illustration-stock.jpg?s=612x612&w=0&k=20&c=s9hO4SpyvrDIfELozPpiB_WtzQV9KhoMUP9R9gVohoU=" 
            alt="" class="img-fluid myimg" id="imgTemplate">
            
            <div class="container">
                <p id="nameT1">G.Anbuchelvan</p>
                <p id="contactT">011 12345678</p>
                <p id="addressT">University Malaysia Pahang Pekan</p>

                <hr />

                <p>
                    <a id="fbT" href="#1">https://www.facebook.com/groups/92273105356/</a>
                </p>
                <p>
                    <a id="emailT" href="#1">admin_jhepa@ump.edu.my</a>
                </p>
                <p>
                    <a id="linkedT" href="#1">https://www.linkedin.com/school/oxforduni/</a>
                </p>
            </div>
            </div>
            <div class="col-md-8 py-5">

            <h1 id="nameT2" class="text-center" style="font-weight: 980;">G.Anbuchelvan</h1>

            <div class="card mt-4">
                <div class="card-header background">
                    <h3>Objective</h3>
                </div>
                <div id="objectiveT" class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium omnis odit nam perspiciatis eveniet eum recusandae culpa ipsum? Voluptatum tempore possimus nulla est saepe veniam numquam explicabo commodi inventore, molestiae autem asperiores tempora laborum suscipit. Rem vel cum officiis! Eum assumenda magnam ullam, itaque temporibus praesentium cupiditate harum doloremque!</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header background">
                    <h3>Work Experience</h3>
                </div>
                <div class="card-body">
                 <ul id="weT" >
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li> 
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li>
                 </ul> 
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header background">
                    <h3>Academic Qalification</h3>
                </div>
                <div class="card-body">
                 <ul id="aqT" >
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, accusamus.</li>
                 </ul> 
                </div>
            </div>

            <div class="container mt-3 text-center">
                <button onclick="printResume()" class="btn btn btn-dark btn-lg">Print Resume</button>
            </div>
            </div>
        </div>
    </div>


    <script src="Script/resume.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>