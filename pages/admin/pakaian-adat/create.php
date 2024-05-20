<?php
require '../../../controller/pakaianAdatController.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessages = [];
    $uploadOk = 1;
    $targetDir = "../../../public/images/upload/pakaian-adat/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    $check === false && $errorMessages[] = "File is not an image.";
    file_exists($targetFile) && $errorMessages[] = "Sorry, file already exists.";
    $_FILES["image"]["size"] > 5000000 && $errorMessages[] = "Sorry, your file is too large.";
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    !in_array($imageFileType, $allowedExtensions) && $errorMessages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = count($errorMessages) === 0 ? 1 : 0;

    if ($uploadOk == 1) {
        !is_dir($targetDir) && mkdir($targetDir, 0777, true);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imageUrl = $targetFile;
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded. URL: " . $imageUrl;
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $maps = filter_input(INPUT_POST, 'maps', FILTER_SANITIZE_URL);
            $youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_URL);

            $data = [
                'name' => $name,
                'description' => $description,
                'maps' => $maps,
                'youtube' => $youtube,
                'image' => $imageUrl
            ];

            $result = insertPakaianAdat($data);

            if ($result) {
                header('Location: index.php');
                exit();
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    }

//    if ($uploadOk == 1) {
//        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
//        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
//        $maps = filter_input(INPUT_POST, 'maps', FILTER_SANITIZE_URL);
//        $youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_URL);
//
//        $data = [
//            'name' => $name,
//            'description' => $description,
//            'maps' => $maps,
//            'youtube' => $youtube,
//            'image' => $imageUrl
//        ];
//
//        $result = insertPakaianAdat($data);
//
//        if ($result) {
//            header('Location: index.php');
//            exit();
//        } else {
//            echo "Insert failed.";
//        }
//    } else {
//        echo "Sorry, your file was not uploaded.";
//    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pakaian Adat</title>
</head>
<body>
<h2>Create Pakaian Adat</h2>
<form action="/pemweb/pages/admin/pakaian-adat/create.php" method="POST" enctype="multipart/form-data"><label
            for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <label for="maps">Maps:</label><br>
    <input type="text" id="maps" name="maps"><br>
    <label for="youtube">Youtube URL:</label><br>
    <input type="text" id="youtube" name="youtube"><br>
    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image"><br><br> <input type="submit" value="Create">
</form>
</body>
</html>
