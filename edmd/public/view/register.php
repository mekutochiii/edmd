<?php
session_start();
include_once '../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->isAuthenticated();

if ($authResponse === 'authenticated') {
    if (isset($_SESSION['role_id'])) {
        switch ($_SESSION['role_id']) {
            case 1:
                header("Location: http://localhost/edmd/public/pages/Admin/dashboard.php");
                exit();
            case 2:
                header("Location: http://localhost/edmd/public/pages/User/home.php");
                exit();
        }
    }

    header("Location: http://localhost/edmd/public/view/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="../lib/css/register.css">
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <p class="signup-text">Register</p>

            <form id="registerForm" class="register">
                <div class="register__field">
                    <i class="register__icon fas fa-user"></i>
                    <input type="text" name="first_name" class="register__input" placeholder="First Name" required>
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-user"></i>
                    <input type="text" name="last_name" class="register__input" placeholder="Last Name" required>
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-user"></i>
                    <input type="text" name="middle_name" class="register__input" placeholder="Middle Name">
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-calendar-alt"></i>
                    <input type="date" name="birthdate" class="register__input" required>
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-user-circle"></i>
                    <input type="text" name="username" class="register__input" placeholder="Username" required>
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-lock"></i>
                    <input type="password" name="password" class="register__input" placeholder="Password" required>
                </div>
                <div class="register__field">
                    <i class="register__icon fas fa-envelope"></i>
                    <input type="email" name="email" class="register__input" placeholder="Email" required>
                </div>
                <button type="button" class="register__submit" onclick="user_register()">
                    <span class="button__text">Register</span>
                </button>

                <p class="text">Already have an account? <a href="login.php" class="register-link">Login here!</a></p>
            </form>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../lib/js/my.js"></script>
</html>
