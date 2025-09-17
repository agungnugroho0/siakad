<?php
namespace app\controller;
use app\model\siswa;
require_once __DIR__ . '/../../autoloader.php';

class siswacontroller
{
    private $db;
    public function __construct()
    {
        $this->db = new siswa();
    }

    public function insertsiswa($post,$files){
        try{
            $data = [
            'nis'           => idBaru('','nis','siswa'),
            'nama'  => strtoupper($post['nama_lengkap'] ?? ''),
            'panggilan'     => strtoupper($post['nama_panggilan'] ?? ''),
            'id_kelas'      => $post['id_kelas'] ?? '',
            'tempat_lhr'  => strtoupper($post['tempat_lahir'] ?? ''),
            'gender'        => strtoupper($post['gender'] ?? ''),
            'tgl'           => strtoupper($post['tgl_lahir'] ?? ''),
            'provinsi'      => strtoupper($post['provinsi'] ?? ''),
            'kabupaten'           => strtoupper($post['kabupaten'] ?? ''),
            'kecamatan'           => strtoupper($post['kecamatan'] ?? ''),
            'kelurahan'           => strtoupper($post['kelurahan'] ?? ''),
            'rt'            => $post['rt'] ?? '',
            'rw'            => $post['rw'] ?? '',
            'wa'            => $post['wa'] ?? '',
            'agama'         => strtoupper($post['agama'] ?? ''),
            'status'        => strtoupper($post['status'] ?? ''),
            'darah'         => strtoupper($post['darah'] ?? ''),
            'bb'            => $post['bb'] ?? '',
            'tb'            => $post['tb'] ?? '',
            'merokok'       => strtoupper($post['rokok'] ?? ''),
            'alkohol'       => strtoupper($post['alkohol'] ?? ''),
            'tangan'        => strtoupper($post['tangan'] ?? ''),
            'no_rumah'      => $post['no_rumah'] ?? '',
            'foto' => null,
            ];

            // jika upload foto
            if (isset($files['foto']) && $files['foto']['error'] === 0) {
                $ekstensi = pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
                $fotoName = strtolower($post['nama_lengkap']) . '.' . $ekstensi;
                
                $targetDir  =  '/mnt/nas/photos/';
                $targetPath = $targetDir . $fotoName;

                // Cek apakah path folder-nya ada
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true); // bikin folder kalau belum ada
                }

                if (!move_uploaded_file($files['foto']['tmp_name'], $targetPath)) {
                    throw new \Exception("Gagal upload foto ke $targetPath");
                }
                $data['foto'] = $fotoName;

            }

            $result = $this->db->insertsiswa($data);
            if ($result === false) {
                header("Location: /login?id={$data['nama']}");
                exit;
            }
            
            // login ke siakad
            // security sebelum login
            ini_set('session.cookie_httponly', 1);  // cookie hanya bisa diakses HTTP, bukan JS
            ini_set('session.cookie_secure', 0);    // wajib HTTPS
            ini_set('session.use_strict_mode', 1);  // tidak reuse session lama
            session_start();
            session_regenerate_id(true); // cegah session fixation
            $_SESSION['nis'] = $data['nis'];
            // $_SESSION['nama'] = $data['nama'];
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            if ($post['csrf_token'] !== $_SESSION['csrf_token']) {
                die("⚠️ Invalid CSRF token!");
            }

            header("Location: /user/");
            exit;
        }catch( \Throwable $e){
            echo "error" . $e->getMessage();;
                exit;
        }
    }

    public function update_biodatacontroller($post,$files){
        try{
             session_start(); // pastikan session aktif
            $nis = $_SESSION['nis'];
            $data = [
            'nis'           => $nis,
            'nama'  => strtoupper($post['nama'] ?? ''),
            'panggilan'     => strtoupper($post['panggilan'] ?? ''),
            'tempat_lhr'  => strtoupper($post['tempat_lhr'] ?? ''),
            'gender'        => strtoupper($post['gender'] ?? ''),
            'tgl'           => $post['tgl'] ?? '',
            'provinsi'      => strtoupper($post['provinsi'] ?? ''),
            'kabupaten'           => strtoupper($post['kabupaten'] ?? ''),
            'kecamatan'           => strtoupper($post['kecamatan'] ?? ''),
            'kelurahan'           => strtoupper($post['kelurahan'] ?? ''),
            'rt'            => $post['rt'] ?? '',
            'rw'            => $post['rw'] ?? '',
            'wa'            => $post['wa'] ?? '',
            'agama'         => strtoupper($post['agama'] ?? ''),
            'status'        => strtoupper($post['status'] ?? ''),
            'darah'         => strtoupper($post['darah'] ?? ''),
            'bb'            => $post['bb'] ?? '',
            'tb'            => $post['tb'] ?? '',
            'merokok'       => strtoupper($post['merokok'] ?? ''),
            'alkohol'       => strtoupper($post['alkohol'] ?? ''),
            'tangan'        => strtoupper($post['tangan'] ?? ''),
            'no_rumah'      => $post['no_rumah'] ?? '',
            'foto' => null,
            ];
            if (isset($files['foto']) && $files['foto']['error'] === 0) {
                $ekstensi = pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
                $fotoName = strtolower($post['nama']) . '.' . $ekstensi;
                $lama = findById('siswa','nis',$post['nis']);
                if (!empty($lama['foto'])) {
                    $oldPath = '/mnt/nas/photos/' . $lama['foto'];
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                $targetDir  =  '/mnt/nas/photos/';
                $targetPath = $targetDir . $fotoName;

                // Cek apakah path folder-nya ada
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true); // bikin folder kalau belum ada
                }

                if (!move_uploaded_file($files['foto']['tmp_name'], $targetPath)) {
                    throw new \Exception("Gagal upload foto ke $targetPath");
                }
                $data['foto'] = $fotoName;

            }
            $result = $this->db->update_biodata_model($data);
            return $result;
        }catch( \Throwable $e){
            echo "error" . $e->getMessage();;
                exit;
        }
    }

    public function tampilsiswacontroller($nis){
        return $this->db->tampilsiswa($nis);
    }

    public function tampilkeluargacontroller($nis){
        return $this->db->tampilkeluarga($nis);
    }

    public function tambah_kk($post){
        try{
            session_start(); // pastikan session aktif
            $nis = $_SESSION['nis'];
            $data = [
            'id_kk'       => idBaru('','id_kk','kk'),
            'nis'           => $nis,
            'hubungan'  => strtoupper($post['hubungan'] ?? ''),
            'nama'     => strtoupper($post['nama'] ?? ''),
            'thn_kelahiran'  => $post['thn_kelahiran'] ?? '',
            'pekerjaan'        => strtoupper($post['pekerjaan'] ?? ''),
            ];
            $result = $this->db->tambah_kk_model($data);
            return $result;
        }catch( \Throwable $e){
            echo "error" . $e->getMessage();;
                exit;
        }
    }

    public function tampilpendidikan($nis){
        return $this->db->tampilpendidikan($nis);
    }

    public function tambah_pendidikan($post){
        try{
            session_start(); // pastikan session aktif
            $nis = $_SESSION['nis'];
            $data = [
            'id_pendidikan'       => idBaru('','id_pendidikan','pendidikan'),
            'nis'           => $nis,
            'sekolah'  => strtoupper($post['nama'] ?? ''),
            'masuk'     => $post['masuk'] ?? '',
            'lulus'  => $post['lulus'] ?? '',
            'jurusan'        => strtoupper($post['jurusan'] ?? ''),
            ];
            $result = $this->db->tambah_pendidikan_model($data);
            return $result;
        }catch( \Throwable $e){
            echo "error" . $e->getMessage();;
                exit;
        }
    }
}