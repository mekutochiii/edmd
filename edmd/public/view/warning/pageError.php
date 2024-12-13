<?php
$redirect = $_GET['redirect'] ?? null;
$redirectMessage = "";
$redirectURL = "";

if ($redirect === 'login') {
    $redirectMessage = "You will be redirected to the login page.";
    $redirectURL = "../login.php";
    header("Refresh: 3; url=$redirectURL");
} elseif ($redirect === 'admin_dashboard') {
    $redirectMessage = "You will be redirected to the admin dashboard.";
    $redirectURL = "../pages/Admin/dashboard.php";
    header("Refresh: 3; url=$redirectURL");
} elseif ($redirect === 'user_home') {
    $redirectMessage = "You will be redirected to the user home.";
    $redirectURL = "../pages/User/home.php";
    header("Refresh: 3; url=$redirectURL");
} else {
    $redirectMessage = "The page you are looking for does not exist.";
    $redirectURL = null;
    header("Refresh: 3; url=$redirectURL");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
</head>
<body>
    <div class="container">
        <h1>404 - Page Not Found</h1>
        <p><?php echo htmlspecialchars($redirectMessage); ?></p>
        <?php if ($redirectURL): ?>
            <p>If you're not redirected, <a href="<?php echo htmlspecialchars($redirectURL); ?>">click here</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>
