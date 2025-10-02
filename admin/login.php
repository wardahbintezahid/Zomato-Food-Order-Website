<?php
include("../connection.php");

$error = false;

if (isset($_GET['error'])) {
    $error = true;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `admins` WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        header("location:dashboard.php");
    } else {
        header("location:login.php?error=error");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Zomato - log In</title>

    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <section class="log-in-section section-b-space">
        <a href="#" class="logo-login"><img src="assets/images/logo/1.png" class="img-fluid" alt=""></a>
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Zomato</h3>
                            <h5>Log In Your Account</h5>
                        </div>

                        <div class="input-box">
                            <form action="login.php" method="post" class="row g-3">
                                <div class="col-12">
                                    <label class="col-form-label pt-0">Your Email</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label pt-0">Your Password</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <?php
                                    if ($error) {
                                        echo '
                                            <div class="col-12">
                                                <p class="text-danger">Email or password do not match</p>
                                            </div>
                                        ';
                                    }
                                ?>
                                

                                <div class="col-12">
                                    <input class="btn btn-danger w-100 justify-content-center" type="submit" name="submit" value="Log In">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

</body>
</html>