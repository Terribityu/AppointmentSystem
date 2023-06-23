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
<link rel="stylesheet" href="./assets/sales/css/styles.css">
<script src="./assets/sales/js/scripts.js"></script>
<title>Students - Destiny Driving School</title>
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
                <?php
                    if($_SESSION['userType'] == "admin"){
                ?>
                <li >
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span id='link-label'>Dashboard</span>
                    </a>
                </li>
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
                    <h2>Income</h2>&nbsp
                    <select id='instructFilter' class="form-select ml-3 btn btn-outline-dark" aria-label="Default select example">
                    </select>&nbsp
                    <select id='typeFilter' class="form-select ml-3 btn btn-outline-dark" aria-label="Default select example">
                        <option selected value='all'>All Type</option>
                        <option value="pdc">PDC</option>
                        <option value="tdc">TDC</option>
                    </select>&nbsp
                    <select id='salesFilter' class="form-select ml-3 btn btn-outline-dark" aria-label="Default select example">
                        <option selected value='all'>All Records</option>
                        <option value="thisday">This Day</option>
                        <option value="thismonth">This Month</option>
                        <option value="6months">6 Months</option>
                        <option value="year">1 Year</option>
                    </select>&nbsp
                    <input id="generatereport" type="button" class="ml-3 btn btn-warning" title="Generate Report" data-placement="right" value="Generate Report"></input>
                </div>
                <div>
                    <i class='fa-regular fas fa-magnifying-glass'></i>
                    <input type="text" id="search_text" placeholder="Search..."></input>
                </div>
            </div>
            
            <div id="displaySales" class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr> 
                        <th scope="col">Appointment Type</th> 
                        <th scope="col">Price</th>
                        <th scope="col">Appointment Date</th> 
                        <th scope="col">Payment Date</th> 
                        </tr>
                    </thead>
                    <tbody id="table-body" class="tbody"></tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary me-1" id="prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-primary me-1" disabled id="cur__page">
                        1
                    </button>
                    <button class="btn btn-primary" id="next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
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

<?php
    include("template/footer.php")
?>  