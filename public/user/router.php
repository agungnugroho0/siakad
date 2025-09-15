<?php
require_once __DIR__ . '/../../autoloader.php';
use app\controller\routecontroller;
use app\controller\siswacontroller;

$router = new routecontroller();
$siswa = new siswacontroller();

$page = $_GET['page'] ?? 'biodata';

switch ($page) {
    case 'biodata':
        $router->biodata();
    break;
    case 'keluarga':
        $router->keluarga();
    break;
    case 'pendidikan':
        $router->pendidikan();
    break;
    case 'update_biodata':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $siswa->update_biodatacontroller($_POST, $_FILES);
           header('Content-Type: application/json');
            echo json_encode([
                'success' => $result ? true : false
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Metode tidak diizinkan.']);
        }
    break;
    case 'tambah_keluarga':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $siswa->tambah_kk($_POST);
           header('Content-Type: application/json');
            echo json_encode([
                'success' => $result ? true : false
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Metode tidak diizinkan.']);
        }
    break;
    case 'tambah_sekolah':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $siswa->tambah_pendidikan($_POST);
           header('Content-Type: application/json');
            echo json_encode([
                'success' => $result ? true : false
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Metode tidak diizinkan.']);
        }
    break;
    default:
        echo json_encode ("Halaman tidak ditemukan.");
        break;
}
