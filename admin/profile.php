<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }else{
        if($_SESSION['userType'] == "student"){
            header('location:../index.php');
        }
    }
    
include("template/header.php");
include("template/my-modal.php");
?>

<link rel="stylesheet" href="assets/profile/css/styles.css"></style>
<script src="assets/index/js/script.js"></script>
<title><?php echo $_SESSION['username']?> - Destiny Driving School</title>
</head>
<body>
<input type="hidden" name="userID" id="user__id" value="<?php echo $_SESSION['userID'];?>">
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Destiny Driving School</h3>
                <strong>DDS</strong>
            </div>
            
            <ul class="list-unstyled components">
                <li class="active">
                    <a id="user__name" href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="<?php echo $_SESSION['avatar'];?>" alt="" id="nav__avatar">
                        <span id='link-label'><?php echo $_SESSION['username'];?></span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile.php"> My Profile </a>
                        </li>
                        <li>
                            <a href="myappointments.php">My Appointments </a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span id='link-label'>Dashboard</span>
                    </a>
                </li>
                <?php
                    if($_SESSION['userType'] == "admin"){
                ?>
                <li>
                    <a href="students.php">
                        <i class="fa-solid fa-users"></i>
                        <span id='link-label'>Students</span>
                    </a>
                </li>
                <li>
                    <a href="instructor.php">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span id='link-label'>Instructor</span>
                    </a>
                </li>
                <?php
                    }
                ?>
                <li>
                    <a href="schedules.php">
                        <i class="fas fa-clipboard-user"></i>
                        <span id='link-label'>Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="appointments.php">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span id='link-label'>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="enrollment.php">
                        <i class="fa-solid fa-pen"></i>
                        <span id='link-label'>Enrollment</span>
                    </a>
                </li>
                <li>
                    <a href="feedback.php">
                        <i class="fa-solid fa-comments"></i>
                        <span id='link-label'>Feedbacks</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
            </ul>



        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ms-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./database/login/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
        <div id="personal__info" class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div id="user__details" class="mb-5">
                        <h2 class="text-center">Personal Info<a href id="profile__edit" class="fa-sharp fa-regular fa-pen-to-square" title="Edit Profile"></a></h2><hr>
                        <p>Name: <span id="name__text">John Rey Sto Domingo</span></p>
                        <p>Address: <span id="address__text">Buliran San Miguel Bulacan</span></p>
                        <p>Birthday: <span id="birthday__text">May 05, 2000</span></p>
                        <p>Gender: <span id="gender__text">Male</span></p>
                        <p>Civil Status: <span id="civil__text">Single</span></p>
                    </div>
                    <div id="user__accounts" class="mb-5">
                        <h2 class="text-center">Account Info<a href id="account__edit" class="fa-sharp fa-regular fa-pen-to-square" title="Edit Account"></a></h2><hr>
                        <p>Username: <span id="username__text">fascinating</span></p>
                        <p>Number: <span id="number__text">09351723271</span></p>
                        <p>Email: <span id="email__text">fascinatingact@gmail.com</span></p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        };
    </script>
<script src="./assets/profile/js/scripts.js"></script>
<?php
    include("template/footer.php")
?>  