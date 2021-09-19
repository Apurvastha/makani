<?php
session_start(); 
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - BhatBhatte</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>








    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-dark clean-navbar" data-aos="fade-down" data-aos-duration="250" style="height: 60px;">
        <div class="container"><a class="text-center" href="Front%20page.html" style="color: rgb(243,245,247);width: 250px;height: 60pxpx;padding: -30px;background: url(&quot;assets/img/logo.png&quot;);"><br><br><br></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2" style="width: 50px;">
                <ul class="navbar-nav ml-auto"></ul><a href="Front_page.php" style="margin: 5px;padding: 3px;color: var(--white);">HOME</a><a href="login.php" style="margin: 5px;padding: 3px;color: var(--white);">Sign In</a><a href="login.php" style="margin: 5px;padding: 3px;color: var(--white);">Book Now!!!</a>
            </div>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                    <p>Please enter your details&nbsp;</p>
                </div>
                <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" method="POST">
               
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" name="email" id="email" required></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" id="password" name="password" required></div>
                    <div class="form-group">
                        <div class="form-check" style="width: 180px;"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Remember me</label></div>
                    </div><button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
                    <a class="btn btn-primary btn-block" role="button" href="signup.php">Create New Account</a>

                </form>


            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="clean-block add-on social-icons">
            <div class="icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php  

    include 'dbcon.php';
    if(isset($POST['submit'])){

        $email = $_POST['$email'];
        $password = $_POST['$password'];

        $email_search = "select * from signup where email ='$email'";

        $query= mysqli_query($con, $email_search);

        $email_count= mysqli_num_rows( $query);

        if($email_count){

            $email_pass= mysqli_fetch_assoc($query);

            $db_password= $email_pass['pass'];

            $pass_decode= password_verify($password, $db_pass);

            if($pass_decode){
                echo "Login Successfull";

            }else{
                echo "Incorrect password";
            }



        }else{
            echo "Invalid Email";
        }


    }



?>
</body>

</html>