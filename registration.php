<?php
    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/registration/css/styles.css"></style>
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
                                    <li class="nav-item">
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Log in</a>
                                    </li>     
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
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="firstname"></input>
                        </div>
                    </div>
                </div>
                <div class="form_details mb-4">
                    <div class="row text-center form_details_header">
                        <h2>Additional Info</h2>
                    </div>
                    
                    <div class="row form_details_body">
                        <div class="col-md-3 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="gender">Gender <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="gender" required></input>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="civilstatus">Civil Status <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="civilstatus" required></input>
                        </div>
                        <div class="col-md-7 mb-2">
                            <label for="province">Complete Address <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="province" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                    </div>
                </div>
                <div class="form_details mb-4">
                    <div class="row text-center form_details_header">
                        <h2>Contact Details</h2>
                    </div>
                    
                    <div class="row form_details_body">
                        <div class="col-md-4">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="mobilenumber" maxlength="10" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="telephone">Telephone Number <span id="form_required"></span></label>
                            <input type="number" class="form-control" name="telephone"></input>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required></input>
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