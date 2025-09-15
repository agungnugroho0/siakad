<?php
namespace app\model;
use app\core\database;
use PDO;

class user {
    private PDO $db;

    public function __construct() {
        $this->db = (new database())->connect();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function login($nama,$nis){
        $stmt = $this->db->prepare("(SELECT 'siswa' AS sumber, nis,nama
        FROM siswa
        WHERE nama =(:nama) AND nis =(:nis))
        
        UNION ALL
        
        (SELECT 'lolos' AS sumber,nis,nama
        FROM lolos
        WHERE nama =(:nama) AND nis =(:nis))
        LIMIT 1;");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row ?: null;
    }
}