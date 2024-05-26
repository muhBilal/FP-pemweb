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
<?php include '../../../templates/admin/head.php'; ?>
<!--<h2>Create Pakaian Adat</h2>-->
<!--<form action="/pemweb/pages/admin/pakaian-adat/create.php" method="POST" enctype="multipart/form-data"><label-->
<!--            for="name">Name:</label><br>-->
<!--    <input type="text" id="name" name="name"><br>-->
<!--    <label for="description">Description:</label><br>-->
<!--    <textarea id="description" name="description"></textarea><br>-->
<!--    <label for="maps">Maps:</label><br>-->
<!--    <input type="text" id="maps" name="maps"><br>-->
<!--    <label for="youtube">Youtube URL:</label><br>-->
<!--    <input type="text" id="youtube" name="youtube"><br>-->
<!--    <label for="image">Image:</label><br>-->
<!--    <input type="file" id="image" name="image"><br><br> <input type="submit" value="Create">-->
<!--</form>-->

<div class="flex flex-wrap m-[1rem]">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-2xl font-semibold dark:text-white mb-5">
                    Tambah Data
                </h6>

                <form class="px-10 pb-10" action="/pemweb/pages/admin/pakaian-adat/create.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama
                        </label>
                        <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Deskripsi
                        </label>
                        <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Maps
                        </label>
                        <input type="text" id="maps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Youtube URL
                        </label>
                        <input type="text" id="youtube" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Image
                        </label>
                        <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul" />
                    </div>
                    <button class="px-4 py-3 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform focus:ring-4 focus:ring-[#1A2035]" type="submit">
                        <span class="font-2xl">Tambah Data</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../../../templates/admin/tail.php'; ?>

