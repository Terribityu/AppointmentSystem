<?php
    include("templates/header.php");
?>

<header>
        <div class="row">
            <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                        <div class="container">
                            <a class="navbar-brand" href="#"><span class="text-warning">Destiny</span>Driving</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#services">Services</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#portfolio">Portfolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#team">Team</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>        
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
                    <img src="assets/banner/destiny_bg.jpg" class="d-block w-100" alt="...">
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
                    <img src="assets/banner/banner_bg.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption carousel-nav-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>

                        <div class="slider-btn slider-nav-btn">
                            <button class="btn btn-1">Our Services</button>
                            <button class="btn btn-2">Get a Life</button>
                        </div>

                    </div>
                    </div>
                    <div class="carousel-item carousel-nav-item">
                    <img src="assets/banner/banner_bg.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption carousel-nav-caption d-none d-md-block">
                        <h5>Third slide label</h5>
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
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12">
                    <img src="assets/logo/logo_250x250.png" alt="">
                </div>
                <div class="col-lg-9 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <h2>About Us</h2>
                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus</p>
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
                                          <img src="assets/testimonials/1.jpg" alt="">
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
                                          <img src="assets/testimonials/2.jpg" alt="">
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
                                          <i class="fa fa-twitter"></i>
                                          <i class="fa fa-behance"></i>
                                          <i class="fa fa-pinterest"></i>
                                          <i class="fa fa-dribbble"></i>
                                          <i class="fa fa-vimeo"></i>
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
                                          <img src="assets/testimonials/3.jpg" alt="">
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
                                          <i class="fa fa-twitter"></i>
                                          <i class="fa fa-behance"></i>
                                          <i class="fa fa-pinterest"></i>
                                          <i class="fa fa-dribbble"></i>
                                          <i class="fa fa-vimeo"></i>
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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-single-box">
                        <img src="img/logo.png" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam repellendus sunt praesentium aspernatur iure molestias.</p>
                    <h3>We Accept</h3>
                    <div class="card-area">
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-solid fa-credit-card"></i>
                            <i class="fa-brands fa-cc-mastercard"></i>
                            <i class="fa-brands fa-cc-paypal"></i>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-single-box">
                        <h2>Hosting</h2>
                    <ul>
                        <li><a href="#">Web Hosting</a></li>
                        <li><a href="#">Cloud Hosting</a></li>
                        <li><a href="#">CMS Hosting</a></li>
                        <li><a href="#">WordPress Hosting</a></li>
                        <li><a href="#">Email Hosting</a></li>
                        <li><a href="#">VPS Hosting</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-single-box">
                        <h2>Domain</h2>
                    <ul>
                        <li><a href="#">Web Domain</a></li>
                        <li><a href="#">Cloud Domain</a></li>
                        <li><a href="#">CMS Domain</a></li>
                        <li><a href="#">WordPress Domain</a></li>
                        <li><a href="#">Email Domain</a></li>
                        <li><a href="#">VPS Domain</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-single-box">
                        <h2>Newsletter</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloremque earum similique fugiat nobis. Facere?</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Enter your Email ..." aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-long-arrow-right"></i></span>
                        </div>
                        <h2>Follow us on</h2>
                        <p class="footer-socials">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-dribbble"></i>
                            <i class="fa-brands fa-pinterest"></i>
                            <i class="fa-brands fa-twitter"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php
    include("templates/footer.php")
?>