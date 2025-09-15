<?php
namespace app\security;
use app\model\user;
session_start();

class authentication {
    private $db;

    public function __construct(){
        $this->db = new user();
    }
    public function login($username, $nis) {
        // cek database dulu apakah valid atau tidak
        $result = $this->db->login($username, $nis);
        if (!$result) {
            // Jika login gagal, Anda dapat mengarahkan pengguna kembali ke halaman login dengan pesan kesalahan
            header('Location: /index.php?pesan');
            exit();
        }
        // kalau valid, set session
        // $_SESSION['nama'] = $username;
        $_SESSION['nis'] = $nis;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        // masukan ke log login
        // $this->db->logLogin($username, $_SESSION['ip'],$nis);
        // alihkan ke halaman dashboard
        header('Location: /user');


    }

    public static function logout() {
        // Implement logout logic here
    }

    public static function __csrfToken(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function check(){
        if (empty($_SESSION['nis']) || $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
            // session tidak valid, redirect ke halaman login
            header('Location: /index.php?attention=belum_login');
            exit();
        }
    }
}