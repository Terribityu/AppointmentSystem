<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Register a Student</h3>
            <form action="#" id="addStudentForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-4 mb-2">
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="gender">Gender <span id="form_required">*</span></label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="civilstatus">Civil Status <span id="form_required">*</span></label>
                            <select class="form-select" name="civilstatus" aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="col-md-7 mb-2">
                            <label for="province">Complete Address <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="address" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="mobilenumber" maxlength="10" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required></input>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Add Student"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Update a Student</h3>
            <form action="#" id="editStudentForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-4 mb-2">
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="gender">Gender <span id="form_required">*</span></label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="civilstatus">Civil Status <span id="form_required">*</span></label>
                            <select class="form-select" name="civilstatus" aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="col-md-7 mb-2">
                            <label for="province">Complete Address <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="address" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="mobilenumber" maxlength="10" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required></input>
                        </div>
                        <input type="hidden" class="form-control" name="userID" required></input>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Update Student"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>


<!-- Add Instructor Modal -->
<div class="modal fade" id="addInstructorModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Register a Instructor</h3>
            <form action="#" id="addInstructorForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-4 mb-2">
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
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
                            <input type="text" class="form-control" name="address" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="mobilenumber" maxlength="10" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required></input>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Add Instructor"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editInstructorModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Update a Instructor</h3>
            <form action="#" id="editInstructorForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-4 mb-2">
                            <label for="firstname">First Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="firstname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Middle Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="middlename" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Last Name <span id="form_required">*</span></label>
                            <input type="text" class="form-control" name="lastname" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="firstname">Suffix <span id="form_required"></span></label>
                            <input type="text" class="form-control" name="suffix"></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="dateofbirth">Date of Birth <span id="form_required">*</span></label>
                            <input type="date" class="form-control" name="dateofbirth" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="age">Age <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="age" required></input>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="gender">Gender <span id="form_required">*</span></label>
                            <select class="form-select" required name="gender" aria-label="Default select example">
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
                            <input type="text" class="form-control" name="address" required></input>
                        </div>
                        <div class="col-md-5 mb-2">
                            <label for="zipcode">Zip Code <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="zipcode" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="mobilenumber">Mobile Number <span id="form_required">*</span></label>
                            <input type="number" class="form-control" name="mobilenumber" maxlength="10" required></input>
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email <span id="form_required">*</span></label>
                            <input type="email" class="form-control" name="email" required></input>
                        </div>
                        <input type="hidden" class="form-control" name="userID" required></input>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Update Instructor"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>

  <!-- Add Appointments Modal -->
  <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Add an Appointment</h3>
            <form action="#" id="addAppointmentForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-12 mb-2">
                            <label for="civilstatus">Schedules <span id="form_required">*</span></label>
                            <select class="form-select" required name="schedules" id="scheduleList" aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <label for="studentDataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" name="studentDataList" id="studentDataList" required placeholder="Type to search...">
                        <datalist id="datalistOptions">
                          <option value="San Francisco">Ay</option>
                          <option value="New York">
                          <option value="Seattle">
                          <option value="Los Angeles">
                          <option value="Chicago">
                        </datalist>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Create Appointment"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>

    <!-- Edit Appointments Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Add an Appointment</h3>
            <form action="#" id="editAppointmentForm" class="login-form">
                <div class="form_details mb-4">
                    <div class="row form_details_body">
                        <div class="col-md-12 mb-2">
                            <label for="civilstatus">Schedules <span id="form_required">*</span></label>
                            <select class="form-select" required name="schedules" id="scheduleList" aria-label="Default select example">
                              <option selected value="Single">Single</option>
                              <option value="Married">Married</option>
                            </select>
                        </div>
                        <label for="studentDataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" name="studentDataList" id="studentDataList" required placeholder="Type to search...">
                        <datalist id="datalistOptions">
                          <option value="San Francisco">Ay</option>
                          <option value="New York">
                          <option value="Seattle">
                          <option value="Los Angeles">
                          <option value="Chicago">
                        </datalist>
                        <input type="hidden" name="appointmentID">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" name="btn_add" value="Edit Appointment"></input>
            <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          </form>
      </div>
      </div>
    </div>
  </div>