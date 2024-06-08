<?php
$envFile = __DIR__ . '/../../.env';
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
}

$url = $_SERVER['REQUEST_URI'];
?>
<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
       aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
           sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
           href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Exantara</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"/>

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="<?php echo ($url == '/pemweb/pages/admin/pakaian-adat/') ? 'py-2.7 bg-blue-500/13' : '' ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="<?php echo $appUrl ?>/pages/admin/pakaian-adat/">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pakaian Adat</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                   href="./pages/tables.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Makanan Daerah</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo ($url == '/pemweb/pages/admin/tari-daerah/') ? 'py-2.7 bg-blue-500/13' : '' ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                   href="<?php echo $appUrl ?>/pages/admin/tari-daerah/">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tari Daerah</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                   href="./pages/virtual-reality.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">User</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                   href="./pages/virtual-reality.html">
<!--                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">-->
<!--                        <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>-->
<!--                    </div>-->
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease text-red-500 font-semibold">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- end sidenav -->