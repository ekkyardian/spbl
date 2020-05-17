<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:56
 */

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
        <li class="active">Akun Pribadi</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
        </form>
    </div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Profile
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Informasi Akun
            </small>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-3 center">
            <span class="profile-picture">
                <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2"
                     src="../../assets/images/avatars/<?php echo $tampil_user->foto_akun; ?>"
                     width="150px" height="150px" />
            </span>

            <div class="space space-4"></div>

            <div class="width-80 label label-success label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <span class="white"><?php echo $tampil_user->nama_lengkap; ?></span>
                </div>
            </div>

            <div class="space space-4"></div>

            <a id="update-data" role="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#update"
               data-id_user="<?php echo $tampil_user->id_user; ?>"
               data-nama_lengkap="<?php echo $tampil_user->nama_lengkap; ?>"
               data-jenis_kelamin="<?php echo $tampil_user->jenis_kelamin; ?>"
               data-jabatan="<?php echo $tampil_user->jabatan; ?>"
               data-username="<?php echo $tampil_user->username; ?>"
               data-password="<?php echo $tampil_user->password; ?>"
               data-hak_akses="<?php echo $tampil_user->hak_akses; ?>"
               data-foto_akun="<?php echo $tampil_user->foto_akun; ?>">
                <i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
                <span class="bigger-110">Perbarui</span>
            </a>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-5">

            <div class="profile-user-info">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Username </div>

                    <div class="profile-info-value">
                        <span><?php echo $tampil_user->username; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Nama Lengkap </div>

                    <div class="profile-info-value">
                        <span><?php echo $tampil_user->nama_lengkap; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Jenis Kelamin </div>

                    <div class="profile-info-value">
                        <span>
                            <?php
                            $jk = $tampil_user->jenis_kelamin;
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
                        </span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Jabatan </div>

                    <div class="profile-info-value">
                        <span><?php echo $tampil_user->jabatan; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Hak Akses </div>

                    <div class="profile-info-value">
                        <span><?php echo $tampil_user->hak_akses; ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Password </div>

                    <div class="profile-info-value">
                        <span>**********</span>
                    </div>
                </div>
            </div>

            <div class="hr hr-8 dotted"></div>

            <div class="profile-user-info">

                <div class="profile-info-row">
                    <div class="profile-info-name">
                    </div>

                    <div class="profile-info-value">
                        <a href="?pages=logout" onclick="return confirm('Keluar adari aplikasi?')">
                            <i class="ace-icon fa fa-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--| Start: Update Data Modal |-->
        <div id="update" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding no-border">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <strong>Update Profile</strong>
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
                                        <input type="text" id="password" name="password" class="col-xs-12 col-sm-12" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3 col-sm-3">Hak Akses</td>
                                    <td class="col-xs-1 col-sm-1">:</td>
                                    <td>
                                        <input type="hidden" id="hak_akses" name="hak_akses" />
                                        <select class="form-control" id="hak_akses_fake" name="hak_akses_fake" disabled>
                                            <option value="">Pilih...</option>
                                            <option value="admin">Admin</option>
                                            <option value="trc">TRC</option>
                                            <option value="ketua">Ketua</option>
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
                    var j_nama_lengkap  = $(this).data('nama_lengkap');
                    var jenis_kelamin   = $(this).data('jenis_kelamin');
                    var j_jabatan       = $(this).data('jabatan');
                    var j_username      = $(this).data('username');
                    var j_password      = $(this).data('password');
                    var j_hak_akses     = $(this).data('hak_akses');
                    var j_foto_akun     = $(this).data('foto_akun');

                    $("#modal_update #id_user").val(j_id_user);
                    $("#modal_update #nama_lengkap").val(j_nama_lengkap);
                    $("#modal_update #jenis_kelamin").val(jenis_kelamin);
                    $("#modal_update #jabatan").val(j_jabatan);
                    $("#modal_update #username").val(j_username);
                    $("#modal_update #password").val(j_password);
                    $("#modal_update #hak_akses").val(j_hak_akses);
                    $("#modal_update #hak_akses_fake").val(j_hak_akses);
                    $("#modal_update #pic").attr("src", "../../assets/images/avatars/" + j_foto_akun);
                });

                $(document).ready(function (e) {
                    $("#form-update").on("submit", (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../models/admin/pu_profile.php',
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

    </div>
    <!--| End: Content Area |-->

</div>
</body>
