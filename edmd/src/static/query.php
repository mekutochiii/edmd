<?php
class Query {
    
    public static function LOGIN_QUERY() {
        return "SELECT username, password, role_id FROM users WHERE username = ? OR email = ?";
    }    

    public static function REGISTER_QUERY() {
        return "INSERT INTO users 
                (first_name, last_name, middle_name, birthdate, username, password, email, role_id, created_at) 
                VALUES 
                (:first_name, :last_name, :middle_name, :birthdate, :username, :password, :email, :role_id, NOW())";
    }  
    
    //Dashboard
    public static function TOTAL_USERS_QUERY() {
        return "SELECT COUNT(*) as total_users FROM users WHERE role_id = 2";
    }
}