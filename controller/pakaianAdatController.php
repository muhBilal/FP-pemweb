<?php
require_once __DIR__ . '/../config/connection.php';
global $conn;
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
    $query = "INSERT INTO pakaian_adat (nama, deskripsi, gambar) VALUES ('$data[nama]', '$data[deskripsi]', '$data[gambar]')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: ". mysqli_error($conn));
    }
    return $result;
}

function updatePakaianAdat($data) {
    global $conn;
    $query = "UPDATE pakaian_adat SET nama = '$data[nama]', deskripsi = '$data[deskripsi]', gambar = '$data[gambar]' WHERE id = $data[id]";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: ". mysqli_error($conn));
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
