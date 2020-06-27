<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 14/05/2020
 * Time: 17:46
 */

class AdmKelolaAkun
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    // Read data akun
    public function tampil_user ($id_user = null)
    {
        $db = $this->mysqli->conn;
        if ($id_user == null) {
            $sql    = "SELECT * FROM tb_user ORDER BY nama_lengkap ASC";
        }
        elseif ($id_user != null) {
            $sql    = "SELECT * FROM tb_user WHERE id_user='$id_user' ORDER BY nama_lengkap ASC";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // Read data akun LINE
    public function tampil_akun_line ()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_akun_line ORDER BY display_name ASC";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    // Simpan data akun
    public function simpan_user ($id_line, $nama_lengkap, $jenis_kelamin, $jabatan, $username, $password, $hak_akses,
                                 $foto_akun)
    {
        $db         = $this->mysqli->conn;
        $sql_c      = "SELECT MAX(id_user) AS maxID FROM tb_user";
        $query      = $db->query($sql_c) or die ($db->error);
        $data       = $query->fetch(PDO::FETCH_NUM);
        $id_user    = $data[0];
        $no_urut    = (int) substr($id_user, 4);
        $no_urut++;
        $char       = "USR-";
        $new_id     = $char . sprintf("%03s", $no_urut);

        $sql        = "INSERT INTO tb_user VALUES ('$new_id', '$id_line', '$nama_lengkap', '$jenis_kelamin', '$jabatan', 
                      '$username', '$password', '$hak_akses', '$foto_akun')";
        $db->query($sql) or die ($db->error);
    }

    // Update data akun
    public function update_user ($id_user, $id_line=null, $nama_lengkap, $jenis_kelamin, $jabatan, $username, $password, $hak_akses)
    {
        $db     = $this->mysqli->conn;

        if ($id_line == null) {
            $sql    = "UPDATE tb_user SET id_line=null , nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan', 
                  username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user='$id_user'";

            $db->query($sql) or die ($db->error);
        }
        elseif ($id_line != null) {
            $sql    = "UPDATE tb_user SET id_line='$id_line', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan', 
                  username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user='$id_user'";

            $db->query($sql) or die ($db->error);
        }
    }

    // Update data tanpa foto akun
    public function update_user_foto ($id_user, $id_line=null, $nama_lengkap, $jenis_kelamin, $jabatan, $username, $password, $hak_akses,
                                 $foto_akun)
    {
        $db     = $this->mysqli->conn;

        if ($id_line == null) {
            $sql    = "UPDATE tb_user SET id_line=null, nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan', 
                  username='$username', password='$password', hak_akses='$hak_akses', foto_akun='$foto_akun' 
                  WHERE id_user='$id_user'";

            $db->query($sql) or die ($db->error);
        }
        elseif ($id_line != null) {
            $sql    = "UPDATE tb_user SET id_line='$id_line', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan', 
                  username='$username', password='$password', hak_akses='$hak_akses', foto_akun='$foto_akun' 
                  WHERE id_user='$id_user'";

            $db->query($sql) or die ($db->error);
        }
    }

    // Hapus data user
    public function hapus_user($id_user)
    {
        $db = $this->mysqli->conn;
        $sql = "DELETE FROM tb_user WHERE id_user='$id_user'";
        $db->query($sql) or die ($db->error);
    }
}