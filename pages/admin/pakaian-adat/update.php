<?php
require '../../../controller/pakaianAdatController.php';

if (!isset($_GET['id'])) {
    exit('ID parameter is missing');
}

$id = $_GET['id'];
$pakaian_adat = getPakaianAdatById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $id,
        'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
        'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING),
        'maps' => filter_input(INPUT_POST, 'maps', FILTER_SANITIZE_URL),
        'youtube' => filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_URL),
        'image' => filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL)
    ];

    $result = updatePakaianAdat($data);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo "Update failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pakaian Adat</title>
</head>
<body>
<h2>Update Pakaian Adat</h2>
<form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($pakaian_adat['id']); ?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($pakaian_adat['name']); ?>"><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"><?php echo htmlspecialchars($pakaian_adat['description']); ?></textarea><br>
    <label for="maps">Maps:</label><br>
    <input type="text" id="maps" name="maps" value="<?php echo htmlspecialchars($pakaian_adat['maps']); ?>"><br>
    <label for="youtube">Youtube URL:</label><br>
    <input type="text" id="youtube" name="youtube" value="<?php echo htmlspecialchars($pakaian_adat['youtube_url']); ?>"><br>
    <label for="image">Image URL:</label><br>
    <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($pakaian_adat['image_url']); ?>"><br><br>
    <input type="submit" value="Update">
</form>
</body>
</html>
