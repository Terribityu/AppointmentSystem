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
<link rel="stylesheet" href="./assets/feedbacks/css/styles.css">
<script src="./assets/feedbacks/js/scripts.js"></script>
<title>Appointments - Destiny Driving School</title>
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
                <li class="active">
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
                        
                    &nbsp;<button type="button" class="btn btn-success" id="addAppointment" data-bs-toggle="modal" data-bs-target="#addAppointmentModal" title="Add Students"><i class="fa-regular fas fa-circle-plus"></i></button>
                    
                    
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

            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex">
                <h2>Appointments</h2>&nbsp
                <button id="pendingfeed" type="button" class="ml-3 btn btn-primary" title="Pending" data-placement="right" value="active">
		        Pending
                </button>&nbsp
                <button id="rejectfeed" type="button" class="ml-3 btn btn-outline-primary" title="Rejected" data-placement="right">
                Rejected
                </button>&nbsp
                <button id="approvedfeed" type="button" class="ml-3 btn btn-outline-primary" title="Approved" data-placement="right">
                Approved
                </button>
                </div>
                <div>
                    <i class='fa-regular fas fa-magnifying-glass'></i>
                    <input type="text" id="search_text" placeholder="Search..."></input>
                </div>
            </div>
            
            <div id="displayFeedbacks" class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" width="250">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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