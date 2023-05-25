<!-- Modal -->

  <!-- Appointment Modal -->

  <div class="modal fade" id="appointInfoModal" tabindex="-1" aria-labelledby="appointModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Appointment Details</h3>
            <p>Appointment Type: <span id="title__text">PDC</span></p>
            <p>Instructor: <span id="instructor__text">Juan Dela Cruz</span></p>
            <p>Date: <span id="date__text">May 05, 2000</span></p>
            <p>Time: <span id="time__text">09:00 AM</span></p>
            <p>Status: <span id="status__text">Upcoming</span></p>
            <p>Price: <span id="status__text">5000</span></p>            
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="viewRemarks">Remarks</button>
            <button type="button" class="btn btn-primary" value="1" id="cancelAppoint">Cancel Appointment</button>
            <button type="button" class="btn btn-primary" value="1" id="closePreview" data-bs-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Edit Profile Information</h3>
            <form action="#" id="editProfileInfo" class="login-form">
            <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-4 mb-2">
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required placeholder="Firstname"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required placeholder="Middlename"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required placeholder="Lastname"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix" placeholder="Suffix"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required placeholder="Birthday"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required placeholder="Age"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="gender">Gender <span id="form_required">*</span></label>
                            <select class="form-select" name="gender" required aria-label="Default select example">
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="civilstatus">Civil Status <span id="form_required">*</span></label>
                            <select class="form-select" name="civilstatus" required aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="col-md-7 mb-2">
                            <label for="province">Complete Address <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="address" required placeholder="Address"></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required placeholder="Zipcode"></input>
                        </div>                   
                        <input type="hidden" class="form-control rounded-left" name="userID">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Update Information</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Edit Profile Information</h3>
            <form action="#" id="editAccountInfo" class="login-form">
            <div class="form_details mb-4">
                    <div class="row form_details_body">
                      <div class="col-md-12 d-flex justify-content-center">
                            <div class="input-group mb-2 mr-sm-2 image-upload d-flex justify-content-center">
                                <label id="formlabel" for="image">
                                <img src="" title="Upload Image" alt="Avatar.png" id="preview"/>
                                </label>
                                <input type="file" class="form-control" id = "image" name="image">
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            +63 <input type="number" class="form-control" name="mobilenumber" maxlength="10" required placeholder="Mobile Number"></input>
                            <span id="id_number_error" class="error"></span>
                            <a id = "sendotp" class = "sendotp" href>Send OTP verication Code.</a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label id="formlabel" for="emailotp">OTP <span id="form_required">*</span></label>
                            <input type="number" id="otp" readonly class="form-control" name="emailotp" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required placeholder="Email"></input>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="username">Username <span id="form_required">Not Editable</span></label>
                            <input type="text" class="form-control rounded-left" name="username" placeholder="Username" required readonly>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="oldpassword">Old Password <span id="form_required">*</span></label>
                            <input type="password" class="form-control rounded-left" name="oldpassword" placeholder="Old Password" required>
                        </div>
                        <div class="col-md-4">
                            <label id="formlabel" for="password">New Password <span id="form_required">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="New Password" required></input>
                        </div>
                        <div class="col-md-4">
                            <label id="formlabel" for="password_cnf">Confirm Password <span id="form_required">*</span></label>
                            <input type="password" id="password_cnf" class="form-control" name="password_cnf" placeholder="Confirm Password" required></input>
                            <span id="password_cnf_error" class="error"></span>
                        </div>                       
                        <input type="hidden" class="form-control rounded-left" name="userID">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Update Information</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Feedbacks -->
<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="feedbackModalLabel"><i class="fa-solid fa-comments"></i> Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tinyform">
                    <!-- <label for="blogtitle" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="blogtitle" name="blogtitle" placeholder="Title" autocomplete="off" required> -->
                    <label for="blogbody" class="form-label">Body:</label>
                    <textarea id="blogbody" class="form-control" name="blogbody" placeholder="Type Here . . .">
                    </textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn_post" name="btn_post" style="height: auto;" class="btn btn-secondary disabled w-100">Post</button>
                </form>
            </div>
            <div id="lp-message"></div>
        </div>
    </div>
</div>