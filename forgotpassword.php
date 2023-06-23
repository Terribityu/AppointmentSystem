<?php
extract($_GET);

if(!isset($email)){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/logo/logo.png" />
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Owl Carousel -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Alertify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" integrity="sha512-RgUjDpwjEDzAb7nkShizCCJ+QTSLIiJO1ldtuxzs0UIBRH4QpOjUU9w47AF9ZlviqV/dOFGWF6o7l3lttEFb6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ======= Sweet Alert ========= -->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
        #reset_body{
            height: 100vh;
            padding: 10rem;
        }

        .error {
            color: red;
        }

        input.error {
            border: thin solid red;
        }
    </style>

    <body>
    <header>
        <div class="row">
            <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                        <div class="container">
                            <a class="navbar-brand" href="./index.php"><span class="text-warning">Destiny</span>Driving</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
    </header>

    <section id='reset_body'>
        <div class="d-flex justify-content-center align-items-center">
            <form action="#" id="resetPass" class="login-form border shadow p-3 rounded text-center" style="width: 400px;">
                <h1 class="mt-3 mb-3">Reset Password</h1>
                    <label for="password">Password:</label>
                <div class="password-input-container form-group mb-4">
                    <input type="password" class="form-control rounded-left" id="password" minlength="8" name="password" placeholder="Password" required>
                    <span id="showPasswordToggle1" class="password-toggle fas fa-eye"></span>
                </div>
                
                <label for="password">Confirm Password:</label>
                <div class="password-input-container form-group mb-4">
                    <input type="password" class="form-control rounded-left" id="password2" minlength="8" name="cnf_password" placeholder="Confirm Password" required>
                    <span id="showPasswordToggle2" class="password-toggle fas fa-eye"></span>
                </div>
                <input type="hidden" id="email" value="<?php echo $email; ?>">
                <div class="form-group mb-4">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
                </div>
                <a href="index.php?openModal=true">< Return to Login Page.</a>
            </form>
        </div>
    </section>

    <script>
        $(document).on("click", "#showPasswordToggle1", function () {
            var passwordInput = $("#password");
            var passwordInput2 = $("#password2");
            var passwordFieldType = passwordInput.attr("type");

            // Toggle the password field type between "password" and "text"
            if (passwordFieldType === "password") {
            passwordInput.attr("type", "text");
            passwordInput2.attr("type", "text");
            $("#showPasswordToggle1").removeClass("fa-eye").addClass("fa-eye-slash");
            $("#showPasswordToggle2").removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
            passwordInput.attr("type", "password");
            passwordInput2.attr("type", "password");
            $("#showPasswordToggle1").removeClass("fa-eye-slash").addClass("fa-eye");
            $("#showPasswordToggle2").removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });


        $("#resetPass").validate({
            rules: {
                password: {
                    required: true,
                },
                cnf_password: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                password: {
                    required: "Please enter a password",
                },
                cnf_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match",
                },
            },
            submitHandler: function (form, event){
                event.preventDefault();

                var password = $('#password').val();
                var email = $('#email').val();
                // console.log(password + email);
                // console.log("gago");
                $.ajax({
                url: "database/registration/confirmreset.php",
                method: "post",
                data: {password: password, email: email},
                success: function (data) {
                    console.log(data);
                    if (data != "error") {
                        Swal.fire({
                            icon: "success",
                            title: "Password has been reset.",
                            text: "Please return to the login page.",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function() {
                        // Code to execute after the timer finishes
                            window.location.href = "index.php?openModal=true";
                        // Perform any additional actions or redirect to another page
                        });
                    } else {
                    Swal.fire({
                        icon: "error",
                        title: "Couldnt Reset Password...",
                        text: "There is an error resetting the password.",
                    });
                    }
                },
            });
            }
        })
    </script>
    </body>

<!-- Popper and Bootstrap 5.3 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!-- Alertify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
<!-- <script src="./assets/owlcarousel/js/bootstrap.min.js"></script>  -->
<!-- Main Script -->
<script src="assets/js/script.js"></script>
</body>
</html>