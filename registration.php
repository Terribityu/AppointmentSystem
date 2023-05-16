<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if(isset($_SESSION['username'])){
            header('location:index.php');
        }else{
            if($_SESSION['userType'] == "admin" || $_SESSION['userType'] == "instructor"){
                header('location:admin/index.php');
            }
        }
    }
    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/registration/css/styles.css"></style>
<script src="assets/registration/js/script.js"></script>
<title>Destiny Driving School</title>
</head>
<body> 
    <header>
        <div class="row">
            <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                        <div class="container">
                            <a class="navbar-brand" href="./index.php"><span class="text-warning">Destiny</span>Driving</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                    <a class="nav-link" href="./index.php#banner">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="./index.php#about">About</a>
                                    </li>    
                                    <li class="nav-item">
                                    <a class="nav-link" href="./index.php#testimonials-section">Feedback</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#services" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Services
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                            <li><a class="dropdown-item" href="./tdc.php">TDC</a></li>
                                            <li><a class="dropdown-item" href="./pdc.php">PDC</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="./index.php#team">Team</a>
                                    </li> 
                                    <li class="nav-item">
                                    <a class="nav-link" href="./index.php#contact">Contact</a>
                                    </li>     
                                    <?php 
                                        if(isset($_SESSION['username'])){
                                    ?>
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo $_SESSION['avatar'];?>" alt="" id="nav__avatar">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                            <li><a class="dropdown-item" href="./profile.php"><?php echo $_SESSION['username'];?></a></li>
                                            <li><a class="dropdown-item" href="./myappointments.php">My Appointments</a></li>
                                            <li><a class="dropdown-item" href="./database/registration/logout.php">Logout</a></li>
                                        </ul>
                                    </li>  
                                    <?php
                                        }
                                        else{
                                    ?> 
                                        <li class="nav-item">
                                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Log in</a>
                                        </li>    
                                    <?php
                                        }
                                    ?>   
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
    </header>
    <section id="pdc_banner">
        <div class="text-center navigation">
            <h2>Register an account.</h2>
            <p><span id = "mainmenu" onclick="window.location.href='index.php'">Home</span> / <a href="#">Register</a></p>
        </div>
    </section>
    
    <section id="content">
        <div class="container">
            <h2 class="text-center">Registration Form</h2>
            
            <form id="registrationForm">
                <div class="form_details mb-4">
                    <div class="row text-center form_details_header">
                        <h2>Full Name</h2>
                    </div>
                    
                    <div class="row form_details_body">
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="middlename">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="lastname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="suffix">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix"></input>
                        </div>
                    </div>
                </div>
                <div class="form_details mb-4">
                    <div class="row text-center form_details_header">
                        <h2>Additional Info</h2>
                    </div>
                    
                    <div class="row form_details_body">
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" max="<?php echo date('Y-12-31', strtotime('-17 years')); ?>" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="gender">Gender <span id="form_required">*</span></label>
                            <select class="form-select" required name="gender" aria-label="Default select example">
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="civilstatus">Civil Status <span id="form_required">*</span></label>
                            <select class="form-select" name="civilstatus" required aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="col-md-7 mb-2">
                            <label id="formlabel" for="address">Complete Address <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="address" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label id="formlabel" for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                    </div>
                </div>
                <div class="form_details mb-4">
                    <div class="row text-center form_details_header">
                        <h2>Account Details</h2>
                    </div>
                    
                    <div class="row form_details_body">
                        <div class="col-md-4">
                            <div class="input-group mb-2 mr-sm-2 image-upload d-flex justify-content-center">
                                <label id="formlabel" for="image">
                                <img src="assets/registration/img/avatar.jpg" title="Upload Image" alt="assets/registration/img/upimg.png" id="preview"/>
                                </label>
                                <input type="file" class="form-control" id = "image" name="image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <label id="formlabel" for="mobilenumber">Mobile Number (0 is not Included) <span id="form_required">*</span></label>
                                    <input type="number " id="mobilenum" class="form-control" name="mobilenumber" minlength="10" maxlength="10" required></input>
                                    <span id="id_number_error" class="error"></span>
                                    <a id = "sendotp" class = "sendotp" href>Send OTP verication Code.</a>
                                </div>
                                <div class="col-md-2">
                                    <label id="formlabel" for="emailotp">OTP <span id="form_required">*</span></label>
                                    <input type="number" id="otp" disabled class="form-control" name="emailotp" required></input>
                                </div>
                                <div class="col-md-5">
                                    <label id="formlabel" for="email">Email <span id="form_required">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" required></input>
                                </div>
                                <div class="col-md-4">
                                    <label id="formlabel" for="username">Username <span id="form_required">*</span></label>
                                    <input type="text" class="form-control" name="username" required></input>
                                </div>
                                <div class="col-md-4">
                                    <label id="formlabel" for="password">Password <span id="form_required">*</span></label>
                                    <input type="password" class="form-control" name="password" required></input>
                                </div>
                                <div class="col-md-4">
                                    <label id="formlabel" for="password_cnf">Confirm Password <span id="form_required">*</span></label>
                                    <input type="password" id="password_cnf" class="form-control" name="password_cnf" required></input>
                                    <span id="password_cnf_error" class="error"></span>
                                </div>
                                <input type="hidden" class="form-control" name="avatar" required></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form_button mb-4 d-flex justify-content-center">
                    <input type="submit" class="btn btn-outline-primary" name="btn_register" value="Register">
                </div>
            </form>
        </div>
    </section>

    <!-- End of Services -->
<?php
    include("templates/footer.php")
?>