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
         foreach ($data as $key => $value) {
            if ($key !== 'foto') {
                $data[$key] = strtoupper($value);
            }
        }
        $query = "UPDATE siswa SET
        nama = :nama_lengkap,
        panggilan = :panggilan,
        id_kelas = :id_kelas,
        tempat_lhr = :tempat_lahir,
        gender = :gender,
        tgl = :tgl,
        provinsi = :provinsi,
        kabupaten = :kab,
        kecamatan = :kec,
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
        ".(!empty($data['foto']) ? ", foto = :foto": "")." WHERE nis = :nis";
        $query = preg_replace('/,(\s*WHERE)/', ' $1', $query);

        $stmt = $this->db->prepare($query);

    // Binding semua data
        $stmt->bindParam(':nama_lengkap', $data['nama_lengkap']);
        $stmt->bindParam(':panggilan', $data['panggilan']);
        $stmt->bindParam(':id_kelas', $data['id_kelas']);
        $stmt->bindParam(':tempat_lahir', $data['tempat_lahir']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':tgl', $data['tgl']);
        $stmt->bindParam(':provinsi', $data['provinsi']);
        $stmt->bindParam(':kab', $data['kab']);
        $stmt->bindParam(':kec', $data['kec']);
        $stmt->bindParam(':rt', $data['rt']);
        $stmt->bindParam(':rw', $data['rw']);
        $stmt->bindParam(':wa', $data['wa']);
        $stmt->bindParam(':agama', $data['agama']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':darah', $data['darah']);
        $stmt->bindParam(':bb', $data['bb']);
        $stmt->bindParam(':tb', $data['tb']);
        $stmt->bindParam(':merokok', $data['merokok']);
        $stmt->bindParam(':alkohol', $data['alkohol']);
        $stmt->bindParam(':tangan', $data['tangan']);
        $stmt->bindParam(':no_rumah', $data['no_rumah']);
        if (!empty($data['foto'])) $stmt->bindParam(':foto', $data['foto']);
        $stmt->bindParam(':nis', $data['nis']);
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