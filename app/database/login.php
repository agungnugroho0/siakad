<?php
require_once "../../autoloader.php";
$nama = $_POST['nama'];
login($nama);
if (login($nama) == true) {
    header("location:../../public/user/view/index.php");
} else {
    header("location:../../public/user/login.php?pesan=gagal");
}