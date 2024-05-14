<?php include '../../templates/head.php'; ?>
    <section class="bg-[#1A2035] h-screen p-5 sm:ml-72">
        <div class="bg-gray-100 h-full rounded-xl overflow-auto">
            <!-- main content -->
            <div className="h-full">
                <div class="pl-5 pt-0 sm:pl-24 pr-5 pb-10 mx-auto h-full">
                    <nav className="flex my-4" aria-label="Breadcrumb">
                        <ol className="inline-flex items-center space-x-1 md:space-x-3">
                            <li className="inline-flex items-center">
                                <a href="/home" className="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <!-- <svg className="w-3 h-3 mr-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg> -->
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <div className="flex items-center">
                                    <!-- <svg className="w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m1 9 4-4-4-4" />
                                    </svg> -->
                                    <a href="/animals" className="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                        Hewan
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div className="flex items-center">
                                    <!-- <svg className="w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m1 9 4-4-4-4" />
                                    </svg> -->
                                    <span className="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                        {animalData.name}
                                    </span>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <section class="flex flex-col md:flex-row gap-5 mt-2">
                        <div class="w-full md:w-[80%] pr-0 md:pr-5">
                            <div class="bg-white rounded-xl ">
                                <img src={process.env.NEXT_PUBLIC_STORAGE + animalData.image_thumbnail} alt="animal" class="w-full h-[300px] object-cover rounded-t-xl" />

                                <div class="bg-white pb-10 pt-5 rounded-b-xl  flex flex-col md:flex-row">
                                    <div class="w-full pr-3 px-6">
                                        <div class="flex gap-5 items-center mb-3">
                                            <span class="bg-blue-100 text-primary text-sm font-medium px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Hewan</span>
                                            <h1 class="text-gray-400 text-sm">{animalData.createdAt}</h1>
                                        </div>
                                        <div class="flex w-full justify-between gap-3">
                                            <h1 class="font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-5">
                                                {animalData.name}
                                            </h1>
                                            <div class="flex gap-3 items-start">
                                                <div class="flex justify-center items-center">
                                                    <span className="mr-3">Bagikan</span>
                                                    <div onClick={handleShare} class="border-2 p-2 border-gray-400 rounded-full cursor-pointer mx-auto group hover:bg-primary">
                                                        <FaShare class="mx-auto  group-hover:text-white" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-gray-500 text-lg" dangerouslySetInnerHTML={{__html: animalData.desc}} />
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl my-7">
                                <div class="bg-white pb-10 pt-5 rounded-xl  flex flex-col md:flex-row">
                                    <div class="pr-3 px-6">
                                        <h1 class="text-primary font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-6">
                                            Galeri Hewan
                                        </h1>

                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                            {
                                            animalData.galleries?.map(item => (
                                            <div>
                                                <img class="h-auto max-w-full rounded-lg" src={process.env.NEXT_PUBLIC_STORAGE + item.image} alt="animal" />
                                            </div>
                                            ))
                                            }
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl my-7">
                                <div class="bg-white pb-10 pt-5 rounded-xl  flex flex-col md:flex-row">
                                    <div class="pr-3 px-6">
                                        <h1 class="text-primary font-bold text-xl md:text-3xl leading-6 md:leading-10 mb-6">
                                            Daerah Asal
                                        </h1>

                                        <iframe src={animalData.map} width="750" height="450" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-[30%] border-l-0 border-r-0 md:border-l-2 md:border-r-2 px-5 md:mt-0">
                            <div class="flex justify-between mb-5 items-center">
                                <h1 class="font-bold text-xl">Hewan Lainnya</h1>
                                <Link href={`/animals" class="text-blue-500 text-sm">
                                See More
                                </Link>
                            </div>
                            <div class="flex flex-col gap-5">
                                {shuffle.map((animal, index) => (
                                <div key={index} className="hover:shadow-md transition-all">
                                    <Link href={'/animals/' + animal.id}>
                                    <img src={`${process.env.NEXT_PUBLIC_STORAGE}${animal.image_thumbnail}" alt="animals" class="w-full h-[150px] object-cover rounded-tl-lg rounded-tr-lg" />
                                    <div className="bg-white rounded-bl-lg rounded-br-lg p-2">
                                        <h5 class="text-gray-900 text-xl font-bold my-2">
                                            {
                                            animal.name.length > 15 ? animal.name.substring(0, 15) + '...' : animal.name
                                            }
                                        </h5>
                                        <div class="text-gray-500 text-sm" dangerouslySetInnerHTML={{ __html: animal.desc.substring(0, 100) + '...' }} />
                                    </div>
                                    </Link>
                                </div>

                                ))}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
<?php include '../../templates/tail.php'; ?>

