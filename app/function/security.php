<?php
function loginadmin(){
    session_start();
    if (isset($_SESSION['level'])){
        header("location:view/index.php");
        exit;
    } else {
        header("location:../../../hikari/index.php?pesan=gagal");
        exit;
    }
}

function loginuser(){
    session_start();
    if (isset($_SESSION['level']) && $_SESSION['level'] == 'siswa') {
        header("location:view/index.php");
        exit;
    }
}
function user(){
    session_start();
    if (isset($_SESSION['level']) && $_SESSION['level'] == 'siswa') {
        return true;
    } else {
        header("location:../login.php?pesan=gagal");
        exit;
    }
}
?>
