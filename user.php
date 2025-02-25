<?php
require_once "database.php";

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function register($name, $email, $password, $profile_picture) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, password, profile_picture) 
                  VALUES (:name, :email, :password, :profile_picture)";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            "name" => $name,
            "email" => $email,
            "password" => $hashed_password,
            "profile_picture" => $profile_picture
        ]);
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            return $user;
        }
        return false;
    }
}
?>
