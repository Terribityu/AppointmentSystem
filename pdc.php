<?php
    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/pdc/css/styles.css"></style>
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
            <h2>Practical Driving Course</h2>
            <p>Home / <a href="#">PDC</a></p>
        </div>
    </section>
    
    <section id="content">
        <div class="container">
            <h2 class="text-center">Appointments</h2>
            <ul class="list-group my-3">
                <li class="list-group-item d-flex align-items-center">
                <img src="" style="height:250px; width:250px;" alt="">
                &nbsp;
                <div>  
                    <div class="instruct_name">
                        <h5>Instructor Name</h5>
                        <p>View Bio</p>
                    </div>
                    <div class="instruct_schedules">
                        <span class="badge bg-primary rounded-pill">January 5, 2013 12:00 PM</span>
                        <span class="badge bg-primary rounded-pill">12:00 PM</span>
                        <span class="badge bg-primary rounded-pill">12:00 PM</span>
                        <span class="badge bg-primary rounded-pill">12:00 PM</span>
                    </div>

                </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Appointment 2
                <span class="badge bg-primary rounded-pill">02:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Appointment 3
                <span class="badge bg-primary rounded-pill">03:45 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Appointment 4
                <span class="badge bg-primary rounded-pill">05:15 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Appointment 5
                <span class="badge bg-primary rounded-pill">06:30 PM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Appointment 6
                <span class="badge bg-primary rounded-pill">08:15 PM</span>
                </li>
            </ul>
        </div>
    </section>

    <!-- End of Services -->
<?php
    include("templates/footer.php")
?>