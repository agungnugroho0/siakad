<?php
require_once "../../autoloader.php";
$data = [
    ':id_kk' => $_GET['id']
];
hapus('kk',$data);
header("Location: ../../public/user/view/keluarga.php?sukses");