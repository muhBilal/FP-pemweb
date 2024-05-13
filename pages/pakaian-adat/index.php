<?php
require '../../controller/pakaianAdatController.php';
$pakaian_adat = getPakaianAdat();
?>

<?php include '../../templates/head.php'; ?>
<section class="bg-[#1A2035] h-screen p-5 sm:ml-72">
    <div class="bg-gray-100 h-full rounded-xl overflow-auto">
        <div class="bg-gray-100 h-full">
            <div class="pl-5 pt-14 sm:pl-24 pr-5 pb-10 mx-auto h-full">
                <section class="flex justify-between items-center mb-10">
                    <h1 class="text-start text-3xl font-medium">Pakaian Adat</h1>
                    <form class="w-80">
                        <label
                            htmlFor="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                        >
                            Search
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                                <svg
                                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        stroke="currentColor"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        g
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                    />
                                </svg>
                            </div>
                            <input
                                type="search"
                                id="default-search"
                                class="block bg-gray-100 w-full p-4 pl-12 text-sm text-black border border-gray-400 rounded-full focus:ring-[#1A2035] focus:border-none focus:bg-white"
                                placeholder="Cari Nama Pakaian Adat ..."
                                required
                                onchange="searchPakaianAdat(this.value)"
                            />
                        </div>
                    </form>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a
                                    href="/home"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600"
                                >
                                    <svg
                                        class="w-3 h-3 mr-2.5"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Beranda
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg
                                        class="w-3 h-3 text-gray-400 mx-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 6 10"
                                    >
                                        <path
                                            stroke="currentColor"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="m1 9 4-4-4-4"
                                        />
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                         Pakaian Adat
                                      </span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </section>
                <section class="mt-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                        <?php foreach ($pakaian_adat as $pakaian) { ?>
                            <a href="/pemweb/pages/pakaian-adat/detail.php?id=<?= $pakaian['id'] ?>"
                               class="group cursor-pointer hover:shadow-sm transition-all duration-500 relative rounded-3xl">
                                <img src="<?= $pakaian['image_url']?>" alt="animals"
                                     class="w-full h-[400px] object-cover rounded-3xl"/>
                                <div class="bg-[#1A2035] text-gray-200 p-5 absolute bottom-0 rounded-3xl w-full">
                                    <p class="text-xl font-bold my-2 hover:text-blue-600 transition-all">
                                        <?= $pakaian['name'] ?>
                                    </p>
                                    <div class="overflow-hidden transition-all duration-500 max-h-0 group-hover:max-h-[200px]">
                                        <div class="text-gray-300 mt-3 text-sm">
                                            <?= $pakaian['description'] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<?php include '../../templates/tail.php'; ?>
