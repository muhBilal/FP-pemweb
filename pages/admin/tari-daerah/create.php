<?php
require '../../../controller/tariDaerahController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessages = [];
    $uploadOk = 1;
    $targetDir = "../../../public/images/upload/tari-daerah/";

    if ($_FILES["image"]["tmp_name"]) {
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $errorMessages[] = "File is not an image.";
            $uploadOk = 0;
        }
        if ($_FILES["image"]["size"] > 5000000) {
            $errorMessages[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            $errorMessages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 1 && $_FILES["image"]["tmp_name"]) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $newFileName = uniqid() . '_' . time() . '.' . $imageFileType;
        $targetFile = $targetDir . $newFileName;

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

            $result = insertTariDaerah($data);

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Insert failed.";
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    } else {
        foreach ($errorMessages as $message) {
            echo $message . "<br>";
        }
    }
}
?>

<?php include '../../../templates/admin/head.php'; ?>
<div class="flex flex-wrap m-[1rem]">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-2xl font-semibold dark:text-white mb-5">
                    Tambah Data
                </h6>

                <form class="px-10 pb-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama
                        </label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Deskripsi
                        </label>
                        <input id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsi" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Maps
                        </label>
                        <input type="text" id="maps" name="maps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Maps" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Youtube URL
                        </label>
                        <input type="text" id="youtube" name="youtube" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Youtube URL" />
                    </div>
                    <div class="mb-6">
                        <label htmlFor="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Image
                        </label>
                        <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
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

