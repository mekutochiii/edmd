<?php
class userController {
    
    public function user_login($identifier, $password) {
        $db = new Database();
        $con = $db->initDatabase();
        $model = new userModel($con);
    
        $userData = $model->login($identifier);
    
        if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['username'] = $userData['username'];
            $_SESSION['role_id'] = $userData['role_id'];
            return "Login successful";
        } else {
            return "Invalid username or password";
        }
    }   
    

    public function user_register($data) {
        $db = new Database();
        $con = $db->initDatabase();
        $model = new userModel($con);
    
        $requiredFields = ['first_name', 'last_name', 'middle_name', 'birthdate', 'username', 'password', 'email'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return "Error: $field is required.";
            }
        }
    
        $firstName = htmlspecialchars($data['first_name']);
        $lastName = htmlspecialchars($data['last_name']);
        $middleName = htmlspecialchars($data['middle_name']);
        $birthdate = htmlspecialchars($data['birthdate']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    
        $roleId = 2;
        
        return $model->register($firstName, $lastName, $middleName, $birthdate, $username, $password, $email, $roleId);
    }    

    public function user_logout() {
        session_unset();
        session_destroy();
        return "Logout successful";
    }
    
}