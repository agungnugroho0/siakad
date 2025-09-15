<?php
function koneksi($db_name){
    try{
        $konek = new PDO("mysql:host=localhost;dbname=$db_name", "root", "bapakDjokam354");
        $konek->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    return $konek;
}

 ?>
 