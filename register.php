<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: index.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>
<!-- -------------------------------------------------------- -->
<!-- PHP code (without changes) -->

<!-- -------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Head content -->
    <link rel="stylesheet" href="./style/Regstyle.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="" method="post">
            <div class="input-box">
                <input type="text" name="username" placeholder="Enter your name" required>
                <span class="error"><?php echo $username_err; ?></span>
            </div>
            <!-- Add email field here -->

            <div class="input-box">
                <input type="password" name="password" placeholder="Create password" required>
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirm password" required>
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="policy">
                <input type="checkbox" name="accept_terms" value="1">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="./index.php">Login now</a></h3>
            </div>
        </form>
    </div>
</body>

</html>