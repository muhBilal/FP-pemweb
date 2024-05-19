<?php
session_start();
require_once __DIR__ . '/../config/connection.php';

class AuthController {
    public function login($data) {
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = mysqli_real_escape_string($conn, $data['email']);
            $password = mysqli_real_escape_string($conn, $data['password']);
        
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
        
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['email'] = $email;
                    header("Location: pages/home.php");
                } else {
                    $_SESSION['error'] = "Password salah!";
                    header("Location: pages/auth/login.php");
                }
            } else {
                $_SESSION['error'] = "User tidak ditemukan!";
                header("Location: pages/auth/login.php");
            }
    
            $conn->close();
            exit();
        }
    }
}

?>