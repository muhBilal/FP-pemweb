<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include '../templates/navbar.php'; ?>


    <section class="bg-[#1A2035] h-screen p-5 sm:ml-72">
        <div class="bg-gray-100 h-full rounded-xl overflow-auto">
            <!-- main content -->
            <div class="bg-gray-100 h-full">
                <div class="pl-5 pt-14 sm:pl-24 pr-5 pb-10 mx-auto h-full">
                    <section class="flex justify-between items-center mb-10">
                        <h1 class="title">Hewan</h1>
                        <form class="w-80">
                            <label htmlFor="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                                Search
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" g d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class="block bg-gray-100 w-full p-4 pl-12 text-sm text-gray-900 border border-gray-300 rounded-full focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary focus:bg-white" placeholder="Cari nama hewan ..." required />
                            </div>
                        </form>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <Link href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 mr-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    Beranda
                                    </Link>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                            Hewan
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </section>
                    <section class="mt-5">
                        <!-- {animalsDisplay.length === 0 &&
                        <NotFound />} -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                            <Link key={index} href="/animals/${animal.id}" class="group cursor-pointer hover:shadow-sm transition-all duration-500 relative rounded-3xl">
                            <!-- animals img -->
                            <img src={process.env.NEXT_PUBLIC_STORAGE + animal.image_thumbnail} alt="animals" class="w-full h-[400px] object-cover rounded-3xl" />

                            <div class="bg-primary text-gray-200 p-5 absolute bottom-0 rounded-3xl w-full">
                                <Link href="/animals/${animal.id}" class="text-xl font-bold my-2 hover:text-blue-600 transition-all">
                                <!-- {animal.name.length > 20 ? animal.name.substring(0, 40) + "..." : animal.name} -->
                                <!-- animals name     -->
                            </Link>
                                <div class="overflow-hidden transition-all duration-500 max-h-0 group-hover:max-h-[200px]">
                                <!-- isi content     -->
                                <div
                                            class="text-gray-300 mt-3 text-sm"
                                            dangerouslySetInnerHTML={{
                                                __html: animal.desc.substring(0, 200) + "...",
                                            }}
                                        />
                                </div>
                            </div>
                            </Link>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</body>

</html>