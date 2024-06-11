<?php
require '../../../controller/tariDaerahController.php';
$tari_daerah = getTariDaerah();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteTariDaerah($id);
    header('Location: index.php');
}
?>

<?php include '../../../templates/admin/head.php'; ?>
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex justify-between items-center p-6">
                    <div class="pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Tari Daerah</h6>
                    </div>
                    <a href="create.php" class="py-2 px-4 bg-transparent text-[#1A2035] font-semibold border border-[#1A2035] rounded hover:bg-[#1A2035] hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                        Tambah
                    </a>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2 overflow-x-auto">
                    <div class="p-0">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Tari Daerah</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Deskripsi</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tari_daerah as $tari) { ?>
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $tari['name']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                <?php
                                                if (isset($tari['description']) && $tari['description'] !== null) {
                                                    echo substr($tari['description'], 0, 200);
                                                } else {
                                                    echo "Description not available";
                                                }
                                                ?>...
                                            </p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <a href="/pemweb/pages/admin/tari-daerah/update.php?id=<?php echo $tari['id']; ?>" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Update</a>
                                            <a href="index.php?id=<?php echo $tari['id']; ?>" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cards -->
<?php include '../../../templates/tail.php'; ?>