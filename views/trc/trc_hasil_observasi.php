<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:54
 */

$TrcHasilObservasi = new TrcHasilObservasi($connection);

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
        Hasil pencarian untuk data peristiwa bencana
    </div>

    <!--| Start: Tabel Peristiwa Bencana + Hasil Observasi Lapangan |-->
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th class="center">No</th>
            <th>Nama Inisial</th>
            <th>Jenis bencana</th>
            <th class="hidden-480">Cakupan Lokasi</th>
            <th>Waktu Peristiwa</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <!--| Start: Get List Data: tb_peristiwa |-->
        <?php
        $no = 1;
        $tampil_observasi = $TrcHasilObservasi->tampil_observasi();
        while ($data = $tampil_observasi->fetchObject()) {
        ?>
        <tr>
            <td class="center"><?php echo $no++; ?></td>
            <td><?php echo $data->nama_inisial; ?></td>
            <td><?php echo $data->jenis_bencana; ?></td>
            <td class="hidden-480"><?php echo $data->cakupan_lokasi; ?></td>
            <td>
                <?php echo $data->tanggal_peristiwa; ?>&nbsp;
                <?php echo $data->jam_peristiwa; ?>
            </td>
            <td class="hidden-480">
                <div class="action-buttons">
                    <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                        <i class="ace-icon fa fa-angle-double-down"></i>
                        <span class="sr-only">Details</span>
                    </a>
                </div>
            </td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
        </tr>
        <!--| End: Get List Data: tb_peristiwa |-->

        <!--| Start: Detail Data: Hasil Observasi |-->
        <tr class="detail-row col-xs-offset-2 col-sm-offset-2">
            <td colspan="7">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <!--| Start: Hasil Observasi |-->
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="table-detail" style="background-color: white">
                                <div class="row" style="background-color: rgba(255,212,63,0.38); padding-left: 10px">
                                    <strong># Hasil Observasi</strong>
                                </div>

                                <div class="row" style="background-color: white">&nbsp;</div>

                                <!--| Start: Hasil Observasi Tahap 1 |-->
                                <div class="row" style="background-color: white">
                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Korban Terdampak</label>
                                        </div>
                                        <div class=" col-sm-6">
                                            <input type="number" class="col-sm-12" name="korban_terdampak" id="korban_terdampak" value="<?php echo $data->korban_terdampak; ?>" disabled />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Korban Mengungsi</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="col-sm-12" name="korban_mengungsi" id="korban_mengungsi" value="<?php echo $data->korban_mengungsi; ?>" disabled />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Korban Luka-luka</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="col-sm-12" name="korban_luka" id="korban_luka" value="<?php echo $data->korban_luka; ?>" disabled />
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="background-color: white">&nbsp;</div>

                                <div class="row" style="background-color: white">
                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Korban Meninggal</label>
                                        </div>
                                        <div class=" col-sm-6">
                                            <input type="number" class="col-sm-12" name="korban_meninggal" id="korban_meninggal" value="<?php echo $data->korban_meninggal; ?>" disabled />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Korban Hilang</label>
                                        </div>
                                        <div class=" col-sm-6">
                                            <input type="number" class="col-sm-12" name="korban_hilang" id="korban_hilang" value="<?php echo $data->korban_hilang; ?>" disabled />
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="col-sm-6">
                                            <label class="control-label no-padding-right" for="korban_terdampak">Kondisi Pasca Bencana</label>
                                        </div>
                                        <div class=" col-sm-6">
                                            <select class="form-control col-sm-12" name="pasca_bencana" id="pasca_bencana" disabled>
                                                <option value="<?php echo $data->pasca_bencana; ?>"><?php echo $data->pasca_bencana; ?></option>
                                                <option value=""></option>
                                                <option value="Normal">Normal</option>
                                                <option value="Waspada">Waspada</option>
                                                <option value="Siaga">Siaga</option>
                                                <option value="Awas">Awas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--| End: Hasil Observasi Tahap 1 |-->

                                <div class="row" style="background-color: white">&nbsp;</div>

                                <!--| Start: Hasil Observasi Tahap 2 |-->
                                <div class="row" style="background-color: white">

                                    <!--| Start: Korban Bencana Laki-laki |-->
                                    <div class="col-xs-12 col-sm-6" style="background-color: white">
                                        <div class="profile-user-info profile-user-info-striped" style="background-color: white">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"></div>
                                                <div class="profile-info-name">
                                                    <strong>Jumlah Korban Terdampak: Laki-laki</strong>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(<= 5 tahun)" data-placement="bottom">Balita</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pl_balita" id="pl_balita" value="<?php echo $data->pl_balita; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(6 s.d. 11 tahun)" data-placement="bottom">Anak-anak</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pl_anak_anak" id="pl_anak_anak" value="<?php echo $data->pl_anak_anak; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(12 s.d. 25 tahun)" data-placement="bottom">Remaja</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pl_remaja" id="pl_remaja" value="<?php echo $data->pl_remaja; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(26 s.d. 45 tahun)" data-placement="bottom">Dewasa</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pl_dewasa" id="pl_dewasa" value="<?php echo $data->pl_dewasa; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(>= 46 tahun)" data-placement="bottom">Lansia</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pl_lansia" id="pl_lansia" value="<?php echo $data->pl_lansia; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span><strong>Total</strong></span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pengungsi_laki_laki" id="pengungsi_laki_laki" value="<?php echo $data->pengungsi_laki_laki; ?>" disabled />
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
                                                    <strong>Jumlah Korban Terdampak: Perempuan</strong>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(<= 5 tahun)" data-placement="bottom">Balita</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pp_balita" id="pp_balita" value="<?php echo $data->pp_balita; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(6 s.d. 11 tahun)" data-placement="bottom">Anak-anak</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pp_anak_anak" id="pp_anak_anak" value="<?php echo $data->pp_anak_anak; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(12 s.d. 25 tahun)" data-placement="bottom">Remaja</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pp_remaja" id="pp_remaja" value="<?php echo $data->pp_remaja; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(26 s.d. 45 tahun)" data-placement="bottom">Dewasa</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pp_dewasa" id="pp_dewasa" value="<?php echo $data->pp_dewasa; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span data-rel="tooltip" title="(>= 46 tahun)" data-placement="bottom">Lansia</span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pp_lansia" id="pp_lansia" value="<?php echo $data->pp_lansia; ?>" disabled />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">
                                                    <span><strong>Total</strong></span>
                                                </div>
                                                <div class="profile-info-value">
                                                    <span>
                                                        <input type="number" class="col-xs-11 col-sm-11" name="pengungsi_perempuan" id="pengungsi_perempuan" value="<?php echo $data->pengungsi_perempuan; ?>" disabled />
                                                        <input type="hidden" name="laporan_tahap1" id="laporan_tahap1" value="<?php echo $data->laporan_tahap1; ?>" />
                                                        <input type="hidden" name="laporan_tahap2" id="laporan_tahap2" value="<?php echo $data->laporan_tahap2; ?>" />
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--| End: Jumlah Korban Bencana: Perempuan |-->

                                    <div class="row" style="background-color: white">&nbsp;</div>

                                    <div class="col-xs-12 col-sm-6 align-right" style="background-color: white"></div>
                                    <div class="col-xs-12 col-sm-6 align-right" style="background-color: white">
                                        <button type="submit" name="simpan" id="simpan" class="btn btn-sm btn-primary" disabled>
                                            <i class="ace-icon fa fa-floppy-o"></i>
                                            Simpan/Update
                                        </button>

                                        &nbsp;&nbsp;&nbsp;

                                        <input class="ace" type="checkbox" id="disable-observasi" />
                                        <span class="lbl"> Mode Edit Data</span>

                                        <input type="hidden" name="id_observasi" id="id_observasi" value="<?php echo $data->id_observasi; ?>" />

                                        <!--| Start: Proses Update Data tb_observasi_lapangan |-->
                                        <?php
                                        if (isset($_POST['simpan'])) {
                                            $id_observasi           = $_POST['id_observasi'];
                                            $korban_terdampak       = $_POST['korban_terdampak'];
                                            $korban_mengungsi       = $_POST['korban_mengungsi'];
                                            $korban_luka            = $_POST['korban_luka'];
                                            $korban_meninggal       = $_POST['korban_meninggal'];
                                            $korban_hilang          = $_POST['korban_hilang'];
                                            $pasca_bencana          = $_POST['pasca_bencana'];
                                            $pengungsi_laki_laki    = $_POST['pengungsi_laki_laki'];
                                            $pl_balita              = $_POST['pl_balita'];
                                            $pl_anak_anak           = $_POST['pl_anak_anak'];
                                            $pl_remaja              = $_POST['pl_remaja'];
                                            $pl_dewasa              = $_POST['pl_dewasa'];
                                            $pl_lansia              = $_POST['pl_lansia'];
                                            $pengungsi_perempuan    = $_POST['pengungsi_perempuan'];
                                            $pp_balita              = $_POST['pp_balita'];
                                            $pp_anak_anak           = $_POST['pp_anak_anak'];
                                            $pp_remaja              = $_POST['pp_remaja'];
                                            $pp_dewasa              = $_POST['pp_dewasa'];
                                            $pp_lansia              = $_POST['pp_lansia'];
                                            $laporan_tahap1         = $_POST['laporan_tahap1'];
                                            $laporan_tahap2         = $_POST['laporan_tahap2'];

                                            $TrcHasilObservasi->update_observasi($id_observasi, $korban_terdampak, $korban_mengungsi,
                                                $korban_luka, $korban_meninggal, $korban_hilang, $pasca_bencana, $pengungsi_laki_laki,
                                                $pl_balita, $pl_anak_anak, $pl_remaja, $pl_dewasa, $pl_lansia, $pengungsi_perempuan,
                                                $pp_balita, $pp_anak_anak, $pp_remaja, $pp_dewasa, $pp_lansia);
                                            header("location: trc_index.php?pages=hasil_observasi");
                                        }
                                        ?>
                                        <!--| End: Proses Update Data tb_observasi_lapangan |-->
                                    </div>
                                </div>
                                <!--| End: Hasil Observasi Tahap 2 |-->
                            </div>
                            </form>
                            <!--| End: Hasil Observasi |-->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
            <td style="visibility: hidden" class="no-border no-margin no-padding no-radius"></td>
        </tr>
        <!--| End: Detail Data: Hasil Observasi |-->

        <?php } ?>
        </tbody>
    </table>
    <!--| End: Tabel Peristiwa Bencana + Hasil Observasi Lapangan |-->
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
<script type="text/javascript">
    jQuery(function($) {
        $('#disable-observasi').on('click', function () {
            var inp_korban_terdampak = $('#korban_terdampak').get(0);
            var inp_korban_mengungsi = $('#korban_mengungsi').get(0);
            var inp_korban_luka = $('#korban_luka').get(0);
            var inp_korban_meninggal = $('#korban_meninggal').get(0);
            var inp_korban_hilang = $('#korban_hilang').get(0);
            var inp_pasca_bencana = $('#pasca_bencana').get(0);
            var inp_pl_balita = $('#pl_balita').get(0);
            var inp_pl_anak_anak = $('#pl_anak_anak').get(0);
            var inp_pl_remaja = $('#pl_remaja').get(0);
            var inp_pl_dewasa = $('#pl_dewasa').get(0);
            var inp_pl_lansia = $('#pl_lansia').get(0);
            var inp_pengungsi_laki_laki = $('#pengungsi_laki_laki').get(0);
            var inp_pp_balita = $('#pp_balita').get(0);
            var inp_pp_anak_anak = $('#pp_anak_anak').get(0);
            var inp_pp_remaja = $('#pp_remaja').get(0);
            var inp_pp_dewasa = $('#pp_dewasa').get(0);
            var inp_pp_lansia = $('#pp_lansia').get(0);
            var inp_pengungsi_perempuan = $('#pengungsi_perempuan').get(0);
            var inp_simpan = $('#simpan').get(0);

            if (inp_korban_terdampak.hasAttribute('disabled') &
                inp_korban_mengungsi.hasAttribute('disabled') &
                inp_korban_luka.hasAttribute('disabled') &
                inp_korban_meninggal.hasAttribute('disabled') &
                inp_korban_hilang.hasAttribute('disabled') &
                inp_pasca_bencana.hasAttribute('disabled') &
                inp_pl_balita.hasAttribute('disabled') &
                inp_pl_anak_anak.hasAttribute('disabled') &
                inp_pl_remaja.hasAttribute('disabled') &
                inp_pl_dewasa.hasAttribute('disabled') &
                inp_pl_lansia.hasAttribute('disabled') &
                inp_pengungsi_laki_laki.hasAttribute('disabled') &
                inp_pp_balita.hasAttribute('disabled') &
                inp_pp_anak_anak.hasAttribute('disabled') &
                inp_pp_remaja.hasAttribute('disabled') &
                inp_pp_dewasa.hasAttribute('disabled') &
                inp_pp_lansia.hasAttribute('disabled') &
                inp_pengungsi_perempuan.hasAttribute('disabled') &
                inp_simpan.hasAttribute('disabled'))
            {
                inp_korban_terdampak.removeAttribute('disabled');
                inp_korban_mengungsi.removeAttribute('disabled');
                inp_korban_luka.removeAttribute('disabled');
                inp_korban_meninggal.removeAttribute('disabled');
                inp_korban_hilang.removeAttribute('disabled');
                inp_pasca_bencana.removeAttribute('disabled');
                inp_pl_balita.removeAttribute('disabled');
                inp_pl_anak_anak.removeAttribute('disabled');
                inp_pl_remaja.removeAttribute('disabled');
                inp_pl_dewasa.removeAttribute('disabled');
                inp_pl_lansia.removeAttribute('disabled');
                inp_pengungsi_laki_laki.removeAttribute('disabled');
                inp_pp_balita.removeAttribute('disabled');
                inp_pp_anak_anak.removeAttribute('disabled');
                inp_pp_remaja.removeAttribute('disabled');
                inp_pp_dewasa.removeAttribute('disabled');
                inp_pp_lansia.removeAttribute('disabled');
                inp_pengungsi_perempuan.removeAttribute('disabled');
                inp_simpan.removeAttribute('disabled');
            } else {
                inp_korban_terdampak.setAttribute('disabled', 'disabled');
                inp_korban_mengungsi.setAttribute('disabled', 'disabled');
                inp_korban_luka.setAttribute('disabled', 'disabled');
                inp_korban_meninggal.setAttribute('disabled', 'disabled');
                inp_korban_hilang.setAttribute('disabled', 'disabled');
                inp_pasca_bencana.setAttribute('disabled', 'disabled');
                inp_pl_balita.setAttribute('disabled', 'disabled');
                inp_pl_anak_anak.setAttribute('disabled', 'disabled');
                inp_pl_remaja.setAttribute('disabled', 'disabled');
                inp_pl_dewasa.setAttribute('disabled', 'disabled');
                inp_pl_lansia.setAttribute('disabled', 'disabled');
                inp_pengungsi_laki_laki.setAttribute('disabled', 'disabled');
                inp_pp_balita.setAttribute('disabled', 'disabled');
                inp_pp_anak_anak.setAttribute('disabled', 'disabled');
                inp_pp_remaja.setAttribute('disabled', 'disabled');
                inp_pp_dewasa.setAttribute('disabled', 'disabled');
                inp_pp_lansia.setAttribute('disabled', 'disabled');
                inp_pengungsi_perempuan.setAttribute('disabled', 'disabled');
                inp_simpan.setAttribute('disabled', 'disabled');
            }
        });

        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});
    });
</script>

<?php } ?>

