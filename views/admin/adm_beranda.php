<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 05/04/2020
 * Time: 16:52
 */
?>

<body class="no-skin">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">

    <!--| Start: URL Navigasi (Breadcrumb) |-->
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-bookmark home-icon"></i>
            <a href="?pages=beranda">Admin</a>
        </li>
        <li class="active">Beranda</li>
    </ul>
    <!--| End: URL Navigasi (Breadcrumb) |-->

    <!--| Start: Search Navigasi |-->
    <div class="nav-search" id="nav-search"></div>
    <!--| End: Search Navigasi |-->

</div>
<div class="page-content">

    <!--| Start: Content Area |-->
    <div class="row">
        <!-- Wewenang Admin -->
        <div class="col-xs-12 col-md-6 col-lg-6">
            <h3 class="header smaller lighter blue">Tugas dan Wewenang <strong>Admin</strong></h3>

            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main padding-20" style="line-height: 25px">
                        <!-- Content here -->
                        <table>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengelola seluruh peristiwa bencana yang terjadi, meliputi proses input, edit, dan hapus peristiwa</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Mengelola seluruh akun yang digunakan untuk mengakses sistem, termasuk didalamnya akun LINE untuk petugas TRC</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Melihat, mencetak, dan mengunduh laporan analisis suatu peristiwa bencana</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Membuat dan menghapus form isian observasi bencana untuk petugas TRC</td>
                            </tr>
                            <tr>
                                <td valign="top"><i class="ace-icon fa fa-check bigger-110 green"></i></td>
                                <td>&nbsp;</td>
                                <td>Memberikan/mencabut akses/wewenang input hasil observasi lapangan kepada user TRC yang dikehendaki</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Petunjuk Penggunaan -->
        <div class="col-lg-6 col-md-6">
            <h3 class="header smaller lighter blue">Petunjuk Penggunaan</h3>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="accordion" class="accordion-style1 panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Peristiwa Bencana
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse in" id="collapseOne">
                                <div class="panel-body">
                                    <p>
                                        Halaman Peristiwa Bencana dapat diakses melalui <strong>Navigasi Menu > Peristiwa Bencana</strong>. Berikut adalah beberapa aksi yang dapat anda lakukan pada halaman ini:
                                    </p>
                                    <ul>
                                        <li><strong>Tambah Data</strong>. Klik tombol <img src="../../assets/images/gallery/tambah_data.png" height="30"> untuk membuka form input data peristiwa bencana. Lengkapi form isian kemudian klik tombol <strong>Simpan</strong>.</li>
                                        <li><strong>Edit/Update Data</strong>. Klik tombol <img src="../../assets/images/gallery/edit.png" height="20"> pada baris data yang ingin diubah. Form edit akan terbuka, kemudian perbarui data dan klik tombol <strong>Update</strong>.</li>
                                        <li><strong>Hapus Data</strong>. Klik tombol <img src="../../assets/images/gallery/hapus.png" height="20"> pada baris data yang ingin dihapus. Pada pop-up konfirmasi pilih <strong>Ok</strong> untuk melanjutkan eksekusi.</li>
                                        <li><strong>Lihat Penanggung Jawab</strong>. Penanggung jawab di sini mengacu pada user (TRC) yang ditunjuk sebagai penanggung jawab dalam menginput Laporan Observasi Lapangan. Untuk melihat user penanggung jawab setiap peristiwa bencana gunakan tombol <img src="../../assets/images/gallery/penanggung_jawab.png" height="20"> pada baris data yang diingin.</li>
                                        <li><strong>Pencarian Data</strong>. Gunakan fitur <img src="../../assets/images/gallery/search.png" height="30"> untuk mencari data berdasarkan kriteria tertentu. Tuliskan <i>key word</i> data yang ingin Anda cari, selanjutnya data akan otomatis ditampilkan pada tabel.</li>
                                        <li><strong>Table Tools</strong>. Beberapa <i>tools</i> lain yang tersedia pada tabel diantaranya <i>show/hide columns, copy to clipboard, export to CSV</i>, dan <i>print</i> dapat Anda akses melalui fitur <img src="../../assets/images/gallery/tools_tabel.png" height="30">.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Observasi Lapangan
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse" id="collapseTwo">
                                <div class="panel-body">
                                    Halaman Observasi Lapangan merupakan halaman dimana user (TRC) menginput data hasil observasi lapangan. Halaman ini secara otomatis dibuat oleh sisten ketika Anda menambah data <strong>Peristiwa Bencana</strong> baru.
                                    <br /> <br />
                                    <div class='alert alert-warning'>
                                        <strong>Perhatian!</strong> Apbila Anda menghapus data <strong>Peristiwa Bencana</strong>, maka sistem secara otomatis akan menghapus form isian observasi lapangan untuk peristiwa bencana terkait beserta dengan data hasil observasinya (jika ada).
                                        Maka dari itu, mohon berhati-hati ketika akan menghapus data peristiwa bencana.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Laporan Analisis
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse" id="collapseThree">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEmpat">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Kelola Akun
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse" id="collapseEmpat">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseLima">
                                        <i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                        &nbsp;Keluar dari Sistem (Logout)
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse" id="collapseLima">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <!--| End: Content Area |-->

</div>
</body>