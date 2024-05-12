<?php
$envFile = __DIR__ . '/../.env';
if (!file_exists($envFile)) {
    die('.env file not found');
} else {
    $env = file_get_contents($envFile);
    $env = explode("\n", $env);
    $env = array_filter($env);
    $env = array_map(function ($item) {
        return explode('=', $item);
    }, $env);
    $env = array_column($env, 1, 0);
    $appUrl = $env['APP_URL'];
    $imagePath = $appUrl . '/public/images/man.webp';
}
?>

<section class="font-poppins">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clipRule="evenodd" fillRule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <aside id="logo-sidebar" class="fixed top-0 left-0 z-10 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full flex flex-col justify-between p-12 overflow-y-auto bg-[#1A2035] text-white">
                <div class="pl-4 ">
                    <img src="<?php echo $imagePath ?>" class="w-[80px] h-[80px] object-cover rounded-xl" alt="" />
                    <h1 class="font-boldf text-2xl mt-5">name</h1>
                    <h4 class="sm:text-md text-gray-400">email</h4>
                    <p class="text-sm text-yellow-400">100 Poin</p>
                </div>
                <ul class="space-y-2 font-medium text-lg">
                    <li>
                        <a href="/pemweb/pages/pakaian-adat/list.php" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-100 hover:text-gray-700 group">
                            <span class="ml-3">Tari Daerah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/about-us" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-100 hover:text-gray-700 group">
                            <span class="ml-3">Makanan Daerah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/about-us" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-100 hover:text-gray-700 group">
                            <span class="ml-3">Tari Daerah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/about-us" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-gray-100 hover:text-gray-700 group">
                            <span class="ml-3">Makanan Adat</span>
                        </a>
                    </li>
                </ul>
                <div class="cursor-pointer flex items-center p-2 text-red-500 rounded-lg hover:bg-red-600 hover:text-gray-100 group" onClick={logout}>
                    <span class="flex-1 ml-3 whitespace-nowrap">Keluar</span>
                </div>
            </div>
        </aside>
    </section>