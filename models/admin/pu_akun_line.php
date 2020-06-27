<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 15/05/2020
 * Time: 14:21
 */

require_once ('../../config/+koneksi.php');
require_once ('../database.php');
include "AdmAkunLine.php";

$connection = new Database($host, $user, $pass, $database);
$AdmAkunLine = new AdmAkunLine($connection);

$id_line        = $_POST['id_line'];
$display_name   = $_POST['display_name'];
$url_foto       = $_POST['url_foto'];

$AdmAkunLine->update_akun_line($id_line, $display_name, $url_foto);
echo "<script>window.location='?pages=akun_line';</script>";
?>