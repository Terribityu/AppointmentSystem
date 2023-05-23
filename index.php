<?php
    session_start();
    if(isset($_SESSION['userType'])){  
        if($_SESSION['userType'] == "admin" || $_SESSION['userType'] == "instructor"){
            header('location:admin/index.php');
        }
    }

    include("templates/header.php");
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

    <section id="banner">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item carousel-nav-item active">
                    <img src="assets/index/banner/destiny_bg.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption carousel-nav-caption d-none d-md-block">
                        <h5>Destiny Driving School</h5>
                        <p>Some representative placeholder content for the first slide.</p>

                        <div class="slider-btn slider-nav-btn">
                            <button class="btn btn-1">Our Services</button>
                            <button class="btn btn-2">Get a Life</button>
                        </div>

                    </div>
                    </div>
                    <div class="carousel-item carousel-nav-item">
                    <img src="assets/index/banner/banner_bg.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption carousel-nav-caption d-none d-md-block">
                        <h5>Destiny Driving School</h5>
                        <p>Some representative placeholder content for the second slide.</p>

                        <div class="slider-btn slider-nav-btn">
                            <button class="btn btn-1">Our Services</button>
                            <button class="btn btn-2">Get a Life</button>
                        </div>

                    </div>
                    </div>
                    <div class="carousel-item carousel-nav-item">
                    <img src="assets/index/banner/banner_bg.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption carousel-nav-caption d-none d-md-block">
                        <h5>Destiny Driving School</h5>
                        <p>Some representative placeholder content for the third slide.</p>

                        <div class="slider-btn slider-nav-btn">
                            <button class="btn btn-1">Our Services</button>
                            <button class="btn btn-2">Get a Life</button>
                        </div>
                            
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </section>

    <!-- About Section Start-->
    <section id="about">
        <div class="container">
        <h1 class="testimonial-header">About Us </h1>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 d-flex align-items-center">
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
    <!-- End of About Section -->
    <!-- Routes Section Start -->
    <section id="routes">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <h2>Routes</h2>
                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus</p>
                </div>
                <div class="col-lg-3 col-md-12 col-12">
                    <img src="assets/logo/logo-white_250x250.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End of Routes Section -->
    <!-- Start of Testimonials -->
    <section id="testimonials-section">
        <div class="container">
            <h1 class="testimonial-header">Client Review <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></h1>
            <div class="testimonials">
                
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
    <!-- Start of Team -->
    <section id="team">
        <div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
					<div class="sec-heading text-center">
						<h6>Team Members</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="testimonial-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="team-slider owl-carousel">
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/65VQDfjs/1.png"></div>
								<div class="info-area">
									<h4>Person's Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
								</div>
							</div>
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/vmCM14qL/2.png"></div>
								<div class="info-area">
									<h4>Person's Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
								</div>
							</div>
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/TYTxWM9S/3.png"></div>
								<div class="info-area">
									<h4>Person's Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
								</div>
							</div>
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/593GTHB7/4.png"></div>
								<div class="info-area">
									<h4>Person's Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
								</div>
							</div>
							<div class="single-box text-center">
								<div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/tJCrp53r/5.png"></div>
								<div class="info-area">
									<h4>Person's Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- End of Teams -->
    <!-- Start of Services -->
    <section id="services">
        <div class="row">

        </div>
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
<?php
    include("templates/footer.php")
?>