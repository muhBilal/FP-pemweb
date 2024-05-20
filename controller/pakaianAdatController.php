<?php
require_once __DIR__ . '/../config/connection.php';
function getPakaianAdat() {
    global $conn;
    $query = "SELECT * FROM pakaian_adat";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $pakaian_adat = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pakaian_adat;
}

function getPakaianAdatById($id) {
    global $conn;
    $query = "SELECT * FROM pakaian_adat WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $pakaian_adat = mysqli_fetch_assoc($result);
    return $pakaian_adat;
}

function insertPakaianAdat($data) {
    global $conn;
    $name = mysqli_real_escape_string($conn, $data['name']);
    $description = mysqli_real_escape_string($conn, $data['description']);
    $maps = mysqli_real_escape_string($conn, $data['maps']);
    $youtube = mysqli_real_escape_string($conn, $data['youtube']);
    $image = mysqli_real_escape_string($conn, $data['image']);

    $query = "INSERT INTO pakaian_adat (name, description, maps, youtube_url, image_url) 
              VALUES ('$name', '$description', '$maps', '$youtube', '$image')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    return $result;
}

function updatePakaianAdat($data) {
    global $conn;
    $name = mysqli_real_escape_string($conn, $data['name']);
    $description = mysqli_real_escape_string($conn, $data['description']);
    $maps = mysqli_real_escape_string($conn, $data['maps']);
    $youtube = mysqli_real_escape_string($conn, $data['youtube']);
    $image = mysqli_real_escape_string($conn, $data['image']);
    $id = $data['id'];

    $query = "UPDATE pakaian_adat SET
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

function deletePakaianAdat($id) {
    global $conn;
    $query = "DELETE FROM pakaian_adat WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: ". mysqli_error($conn));
    }
    return $result;
}
?>
