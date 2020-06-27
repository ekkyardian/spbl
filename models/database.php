<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 03/04/2020
 * Time: 20:21
 */

class Database {
    private $host;
    private $user;
    private $pass;
    private $database;
    public $conn;

    // Pilih Salah Satu. Hapus/matikan fungsi yang tidak digunakan
    function __construct($host, $user, $pass, $database) {
        $this->host     = $host;
        $this->user     = $user;
        $this->pass     = $pass;
        $this->database = $database;

        // MySQL
        /*$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die (mysqli_error());
        if(!$this->conn) {
            return false;
        } else {
            return true;
        }*/

        // PostgreSQL
        $this->conn = new PDO("pgsql:dbname=$database; host=$host", $user, $pass);
        if(!$this->conn) {
            return false;
        }
        else {
            return true;
        }

    }
}
?>