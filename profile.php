<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");
?>
<link rel="stylesheet" href="assets/profile/css/styles.css"></style>

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
    <section id="profile__banner">
        <div class="text-center navigation">
            <h2>My Profile</h2>
            <p><a href="index.php#">Home</a> / My Profile</p>
        </div>
    </section>
    
    <section id="profile__content">
        <div class="container mb-5" id="profile__info">
            <img src="assets/img/avatar.jpg" alt="">
            <h1 id="fullname__text">John Rey D Sto Domingo</h1><h1><button id="profile__edit" class="fa-sharp fa-regular fa-pen-to-square" title="Edit Profile"></button></h1>
        </div>
        <div id="personal__info" class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="user__details" class="mb-5">
                        <h2 class="text-center">Personal Info</h2><hr>
                        <p>Name: <span id="name__text">John Rey Sto Domingo</span></p>
                        <p>Address: <span id="address__text">Buliran San Miguel Bulacan</span></p>
                        <p>Birthday: <span id="birthday__text">May 05, 2000</span></p>
                        <p>Gender: <span id="gender__text">Male</span></p>
                        <p>Civil Status: <span id="civil__text">Single</span></p>
                    </div>
                    <div id="user__accounts" class="mb-5">
                        <h2 class="text-center">Account Info</h2><hr>
                        <p>Username: <span id="username__text">fascinating</span></p>
                        <p>Number: <span id="number__text">09351723271</span></p>
                        <p>Email: <span id="email__text">fascinatingact@gmail.com</span></p>
                    </div>
                </div>
                <div class="col-md-6" class="mb-5">
                    <div id="user__feedbacks">
                        <h2 class="text-center">Feedbacks</h2><hr>
                        <h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <script>
    </script>
    <!-- End of Services -->
    
<script src="./assets/profile/js/scripts.js"></script>
<?php
    include("templates/footer.php")
?>