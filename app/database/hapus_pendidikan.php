<?php
require_once "../../autoloader.php";
$data = [
    ':id_pendidikan' => $_GET['id']
];
hapus('pendidikan',$data);
header("Location: ../../public/user/view/pendidikan.php?sukses");