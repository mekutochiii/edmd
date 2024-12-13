<?php
session_start();
include_once '../../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->handleRestrictedAccess(1);

if (isset($authResponse['redirect'])) {
    header("Location: " . $authResponse['redirect']);
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../lib/css/dashboard.css">
    <link rel="stylesheet" href="../../lib/css/home.css">
    <title>Dashboard</title>

</head>

<body>

    <?php include_once '../admin/sidebar/sidebar.php'; ?>

    <div class="card">
        <div class="card-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="card-info">
            <h2 id="totalUsers">0</h2>
            <p>Total Users</p>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../../lib/js/my.js"></script>
<script src="../../lib/js/dashboard.js"></script>
</html>