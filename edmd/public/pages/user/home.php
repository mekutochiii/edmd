<?php
session_start();
  
include_once '../../../src/middleware/auth.php';

$auth = new Auth();
$authResponse = $auth->handleRestrictedAccess(2);

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
    <link rel="stylesheet" href="../../lib/css/home.css">
    <title>Home | Page</title>
    
</head>
<body>
<?php include_once '../user/sidebar/sidebar.php'; ?>
    <div class="frame" >
    <h2 class="greeting">Hi! <?php echo htmlspecialchars($username); ?> </h2>
    <h3 class="welcome">Welcome to Home Page</h3>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../../lib/js/my.js"></script>
</html>