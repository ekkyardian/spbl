<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 11/04/2020
 * Time: 19:34
 */

require_once ('../../config/+koneksi.php');
require_once ('../database.php');
include "AdmPeristiwaBencana.php";

$connection = new Database($host, $user, $pass, $database);
$AdmPeristiwaBencana = new AdmPeristiwaBencana($connection);

$id_peristiwa = $connection->conn->real_escape_string($_POST['id_peristiwa']);
$jenis_bencana = $connection->conn->real_escape_string($_POST['jenis_bencana']);
$nama_inisial = $connection->conn->real_escape_string($_POST['nama_inisial']);
$cakupan_lokasi = $connection->conn->real_escape_string($_POST['cakupan_lokasi']);
$tanggal_peristiwa = $connection->conn->real_escape_string($_POST['tanggal_peristiwa']);
$jam_peristiwa = $connection->conn->real_escape_string($_POST['jam_peristiwa']);

$AdmPeristiwaBencana->update("UPDATE tb_peristiwa SET jenis_bencana='$jenis_bencana', nama_inisial='$nama_inisial', cakupan_lokasi='$cakupan_lokasi', tanggal_peristiwa='$tanggal_peristiwa', jam_peristiwa='$jam_peristiwa' WHERE id_peristiwa='$id_peristiwa'");
echo "<script>window.location='?pages=peristiwa_bencana';</script>";
?>


