<?php
require __DIR__.'/../../autoloader.php';
session_start();
$nis = $_SESSION['nis'];
use app\controller\siswacontroller;
$siswa = (new siswacontroller())->tampilpendidikan($nis);

?>
<a href="#" id="tambah_btn" class="ring-1 focus:ring-green-700 text-red-800 px-2 rounded">+ Tambah Pendidikan</a>

<content class="grid grid-cols-1 md:grid-cols-4 mt-2">
            <?php foreach ($siswa as $isi): ?>
                <div class='m-2 p-3 border rounded shadow'>
                    <p class="font-normal text-gray-600 pl-3">nama <?= strtoupper(str_replace('_', ' ', $isi['sekolah'])) ?></p>
                    <p class="font-normal text-gray-600 pl-3">Masuk : <?= $isi['masuk'] ?></p>
                    <p class="font-normal text-gray-600 pl-3">Lulus : <?= $isi['lulus'] ?></p>
                    <p class="font-normal text-gray-600 pl-3">Jurusan : <?= $isi['jurusan']?></p>
                </div>
            <?php endforeach; ?>
</content>

<div id="tambah_sekolah" class="fixed inset-0 bg-black/50 hidden items-center justify-center pb-5">
        <div class="bg-white p-4 mx-auto mt-3 mb-2 rounded-lg w-11/12 md:w-1/2 lg:w-1/3 overflow-y-auto max-h-full">
            <h2 class="text-lg font-semibold mb-2">Tambah Pendidikan</h2>
            <hr class="mb-2 text-gray-300">
            <form action="" id="form_sekolah">
                <div class="mb-4">
                    <input type="text" id="nis" name="nis" value="<?= $nis ?>" class="hidden">
                    <label for="tingkat" class="block text-gray-700 font-semibold mb-2">tingkat</label>
                    <select id="tingkat" name="tingkat" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">SD</option>
                        <option value="">SMP</option>
                        <option value="">SMA/K</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Sekolah</label>
                    <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Sekolah">
                </div>
                <div class="mb-4">
                    <label for="masuk" class="block text-gray-700 font-semibold mb-2">Tahun Masuk</label>
                    <input type="date" id="masuk" name="masuk" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="lulus" class="block text-gray-700 font-semibold mb-2">Tahun Lulus</label>
                    <input type="date" id="lulus" name="lulus" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="jurusan" class="block text-gray-700 font-semibold mb-2">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Simpan</button>
                    <button type="button" id="closeModal" class="px-3 py-1 bg-gray-400 text-white rounded">Batal</button>
                </div>
            </form>
        </div>
</div>