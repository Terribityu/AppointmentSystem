<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin" || $_SESSION['userType'] == "instructor"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");
?>
<script src="https://cdn.tiny.cloud/1/l6zbrue1t5otwmh45fyvnjclf2djbk4xypmzoo3ahl8ny4lh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="assets/profile/css/styles.css"></style>
<script>
    tinymce.init({
        selector: '#blogbody',
        resize: false,
        plugins: 'autoresize',
        max_height: 500,
        min_height: 400,
        menubar: "edit format",
        setup: function(ed) {
            ed.on("keyup", function() {
                let blog = tinymce.activeEditor.getContent();
                if (blog == '') {
                    $('#btn_post').addClass('disabled');
                } else {
                    $('#btn_post').removeClass('disabled')
                }
            });
        },
    });
</script>
<?php
    include("templates/modals.php");
?>
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
    <section id="profile__banner">
        <div class="text-center navigation">
            <h2>My Profile</h2>
            <p><a href="index.php#">Home</a> / My Profile</p>
        </div>
    </section>
    
    <section id="profile__content">
        <div class="container mb-5" id="profile__info">
            <div class="row">
                <div class="col-md-6">
                    <img id="profile__img" alt="Profile Picture">
                </div>
                <div class="col-md-6">
                    <h1 id="fullname__text">John Rey D Sto Domingo</h1>
                </div>
            </div>
        </div>
        <div id="personal__info" class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="user__details" class="mb-5">
                        <h2 class="text-center">Personal Info&nbsp;<a href id="profile__edit" class="fa-sharp fa-regular fa-pen-to-square" title="Edit Profile"></a></h2><hr>
                        <p>Name: <span id="name__text">...</span></p>
                        <p>Address: <span id="address__text">...</span></p>
                        <p>Birthday: <span id="birthday__text">...</span></p>
                        <p>Gender: <span id="gender__text">...</span></p>
                        <p>Civil Status: <span id="civil__text">...</span></p>
                    </div>
                    <div id="user__accounts" class="mb-5">
                        <h2 class="text-center">Account Info&nbsp;<a href id="account__edit" class="fa-sharp fa-regular fa-pen-to-square" title="Edit Account"></a></h2><hr>
                        <p>Username: <span id="username__text">...</span></p>
                        <p>Number: <span id="number__text">...</span></p>
                        <p>Email: <span id="email__text">...</span></p>
                    </div>
                </div>
                <div class="col-md-6" class="mb-5">
                    <div id="user__feedbacks">
                        <h2 class="text-center">Feedbacks&nbsp;<button id='addFeedback' class='btn btn-outline-success rounded-pill'><i class="fa-solid fa-comment-medical"></i></button></h2><hr>
                        <div id="feedbacks__content">
                            ...
                        </div>
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