<?php
require __DIR__.'/../../autoloader.php';
use app\security\authentication;

$csrf = authentication::__csrfToken();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa LPK Hikari</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class=" text-red-900 font-bold p-3">
        <center>
            <img src="/image/logo.png" alt="" srcset="" width="100">
            FORMULIR SISWA BARU<br>LPK HIKARI GAKKOU<br>
            <?php
            if (isset($_GET['nama'])) {
                echo "<script>alert('Siswa bernama " . htmlspecialchars($_GET['nama']) . " sudah terdaftar');</script>";
            } elseif (isset($_GET['foto'])) {
                echo "<script>alert('Foto Bermasalah');</script>";
            } 
                ?>
        </center>
    </div>

    <form action="../api/api_insertsiswa.php" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto px-5" id="formsiswa">
            <!-- buat crsf buat security lapis 1 -->
            <input type="hidden" name="csrf_token" value="<?php echo $csrf ?>">
            <!-- id kelas -->
            <input type="hidden" name="id_kelas" value="4">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " required />
            <label for="nama_lengkap" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama_panggilan" id="nama_panggilan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " required />
            <label for="nama_panggilan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Panggilan</label>
        </div>

        <div class="grid sm:grid-cols-2 gap-3 mb-5">

            <div class="flex items-center mb-4">
                <input id="gender-option-1" type="radio" name="gender" value="L" class="w-4 h-4 border-gray-300 focus:ring-3 focus:ring-red-500 " required />
                <label for="gender-option-1" class="block ms-2 text-sm font-medium text-gray-900">
                    Laki - laki
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="gender-option-2" type="radio" name="gender" value="P" class="w-4 h-4 border-gray-300 focus:ring-3 focus:ring-red-500 " required />
                <label for="gender-option-2" class="block ms-2 text-sm font-medium text-gray-900">
                    Perempuan
                </label>
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " required />
                <label for="tempat_lahir" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tempat Lahir</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " required />
                <label for="tgl_lahir" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal Lahir</label>
            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="wa" id="wa" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder="" required />
            <label for="wa" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Whatsapp</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="no_rumah" id="no_rumah" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder="" required />
            <label for="no_rumah" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Whatsapp Orang Tua</label>
        </div>
        <label for="agama" class="block mt-3 mb-3 text-sm font-medium text-gray-900 ">Pilih Agama Anda</label>
        <select id="agama" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-11 mb-5" name="agama">
            <option value="ISLAM">Islam</option>
            <option value="KRISTEN">Kristen</option>
            <option value="HINDU">Hindu</option>
            <option value="BUDHA">Budha</option>
            <option value="KATOLIK">Katolik</option>
            <option value="KONGHUCHU">Konghuchu</option>
        </select>

        <hr>
        <label for="" class="block mt-3 mb-5 text-sm font-medium text-gray-900 ">Masukan Alamat Lengkap Anda</label>

        <input name="provinsi" id="provinsi" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full mb-5 pl-3 h-9" placeholder="PROVINSI" required>
        </input>
        <input name="kabupaten" id="kabupaten" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full mb-5 h-9 pl-3" required placeholder="KABUPATEN">
        </input>
        <input name="kecamatan" id="kecamatan" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full mb-5 h-9 pl-3" placeholder="KECAMATAN" required>
        </input>
        <input name="kelurahan" id="kelurahan" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full mb-5 h-9 pl-3" placeholder="KELURAHAN / DESA" required>
        </input>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="rt" id="rt" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " />
                <label for="rt" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RT</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="rw" id="rw" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder="" />
                <label for="rw" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RW</label>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="tb" class="block mb-1 text-sm text-gray-700 dark:text-gray-800">Tinggi Badan: <span id="tbValue">175</span> cm</label>
                <input 
                    type="range" 
                    name="tb" 
                    id="tb" 
                    min="100" 
                    max="250" 
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" 
                    oninput="document.getElementById('tbValue').textContent = this.value"
                />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="bb" id="bb" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder="" />
                <label for="bb" class="peer-focus:font-medium absolute text-sm text-gray-8 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-slate-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Berat Badan</label>
            </div>
        </div>


        <select id="status" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-10 mb-5" name="status" required>
            <option value="">Pilih Status</option>
            <option value="SINGLE">Single</option>
            <option value="MENIKAH">Menikah</option>
            <option value="CERAI">Cerai</option>
        </select>
        <div class="grid md:grid-cols-2 md:gap-6">
            <select id="gol" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-11 mb-5" name="darah" required>
                <option value="">Pilih Golongan Darah</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
                <option value="TIDAK TAU">Tidak Tau</option>
            </select>
            <select id="tangan" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-11 mb-5" name="tangan" required>
                <option value="">Pilih Tangan Dominan</option>
                <option value="KANAN">KANAN</option>
                <option value="KIDAL">KIDAL / KIRI</option>
            </select>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <select id="rokok" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-11 mb-5" name="rokok" required>
                <option value="">Merokok</option>
                <option value="YA">YA</option>
                <option value="TIDAK">TIDAK</option>
            </select>
            <select id="alkohol" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-11 mb-5" name="alkohol" required>
                <option value="">Minuman Keras</option>
                <option value="YA">YA</option>
                <option value="TIDAK">TIDAK</option>
            </select>
        </div>  
        <hr>
        <div class="flex gap-2 ">
            <input type="file" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900  hover:bg-gray-50" name="foto" id="fileInput"/>
            <p id="fileSizeMessage" class="text-gray-900 text-sm self-center"></p>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-5" name="submit">Submit</button>
    </form>

</body>

</html>
<script>


    const fileInput = document.getElementById('fileInput');
    const fileSizeMessage = document.getElementById('fileSizeMessage');
    fileInput.addEventListener('change', function() {
        const file = fileInput.files[0]; // Ambil file pertama yang diupload
        if (file) {
            const fileSizeInMB = file.size / (1024 * 1024); // Ukuran dalam MB
            if (fileSizeInMB > 2) { // Misalnya batas ukuran 2MB
                fileSizeMessage.textContent = "Ukuran file terlalu besar! Maksimal 2MB.";
                fileInput.value = ""; // Kosongkan input file
            } else {
                fileSizeMessage.textContent = fileSizeInMB.toFixed(2) + " MB";
            }
        } else {
            fileSizeMessage.textContent = "";
        }
    });

    
</script>