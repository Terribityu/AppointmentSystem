<?php
    require('database/connect.php');
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin" || $_SESSION['userType'] == "instructor"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");

    $query = "SELECT * FROM users JOIN user_details ON users.username = user_details.username WHERE users.userType = 'instructor'";
    $result = mysqli_query($conn, $query);
?>
<style>
 
#navbar {
	transition: background-color 0.5s ease-in-out;
  }
  
  #navbar.navbar-scrolled {
	background-color: #ffffff;
	box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
  }
.navbar-brand {
    color: white;
}

#navbar .nav-link{
    color:white;
}
     
</style>
<link rel="stylesheet" href="assets/index/css/styles.css"></style>
<title>Destiny Driving School</title>
</head>
<body> 

    <header>
        <div class="row">
            <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="navbar">
                        <div class="container">
                            <a class="navbar-brand" href="./index.php"><span class="text-warning">Destiny</span>Driving</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
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

    <section id="banner">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="assets/index/banner/destiny_bg.jpg" class="d-block w-100 c-img" alt="Slide 1">
                <div class="carousel-caption mt-5">
                <p class="mt-5 fs-3 text-uppercase">Enroll Now!</p>
                <h1 class="display-1 fw-bolder text-capitalize">Destiny Driving School</h1>
                <a href="#services" class="btn btn-primary px-4 py-2 fs-5 mt-5">Services</a>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="assets/index/banner/bg_2.jpg" class="d-block w-100 c-img" alt="Slide 2">
                <div class="carousel-caption mt-5">
                <p class="text-uppercase fs-3 mt-5">The season has arrived</p>
                <h1 class="display-1 fw-bolder text-capitalize">Destiny Driving School</p>
                <?php
                    if(!isset($_SESSION['username'])){
                ?>
                <a href="registration.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                <?php
                    }
                ?>
                </div>
            </div>
            <div class="carousel-item c-item">
                <img src="assets/index/banner/bg_3.jpg" class="d-block w-100 c-img" alt="Slide 3">
                <div class="carousel-caption mt-5">
                <p class="text-uppercase fs-3 mt-5">Destination activities</p>
                <h1 class="display-1 fw-bolder text-capitalize">Destiny Driving School</p>
                <a href="#contact" class="btn btn-primary px-4 py-2 fs-5 mt-5">Contact Us</a>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    
    <!-- Start of Services -->
    <section id="services">
        <div class="row">
            <h1 class="testimonial-header">Services <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></h1>
            <div class="services-wrapper">
                <div class="services-box-area service-tdc">
                    <div class="services-icon-area">
                    <i class="fa-solid fas fa-car"></i>
                    </div>
                    <h6>TDC</h6>
                    <p>Theoretical Driving Course</p>
                </div>
                <div class="services-box-area service-pdc">
                    <div class="services-icon-area">
                    <i class="fa-solid fas fa-car"></i>
                    </div>
                    <h6>PDC</h6>
                    <p>Practical Driving Course</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Services -->
    
    <!-- Start of Team -->
    <section id="team">
        <div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
						<h1 class="teams-header">Instructors<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></h1>
				</div>
			</div>
		</div>
		<div class="testimonial-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="team-slider owl-carousel">
							<?php
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
                                        extract($row);
                                        echo "
                                        <div class='single-box text-center'>
                                            <div class='mt-3 img-area'><img alt='' class='img-fluid move-animation' src='$avatar'></div>
                                                <div class='info-area'>
                                                    <h4>$firstname $lastname</h4>
                                                    <p>Destiny Driving School Instructor</p><a href='#'>Learn More</a>
                                                </div>
                                        </div>\n																														
                                        ";
                                    }
                                }else{
                                    echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
                                }
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- End of Teams -->

    <!-- About Section Start-->
    <section id="about">
        <div class="container">
        <h1 class="testimonial-header">About Us </h1>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center align-items-center">
                    <img src="assets/logo/logo_250x250.png" alt="">
                </div>
                <div class="col-lg-9 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <!-- <h2>About Us</h2> -->
                    <br>
                    <p>Destiny Driving School, which began operations on February 1, 2021, has made a name for itself as the only LTO-accredited driving institution in the San Miguel municipality. 
                        Despite initially having only two training vehicles and one office, the team was determined to succeed, and they opened their first office at 2F M. De Castro Bldg., 
                        Cagayan Valley Road, Salangan, San Miguel, Bulacan, Philippines. <br><br> 
                        Over time, Destiny Driving School has continued to cater to the needs of an increasing number of student drivers. Their professional and experienced teachers are accredited 
                        by the government as professional driving instructors and lecturers. <br><br>
                        Destiny Driving School offers both a Theoretical Driving Course (TDC) for Student Permit (SP) and a Practical Driving Course (PDC) for Driver's License applicants. 
                        Aspiring drivers can take advantage of the opportunity to be trained by LTO-accredited Driving Instructors. Enrolling in one of Destiny Driving School's courses can help 
                        ensure that students drive safely and confidently on the road.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="howtoenroll">
        <div class="container">
        <h1 class="testimonial-header">How to enroll at Destiny Driving School </h1>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12 text-center">
                    <img style="max-width:350px;" src="assets/index/about/requirements.png" alt="Hotodg">
                    <h5>Step 1</h5>
                    <p class='d-flex'>
                        <ul>
                            <li>Must be 17yrs. Old & Above</li>
                            <li>Original PSA birth certificate</li>
                            <li>Marriage Certificate (If Married, For Women Only)</li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 col-12 text-center">
                    <img style="max-width:350px;" src="assets/index/about/register.png" alt="Hotodg">
                    <h5>Step 2</h5>
                    <p class='d-flex'>
                        <ul>
                            <li><a href="registration.php">Register</a> an account.</li>
                            <li>Select an available <a href="#services">schedules</a> from the list</li>
                            <li>Enroll for the available schedule that you desire</li>
                        </ul>
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 col-12 text-center">
                    <img style="max-width:350px;" src="assets/index/about/driving-school-1.png" alt="Hotodg">
                    <h5>Step 3</h5>
                    <p class='d-flex'>
                        <ul>
                            <li>After approved enrollment</li>
                            <li>Visit our office and bring the necessary requirements plus payment to enroll.</li>
                            <li>Start your Driving School Session.</li>
                        </ul>
                    </p>
                </div>
        </div>
    </section>
    <!-- End of About Section -->

    <!-- Start of Gallery -->
    <section id="gallery">
        <div class="container">
        <h1 class="testimonial-header">Destiny Driving School Gallery </h1>
            <div class="gallery-img-area">
                
                <div class="gallery-wrapper">
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774427/273446234_431696302075549_2403184082140346495_n_q8kjdt.jpg" /></a>
                    </div>
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774434/289338249_520978616480650_4081346908152020529_n_ufjjbs.jpg" /></a>
                    </div>
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774425/273751863_432540155324497_7214586072964737366_n_xbbbgj.jpg" /></a>
                    </div>
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774427/275513503_449316270313552_92543345730777378_n_jn7mmf.jpg" /></a>
                    </div>
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774428/275867833_452857716626074_407916966712471922_n_quba3e.jpg" /></a>
                    </div>
                    <div class="gallery-single-box">
                    <a href="#"><img src="https://res.cloudinary.com/ddf34uiqq/image/upload/v1686774426/275135440_444649877446858_4302510335570067271_n_sjjflk.jpg" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Gallery -->
    <!-- Routes Section Start -->
    <section id="routes">
        <div class="container">
            <div class="row">
                <div class="text-center col-lg-12 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <h2>Destiny Driving School Address</h2>
                    <p>Destiny Driving School is located at 2/F M. De Castro Bldg., Cagayan Valley Road, Salangan, San Miguel, Philippines</p>
                </div>
                <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center align-items-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240.7179544774399!2d120.96114828721052!3d15.131561372496453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33971d675ed7e519%3A0x9c89613b14854be5!2sDestiny%20Driving%20School!5e0!3m2!1sen!2sph!4v1686765243441!5m2!1sen!2sph" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Routes Section -->
    <!-- Start of Testimonials -->
    <section id="testimonials-section">
        <div class="">
            <h1 class="testimonial-header">Client Review</h1>
            <div class="testimonials">
                
                <div id="carouselExampleControls" class="feedback-slider carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="testimonial-img-area">
                                          <img src="assets/index/testimonials/1.jpg" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Dave Wood</h2>
                                          <h4>Web Developer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="testimonial-content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="testimonial-img-area">
                                          <img src="assets/index/testimonials/2.jpg" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Martin Guptill</h2>
                                          <h4>UI/UX Designer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="testimonial-content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                      <p class="socials">
                                          <i class="fa-brands fas fa-twitter"></i>
                                          <i class="fa-brands fas fa-behance"></i>
                                          <i class="fa-brands fas fa-pinterest"></i>
                                          <i class="fa-brands fas fa-dribbble"></i>
                                          <i class="fa-brands fas fa-vimeo"></i>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="single-item">
                          <div class="row">
                              <div class="col-md-5">
                                  <div class="profile">
                                      <div class="testimonial-img-area">
                                          <img src="assets/index/testimonials/3.jpg" alt="">
                                      </div>
                                      <div class="bio">
                                          <h2>Stephen Jones</h2>
                                          <h4>Graphic Designer</h4>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="testimonial-content">
                                      <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel a eius excepturi molestias commodi aliquam error magnam consectetur laboriosam numquam, minima eveniet nostrum sequi saepe ipsam non ea, inventore tenetur! Corporis commodi consequatur molestiae voluptatum!</p>
                                      <p class="socials">
                                          <i class="fa-brands fas fa-twitter"></i>
                                          <i class="fa-brands fas fa-behance"></i>
                                          <i class="fa-brands fas fa-pinterest"></i>
                                          <i class="fa-brands fas fa-dribbble"></i>
                                          <i class="fa-brands fas fa-vimeo"></i>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon testimonial-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon testimonial-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End of Testimonials -->

    <script>
        window.onload = function () {
            $(window).scroll(function () {
            if ($(document).scrollTop() > 50) {
                $("#navbar").addClass("navbar-scrolled");
                $("#navbar").removeClass("bg-transparent");
                $(".nav-link").css({ color: "black" });
                $(".navbar-brand").css({ color: "black" });
            } else {
                $("#navbar").removeClass("navbar-scrolled");
                $("#navbar").addClass("bg-transparent");
                $(".nav-link").css({ color: "white" });
                $(".navbar-brand").css({ color: "white" });
            }
            });
        }
    </script>
    <script src="./assets/index/js/scripts.js"></script>
<?php
    include("templates/footer.php")
?>