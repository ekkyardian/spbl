<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:54
 */

include "../../models/admin/AdmPeristiwaBencana.php";

$TrcHasilObservasi = new TrcHasilObservasi($connection);
$AdmPeristiwaBencana = new AdmPeristiwaBencana($connection);

if (@$_GET['act'] == '') {

?>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">SPBL</a>
        </li>
        <li class="active">Hasil Observasi</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search"></div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="page-header">
        <h1>
            Hasil Observasi
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Daftar Isian Hasil Observasi
            </small>
        </h1>
    </div>

    <!--| Start: List Data |-->
    <div class="table-header">
        Hasil pencarian untuk form input hasil observasi lapangan
    </div>

    <!--| Start: Tabel Peristiwa Bencana + Hasil Observasi Lapangan |-->
    <div class="row">
        <div class="col-sm-12">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>

                    <th class="col-lg-3 col-md-3">Nama Inisial</th>
                    <th>Jenis bencana</th>
                    <th class="col-lg-5 col-md-5">Cakupan Lokasi</th>
                    <th>Waktu Peristiwa</th>
                    <th class="col-lg-1 col-md-1"></th>
                    <th style="visibility: hidden" class="no-border no-margin no-padding no-radius"></th>
                </tr>
                </thead>

                <tbody>
                <!--| Start: Get list Data: tb_peristiwa |-->
                <?php
                $no = 1;
                $tampil = $TrcHasilObservasi->tampil_observasi();
                while ($data = $tampil->fetchObject()) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $no++; ?></td>

                        <td>
                            <?php
                            echo $data->nama_inisial." ";

                            $stat = $data->status;
                            if ($stat=="Open") {
                                echo "<span class=\"label label-success arrowed-in-right arrowed\">Open</span>";
                            }
                            elseif ($stat=="Closed") {
                                echo "<span class=\"label label-danger arrowed-in-right arrowed\">Closed</span>";
                            }
                            ?>
                        </td>
                        <td><?php echo $data->jenis_bencana; ?></td>
                        <td class="hidden-480"><?php echo $data->cakupan_lokasi; ?></td>
                        <td align="center">
                            <?php echo $data->tanggal_peristiwa; ?>, <br />
                            <?php echo $data->jam_peristiwa; ?> WIB
                        </td>
                        <td align="center">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <?php
                                $idUser = $_SESSION['id_user'];

                                $new_idPeristiwa = str_replace("/", "", $data->id_peristiwa);
                                if ($idUser == $data->id_user) {
                                    echo "
                                       <a id=\"update-data\" role=\"button\" class=\"blue tooltip-info\" data-rel=\"tooltip\"
                                       title=\"Input Hasil Observasi\" data-toggle=\"modal\" data-target=\"#update\"
                                       data-id_peristiwa=\"$data->id_peristiwa\"
                                       data-jenis_bencana=\"$data->jenis_bencana\"
                                       data-nama_inisial=\"$data->nama_inisial\"
                                       data-cakupan_lokasi=\"$data->cakupan_lokasi\"
                                       data-tanggal_peristiwa=\"$data->tanggal_peristiwa\"
                                       data-jam_peristiwa=\"$data->jam_peristiwa\"
                                       data-id_user=\"$data->id_user\"
                                       data-status=\"$data->status\"
                                       data-korban_terdampak=\"$data->korban_terdampak\"
                                       data-korban_mengungsi=\"$data->korban_mengungsi\"
                                       data-korban_luka=\"$data->korban_luka\"
                                       data-korban_meninggal=\"$data->korban_meninggal\"
                                       data-korban_hilang=\"$data->korban_hilang\"
                                       data-pasca_bencana=\"$data->pasca_bencana\"
                                       data-pl_balita=\"$data->pl_balita\"
                                       data-pl_anak_anak=\"$data->pl_anak_anak\"
                                       data-pl_remaja=\"$data->pl_remaja\"
                                       data-pl_dewasa=\"$data->pl_dewasa\"
                                       data-pl_lansia=\"$data->pl_lansia\"
                                       data-pp_balita=\"$data->pp_balita\"
                                       data-pp_anak_anak=\"$data->pp_anak_anak\"
                                       data-pp_remaja=\"$data->pp_remaja\"
                                       data-pp_dewasa=\"$data->pp_dewasa\"
                                       data-pp_lansia=\"$data->pp_lansia\"
                                       data-laporan_tahap1=\"2\"
                                       data-laporan_tahap2=\"2\"
                                       data-izin=\"berwenang\"
                                       >
                                            <i class=\"ace-icon glyphicon glyphicon-edit bigger-130\"></i>
                                       </a>
                                    ";
                                }
                                else {
                                    echo "
                                       <a id=\"btn-penanggungjawab\" role=\"button\" class=\"green tooltip-success\" data-rel=\"tooltip\"
                                       title=\"Penanggung jawab\" data-toggle=\"modal\"
                                       data-target=\"#modal-penanggungjawab$new_idPeristiwa\">
                                            <i class=\"ace-icon glyphicon glyphicon-user bigger-130\"></i>
                                       </a>
                                       
                                       <a id=\"update-data\" role=\"button\" class=\"orange tooltip-warning\" data-rel=\"tooltip\"
                                       title=\"Lihat Hasil Observasi\" data-toggle=\"modal\" data-target=\"#update\"
                                       data-id_peristiwa=\"$data->id_peristiwa\"
                                       data-jenis_bencana=\"$data->jenis_bencana\"
                                       data-nama_inisial=\"$data->nama_inisial\"
                                       data-cakupan_lokasi=\"$data->cakupan_lokasi\"
                                       data-tanggal_peristiwa=\"$data->tanggal_peristiwa\"
                                       data-jam_peristiwa=\"$data->jam_peristiwa\"
                                       data-id_user=\"$data->id_user\"
                                       data-status=\"$data->status\"
                                       data-korban_terdampak=\"$data->korban_terdampak\"
                                       data-korban_mengungsi=\"$data->korban_mengungsi\"
                                       data-korban_luka=\"$data->korban_luka\"
                                       data-korban_meninggal=\"$data->korban_meninggal\"
                                       data-korban_hilang=\"$data->korban_hilang\"
                                       data-pasca_bencana=\"$data->pasca_bencana\"
                                       data-pl_balita=\"$data->pl_balita\"
                                       data-pl_anak_anak=\"$data->pl_anak_anak\"
                                       data-pl_remaja=\"$data->pl_remaja\"
                                       data-pl_dewasa=\"$data->pl_dewasa\"
                                       data-pl_lansia=\"$data->pl_lansia\"
                                       data-pp_balita=\"$data->pp_balita\"
                                       data-pp_anak_anak=\"$data->pp_anak_anak\"
                                       data-pp_remaja=\"$data->pp_remaja\"
                                       data-pp_dewasa=\"$data->pp_dewasa\"
                                       data-pp_lansia=\"$data->pp_lansia\"
                                       data-izin=\"tolak\"
                                       >
                                            <i class=\"ace-icon glyphicon glyphicon-zoom-in bigger-130\"></i>
                                       </a>
                                       
                                    ";
                                }
                                ?>
                            </div>

                            <!--| Start: Menu aksi layar kecil |-->
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                            data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <!--| Penanggungjawab |-->
                                        <li>
                                            <a id="penanggungjawab-data" role="button" class="tooltip-info" data-rel="tooltip" title="TRC"
                                               data-toggle="modal" data-target="#penanggungjawab<?php echo $data->id_user; ?>">
                                        <span class="blue">
                                            <i class="ace-icon glyphicon glyphicon-user bigger-120"></i>
                                        </span>
                                            </a>
                                        </li>

                                        <!--| Edit/Update |-->
                                        <li>
                                            <a id="update-data" role="button" class="tooltip-success" data-rel="tooltip" title="Edit"
                                               data-toggle="modal" data-target="#update"
                                               data-id_peristiwa="<?php echo $data->id_peristiwa; ?>"
                                               data-jenis_bencana="<?php echo $data->jenis_bencana; ?>"
                                               data-nama_inisial="<?php echo $data->nama_inisial; ?>"
                                               data-cakupan_lokasi="<?php echo $data->cakupan_lokasi; ?>"
                                               data-tanggal_peristiwa="<?php echo $data->tanggal_peristiwa; ?>"
                                               data-jam_peristiwa="<?php echo $data->jam_peristiwa; ?>"
                                               data-id_user="<?php echo $data->id_user; ?>"
                                               data-status="<?php echo $data->status; ?>">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--| End: Menu aksi layar kecil |-->
                        </td>
                        <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
                        <!--| Start: Petugas Penanggung Jawab Modal |-->
                        <div id="modal-penanggungjawab<?php echo $new_idPeristiwa; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header no-padding no-border">
                                        <div class="table-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span class="white">&times;</span>
                                            </button>
                                            <strong>Penanggung Jawab/Ketua Regu TRC</strong>
                                        </div>
                                    </div>
                                    <form action="" id="form-penanggungjawab" method="post" enctype="multipart/form-data">
                                        <?php
                                        //$id_peristiwa = $data->id_peristiwa;

                                        $get_idUser = $TrcHasilObservasi->tampil_peristiwa($data->id_peristiwa);
                                        $data_idUser = $get_idUser->fetchObject();
                                        $id_user = $data_idUser->id_user;

                                        $tampil_usr = $TrcHasilObservasi->tampil_user_peristiwa($id_user);
                                        $data_usr = $tampil_usr->fetchObject();
                                        ?>
                                        <div class="modal-body" id="mb-penanggungjawab">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 center">
                                                <span class="profile-picture">
                                                    <img alt="Foto Petugas Penanggung Jawab"
                                                         src="../../assets/images/avatars/<?php echo $data_usr->foto_akun; ?>" width="300px" height="300px" id="pic" />
                                                </span>

                                                    <div class="space space-4"></div>

                                                    <div class="width-50 label label-success label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <span class="white" id="nama_user"><?php echo $data_usr->nama_lengkap; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="space space-2"></div>

                                                    <div class="width-35 label label-sm label-primary arrowed arrowed-right">
                                                        <div class="inline position-relative">
                                                            <span class="white" id="jabatan"><?php echo $data_usr->jabatan; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--| End: Petugas Penanggung Jawab Modal |-->
                    </tr>
                <?php } ?>
                <!--| End: Get list data: tb_peristiwa |-->
                </tbody>
            </table>
        </div>
    </div>
    <!--| End: Tabel Peristiwa Bencana + Hasil Observasi Lapangan |-->
    <!--| Start: Update Data Modal |-->
    <div id="update" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding no-border">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        <strong>Input Data Observasi Lapangan</strong>
                    </div>
                </div>
                <form action="" id="form-update" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="modal_update">
                        <div class="row">
                            <div class="alert">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Data Peristiwa Bencana</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <table>
                                                <tr>
                                                    <td class="col-lg-3 col-md-3" valign="top">Nama Inisial</td>
                                                    <td valign="top">:</td>
                                                    <td id="nama_inisial" class="col-lg-9 col-md-9" valign="top"></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-3 col-md-3" valign="top">Jenis Bencana</td>
                                                    <td valign="top">:</td>
                                                    <td id="jenis_bencana" class="col-lg-9 col-md-9" valign="top"></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-3 col-md-3" valign="top">Cakupan Lokasi</td>
                                                    <td valign="top">:</td>
                                                    <td id="cakupan_lokasi" class="col-lg-9 col-md-9" valign="top"></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-3 col-md-3" valign="top">Waktu Peristiwa</td>
                                                    <td valign="top">:</td>
                                                    <td id="waktu_peristiwa" class="col-lg-9 col-md-9" valign="top"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='alert alert-info'>
                            <p>
                                <strong># Hasil Observasi Tahap 1</strong>
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <table>
                                    <tr>
                                        <input type="hidden" id="id_peristiwa" name="id_peristiwa" />
                                        <input type="hidden" id="laporan_tahap1" name="laporan_tahap1" />
                                        <input type="hidden" id="laporan_tahap2" name="laporan_tahap2" />
                                        <td class="col-lg-4 col-md-4" valign="bottom">
                                            <label for="korban_terdampak">Korban Terdampak:</label>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-4 col-md-4" valign="bottom">
                                            <label for="korban_mengungsi">korban Mengungsi:</label>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-3 col-md-3" valign="bottom">
                                            <label for="pasca_bencana">Pasca Bencana:</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-4 col-md-4" valign="top">
                                            <input type="number" name="korban_terdampak" id="korban_terdampak" class="col-xs-12">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-4 col-md-4" valign="top">
                                            <input type="number" name="korban_mengungsi" id="korban_mengungsi" class="col-xs-12">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-3 col-md-3" valign="top">
                                            <select class="col-xs-12" name="pasca_bencana" id="pasca_bencana">
                                                <option value="<?php ?>"><?php ?></option>
                                                <option value="Normal">Normal</option>
                                                <option value="Waspada">Waspada</option>
                                                <option value="Siaga">Siaga</option>
                                                <option value="Awas">Awas</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-4 col-md-4" valign="bottom">
                                            <label for="korban_luka">Korban Luka:</label>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-4 col-md-4" valign="bottom">
                                            <label for="korban_meninggal">Korban Meninggal:</label>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-3 col-md-3" valign="bottom">
                                            <label for="korban_hilanag">Korban Hilang:</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-4 col-md-4" valign="top">
                                            <input type="number" name="korban_luka" id="korban_luka" class="col-xs-12">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-4 col-md-4" valign="top">
                                            <input type="number" name="korban_meninggal" id="korban_meninggal" class="col-xs-12">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td class="col-lg-3 col-md-3" valign="top">
                                            <input type="number" name="korban_hilang" id="korban_hilang" class="col-xs-12">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="space-10"></div>

                        <div class='alert alert-info'>
                            <p>
                                <strong># Hasil Observasi Tahap 2 | Rincian Jumlah Korban Terdampak</strong>
                            </p>
                        </div>

                        <div class="row">
                            <table>
                                <tr>
                                    <td>
                                        <div class="col-xs-12 col-sm-6" style="background-color: white">
                                            <div class="profile-user-info profile-user-info-striped" style="background-color: white">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"></div>
                                                    <div class="profile-info-name">
                                                        <strong>Laki-laki</strong>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(<= 5 tahun)" data-placement="bottom">Balita</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="hidden" id="jml_pl" name="jml_pl" />
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pl_balita" id="pl_balita">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(6 s.d. 11 tahun)" data-placement="bottom">Anak-anak</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pl_anak_anak" id="pl_anak_anak">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(12 s.d. 25 tahun)" data-placement="bottom">Remaja</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pl_remaja" id="pl_remaja">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(26 s.d. 45 tahun)" data-placement="bottom">Dewasa</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pl_dewasa" id="pl_dewasa">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(>= 46 tahun)" data-placement="bottom">Lansia</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pl_lansia" id="pl_lansia">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--| End: Korban Bencana Laki-laki |-->

                                        <!--| Start: Korban Bencana Perempuan |-->
                                        <div class="col-xs-12 col-sm-6" style="background-color: white">
                                            <div class="profile-user-info profile-user-info-striped" style="background-color: white">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"></div>
                                                    <div class="profile-info-name">
                                                        <strong>Perempuan</strong>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(<= 5 tahun)" data-placement="bottom">Balita</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="hidden" id="jml_pp" name="jml_pp" />
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pp_balita" id="pp_balita">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(6 s.d. 11 tahun)" data-placement="bottom">Anak-anak</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pp_anak_anak" id="pp_anak_anak">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(12 s.d. 25 tahun)" data-placement="bottom">Remaja</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pp_remaja" id="pp_remaja">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(26 s.d. 45 tahun)" data-placement="bottom">Dewasa</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pp_dewasa" id="pp_dewasa">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name">
                                                        <span data-rel="tooltip" title="(>= 46 tahun)" data-placement="bottom">Lansia</span>
                                                    </div>
                                                    <div class="profile-info-value">
                                                        <span>
                                                            <input type="number" class="col-xs-11 col-sm-11" name="pp_lansia" id="pp_lansia">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--| End: Jumlah Korban Bencana: Perempuan |-->
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer no-margin-top">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="ace-icon fa fa-times"></i>
                            Batal
                        </button>

                        <button type="submit" name="btn_update" id="btn_update" class="btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!--| Start: Update Data |-->
        <script src="../../assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
            $(document).on("click", "#update-data", function () {
                // Variabel untuk kebutuhan Data Peristiwa Bencana
                var j_id_peristiwa = $(this).data('id_peristiwa');
                var j_id_user = $(this).data('id_user');
                var j_jenis_bencana = $(this).data('jenis_bencana');
                var j_nama_inisial = $(this).data('nama_inisial');
                var j_cakupan_lokasi = $(this).data('cakupan_lokasi');
                var j_tanggal_peristiwa = $(this).data('tanggal_peristiwa');
                var j_jam_peristiwa = $(this).data('jam_peristiwa');

                // Variabel untuk kebutuhan Observasi tahap 1
                var j_korban_terdampak = $(this).data('korban_terdampak');
                var j_korban_mengungsi = $(this).data('korban_mengungsi');
                var j_korban_luka = $(this).data('korban_luka');
                var j_korban_hilang = $(this).data('korban_hilang');
                var j_korban_meninggal = $(this).data('korban_meninggal');
                var j_pasca_bencana = $(this).data('pasca_bencana');
                var j_laporan_tahap1 = $(this).data('laporan_tahap1');

                // Variabel untuk kebutuhan Observasi tahap 2
                var j_pl_balita = $(this).data('pl_balita');
                var j_pl_anak_anak = $(this).data('pl_anak_anak');
                var j_pl_remaja = $(this).data('pl_remaja');
                var j_pl_dewasa = $(this).data('pl_dewasa');
                var j_pl_lansia = $(this).data('pl_lansia');
                var j_jml_pl = j_pl_balita + j_pl_anak_anak + j_pl_remaja + j_pl_dewasa + j_pl_lansia;

                var j_pp_balita = $(this).data('pp_balita');
                var j_pp_anak_anak = $(this).data('pp_anak_anak');
                var j_pp_remaja = $(this).data('pp_remaja');
                var j_pp_dewasa = $(this).data('pp_dewasa');
                var j_pp_lansia = $(this).data('pp_lansia');
                var j_jml_pp = j_pp_balita + j_pp_anak_anak + j_pp_remaja + j_pp_dewasa + j_pp_lansia;
                var j_laporan_tahap2 = $(this).data('laporan_tahap2');

                $("#modal_update #id_peristiwa").val(j_id_peristiwa);
                $("#modal_update #id_user").val(j_id_user);

                // Menampilkan Data Peristiwa Bencana
                document.getElementById('nama_inisial').textContent = j_nama_inisial;
                document.getElementById('jenis_bencana').textContent = j_jenis_bencana;
                document.getElementById('cakupan_lokasi').textContent = j_cakupan_lokasi;
                document.getElementById('waktu_peristiwa').textContent = j_tanggal_peristiwa + ', ' + j_jam_peristiwa + ' WIB';

                // Menampilkan Data Observasi Tahap 1
                $("#update #korban_terdampak").val(j_korban_terdampak);
                $("#update #korban_mengungsi").val(j_korban_mengungsi);
                $("#update #korban_luka").val(j_korban_luka);
                $("#update #korban_hilang").val(j_korban_hilang);
                $("#update #korban_meninggal").val(j_korban_meninggal);
                $("#update #pasca_bencana").val(j_pasca_bencana);
                $("#update #laporan_tahap1").val(j_laporan_tahap1);

                // Menampilkan Data Observasi Tahap 2
                $("#update #pl_balita").val(j_pl_balita);
                $("#update #pl_anak_anak").val(j_pl_anak_anak);
                $("#update #pl_remaja").val(j_pl_remaja);
                $("#update #pl_dewasa").val(j_pl_dewasa);
                $("#update #pl_lansia").val(j_pl_lansia);
                $("#update #jml_pl").val(j_jml_pl);

                $("#update #pp_balita").val(j_pp_balita);
                $("#update #pp_anak_anak").val(j_pp_anak_anak);
                $("#update #pp_remaja").val(j_pp_remaja);
                $("#update #pp_dewasa").val(j_pp_dewasa);
                $("#update #pp_lansia").val(j_pp_lansia);
                $("#update #jml_pp").val(j_jml_pp);
                $("#update #laporan_tahap2").val(j_laporan_tahap2);

                // Key untuk pemberian izin edit
                var j_izin = $(this).data('izin');

                var jx_korban_terdampak = $('#korban_terdampak').get(0);
                var jx_korban_mengungsi = $('#korban_mengungsi').get(0);
                var jx_korban_luka = $('#korban_luka').get(0);
                var jx_korban_hilang = $('#korban_hilang').get(0);
                var jx_korban_meninggal = $('#korban_meninggal').get(0);
                var jx_pasca_bencana = $('#pasca_bencana').get(0);
                var jx_pl_balita = $('#pl_balita').get(0);
                var jx_pl_anak_anak = $('#pl_anak_anak').get(0);
                var jx_pl_remaja = $('#pl_remaja').get(0);
                var jx_pl_dewasa = $('#pl_dewasa').get(0);
                var jx_pl_lansia = $('#pl_lansia').get(0);
                var jx_pp_balita = $('#pp_balita').get(0);
                var jx_pp_anak_anak = $('#pp_anak_anak').get(0);
                var jx_pp_remaja = $('#pp_remaja').get(0);
                var jx_pp_dewasa = $('#pp_dewasa').get(0);
                var jx_pp_lansia = $('#pp_lansia').get(0);
                var jx_btn_update = $('#btn_update').get(0);

                if (j_izin == "tolak") {
                    jx_korban_terdampak.setAttribute('disabled', 'disabled');
                    jx_korban_mengungsi.setAttribute('disabled', 'disabled');
                    jx_korban_luka.setAttribute('disabled', 'disabled');
                    jx_korban_hilang.setAttribute('disabled', 'disabled');
                    jx_korban_meninggal.setAttribute('disabled', 'disabled');
                    jx_pasca_bencana.setAttribute('disabled', 'disabled');
                    jx_pl_balita.setAttribute('disabled', 'disabled');
                    jx_pl_anak_anak.setAttribute('disabled', 'disabled');
                    jx_pl_remaja.setAttribute('disabled', 'disabled');
                    jx_pl_dewasa.setAttribute('disabled', 'disabled');
                    jx_pl_lansia.setAttribute('disabled', 'disabled');
                    jx_pp_balita.setAttribute('disabled', 'disabled');
                    jx_pp_anak_anak.setAttribute('disabled', 'disabled');
                    jx_pp_remaja.setAttribute('disabled', 'disabled');
                    jx_pp_dewasa.setAttribute('disabled', 'disabled');
                    jx_pp_lansia.setAttribute('disabled', 'disabled');
                    jx_btn_update.setAttribute('disabled', 'disabled');
                }
                else if (j_izin == "berwenang") {
                    jx_korban_terdampak.removeAttribute('disabled');
                    jx_korban_mengungsi.removeAttribute('disabled');
                    jx_korban_luka.removeAttribute('disabled');
                    jx_korban_hilang.removeAttribute('disabled');
                    jx_korban_meninggal.removeAttribute('disabled');
                    jx_pasca_bencana.removeAttribute('disabled');
                    jx_pl_balita.removeAttribute('disabled');
                    jx_pl_anak_anak.removeAttribute('disabled');
                    jx_pl_remaja.removeAttribute('disabled');
                    jx_pl_dewasa.removeAttribute('disabled');
                    jx_pl_lansia.removeAttribute('disabled');
                    jx_pp_balita.removeAttribute('disabled');
                    jx_pp_anak_anak.removeAttribute('disabled');
                    jx_pp_remaja.removeAttribute('disabled');
                    jx_pp_dewasa.removeAttribute('disabled');
                    jx_pp_lansia.removeAttribute('disabled');
                    jx_btn_update.removeAttribute('disabled');
                }
            });

            $(document).ready(function (e) {
                $("#form-update").on("submit", (function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: '../../models/ketua/analisis_laporan.php',
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
    </div>
    <!--| End: Update Data |-->
    <!--| End: Update Data Modal |-->
    <!--| End: Content Area |-->
</div>
<!--[if !IE]> -->
<script src="../../assets/js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='../../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<!-- page specific plugin scripts -->
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/dataTables.buttons.min.js"></script>
<script src="../../assets/js/buttons.flash.min.js"></script>
<script src="../../assets/js/buttons.html5.min.js"></script>
<script src="../../assets/js/buttons.print.min.js"></script>
<script src="../../assets/js/buttons.colVis.min.js"></script>
<script src="../../assets/js/dataTables.select.min.js"></script>

<!-- inline scripts related to this pages -->

<?php } ?>

