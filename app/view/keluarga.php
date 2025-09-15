<?php
require __DIR__.'/../../autoloader.php';
session_start();
$nis = $_SESSION['nis'];
use app\controller\siswacontroller;
$siswa = (new siswacontroller())->tampilkeluargacontroller($nis);

?>
<a href="#" id="tambah_btn" class="ring-1 focus:ring-green-700 text-red-800 px-2 rounded">+ Tambah Keluarga</a>

<content class="grid grid-cols-1 md:grid-cols-4 mt-2">
            <?php foreach ($siswa as $isi): ?>
                <div class='m-2 p-3 border rounded shadow'>
                    <p class="font-semibold text-gray-800"><?= $isi['hubungan'] ?></p>
                    <p class="font-normal text-gray-600 pl-3"><?= strtoupper(str_replace('_', ' ', $isi['nama'])) ?></p>
                    <p class="font-normal text-gray-600 pl-3"><?= umur($isi['thn_kelahiran']) ?> Tahun</p>
                    <p class="font-normal text-gray-600 pl-3"><?= $isi['pekerjaan']?></p>
                </div>
            <?php endforeach; ?>
</content>

<div id="tambah_kk" class="fixed inset-0 bg-black/50 hidden items-center justify-center pb-5">
        <div class="bg-white p-4 mx-auto mt-3 mb-2 rounded-lg w-11/12 md:w-1/2 lg:w-1/3 overflow-y-auto max-h-full">
            <h2 class="text-lg font-semibold mb-2">Tambah Keluarga</h2>
            <hr class="mb-2 text-gray-300">
            <form action="" id="form_keluarga">
                <div class="mb-4">
                    <input type="text" id="nis" name="nis" value="<?= $nis ?>" class="hidden">
                    <label for="hubungan" class="block text-gray-700 font-semibold mb-2">Hubungan</label>
                    <select id="hubungan" name="hubungan" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Hubungan</option>
                        <option value="父 - Ayah">Ayah</option>
                        <option value="母 - Ibu">Ibu</option>
                        <option value="兄 -  Kakak Laki - laki">Kakak Laki - laki</option>
                        <option value="姉 - Kakak Perempuan">Kakak Perempuan</option>
                        <option value="弟 - Adik Laki - laki">Adik Laki - laki</option>
                        <option value="妹 - Adik Perempuan">Adik Perempuan</option>
                        <option value="夫 - Suami">Suami</option>
                        <option value="妻 - Istri">Istri</option>
                        <option value="子 - Anak">Anak</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama">
                </div>
                <div class="mb-4">
                    <label for="thn_kelahiran" class="block text-gray-700 font-semibold mb-2">Tahun Kelahiran</label>
                    <input type="date" id="thn_kelahiran" name="thn_kelahiran" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Tahun Kelahiran">
                </div>
                <div class="mb-4">
                    <label for="pekerjaan" class="block text-gray-700 font-semibold mb-2">Pekerjaan</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Pekerjaan">
                </div>
                <div>
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Simpan</button>
                    <button type="button" id="closeModal" class="px-3 py-1 bg-gray-400 text-white rounded">Batal</button>
                </div>
            </form>
        </div>
</div>