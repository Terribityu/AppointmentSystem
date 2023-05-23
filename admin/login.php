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
    
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!-- Alertify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Main Script -->
<script src="assets/login/script.js"></script>
</body>
</html>