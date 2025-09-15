<?php
namespace app\model;
use app\core\database;

class siswa{
    private $db;
    public function __construct(){
        $this->db = (new Database())->connect();
    }
    public function insertsiswa($data){
        //cek terlebih dahulu apakah siswa sudah terdaftar
        $cek = $this->db->prepare("SELECT nama FROM siswa WHERE nama = :nama");
        $cek->execute(['nama' => $data['nama']]);
        if($cek->rowCount() > 0){
            return false;
        }
        // jika belum terdaftar
            $query = "INSERT INTO siswa (nis, nama, panggilan, id_kelas, tempat_lhr, gender, tgl, provinsi, kabupaten, kecamatan,kelurahan,  rt, rw, wa, agama, status, darah, bb, tb, merokok, alkohol, tangan, no_rumah, foto) 
              VALUES (:nis, :nama, :panggilan, :id_kelas, :tempat_lhr, :gender, :tgl, :provinsi, :kabupaten, :kecamatan,:kelurahan, :rt, :rw, :wa, :agama, :status, :darah, :bb, :tb, :merokok, :alkohol, :tangan, :no_rumah, :foto)";
            $stmt = $this->db->prepare($query);
            foreach ($data as $key => $val) {
                echo "$key = $val <br>"; // Debugging
                $stmt->bindValue(":$key", $val);
                }
            return $stmt->execute();
    }

    public function update_biodata_model($data){
        $query = "UPDATE siswa SET 
            nama = :nama,
            panggilan = :panggilan,
            tempat_lhr = :tempat_lhr,
            gender = :gender,
            tgl = :tgl,
            provinsi = :provinsi,
            kabupaten = :kabupaten,
            kecamatan = :kecamatan,
            kelurahan = :kelurahan,
            rt = :rt,
            rw = :rw,
            wa = :wa,
            agama = :agama,
            status = :status,
            darah = :darah,
            bb = :bb,
            tb = :tb,
            merokok = :merokok,
            alkohol = :alkohol,
            tangan = :tangan,
            no_rumah = :no_rumah
            -- foto = :foto
            WHERE nis = :nis";
            
        $stmt = $this->db->prepare($query);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function tampilsiswa($nis){
        $stmt = $this->db->prepare(
        "SELECT * FROM siswa WHERE nis = :nis
        LIMIT 1"
            );
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function tampilkeluarga($nis){
        $stmt = $this->db->prepare(
        "SELECT * FROM kk WHERE nis = :nis
        ");
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function tambah_kk_model($data){
        $query = "INSERT INTO kk (id_kk,nis, hubungan, nama, thn_kelahiran, pekerjaan) 
              VALUES (:id_kk,:nis, :hubungan, :nama, :thn_kelahiran, :pekerjaan)";
            $stmt = $this->db->prepare($query);
            foreach ($data as $key => $val) {
                $stmt->bindValue(":$key", $val);
                }
            return $stmt->execute();
    }

    public function tampilpendidikan($nis){
        $stmt = $this->db->prepare(
        "SELECT * FROM pendidikan WHERE nis = :nis
        ");
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function tambah_pendidikan_model($data){
        $query = "INSERT INTO pendidikan (id_pendidikan,nis, sekolah, masuk, lulus, jurusan) 
              VALUES (:id_pendidikan,:nis,  :sekolah, :masuk, :lulus, :jurusan)";
            $stmt = $this->db->prepare($query);
            foreach ($data as $key => $val) {
                $stmt->bindValue(":$key", $val);
                }
            return $stmt->execute();
    }
}