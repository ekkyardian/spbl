<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 22/06/2020
 * Time: 18:26
 */

class AdmAkunLine
{
    private $mysqli;

    //---------- Connection ----------
    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    //---------- READ: tb_akun_line ----------
    public function tampil_akun_line ()
    {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_akun_line ORDER BY display_name ASC";
        $query  = $db->query($sql) or die ($db->error);

        return $query;
    }

    //---------- READ: tb_user ----------
    public function tampil_user ($id_line)
    {
        $db     = $this->mysqli->conn;
        $sql    = "SELECT * FROM tb_user WHERE id_line = '$id_line'";
        $query  = $db->query($sql) or die ($db->error);

        return $query;
    }

    //---------- CREATE: tb_akun_line ----------
    public function tambah_akun_line ($id_line, $display_name, $url_foto)
    {
        $db     = $this->mysqli->conn;
        $sql    = "INSERT INTO tb_akun_line VALUES ('$id_line', '$display_name', '$url_foto')";

        $db->query($sql) or die ($db->error);
    }

    //---------- UPDATE: tb_akun_line ----------
    public function update_akun_line ($id_line, $display_name, $url_foto)
    {
        $db     = $this->mysqli->conn;
        $sql    = "UPDATE tb_akun_line SET display_name='$display_name', url_foto='$url_foto' WHERE id_line='$id_line'";

        $db->query($sql) or die ($db->error);
    }

    //---------- DELETE: tb_akun_line ----------
    public function hapus_akun_line ($id_line)
    {
        $db     = $this->mysqli->conn;
        $sql    = "DELETE FROM tb_akun_line WHERE id_line='$id_line'";

        $db->query($sql) or die ($db->error);
    }
}