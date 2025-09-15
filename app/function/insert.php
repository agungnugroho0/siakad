<?php
function masukan($namatabel,$data){
    $konek = koneksi("lpk");
    $columns = implode(", ", array_map(fn($col) => str_replace(":", "", $col), array_keys($data)));
    $placeholders = implode(",", array_keys($data));
    $sql = "INSERT INTO $namatabel ($columns) VALUES ($placeholders)";
    try{
        $stmt = $konek->prepare($sql);
        $stmt->execute($data);
        return ['status'=>'sukses'];
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ];
    }
}