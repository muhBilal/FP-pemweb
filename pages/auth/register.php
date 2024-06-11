<?php
    require_once __DIR__ . '/../../controller/AuthController.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
    unset($_SESSION['error']);

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = ['username' => $username, 'email' => $email, 'password' => $password];

        $authController = new AuthController();
        $authController->register($data);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="h-screen flex gap-5 w-full p-4">
        <div class="w-full md:w-[40%] font-poppins">
            <img src="../../public/images/sidebar-logo.webp" alt="" class="w-36 h-12 object-cover" />
            <div class="px-7">
                <div class="px-9">
                    <h1 class="font-bold text-3xl mt-14">Daftar</h1>
                    <p class="text-gray-400 mt-5 mb-12">
                        Jelajahi Keragaman Indonesia dengan ExSantara
                    </p>

                    <div class="my-5">
                        <button class="mt-2 bg-white w-full flex gap-3 items-center text-gray-700 dark:text-gray-300 justify-center gap-x-3 text-sm sm:text-base dark:bg-gray-900 dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100 duration-200 transition ease-in transform hover:-translate-y-1 active:translate-y-0 border px-8 py-2.5">
                            <svg class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clipPath="url(#clip0_3033_94454)">
                                    <path d="M23.766 12.2764C23.766 11.4607 23.6999 10.6406 23.5588 9.83807H12.24V14.4591H18.7217C18.4528 15.9494 17.5885 17.2678 16.323 18.1056V21.1039H20.19C22.4608 19.0139 23.766 15.9274 23.766 12.2764Z" fill="#4285F4" />
                                    <path d="M12.2401 24.0008C15.4766 24.0008 18.2059 22.9382 20.1945 21.1039L16.3276 18.1055C15.2517 18.8375 13.8627 19.252 12.2445 19.252C9.11388 19.252 6.45946 17.1399 5.50705 14.3003H1.5166V17.3912C3.55371 21.4434 7.7029 24.0008 12.2401 24.0008Z" fill="#34A853" />
                                    <path d="M5.50253 14.3003C4.99987 12.8099 4.99987 11.1961 5.50253 9.70575V6.61481H1.51649C-0.18551 10.0056 -0.18551 14.0004 1.51649 17.3912L5.50253 14.3003Z" fill="#FBBC04" />
                                    <path d="M12.2401 4.74966C13.9509 4.7232 15.6044 5.36697 16.8434 6.54867L20.2695 3.12262C18.1001 1.0855 15.2208 -0.034466 12.2401 0.000808666C7.7029 0.000808666 3.55371 2.55822 1.5166 6.61481L5.50264 9.70575C6.45064 6.86173 9.10947 4.74966 12.2401 4.74966Z" fill="#EA4335" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3033_94454">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>Daftar dengan Google</span>
                        </button>
                    </div>

                    <div class="flex items-center gap-2 my-5">
                        <div class="w-full h-1 border-b-2"></div>
                        <span class="text-bold">Atau</span>
                        <div class="w-full h-1 border-b-2"></div>
                    </div>

                    <?php if ($error): ?>
                        <p class="text-red-500"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <form class="mt-5" action="" method="POST">
                        <!-- errorMessage && (
                    <div class="mb-6">
                        <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            errorMessage
                        </span>
                    </div>
                    ) -->
                        <div class="mb-6">
                            <input type="username" id="username" name="username" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="namakamu" />
                            <!-- errors.email && (
                        <p class="text-red-500">errors.email.message</p>
                        ) -->
                        </div>
                        <div class="mb-6">
                            <input type="email" id="email" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@gmail.com" />
                            <!-- errors.email && (
                        <p class="text-red-500">errors.email.message</p>
                        ) -->
                        </div>
                        <div class="mb-6">
                            <input type="password" id="password" name="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*****" />
                            <!-- errors.password && (
                        <p class="text-red-500">errors.password.message</p>
                        ) -->
                        </div>

                        <button name="register" type="submit" class="px-4 py-3 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform focus:ring-4 focus:ring-primary w-full">
                            <span class="ml-2 font-2xl">Daftar</span>
                        </button>
                        <p class="text-gray-400 my-5">
                            Sudah mempunyai akun?
                            <a href='login.php' class="text-gray-600 font-bold cursor-pointer hover:text-blue-500">
                            Login sekarang
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-[60%] relative hidden md:block">
            <img src="../../public/images/bg-indonesia.jpg" alt="" class="h-full w-full object-cover rounded-2xl" />
            <div class="w-full h-full rounded-2xl bg-gradient-to-t from-gray-900 opacity-10 absolute bottom-0"></div>
            <div class="w-full h-full rounded-2xl bg-gradient-to-t from-gray-900 opacity-50 absolute bottom-0"></div>
            <div class="absolute top-0 right-0 bg-white rounded-full m-5 text-md px-4 font-semibold py-1 flex gap-2 items-center cursor-pointer">
                <span>www.exsantara.com</span>
                <FaLocationArrow class="font-extrabold -rotate-12" />
            </div>
            <div class="absolute bottom-0 left-0 p-10 font-poppins text-white">
                <p class="font-extrabold text-2xl leading-10">
                    "Bersama ExSantara menjelajahi kebudayaan dan berpetualang menikmati
                    keindahan indonesia yang menakjubkan"
                </p>
                <div class="flex gap-4 mt-3">
                    <div class="max-w-xs border border-white px-2 py-1 flex items-center gap-3 rounded-lg">
                        <LiaPeopleCarrySolid />
                        <span>200+ keberagaman</span>
                    </div>
                    <div class="max-w-xs border border-white px-2 py-1 flex items-center gap-3 rounded-lg">
                        <GiEarthAmerica />
                        <span>38 Provinsi dan 100+ kebudayaan</span>
                    </div>
                </div>
            </div>
        </div>
        </main>
</body>

</html>