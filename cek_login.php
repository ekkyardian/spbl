<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/04/2020
 * Time: 20:20
 */

session_start();
require_once("config/+koneksi.php");
require_once("models/database.php");
include "models/m_login.php";

$connection = new Database($host, $user, $pass, $database);
$login = new Login($connection);

$username = $_POST['username'];
$password = $_POST['password'];

$ambil_data = $login->ambil_data($username, $password);
$getID = $login->ambil_data($username, $password)->fetch_object();
$cek = mysqli_num_rows($ambil_data);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($ambil_data);

    if ($data['hak_akses']=='admin') {
        $_SESSION['username']=$username;
        $_SESSION['hak_akses']='admin';
        $_SESSION['id_user']=$getID->id_user;
        header("location:views/admin/adm_index.php");
    } else if ($data['hak_akses']=='trc') {
        $_SESSION['username']=$username;
        $_SESSION['hak_akses']='trc';
        $_SESSION['id_user']=$getID->id_user;
        header("location: views/trc/trc_index.php");
    } else if ($data['hak_akses']=='ketua') {
        $_SESSION['username']=$username;
        $_SESSION['hak_akses']='ketua';
        $_SESSION['id_user']=$getID->id_user;
        header("location: views/ketua/kta_index.php");
    } else {
        header("location: login.php?akses=gagal");
    }
} else {
    header("location: login.php?akses=gagal");
}
?>