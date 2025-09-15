<?php
require_once "../../../autoloader.php";
    user();
    $nis = $_SESSION['nis'];
    $sumber = $_SESSION['sumber'];
    $kk = tampil("SELECT * FROM kk WHERE nis = '$nis' ORDER BY urutan", "lpk");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluarga</title>
    <link rel="icon" type="image/png" href="../../image/logo.png">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="bg-slate-100">
   <?php include 'header.html'?>
   <div class="container mx-auto p-1 mt-2">
        <menu class="flex flex-wrap">
            <a class="rounded px-2 text-gray-600 hover:border-red-800 hover:text-red-900 font-semibold" href="index.php">Biodata</a>
            <a class="rounded px-2 border-red-800 text-red-900 border-2 font-semibold" href="keluarga.php">Keluarga</a>
            <a class="rounded px-2 text-gray-600 hover:border-red-800 hover:text-red-900 font-semibold" href="pendidikan.php">Pendidikan</a>
            <!-- <a class="rounded px-2 text-gray-600 hover:border-red-800 hover:text-red-900 font-semibold" href="pekerjaan.php">Pekerjaan</a> -->
        </menu>
        <div class="p-3 border-t-2 border-red-800 mt-3">
            <a href="../form/tambah_kk.php?nis=<?= $nis ?>" class="border-2 border-red-900 rounded font-medium active:bg-red-100 px-2 py-0.5 transition">+ Tambah Keluarga</a>

            <div class="bg-white rounded mt-3 overflow-x-auto">
                <table class="w-full rounded">
                    <thead class="bg-red-900 text-white">
                        <tr>
                            <td class="px-2 py-1">Hubungan</td>
                            <td class="px-2 py-1">Nama</td>
                            <td class="px-2 py-1">Umur</td>
                            <td class="px-2 py-1">Pekerjaan</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php foreach ($kk as $data) : ?>
                            <tr class="border-b border-gray-200">
                                <td class="px-2 py-1 text-gray-500 w-72"><?= $data['hubungan'] ?></td>
                                <td class="px-2 py-1"><?= $data['nama'] ?></td>
                                <td class="px-2 py-1"><?= umur($data['thn_kelahiran']) ?> 歳</td>
                                <td class="px-2 py-1"><?= $data['pekerjaan'] ?></td>
                                <td class="px-2 py-1 flex justify-end">
                                    <a href="../../../app/database/hapus_kk.php?id=<?php echo $data['id_kk'] ?>" class="text-right text-red-900 hover:text-red-600">Hapus</a>
                                    </a>
                                </td>
                            </tr>
                                <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>