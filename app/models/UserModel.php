<?php
require_once '../app/core/DatabaseQuery.php';

class UserModel extends DatabaseQuery {
    public function createUser($name, $email, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        return $this->executeAuthQueryLog($sql, [$name, $email, $hashedPassword, $role], false); // Không cần trả về dòng
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        return $this->executeAuthQueryLog($sql, [$email], true); // Trả về một dòng
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE name = ?";
        return $this->executeAuthQueryLog($sql, [$username], true);
    }
}


?>
