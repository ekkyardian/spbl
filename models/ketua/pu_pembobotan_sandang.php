<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 18/04/2020
 * Time: 15:11
 */

require_once ('../../config/+koneksi.php');
require_once ('../database.php');
include "KtaPembobotan.php";

$connection = new Database($host, $user, $pass, $database);
$KtaPembobotan = new KtaPembobotan($connection);

$id_bobot_21                = $_POST['id_bobot_21'];
$korban_terdampak           = $_POST['korban_terdampak_2'];

$id_bobot_22                = $_POST['id_bobot_22'];
$korban_mengungsi           = $_POST['korban_mengungsi_2'];

$id_bobot_23                = $_POST['id_bobot_23'];
$korban_luka                = $_POST['korban_luka_2'];

$id_bobot_24                = $_POST['id_bobot_24'];
$korban_meninggal_hilang    = $_POST['korban_meninggal_hilang_2'];

$id_bobot_25                = $_POST['id_bobot_25'];
$pasca_bencana              = $_POST['pasca_bencana_2'];

$total_bobot = $korban_terdampak + $korban_mengungsi + $korban_luka + $korban_meninggal_hilang + $pasca_bencana;
if ($total_bobot > 100) {
    echo "<script>window.location='?pages=pembobotan&notifikasi=gagal'</script>";
} else if ($total_bobot < 100) {
    echo "<script>window.location='?pages=pembobotan&notifikasi=gagal'</script>";
} else {

    $KtaPembobotan->edit_bobot("UPDATE tb_bobot SET bobot='$korban_terdampak' WHERE id_bobot='$id_bobot_21'");
    $KtaPembobotan->edit_bobot("UPDATE tb_bobot SET bobot='$korban_mengungsi' WHERE id_bobot='$id_bobot_22'");
    $KtaPembobotan->edit_bobot("UPDATE tb_bobot SET bobot='$korban_luka' WHERE id_bobot='$id_bobot_23'");
    $KtaPembobotan->edit_bobot("UPDATE tb_bobot SET bobot='$korban_meninggal_hilang' WHERE id_bobot='$id_bobot_24'");
    $KtaPembobotan->edit_bobot("UPDATE tb_bobot SET bobot='$pasca_bencana' WHERE id_bobot='$id_bobot_25'");
    echo "<script>window.location='?pages=pembobotan&notifikasi=sukses'</script>";
}
?>