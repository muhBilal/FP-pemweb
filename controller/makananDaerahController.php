<?php
require_once __DIR__ . '/../config/connection.php';

function getMakananDaerah() {
    global $conn;
    $query = "SELECT * FROM makanan_daerah";

    if (isset($_POST['btnSearch'])) {
        $searchTerm = $_POST['search'];
        $query = "SELECT * FROM makanan_daerah WHERE name LIKE ?";
        $stmt = mysqli_prepare($conn, $query);
        $searchTerm = $searchTerm . '%';
        mysqli_stmt_bind_param($stmt, 's', $searchTerm);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $makanan_daerah = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $makanan_daerah;
}

function getMakananDaerahById($id) {
    global $conn;
    $query = "SELECT * FROM makanan_daerah WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $makanan_daerah = mysqli_fetch_assoc($result);
    return $makanan_daerah;
}

function insertMakananDaerah($data) {
    global $conn;
    $name = mysqli_real_escape_string($conn, $data['name']);
    $description = mysqli_real_escape_string($conn, $data['description']);
    $maps = mysqli_real_escape_string($conn, $data['maps']);
    $youtube = mysqli_real_escape_string($conn, $data['youtube']);
    $image = mysqli_real_escape_string($conn, $data['image']);

    $query = "INSERT INTO makanan_daerah (name, description, maps, youtube_url, image_url) 
              VALUES ('$name', '$description', '$maps', '$youtube', '$image')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    return $result;
}

function updateMakananDaerah($data) {
    global $conn;
    $name = mysqli_real_escape_string($conn, $data['name']);
    $description = mysqli_real_escape_string($conn, $data['description']);
    $maps = mysqli_real_escape_string($conn, $data['maps']);
    $youtube = mysqli_real_escape_string($conn, $data['youtube']);
    $image = mysqli_real_escape_string($conn, $data['image']);
    $id = $data['id'];

    $query = "UPDATE makanan_daerah SET
                        name = '$name', 
                        description = '$description', 
                        maps = '$maps',
                        youtube_url = '$youtube',
                        image_url = '$image'
                    WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    return $result;
}

function deleteMakananDaerah($id) {
    global $conn;
    $query = "DELETE FROM makanan_daerah WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: ". mysqli_error($conn));
    }
    return $result;
}
?>
