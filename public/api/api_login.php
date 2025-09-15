<?php
require_once __DIR__.'/../../autoloader.php';
use app\security\authentication;
$auth = new authentication();
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$csrf_token = $_POST['csrf_token'];
if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
    // Token tidak valid, tangani sesuai kebutuhan (misalnya, hentikan proses login)
    die('Invalid CSRF token');
}
$auth->login($nama, $nis);
