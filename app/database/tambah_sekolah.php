<?php
require_once "../../autoloader.php";
$nis = $_POST['nis'];
$nama_sekolah = strtoupper($_POST['nama_sekolah']);
$tahun_masuk = $_POST['tahun_masuk'];
$lulus = $_POST['lulus'];
$jurusan = strtoupper($_POST['jurusan']);
$idbaru = idbaru("pdd", "id_pendidikan", "pendidikan");
$data = [
    ':id_pendidikan' => $idbaru,
    ':nis' => $nis,
    ':sekolah' => $nama_sekolah,
    ':masuk' => $tahun_masuk,
    ':lulus' => $lulus,
    ':jurusan' => $jurusan
];
// print_r($data);
masukan('pendidikan', $data);
header("Location: ../../public/user/view/pendidikan.php?sukses");

