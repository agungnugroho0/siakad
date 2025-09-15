<?php
require_once "../../autoloader.php";
$nis = $_POST['nis'];
$hubungan = $_POST['hubungan'];
$nama = strtoupper($_POST['nama']);
$tahun = $_POST['tahun'];
$pekerjaan = $_POST['pekerjaan'];
$urutan = tampil("SELECT MAX(urutan) AS max_urutan FROM kk WHERE nis = '$nis'", "lpk");

foreach ($urutan as $urut) {
    $urutan = $urut['max_urutan'] ? $urut['max_urutan'] + 1 : 1;
};
$idbaru = idbaru("KK", "id_kk", "kk");
$data = [
    ':id_kk' => $idbaru,
    ':nis' => $nis,
    ':hubungan' => $hubungan,
    ':nama' => $nama,
    ':thn_kelahiran' => $tahun,
    ':pekerjaan' => $pekerjaan,
    ':urutan' => $urutan
];
print_r($data);
masukan('kk', $data);
// header("Location: ../../public/user/view/keluarga.php?sukses");