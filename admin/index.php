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
?>

<link rel="stylesheet" href="assets/index/css/styles.css">
<script src="assets/index/js/script.js"></script>
<title>Dashboard - Destiny Driving School</title>
</head>

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
                <li class="active">
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

            <div class="row">
                <?php
                    if($_SESSION['userType'] == "admin"){
                ?>
                     <div class="col-lg-4 col-6 animated bounceInLeft">
                        <!-- small box -->
                        <div class="small-box bg-1">
                           <div class="inner">
                              <h3 id="destinationcount">8</h3>
                              <p>Instructors</p>
                           </div>
                           <div class="icon">
                              <i class="la la-map la-2x"></i>
                           </div>
                           <a href="destinations.php" class="small-box-footer">More info <i class="las la-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-6 animated rubberBand">
                        <!-- small box -->
                        <div class="small-box bg-2">
                           <div class="inner">
                              <h3 id="clientcount">20</h3>
                              <p>Students</p>
                           </div>
                           <div class="icon">
                              <i class="la la-users la-2x"></i>
                           </div>
                           <a href="clients.php" class="small-box-footer">More info <i class="las la-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-6 animated bounceInRight">
                        <!-- small box -->
                        <div class="small-box bg-3">
                           <div class="inner">
                              <h3 id="incometotal">20,000</h3>
                              <p>Income</p>
                           </div>
                           <div class="icon">
                              <i class="la la-money-bill la-2x"></i>
                           </div>
                           <a href="#" class="small-box-footer">More info <i class="las la-arrow-circle-right"></i></a>
                        </div>
                     </div>
                <?php
                    }
                ?>  
                    <div class="col-lg-4 col-6 animated bounceInLeft">
                        <!-- small box -->
                        <div class="small-box bg-4">
                           <div class="inner">
                              <h3 id="myappointmentstotal">8</h3>
                              <p>My Appointments</p>
                           </div>
                           <div class="icon">
                              <i class="la la-ticket-alt la-2x"></i>
                           </div>
                           <a href="myappointments.php" class="small-box-footer">More info <i class="las la-arrow-circle-right"></i></a>
                        </div>
                     </div>

                     <div class="col-lg-4 col-6 animated bounceInLeft">
                        <!-- small box -->
                        <div class="small-box bg-5">
                           <div class="inner">
                              <h3 id="appointmentstotal">8</h3>
                              <p>Appointments</p>
                           </div>
                           <div class="icon">
                              <i class="la la-ticket-alt la-2x"></i>
                           </div>
                           <a href="appointments.php" class="small-box-footer">More info <i class="las la-arrow-circle-right"></i></a>
                        </div>
                     </div>
                  </div>
                    <?php
                        if($_SESSION['userType'] == "admin"){
                    ?>
                    <div class="row">

                                <div class="col-lg-12 col-12">
                                    <div class="small-box">
                                    <div class="inner" style="background-color: #fff">
                                        <div id="chartContainer" willReadFrequently="true" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                                    </div>
                                    </div>
                                </div>
                                <?php
                    }
                ?>  
            </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            <?php
                        if($_SESSION['userType'] == "admin"){
            ?>
            getSalesData();
            <?php
                    }
                ?>  
            function getSalesData(){
                $.ajax({
                    url: "database/sales/checksales.php",
                    method: "post",
                    success: function(data) {
                        chartData(JSON.parse(data));
                    }
                })
            }

            function chartData(data) {
            // Convert the y values to integers and remove the quotes
            data.forEach(function(point) {
                point.y = parseInt(point.y);
            });

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                text: "Monthly Sales"
                },
                axisY: {
                title: "Income"
                },
                data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "MMbbl = one million barrels",
                dataPoints: data
                }]
            });

            chart.render();
            }
        };
    </script>

<?php
    include("template/footer.php")
?>  