<?php
include_once '../../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->isAuthenticated();

if (isset($authResponse['redirect'])) {
    header("Location: " . $authResponse['redirect']);
    exit();
}

// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);
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

        <a href="http://localhost/edmd/public/pages/Admin/dashboard.php" class="<?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>
        <div class="separator"></div> <!-- Separator -->

        <a href="http://localhost/edmd/public/view/admin/notes.php" class="<?= $current_page == 'notes.php' ? 'active' : '' ?>">
            <i class="far fa-question-circle"></i>
            <span>Notes</span>
        </a>
        <div class="separator"></div> <!-- Separator -->

        <a href="http://localhost/edmd/public/components/backup/backup.php" class="<?= $current_page == 'backup.php' ? 'active' : '' ?>">
            <i class="far fa-calendar"></i>
            <span>Backup</span>
        </a>
        <div class="separator"></div> <!-- Separator -->

        <a href="#" class="<?= $current_page == 'services.php' ? 'active' : '' ?>">
            <i class="fas fa-sliders-h"></i>
            <span>Services</span>
        </a>
        <div class="separator"></div> <!-- Separator -->

        <a href="#" class="<?= $current_page == 'contact.php' ? 'active' : '' ?>">
            <i class="far fa-envelope"></i>
            <span>Contact</span>
        </a>
        <div class="separator"></div> <!-- Separator -->

        <a onclick="user_logout()">
            <i class="fas fa-lock"></i>
            <span>Logout</span>
        </a>
    </div>
</body>
</html>
