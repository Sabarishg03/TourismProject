<?php
// This script will handle login
session_start();

// Check if the user is already logged in


require_once "config.php";

$username = $password = "";
$err = "";

// If request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username and password";
    }
    else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if(empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password, $hashed_password)) {
                            // Password is correct. Allow the user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            // Redirect user to welcome page
                            header("location: one.php");
                            exit;
                        }
                        else {
                            $err = "Incorrect password";
                        }
                    }
                }
                else {
                    $err = "Username not found";
                }
            }
            else {
                echo "Something went wrong with the statement execution";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>


<!-- Your HTML content -->
<!-- ... -->



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/css/util.css">
    <link rel="stylesheet" type="text/css" href="./login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn" style="margin-bottom: 0px;">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>


                    <div class="flex-col-c p-t-155" style="margin-top: 10px;padding-top:0px;">
                        <span class="txt1 p-b-17">
                            Or Sign Up here
                        </span>

                        <a href="./register.php" class="txt2">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>