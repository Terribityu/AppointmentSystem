<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin" || $_SESSION['userType'] == "instructor"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/tdc/css/styles.css"></style>
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
                                        if(isset($_SESSION['firstname'])){
                                    ?>
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo $_SESSION['avatar'];?>" alt="" id="nav__avatar"> Hi, <?php echo $_SESSION['firstname'];?>! <span id="notifIcon" class="badge bg-danger rounded-pill"></span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                            <li><a class="dropdown-item" href="./profile.php"><?php echo $_SESSION['firstname'];?></a></li>
                                            <li><a class="dropdown-item" href="./myappointments.php">My Appointments <span id="notifIcon1" class="badge bg-danger rounded-pill"></span></a></li> 
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
    <section id="tdc_banner">
        <div class="text-center navigation">
            <h2>Theoretical Driving Course</h2>
            <p><a href="index.php#">Home</a> / TDC</p>
        </div>
    </section>
    
    <section id="content">
        <div class="container">
            <h2 class="text-center">Appointments</h2>
            <ul id="schedlist" class="list-group my-3">
                <li class="list-group-item d-flex align-items-center">
                <img src="assets/img/avatar.jpg" alt="">
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
                        <button href="#" onclick='chooseSched(1,2); event.preventDefault();' class="badge bg-primary rounded-pill">12:00pm</button>
                    </div>

                </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- End of Services -->
    <script src="./assets/tdc/js/scripts.js"></script>
<?php
    include("templates/footer.php")
?>