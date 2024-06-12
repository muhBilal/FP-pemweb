<?php include '../templates/head.php'; ?>
    <section class="bg-[#1A2035] h-screen p-5 sm:ml-72">
        <div class="bg-gray-100 h-full rounded-xl overflow-auto">
            <div class="h-full">
                <div class="pl-5 pt-14 sm:pl-24 pr-5 pb-10 mx-auto h-full;">
                    <section class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                        <h1 class="text-start text-3xl font-semibold">Beranda</h1>
                    </section>
                    <section class="flex mx-auto flex-col md:flex-row gap-5 mt-0 md:mt-5">
                        <div class="w-full md:w-1/3 flex flex-col gap-2 mb-10">
                            <div class="group ">
                                <div class="mt-5 z-30 bg-white h-[270px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[310px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="../public/images/pakaian-adat.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Pakaian Adat
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                        Pakaian adat adalah pakaian tradisional yang dipakai oleh suatu kelompok atau masyarakat dalam suatu wilayah atau budaya tertentu.
                                        </p>
                                        <a href="pakaian-adat/index.php"
                                           class="group mx-auto hidden px-5 py-2 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform text-sm group-hover:block duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 flex flex-col gap-2 mb-10">
                            <div class="group">
                                <div class="mt-10 z-30 bg-white h-[320px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[320px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="../public/images/food.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Makanan Daerah
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                        Makanan daerah adalah hidangan atau masakan khas yang berasal dari suatu wilayah atau daerah tertentu, yang dibuat dari bahan-bahan lokal.
                                        </p>
                                        <a href="makanan-daerah/index.php"
                                           class="group mx-auto hidden px-5 py-2 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform text-sm group-hover:block duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="group ">
                                <div class="mt-5 z-30 bg-white h-[270px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[310px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="/images/destination.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Destinasi
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Tenemukan petualangan di setiap sudut dunia. Dari puncak
                                            gunung yang menantang hingga pantai berpasir putih yang
                                            menenangkan
                                        </p>
                                        <Link href="/destinations"
                                              class="group mx-auto hidden btn-primary-lite text-sm group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                        Selengkapnya
                                        </Link>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="w-full md:w-1/3 flex flex-col gap-2 mb-10">
                            <div class="group">
                                <div class="mt-10 z-30 bg-white h-[250px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[320px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="../public/images/tari.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Tari Daerah
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Tari daerah sering kali mengandung makna simbolis dan dilakukan dalam rangka upacara adat, perayaan keagamaan, atau acara budaya.
                                        </p>
                                        <a href="tari-daerah/index.php"
                                           class="group mx-auto hidden px-5 py-2 bg-[#1A2035] hover:bg-gradient-to-br rounded-md text-white outline-none shadow-lg transform active:scale-x-75 transition-transform text-sm group-hover:block duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Selengkapnya
                                        </a>    
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="group ">
                                <div class="mt-5 z-30 bg-white h-[270px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[310px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="/images/artefact.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Artefak
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Merentasi waktu dengan melihat ke masa lalu melalui mata
                                            artefak. Setiap benda adalah jendela ke sejarah yang
                                            menghidupkan kembali cerita-cerita zaman dahulu.
                                        </p>
                                        <Link href="/artefacts"
                                              class="group mx-auto hidden btn-primary-lite text-sm group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                        Selengkapnya
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <div class="group ">
                                <div class="mt-5 z-30 bg-white h-[270px] relative p-5 rounded-xl shadow-sm w-full group-hover:h-[310px] group-hover:shadow-lg duration-500 ease-in-out">
                                    <img src="/images/gift.webp" alt="animal"
                                         class="h-[70%] w-[90%] object-cover rounded-xl absolute top-5 left-1/2 -translate-x-1/2 group group-hover:-translate-y-1/2 group-hover:w-[250px] group-hover:h-[140px] duration-500 ease-in-out transform-gpu"/>
                                    <div class="group text-center w-full px-5 absolute bottom-5 left-1/2 -translate-x-1/2 group-hover:bottom-10 duration-500 ease-in-out transform-gpu">
                                        <h1 class="group text-center mt-2 mb-2 font-semibold text-lg text-primary  duration-1000 ease-in-out">
                                            Hadiah
                                        </h1>
                                        <p class="group hidden text-sm mb-3 group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                            Dapatkan Hadiah menarik dengan menyelesaikan soal
                                        </p>
                                        <Link href="/rewards"
                                              class="group mx-auto hidden btn-primary-lite text-sm group-hover:block  duration-1000 ease-in-out opacity-0 group-hover:opacity-100">
                                        Selengkapnya
                                        </Link>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
<?php include '../templates/tail.php'; ?>
