<?php
session_start();

if(isset($_SESSION['username'])){
  header('location:./index.php');
}

include("template/header.php");
?>
<title>Administrator Login - Destiny Driving School</title>
</head>

<body>
  <section id="main_div_login" class="d-flex align-items-center">
        <div class="col-lg-7 d-flex justify-content-center">
            <img src="./assets/logo/logo-white-orig.png" alt="">
        </div>
        <div class="col-lg-5">
          <form id="loginform">
              <h1 class="text-center p-3">LOGIN</h1>
            <label>Username:</label>
              <div class="input-group mb-3 mr-sm-2">
                <input type="text" class="form-control" name="username" id="username" placeholder = "Username" required>
              </div>

              <label>Password</label>
              <div class="input-group mb-5 mr-sm-2">
                <input type="password" class="form-control" name="password" id="password" placeholder ="Password" required>
              </div>

            <input type="hidden" name="btn_login" value="true">
            <button type="submit" class="form-control btn btn-success" >Login</button>
          </form>
        </div>
  </section>
    

<?php
include("template/footer.php");
?>