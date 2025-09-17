<?php
require __DIR__.'/../../autoloader.php';
session_start();
$nis = $_SESSION['nis'];
use app\controller\siswacontroller;
$siswa = (new siswacontroller())->tampilsiswacontroller($nis);
?>
<body>
    <a href="#" id="edit_btn" class="ring-1 focus:ring-green-700 text-red-800 px-2 rounded">Edit Data Diri</a>
    <div class="flex gap-2 sm:flex-row flex-col">
        <img class="rounded-lg max-w-48 min-w-10 self-center" alt="profil siswa" src="../image/nas_photos/<?= $siswa['foto']?>"></img>
        <content class="grid grid-cols-2 md:grid-cols-4">
                <?php foreach ($siswa as $key => $value): ?>
                        <p class="font-normal text-gray-600 pl-3"><?= strtoupper(str_replace('_', ' ', $key)) ?></p>
                        <p class="font-semibold text-gray-800"><?= $value ?></p>
                    <?php endforeach; ?>
        </content>
    </div>
    
    <!-- modal edit biodata -->
    <div id="edit_biodata" class="fixed inset-0 bg-black/50 hidden items-center justify-center pb-5">
        <div class="bg-white p-4 mx-auto mt-3 mb-2 rounded-lg w-11/12 md:w-1/2 lg:w-1/3 overflow-y-auto max-h-full">
            <h2 class="text-lg font-semibold mb-2">Edit Biodata</h2>
            <hr class="mb-2 text-gray-300">
            <form action="" id="form_editbiodata">
                <label for="nis" class="text-gray-600 font-sm">NIS</label>
                <input type="text" name="nis" id="nis" value="<?= $siswa['nis'] ?>" class="w-full border border-gray-300 bg-gray-300 rounded px-2 py-1 mb-2 font-semibold mt-1" readonly>
                <label for="nama" class="text-gray-600 font-sm">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $siswa['nama'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                
                <label for="panggilan" class="text-gray-600 font-sm mb-1">Nama Panggilan</label>
                <input type="text" name="panggilan" id="panggilan" value="<?= $siswa['panggilan'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="tempat_lhr" class="text-gray-600 font-sm mb-1">Kota Kelahiran</label>
                <input type="text" name="tempat_lhr" id="tempat_lhr" value="<?= $siswa['tempat_lhr'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="jenis_kelamin" class="text-gray-600 font-sm">Jenis Kelamin</label>
                <div class="grid sm:grid-cols-2 gap-2 mb-2">
                    <div class="flex items-center mb-1">
                        <input id="gender-option-1" type="radio" name="gender" value="L" class="w-4 h-4 border-gray-300 focus:ring-0  " <?php if($siswa['gender'] === 'L') : ?> checked <?php endif; ?> />
                        <label for="gender-option-1" class="block ms-2 text-sm text-gray-900">
                            Laki - laki
                        </label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="gender-option-2" type="radio" name="gender" value="P" class="w-4 h-4 border-gray-300 focus:ring-0 " <?php if($siswa['gender'] === 'P') : ?> checked <?php endif; ?> />
                        <label for="gender-option-2" class="block ms-2 text-sm  text-gray-900">
                            Perempuan
                        </label>
                    </div>
                </div>
                <label for="tgl" class="text-gray-600 font-sm mb-1">Tanggal Kelahiran</label>
                <input type="date" name="tgl" id="tgl" value="<?= $siswa['tgl'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="provinsi" class="text-gray-600 font-sm mb-1">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" value="<?= $siswa['provinsi'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="kabupaten" class="text-gray-600 font-sm mb-1">Kabupaten</label>
                <input type="text" name="kabupaten" id="kabupaten" value="<?= $siswa['kabupaten'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="kecamatan" class="text-gray-600 font-sm mb-1">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" value="<?= $siswa['kecamatan'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="kelurahan" class="text-gray-600 font-sm mb-1">Kelurahan</label>
                <input type="text" name="kelurahan" id="kelurahan" value="<?= $siswa['kelurahan'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <div class="flex gap-1">
                    <div>
                        <label for="rt" class="text-gray-600 font-sm mb-1">RT</label>
                        <input type="text" name="rt" id="rt" value="<?= $siswa['rt'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    </div>
                    <div>
                        <label for="rw" class="text-gray-600 font-sm mb-1">RW</label>
                        <input type="text" name="rw" id="rw" value="<?= $siswa['rw'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    </div>
                </div>
                <label for="wa" class="text-gray-600 font-sm mb-1">No Telp</label>
                <input type="number" name="wa" id="wa" value="<?= $siswa['wa'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="agama" class="text-gray-600 font-sm mb-1">Agama</label>
                <select name="agama" id="agama" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    <option value="ISLAM" <?php if($siswa['agama'] === 'Islam') : ?> selected <?php endif; ?>>Islam</option>
                    <option value="KRISTEN" <?php if($siswa['agama'] === 'Kristen') : ?> selected <?php endif; ?>>Kristen</option>
                    <option value="KATOLIK" <?php if($siswa['agama'] === 'Katolik') : ?> selected <?php endif; ?>>Katolik</option>
                    <option value="HINDU" <?php if($siswa['agama'] === 'Hindu') : ?> selected <?php endif; ?>>Hindu</option>
                    <option value="BUDDHA" <?php if($siswa['agama'] === 'Buddha') : ?> selected <?php endif; ?>>Buddha</option>
                    <option value="KONGHUCU" <?php if($siswa['agama'] === 'Konghucu') : ?> selected <?php endif; ?>>Konghucu</option>
                </select>
                <label for="status" class="text-gray-600 font-sm mb-1">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    <option value="SINGLE" <?php if($siswa['status'] === 'single') : ?> selected <?php endif; ?>>Single</option>
                    <option value="MENIKAH" <?php if($siswa['status'] === 'menikah') : ?> selected <?php endif; ?>>Menikah</option>
                    <option value="CERAI" <?php if($siswa['status'] === 'cerai') : ?> selected <?php endif; ?>>Cerai</option>
                </select>
                <label for="darah" class="text-gray-600 font-sm mb-1">Golongan Darah</label>
                <select name="darah" id="darah" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    <option value="A" <?php if($siswa['darah'] === 'A') : ?> selected <?php endif; ?>>A</option>
                    <option value="B" <?php if($siswa['darah'] === 'B') : ?> selected <?php endif; ?>>B</option>
                    <option value="AB" <?php if($siswa['darah'] === 'AB') : ?> selected <?php endif; ?>>AB</option>
                    <option value="O" <?php if($siswa['darah'] === 'O') : ?> selected <?php endif; ?>>O</option>
                    <option value="TIDAK TAU" <?php if($siswa['darah'] === 'TIDAK TAU') : ?> selected <?php endif; ?>>TIDAK TAU</option>
                </select>
                <div class="flex gap-1">
                    <div>
                        <label for="tb" class="text-gray-600 font-sm mb-1">TB</label>
                        <input type="number" name="tb" id="tb" value="<?= $siswa['tb'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    </div>
                    <div>
                        <label for="bb" class="text-gray-600 font-sm mb-1">BB</label>
                        <input type="number" name="bb" id="bb" value="<?= $siswa['bb'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    </div>
                </div>
                <label for="tangan" class="text-gray-600 font-sm mb-1">Tangan Dominan</label>
                <select name="tangan" id="tangan" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                    <option value="KANAN" <?php if($siswa['tangan'] === 'KANAN') : ?> selected <?php endif; ?>>KANAN</option>
                    <option value="KIRI" <?php if($siswa['tangan'] === 'KIRI') : ?> selected <?php endif; ?>>KIRI</option>
                </select>
                <div class="grid grid-cols-2 gap-1">
                    <div>
                        <label for="merokok" class="text-gray-600 font-sm mb-1">Rokok</label>
                        <select name="merokok" id="merokok" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                            <option value="YA" <?php if($siswa['merokok'] === 'YA') : ?> selected <?php endif; ?>>YA</option>
                            <option value="TIDAK" <?php if($siswa['merokok'] === 'TIDAK') : ?> selected <?php endif; ?>>TIDAK</option>
                        </select>
                    </div>
                    <div>
                        <label for="alkohol" class="text-gray-600 font-sm mb-1">Alkohol</label>
                        <select name="alkohol" id="alkohol" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                            <option value="YA" <?php if($siswa['alkohol'] === 'YA') : ?> selected <?php endif; ?>>YA</option>
                            <option value="TIDAK" <?php if($siswa['alkohol'] === 'TIDAK') : ?> selected <?php endif; ?>>TIDAK</option>
                        </select>
                    </div>
                </div>
                <label for="no_rumah" class="text-gray-600 font-sm mb-1">No Rumah</label>
                <input type="number" name="no_rumah" id="no_rumah" value="<?= $siswa['no_rumah'] ?>" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                <label for="foto" class="text-gray-600 font-sm mb-1">Pas Foto</label>
                <div class="flex gap-2 mb-1">
                    <img id="preview" 
                    src="<?= !empty($siswa['foto']) ? '/image/photos/'.$siswa['foto'] : '../image/cover.jpeg' ?>" 
                    class="rounded-lg mt-2 mb-2 max-h-40 border border-gray-300" 
                    alt="preview foto">
                    <input type="file" name="foto" id="foto" accept="image/*" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1">
                </div>
                <!-- <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded px-2 py-1 mb-2 mt-1"> -->
                <div>
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Simpan</button>
                    <button type="button" id="closeEditModal" class="px-3 py-1 bg-gray-400 text-white rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</body>