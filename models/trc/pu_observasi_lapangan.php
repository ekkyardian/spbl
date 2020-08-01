<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 11/04/2020
 * Time: 19:34
 */

require_once ('../../config/+koneksi.php');
require_once ('../database.php');
include "TrcHasilObservasi.php";

$connection = new Database($host, $user, $pass, $database);
$TrcHasilObservasi = new TrcHasilObservasi($connection);

$trc_korban_terdampak   = $_POST['korban_terdampak'];
$trc_korban_mengungsi   = $_POST['korban_mengungsi'];
$trc_korban_luka        = $_POST['korban_luka'];
$trc_korban_hilang      = $_POST['korban_hilang'];
$trc_korban_meninggal   = $_POST['korban_meninggal'];
$trc_pasca_bencana      = $_POST['pasca_bencana'];

$trc_pl_balita          = $_POST['pl_balita'];
$trc_pl_anak_anak       = $_POST['pl_anak_anak'];
$trc_pl_remaja          = $_POST['pl_remaja'];
$trc_pl_dewasa          = $_POST['pl_dewasa'];
$trc_pl_lansia          = $_POST['pl_lansia'];

$trc_pp_balita          = $_POST['pp_balita'];
$trc_pp_anak_anak       = $_POST['pp_anak_anak'];
$trc_pp_remaja          = $_POST['pp_remaja'];
$trc_pp_dewasa          = $_POST['pp_dewasa'];
$trc_pp_lansia          = $_POST['pp_lansia'];

$trc_pl                 = $trc_pl_balita + $trc_pl_anak_anak + $trc_pl_remaja + $trc_pl_dewasa + $trc_pl_lansia;
$trc_pp                 = $trc_pp_balita + $trc_pp_anak_anak + $trc_pp_remaja + $trc_pp_dewasa + $trc_pp_lansia;
$id_peristiwa           = $_POST['id_peristiwa'];

$TrcHasilObservasi->update_observasi($id_peristiwa, $trc_korban_terdampak, $trc_korban_mengungsi, $trc_korban_luka, $trc_korban_meninggal,
    $trc_korban_hilang, $trc_pasca_bencana, $trc_pl, $trc_pl_balita, $trc_pl_anak_anak, $trc_pl_remaja, $trc_pl_dewasa, $trc_pl_lansia, $trc_pp, $trc_pp_balita,
    $trc_pp_anak_anak, $trc_pp_remaja, $trc_pp_dewasa, $trc_pp_lansia);
echo "<script>window.location='../../models/ketua/analisis_laporan.php';</script>";
?>


