<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/04/2020
 * Time: 20:18
 */

$host       = "localhost"; // ec2-52-202-146-43.compute-1.amazonaws.com
$user       = "postgres"; // ufsjqqqpokpgdh
$pass       = "03031995"; // e7820bfcbba8f00c4b2bffc10f6a79540f4bdede391b9cd40eaaa8589e8eab71
$database   = "db_spbl"; // dc1b0t4rha12nb

$link = new PDO("pgsql:dbname=$database; host=$host", $user, $pass);

if ($link) {
    echo "Berhasil";
}
else {
    echo "Gagal";
}
?>