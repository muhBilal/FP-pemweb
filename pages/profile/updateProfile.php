<?php
require '../../controller/userController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// if (!isset($_GET['id'])) {
//     exit('ID parameter is missing');
// }
$id = $_SESSION['id'];
$user = getUserById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessages = [];
    $uploadOk = 1;

    if ($uploadOk == 1) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessages[] = "Email tidak valid";
        }

        if (strlen($password) < 8) {
            $errorMessages[] = "Password harus memiliki panjang minimal 8 karakter";
        }

        if (empty($errorMessages)) {
            $data = [
                'id' => $id,
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];

            $result = updateUser($data);

            if ($result) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                header('Location: ../home.php');
                exit();
            } else {
                echo "Update failed. Terjadi kesalahan dalam menyimpan data.";
            }
        } else {
            foreach ($errorMessages as $message) {
                echo $message . "<br>";
            }
        }
    } else {
        echo "Terjadi kesalahan dalam proses upload file.";
    }
}
?>

<script src="https://cdn.tailwindcss.com"></script>
<div class="flex flex-wrap m-[1rem]">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="text-2xl font-semibold dark:text-white mb-5">
                    Edit Profil
                </h6>

                <form class="px-10 pb-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo htmlspecialchars($id); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Username
                        </label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password
                        </label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <button class="px-4 py-3 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform focus:ring-4 focus:ring-[#1A2035]" type="submit">
                        <span class="font-2xl">Update</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../../templates/tail.php'; ?>
