<?php
include_once '../../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->isAuthenticated();

if (isset($authResponse['redirect'])) {
    header("Location: " . $authResponse['redirect']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../lib/css/sidebar.css">
    <title>SideBar</title>
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>

    <div class="sidebar">
        <header>Menu</header>

        <a href="http://localhost/edmd/public/pages/user/home.php" class="active">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>

        <a href="http://localhost/edmd/public/view/user/notes.php">
            <i class="far fa-question-circle"></i>
            <span>Notes</span>
        </a>

        <!-- <a href="#">
            <i class="fas fa-sliders-h"></i>
            <span>Services</span>
        </a>

        <a href="#">
            <i class="far fa-envelope"></i>
            <span>Contact</span>
        </a> -->

        <a onclick="user_logout()">
            <i class="fas fa-lock"></i>
            <span>Logout</span>
        </a>

    </div>
</body>
</html>