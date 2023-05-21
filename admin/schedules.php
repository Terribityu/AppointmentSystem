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
    include("template/modal.php");
?>
<link rel="stylesheet" href="./assets/schedules/css/styles.css">
<script src="./assets/schedules/js/scripts.js"></script>
<title>Schedules - Destiny Driving School</title>
</head>

<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Destiny Driving School</h3>
                <strong>DDS</strong>
            </div>
            
            <ul class="list-unstyled components">
                <li>
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
                <li class="active">
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
                        
                    <!-- &nbsp;<button type="button" class="btn btn-success" id="addInstruct" data-bs-toggle="modal" data-bs-target="#addInstructorModal" title="Add Students"><i class="fa-regular fas fa-circle-plus"></i></button> -->
                    
                    
                    <button class="btn btn-dark d-inline-block d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <span class="navbar-text ms-auto">Destiny Driving School</span>
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

            <div class="container">
                    <!-- Calendar Container -->
                <div id="calendar"></div>
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

<?php
    include("template/footer.php")
?>  