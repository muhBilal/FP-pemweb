<?php
require_once __DIR__ . '/../config/connection.php';
    
function getUser() {
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $users;
}

function getUserById($id) {
    global $conn;
    $query = "SELECT * FROM users WHERE id = $id";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

function updateUser($data) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $data['username']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $password = password_hash(mysqli_real_escape_string($conn, $data['password']), PASSWORD_DEFAULT);
    $id = $data['id'];

    $query = "UPDATE users SET
                username = ?,
                email = ?,
                password = ?
              WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $username, $email, $password, $id);

    $result = $stmt->execute();

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Update session variables
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    return getUserById($id);
}