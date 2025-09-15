<?php
function login($nama)
{
    $konek = koneksi("lpk");
    $stmt = $konek->prepare("(SELECT 'siswa' AS sumber, nis,nama
        FROM siswa
        WHERE nama =(:search))
        
        UNION ALL
        
        (SELECT 'lolos' AS sumber,nis,nama
        FROM lolos
        WHERE nama =(:search))
        LIMIT 1;");
        // WHERE nama LIKE CONCAT('%', :search, '%'))
    $stmt->bindValue(':search', $nama, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($result as $row){
        $nama = $row['nama'];
        $sumber = $row['sumber'];
        $nis = $row['nis'];
    };

    if ($result) {
        session_start();
        $_SESSION['nama'] = $nama;
        $_SESSION['sumber'] = $sumber;
        $_SESSION['nis'] = $nis;
        $_SESSION['level'] = "siswa";
        return true;
    } else {
        return false;
    }
}