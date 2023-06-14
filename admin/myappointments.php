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

<link rel="stylesheet" href="assets/myappointments/css/styles.css"></style>
<script src="./assets/myappointments/js/scripts.js"></script>
<title>My Appointments - Destiny Driving School</title>
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
                        <span id="notifIcon" class="badge bg-danger rounded-pill"></span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile.php"> My Profile </a>
                        </li>
                        <?php
                            if($_SESSION['userType'] == "instructor"){
                        ?>
                        <li>
                            <a href="myappointments.php">My Appointments
                        <span id="notifIcon1" class="badge bg-danger rounded-pill"></span> </a>
                        </li>
                        <?php
                            }
                        ?>
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
            
            <div class="container-fluid">
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex">
                <button id="currentapp" type="button" class="ml-3 btn btn-primary" title="Current Appointments" data-placement="right" value="active">
		        Current
                </button>&nbsp
                <button id="cancelapp" type="button" class="ml-3 btn btn-outline-primary" title="Cancel Request" data-placement="right">
                Cancel Request
                </button>
                </div>
                <h2>My Appointments</h2>&nbsp
                <div>
                    <i class='fa-regular fas fa-magnifying-glass'></i>
                    <input type="text" id="search_text" placeholder="Search..."></input>
                </div>
            </div>
            <table id="displayAppointments" class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Student</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
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