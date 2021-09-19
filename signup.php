<?php 
session_start();
 ?>

<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - BhatBhatte</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>

    <?php 
    include 'dbcon.php';

    if(isset($_POST['submit'])){
 $fname = mysqli_real_escape_string($con, $_POST['fname']) ;
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $pass= mysqli_real_escape_string($con, $_POST['pass']);
    $cpass= mysqli_real_escape_string($con, $_POST['cpass']);
    $ph= mysqli_real_escape_string($con, $_POST['ph']);

    $password = password_hash($pass, PASSWORD_BCRYPT);
    $cpassword = password_hash($cpass, PASSWORD_BCRYPT);

    $emailquery=" select * from registration where email='$email'";

    $query = mysqli_query($con,$emailquery);

    $emailcount= mysqli_num_rows($query);

    if($emailcount>0){
        echo "email already exists";
    }else{
        if ($pass===$cpass) {
            $insertquery ="insert into signup(fname, email, pass, cpass, ph)values('$fname','$email','$password','$cpassword','$ph')";

            $iquery= mysqli_query($con, $insertquery);

            if($iquery){
    ?>

        <script>
            alert("Data Inserted Sucessfully");
        </script>
    <?php
    ?>

        <script>
           location.replace("login.php");
        </script>
    <?php
}else{
    ?>

        <script>
            alert("Error!!!");
        </script>
    <?php
}
         
        }else{
            ?>

        <script>
            alert("password is not matching");
        </script>
    <?php
        }
    }}


?> 
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-dark clean-navbar" data-aos="fade-down" data-aos-duration="250" style="height: 60px;">
        <div class="container"><a class="text-center" href="Front%20page.html" style="color: rgb(243,245,247);width: 250px;height: 60pxpx;padding: -30px;background: url(&quot;assets/img/logo.png&quot;);"><br><br><br></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2" style="width: 50px;">
                <ul class="navbar-nav ml-auto"></ul><a href="Front_page.html" style="margin: 5px;padding: 3px;color: var(--white);">HOME</a><a href="login.php" style="margin: 5px;padding: 3px;color: var(--white);">Sign In</a><a href="login.php" style="margin: 5px;padding: 3px;color: var(--white);">Book Now!!!</a>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Sign up</h2>
                    <p>It's quick and easy.</p>
                </div>
                <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-group"><label for="name">Full Name</label><input class="form-control item" type="text" name="fname" id="name" required></div>
                     <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" name="email" id="email" required></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" name="pass" id="password" required></div>
                    <div class="form-group"><label for="cpassword">Confirm Password</label><input class="form-control item" type="password" name="cpass" id="cpassword" required></div>

                    <div class="form-group"><label for="ph">Phone number (+977)</label><input class="form-control item" type="number" name="ph" id="ph" maxlength="10" minlength="10" required></div>
                   <input type="submit" name="submit" value="Signup">
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
    
</body>
</html>
