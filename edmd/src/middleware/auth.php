<?php

class Auth
{
    private $baseUrl = '/edmd/public';

    public function isLoggedIn() {
        return isset($_SESSION['username']) && isset($_SESSION['role_id']);
    }

    public function isAuthenticated() {
        $currentPage = basename($_SERVER['PHP_SELF']);

        if (!$this->isLoggedIn()) {
            if ($currentPage === 'login.php') {
                return ['status' => 'unauthenticated'];
            }
            return ['redirect' => $this->baseUrl . '/view/login.php'];
        }

        return ['status' => 'authenticated'];
    }

    public function checkRoleRedirect() {
        if (!$this->isLoggedIn()) {
            return ['redirect' => $this->baseUrl . '/view/login.php'];
        }

        switch ($_SESSION['role_id']) {
            case 1:
                return ['redirect' => $this->baseUrl . '/pages/admin/dashboard.php'];
            case 2:
                return ['redirect' => $this->baseUrl . '/pages/user/home.php'];
            default:
                return ['redirect' => $this->baseUrl . '/view/login.php'];
        }
    }

    public function handleRestrictedAccess($requiredRole) {
        if (!$this->isLoggedIn()) {
            return ['redirect' => $this->baseUrl . '/view/warning/pageError.php?redirect=login'];
        }

        if ($_SESSION['role_id'] != $requiredRole) {
            switch ($_SESSION['role_id']) {
                case 1:
                    return ['redirect' => $this->baseUrl . '/pages/admin/dashboard.php'];
                case 2:
                    return ['redirect' => $this->baseUrl . '/pages/user/home.php'];
            }
        }

        return ['status' => 'authorized'];
    }
}
?>
