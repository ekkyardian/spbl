<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 15/05/2020
 * Time: 14:21
 */

require_once ('../../config/+koneksi.php');
require_once ('../database.php');
include "AdmKelolaAkun.php";

$connection = new Database($host, $user, $pass, $database);
$AdmKelolaAkun = new AdmKelolaAkun($connection);

$id_user        = $_POST['id_user'];
$id_line        = $_POST['id_line'];
$nama_lengkap   = $_POST['nama_lengkap'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$jabatan        = $_POST['jabatan'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$hak_akses      = $_POST['hak_akses'];

$pic            = $_FILES['foto_akun']['name'];
$extensi        = explode(".", $_FILES['foto_akun']['name']);
$foto_akun      = "ava-" . round(microtime(true)) . "." . end($extensi);
$sumber         = $_FILES['foto_akun']['tmp_name'];

if ($pic == '') {
    $AdmKelolaAkun->update_user($id_user, $id_line, $nama_lengkap, $jenis_kelamin, $jabatan, $username, $password, $hak_akses);
    echo "<script>window.location='?pages=profile';</script>";
}
else {
    $foto_awal = $AdmKelolaAkun->tampil_user($id_user)->fetchObject()->foto_akun;
    unlink("../../assets/images/avatars/".$foto_awal);

    $upload = move_uploaded_file($sumber, "../../assets/images/avatars/" . $foto_akun);
    if($upload) {
        $AdmKelolaAkun->update_user_foto($id_user, $id_line, $nama_lengkap, $jenis_kelamin, $jabatan, $username, $password, $hak_akses,
            $foto_akun);
        echo "<script>window.location='?pages=profile';</script>";
    } else {
        echo "<script>alert('Gagal mengunggah gambar :(')</script>";
    }
}
?>