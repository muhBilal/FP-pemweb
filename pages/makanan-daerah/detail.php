<?php
require '../../controller/makananDaerahController.php';
$envFile = __DIR__ . '/../../.env';
$env = file_get_contents($envFile);
$env = explode("\n", $env);
$env = array_filter($env);
$env = array_map(function ($item) {
    return explode('=', $item);
}, $env);
$env = array_column($env, 1, 0);
$appUrl = $env['APP_URL'];
$id = $_GET['id'];
$makanan = getMakananDaerahById($id);
?>


<?php include '../../templates/head.php'; ?>
<section class="bg-[#1A2035] h-screen p-5 sm:ml-72" xmlns="http://www.w3.org/1999/html">
    <div class="bg-gray-100 h-full rounded-xl overflow-auto">
        <!-- main content -->
        <div class="h-full">
            <div class="pl-5 pt-0 sm:pl-24 pr-5 pb-10 mx-auto h-full">
                <nav class="flex my-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a
                                    href="../home.php"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
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
                        <li>
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
                                <a
                                        href="./index.php"
                                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                                >
                                    Makanan Daerah
                                </a>
                            </div>
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
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                    <?= $makanan['name'] ?>
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>


                <section class="flex flex-col md:flex-row gap-5 mt-2">
                    <div class="w-full md:w-[100%] pr-0 md:pr-5">
                        <div class="bg-white rounded-xl ">
                            <img
                                    src="<?= $appUrl.$makanan["image_url"] ?>"
                                    alt="<?= $makanan["name"] ?>"
                                    class="w-full h-[300px] object-cover rounded-t-xl"
                            />


                            <div
                                    class="bg-white pb-10 pt-5 rounded-b-xl  flex flex-col md:flex-row"
                            >
                                <div class="w-full pr-3 px-6">
                                    <div class="flex gap-5 items-center mb-3">
                                        <span class="bg-blue-100 text-primary text-sm font-medium px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Makanan Daerah</span>
                                        <h1 class="text-gray-400 text-sm"><?= $makanan['created_at'] ?></h1>
                                    </div>
                                    <div class="flex w-full justify-between gap-3">
                                        <h1
                                                class="font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-5"
                                        >
                                            <?php echo $makanan['name']; ?>
                                        </h1>
                                        <div class="flex gap-3 items-start">
                                            <div class="flex justify-center items-center">
                                                <span class="mr-3">Bagikan</span>
                                                <div
                                                        onClick={handleShare}
                                                        class="border-2 p-2 border-gray-400 rounded-full cursor-pointer mx-auto group hover:bg-primary"
                                                >
                                                    <FaShare
                                                            class="mx-auto  group-hover:text-white"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 text-lg"
                                         dangerouslySetInnerHTML={{__html: animalData.desc}}/>


                                    <?php echo $makanan['description'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl my-7">
                           <div
                                   class="bg-white pb-10 pt-5 rounded-xl  flex flex-col md:flex-row"
                           >
                               <div class="pr-3 px-6">
                                   <h1 class="text-primary font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-6">
                                   Galeri <?= $makanan['name'] ?>
                                   </h1>

                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                       <!-- {
                                       animalData.galleries?.map(item => (
                                       <div>
                                           <img class="h-auto max-w-full rounded-lg"
                                                src={process.env.NEXT_PUBLIC_STORAGE + item.image} alt="animal"/>
                                       </div>
                                       ))
                                       } -->
                                       <div>
                                           <img class="h-auto max-w-full rounded-lg"
                                                src="<?= $appUrl.$makanan['image_url']?>" alt="<?= $makanan['name'] ?>"/>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>


                       <div class="bg-white rounded-xl my-7">
                           <div
                                   class="bg-white pb-10 pt-5 rounded-xl  flex flex-col md:flex-row"
                           >
                               <div class="pr-3 px-6">
                                   <h1 class="text-primary font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-6">
                                       Daerah Asal
                                   </h1>

                                   <iframe src="<?= $makanan['maps'] ?>" width="750" height="450" allowfullscreen="true"
                                           loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                               </div>
                           </div>
                       </div>

                </section>
            </div>
        </div>
    </div>
</section>
<?php include '../../templates/tail.php'; ?>