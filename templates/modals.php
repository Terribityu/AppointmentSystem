<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-login-header ms-auto">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-person"></span>
            </div>
            <h3 class="text-center mb-4">Sign In</h3>
            <form action="#" id="loginForm" class="login-form">
                <div class="form-group mb-4">
                    <input type="text" class="form-control rounded-left" name="username" placeholder="Username / Email" required>
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
                </div>
                <div class="form-group mb-4">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="opt-login-left">
                        <label class="custom-control fill-checkbox">
                                        <input type="checkbox" class="fill-control-input">
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description">Remember Me</span>
                                    </label>
                    </div>
                    <div class="opt-login-right">
                        <a href="#">Forgot Password ?</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center">
            <p>Not a member? <a href="./registration.php">Create an account</a></p>
        </div>
      </div>
    </div>
  </div>