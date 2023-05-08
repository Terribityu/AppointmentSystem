<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/appointments/css/styles.css"></style>

<title>Destiny Driving School</title>
</head>
<body> 
    <input type="hidden" name="userID" id="user__id" value="<?php echo $_SESSION['userID'];?>">
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
    <section id="appointments__banner">
        <div class="text-center navigation">
            <h2>My Appointments</h2>
            <p><a href="index.php#">Home</a> / My Appointments</p>
        </div>
    </section>
    
    <section id="appointments__content">
        <div class="container">
            <h2 class="text-center">My Appointments</h2>
            <table id="displayAppointments" class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Instructor</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td>PDC</td>
                    <td>May 5 2000</td>
                    <td>8:00 am</td>
                    <td>TBA</td>
                    <td>On Going</td>
                    <td>Unpaid</td>
                    </tr>
                    <tr>
                    <th scope="row">Gorr</th>
                    <td>PDC</td>
                    <td>May 5 2000</td>
                    <td>8:00 am</td>
                    <td>TBA</td>
                    <td>On Going</td>
                    <td>Unpaid</td>
                    </tr>
                    <tr>
                    <th scope="row">Jerry</th>
                    <td>PDC</td>
                    <td>May 5 2000</td>
                    <td>8:00 am</td>
                    <td>TBA</td>
                    <td>On Going</td>
                    <td>Unpaid</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </section>
    <script>
    </script>
    <!-- End of Services -->
    
<script src="./assets/appointments/js/scripts.js"></script>
<?php
    include("templates/footer.php")
?>