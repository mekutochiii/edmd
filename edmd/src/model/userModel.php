<?php
class userModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function login($identifier) {
        $query = Query::LOGIN_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->execute([$identifier, $identifier]);

        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
 
    public function register($firstName, $lastName, $middleName, $birthdate, $username, $password, $email, $roleId) {
        $query = Query::REGISTER_QUERY();
        $stmt = $this->con->prepare($query);
    
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':middle_name', $middleName);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role_id', $roleId);
    
        if ($stmt->execute()) {
            return "Registration successful";
        } else {
            return "Registration failed: " . $stmt->errorInfo()[2];
        }
    }
}
    