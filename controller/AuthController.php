<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/connection.php';

class AuthController {
    public function login($data) {
        global $conn;
        $email = mysqli_real_escape_string($conn, $data['email']);
        $password = htmlspecialchars($data['password']);


        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $verifyPassword = password_verify($password, $user['password']);
        
            if ($verifyPassword) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] === 'visitor'){
                    header("Location: ../../pages/home.php");
                }else{
                    header("Location: ../../pages/admin/pakaian-adat/index.php");
                }
            } else {
                $_SESSION['error'] = "Password salah!";
                header("Location: ../../pages/auth/login.php");

            }
        } else {
            $_SESSION['error'] = "User tidak ditemukan!";
            header("Location: ../../pages/auth/login.php");
        }
    }

    public function register($data) {
        global $conn;
        $username = mysqli_real_escape_string($conn, $data['username']);
        $email = mysqli_real_escape_string($conn, $data['email']);
        $password = mysqli_real_escape_string($conn, $data['password']);
        $role = 'visitor'; // Default role

        if (empty($username) || empty($email) || empty($password)) {
            $_SESSION['error'] = "Semua bidang wajib diisi!";
            header("Location: ../../pages/auth/register.php");
            exit();
        }

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Email sudah terdaftar!";
            header("Location: ../../pages/auth/register.php");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', '$role')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            header("Location: ../../pages/home.php");
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
            header("Location: ../../pages/auth/login.php");
        }

        $conn->close();
        exit();
    }

    public function logout(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();
        session_destroy();

        header("Location: ../../pages/auth/login.php");
        exit();
    }
}

?>