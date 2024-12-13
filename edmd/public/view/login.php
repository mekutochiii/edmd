<?php
session_start();
include_once '../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->isAuthenticated();

if ($authResponse['status'] === 'authenticated') {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="../lib/css/login.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="logo-container">
                    <img src="../lib/images/purple-logo.png" alt="Logo" class="logo-image">
                </div>
                <p class="signup-text">Login</p>
                <form id="loginForm" class="login">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="identifier" class="login__input" placeholder="Username/Email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password" required>
                    </div>
                    <button type="button" class="login__submit" onclick="user_login()">
                        <span class="button__text">Login</span>
                    </button>
                    <p class="text">Don't have an account? <a href="register.php" class="register-link">Register Here!</a></p>
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