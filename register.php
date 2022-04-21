<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="./public/style.css">
</head>

<?php
    include "./database/function.php";
    if (isset($_POST['register'])) {
        $em_name = $_POST['em_name'];
        $em_email = $_POST['em_email'];
        $em_phone = $_POST['em_phone'];
        $em_password = $_POST['em_password'];
        $em_password = md5($em_password);
        $em_pass_confirm = $_POST['em_pass_confirm'];
        $em_pass_confirm = md5($em_pass_confirm);

        // Validation Check
        if (empty($em_name) || empty($em_email) || empty($em_phone) || empty($em_password) || empty($em_pass_confirm)) {
            $error = "Please Fill all required fields!";
        }else {
            if ($em_password !== $em_pass_confirm) {
                $pass_error = "Password and Confirm Password doesn't match";
            }else {
                register($em_name, $em_email, $em_phone, $em_password);
            }
        }
    }
?>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Admin</b> Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <?php 
                    if($error){ ?>
                <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                <?php }
                    if($pass_error){ ?>
                <div class="alert alert-danger" role="alert"><?php echo $pass_error; ?></div>
                <?php }
                    if ($_SESSION['message']) {
                        session_start();
                        echo $_SESSION['message']; 
                        session_unset($_SESSION['message']); 
                        session_destroy();
                    }
                ?>
                <form method="post">
                    <div class="input-group mb-3">
                        <input name="em_name" type="text" class="form-control" placeholder="Full name"
                            value="<?php echo $em_name ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="em_email" type="email" class="form-control" placeholder="Email"
                            value="<?php echo $em_email ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="em_phone" type="text" class="form-control" placeholder="Phone"
                            value="<?php echo $em_phone ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="em_password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="em_pass_confirm" type="password" class="form-control"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button name="register" type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="index.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Custom Script -->
    <script src="./public/script.js"></script>
</body>

</html>