<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:55
 */

include "../../models/admin/AdmKelolaAkun.php";

$AdmKelolaAkun = new AdmKelolaAkun($connection);

if (@$_GET['act'] == '') {
?>

<body class="no-skin">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li><a href="#">Kelola Akun</a></li>
        <li class="active">Semua Akun</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
            </span>
        </form>
    </div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Kelola Akun
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Daftar Akun
            </small>
        </h1>
    </div>

    <!--| Start: Action Button |-->
    <div class="row">
        <div class="col-sm-6">
            <a href="#tambah-data" role="button" class="green" data-toggle="modal">
                <button class="btn btn-white btn-info btn-bold">
                    <i class="ace-icon glyphicon glyphicon-plus bigger-120 blue"></i>
                    Tambah Data
                </button>
            </a>
        </div>

        <div class="vspace-6-sm"></div>

        <div class="col-sm-6">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
        </div>
    </div>
    <!--| End: Action Button |-->

    <div class="table-header">
        Hasil pencarian untuk data akun
    </div>

    <!--| Start: Tabel Peristiwa Bencana |-->
    <div class="row">
        <div class="col-sm-12">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Hak Akses</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Get list Data: tb_peristiwa |-->
                <?php
                $no = 1;
                $tampil_peristiwa = $AdmKelolaAkun->tampil_user();
                while ($data = $tampil_peristiwa->fetchObject()) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $no++; ?></td>
                        <td><?php echo $data->nama_lengkap; ?></td>
                        <td>
                            <?php
                            $jk = $data->jenis_kelamin;
                            if ($jk == "L") {
                                echo "Laki-laki";
                            }
                            elseif ($jk == "P") {
                                echo "Perempuan";
                            }
                            else {
                                echo "error";
                            }
                            ?>
                        </td>
                        <td><?php echo $data->jabatan; ?></td>
                        <td><?php echo $data->username; ?></td>
                        <td><?php echo $data->hak_akses; ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">

                                <!-- Photo Profile Button -->
                                <a id="btn-lihat-foto" role="button" class="blue tooltip-info" data-rel="tooltip"
                                   title="Lihat foto akun" data-toggle="modal"
                                   data-target="#modal-lihat-foto<?php echo $data->id_user; ?>">
                                    <i class="glyphicon glyphicon-picture bigger-130"></i>
                                </a>

                                <!--| Start: Lihat Foto Akun Modal |-->
                                <div id="modal-lihat-foto<?php echo $data->id_user; ?>" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header no-padding no-border">
                                                <div class="table-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <span class="white">&times;</span>
                                                    </button>
                                                    <strong>Foto Akun: <?php echo $data->nama_lengkap; ?></strong>
                                                </div>
                                            </div>
                                            <form action="" id="form-lihat-foto" method="post" enctype="multipart/form-data">
                                                <div class="modal-body" id="mb-lihat-foto" align="center">
                                                    <img src="../../assets/images/avatars/<?php echo $data->foto_akun; ?>"
                                                    width="400px" height="400px"
                                                         alt="Foto Akun: <?php echo $data->nama_lengkap; ?>">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--| End: Lihat Foto Akun Modal |-->

                                <!-- Edit Button -->
                                <a id="update-data" role="button" class="green tooltip-success" data-rel="tooltip"
                                   title="Edit" data-toggle="modal" data-target="#update"
                                   data-id_user="<?php echo $data->id_user; ?>"
                                   data-id_line="<?php echo $data->id_line; ?>"
                                   data-nama_lengkap="<?php echo $data->nama_lengkap; ?>"
                                   data-jenis_kelamin="<?php echo $data->jenis_kelamin; ?>"
                                   data-jabatan="<?php echo $data->jabatan; ?>"
                                   data-username="<?php echo $data->username; ?>"
                                   data-password="<?php echo $data->password; ?>"
                                   data-hak_akses="<?php echo $data->hak_akses; ?>"
                                   data-foto_akun="<?php echo $data->foto_akun; ?>">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <!-- Hapus Button -->
                                <a href="?pages=kelola_akun&act=del&id=<?php echo $data->id_user; ?>" role="button"
                                   onclick="return confirm('Hapus akun <?php echo $data->nama_lengkap; ?>?')"
                                   class="red tooltip-error" data-rel="tooltip" title="Hapus">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <!--| Start: Menu aksi layar kecil |-->
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                            data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right
                                    dropdown-caret dropdown-close">

                                        <!--| View Photo Profile |-->
                                        <li>
                                            <a href="?pages=kelola_akun&act=viewpic&id=<?php echo $data->id_user; ?>"
                                               class="tooltip-info" data-rel="tooltip" title="Foto">
                                        <span class="blue">
                                            <i class="glyphicon glyphicon-picture bigger-120"></i>
                                        </span>
                                            </a>
                                        </li>

                                        <!--| Edit/Update |-->
                                        <li>
                                            <a id="update-data" role="button" class="tooltip-success" data-rel="tooltip"
                                               title="Edit"
                                               data-toggle="modal" data-target="#update"
                                               data-id_user="<?php echo $data->id_user; ?>"
                                               data-id_line="<?php echo $data->id_line; ?>"
                                               data-nama_lengkap="<?php echo $data->nama_lengkap; ?>"
                                               data-jenis_kelamin="<?php echo $data->jenis_kelamin; ?>"
                                               data-jabatan="<?php echo $data->jabatan; ?>"
                                               data-username="<?php echo $data->username; ?>"
                                               data-password="<?php echo $data->password; ?>"
                                               data-hak_akses="<?php echo $data->hak_akses; ?>"
                                               data-foto_akun="<?php echo $data->foto_akun; ?>">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                            </a>
                                        </li>

                                        <!--| Hapus |-->
                                        <li>
                                            <a href="?pages=kelola_akun&act=del&id=<?php echo $data->id_user; ?>"
                                               role="button" class="tooltip-error" data-rel="tooltip" title="Delete"
                                               onclick="return confirm('Hapus data?')">
                                        <span class="red">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--| End: Menu aksi layar kecil |-->
                        </td>
                    </tr>
                <?php } ?>
                <!--| End: Get list data: tb_peristiwa |-->
                </tbody>
            </table>
        </div>
    </div>

    <!--| Start: Tambah Data Modal |-->
    <div id="tambah-data" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding no-border">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        <strong>Buat Akun Baru</strong>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Nama Lengkap</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="col-xs-12 col-sm-12"
                                    required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jenis Kelamin</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jabatan</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="jabatan" name="jabatan" class="col-xs-12 col-sm-12" required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Username</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="username" name="username" class="col-xs-12 col-sm-12" required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Password</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="password" name="password" class="col-xs-12 col-sm-12" required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Hak Akses</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="hak_akses" name="hak_akses" required>
                                        <option value="">Pilih...</option>
                                        <option value="admin">Admin</option>
                                        <option value="trc">TRC</option>
                                        <option value="ketua">Ketua/Kepala Pelaksana</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">LINE ID</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="id_line" name="id_line" required>
                                        <option value="">Pilih...</option>
                                        <option value="">(NULL)</option>
                                        <?php
                                        $tampil_akun_line = $AdmKelolaAkun->tampil_akun_line();
                                        while ($data_line = $tampil_akun_line->fetchObject()) {
                                        ?>
                                            <option value="<?php echo $data_line->id_line; ?>"><?php echo $data_line->id_line." | ".$data_line->display_name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Foto Akun</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="file" name="foto_akun" id="foto_akun" class="form-control" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer no-margin-top">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Batal
                        </button>

                        <button type="submit" name="simpan" class="btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            Simpan
                        </button>
                    </div>
                </form>
                <!--| Start: Tambah Data |-->
                <?php
                if (isset($_POST['simpan'])) {
                    $id_line       = $_POST['id_line'];
                    $nama_lengkap  = $_POST['nama_lengkap'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $jabatan       = $_POST['jabatan'];
                    $username      = $_POST['username'];
                    $password      = $_POST['password'];
                    $hak_akses     = $_POST['hak_akses'];

                    $extensi = explode(".", $_FILES['foto_akun']['name']);
                    $foto_akun = "ava-" . round(microtime(true)) . "." . end($extensi);
                    $sumber = $_FILES['foto_akun']['tmp_name'];

                    $upload = move_uploaded_file($sumber, "../../assets/images/avatars/" . $foto_akun);
                    if ($upload) {
                        $AdmKelolaAkun->simpan_user($id_line, $nama_lengkap,$jenis_kelamin, $jabatan, $username, $password,
                            $hak_akses, $foto_akun);
                        header("location: adm_index.php?pages=kelola_akun");
                    }
                    else {
                        echo "<script>alert('Gagal mengunggah gambar :(')</script>";
                    }
                }
                ?>
                <!--| End: Tambah Data |-->
            </div>
        </div>
    </div>
    <!--| End: Tambah Data Modal |-->

    <!--| Start: Update Data Modal |-->
    <div id="update" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding no-border">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        <strong>Update Data User</strong>
                    </div>
                </div>
                <form action="" id="form-update" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal_update">
                        <table class="table">
                            <tbody>
                            <tr>
                                <input type="hidden" id="id_user" name="id_user">
                                <td class="col-xs-3 col-sm-3">Nama Lengkap</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jenis Kelamin</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">Pilih...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Jabatan</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="jabatan" name="jabatan" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Username</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="username" name="username" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Password</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <input type="text" id="password" name="password" class="col-xs-12 col-sm-12"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Hak Akses</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="hak_akses" name="hak_akses">
                                        <option value="">Pilih...</option>
                                        <option value="admin">Admin</option>
                                        <option value="trc">TRC</option>
                                        <option value="ketua">Ketua</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">LINE ID</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <select class="form-control" id="id_line" name="id_line">
                                        <?php
                                        $tampil_akun_line = $AdmKelolaAkun->tampil_akun_line();
                                        while ($data_line = $tampil_akun_line->fetchObject()) {
                                            ?>
                                            <option value="<?php echo $data_line->id_line; ?>"><?php echo $data_line->id_line." | ".$data_line->display_name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-xs-3 col-sm-3">Foto Akun</td>
                                <td class="col-xs-1 col-sm-1">:</td>
                                <td>
                                    <div style="padding: 5px">
                                        <img src="" width="80px" height="80px" id="pic" />
                                    </div>
                                    <input type="file" name="foto_akun" id="foto_akun" class="form-control">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer no-margin-top">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Batal
                        </button>

                        <button type="submit" name="update" class="btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!--| Start: Update Data |-->
        <script src="../../assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
            $(document).on("click", "#update-data", function () {
                var j_id_user       = $(this).data('id_user');
                var j_id_line       = $(this).data('id_line');
                var j_nama_lengkap  = $(this).data('nama_lengkap');
                var jenis_kelamin   = $(this).data('jenis_kelamin');
                var j_jabatan       = $(this).data('jabatan');
                var j_username      = $(this).data('username');
                var j_password      = $(this).data('password');
                var j_hak_akses     = $(this).data('hak_akses');
                var j_foto_akun     = $(this).data('foto_akun');

                $("#modal_update #id_user").val(j_id_user);
                $("#modal_update #id_line").val(j_id_line);
                $("#modal_update #nama_lengkap").val(j_nama_lengkap);
                $("#modal_update #jenis_kelamin").val(jenis_kelamin);
                $("#modal_update #jabatan").val(j_jabatan);
                $("#modal_update #username").val(j_username);
                $("#modal_update #password").val(j_password);
                $("#modal_update #hak_akses").val(j_hak_akses);
                $("#modal_update #pic").attr("src", "../../assets/images/avatars/" + j_foto_akun);
            });

            $(document).ready(function (e) {
                $("#form-update").on("submit", (function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: '../../models/admin/pu_kelola_akun.php',
                        type: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (msg) {
                            $('.table').html(msg);
                        }
                    });
                }));
            });
        </script>
        <!--| End: Update Data |-->
    </div>
    <!--| End: Update Data Modal |-->
    <!--| End: Content Area |-->

</div>
</body>

<?php
}
elseif (@$_GET['act'] == 'del') {
    $foto_awal = $AdmKelolaAkun->tampil_user($_GET['id'])->fetchObject()->foto_akun;
    unlink("../../assets/images/avatars/".$foto_awal);

    $AdmKelolaAkun->hapus_user($_GET['id']);
    header("location: ?pages=kelola_akun");
}
?>