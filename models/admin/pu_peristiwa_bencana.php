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

$id_peristiwa = $_POST['id_peristiwa'];
$jenis_bencana = $_POST['jenis_bencana'];
$nama_inisial = $_POST['nama_inisial'];
$cakupan_lokasi = $_POST['cakupan_lokasi'];
$tanggal_peristiwa = $_POST['tanggal_peristiwa'];
$jam_peristiwa = $_POST['jam_peristiwa'];
$id_user = $_POST['id_user'];
$status = $_POST['status'];

$AdmPeristiwaBencana->update("UPDATE tb_peristiwa SET id_user='$id_user', jenis_bencana='$jenis_bencana', nama_inisial='$nama_inisial', cakupan_lokasi='$cakupan_lokasi', tanggal_peristiwa='$tanggal_peristiwa', jam_peristiwa='$jam_peristiwa', status='$status' WHERE id_peristiwa='$id_peristiwa'");
echo "<script>window.location='?pages=peristiwa_bencana';</script>";
?>


