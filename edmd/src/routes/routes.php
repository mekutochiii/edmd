<?php
session_start();

include_once('../controller/database.php');
include_once '../static/query.php';
include_once('../model/userModel.php');
include_once('../model/dashboardModel.php');
include_once('../controller/userController.php');
include_once('../controller/dashboardController.php');
include_once('../services/noteServices.php');
include_once('../middleware/Auth.php');


if (isset($_POST['type'])) {
    switch ($_POST['type']) {

        case 'login':
            $ctr = new userController();
            echo $ctr->user_login($_POST['identifier'], $_POST['password']);
            break;

        case 'register':
            $ctr = new userController();
            echo $ctr->user_register($_POST);
            break;

        case 'get_role':
            echo isset($_SESSION['role_id']) ? $_SESSION['role_id'] : 'null';
            break;

        case 'check_auth':
            $auth = new Auth();
            $authResponse = $auth->isAuthenticated();
            if (isset($authResponse['redirect'])) {
                header("Location: " . $authResponse['redirect']);
                exit();
            }
            echo json_encode($authResponse);
            break;

        case 'check_role_redirect':
            $auth = new Auth();
            $authResponse = $auth->checkRoleRedirect();
            if (isset($authResponse['redirect'])) {
                header("Location: " . $authResponse['redirect']);
                exit();
            }
            break;

        case 'total_users':
            $ctr = new dashboardController();
            $result = $ctr->getTotalUsers();
            echo json_encode($result);
            break;

        case 'notes':
            include_once '../services/noteServices.php';
            break;

        case 'logout':
            $ctr = new userController();
            echo $ctr->user_logout();
            break;

        default:
            echo "Invalid request type";
            break;
    }
}
