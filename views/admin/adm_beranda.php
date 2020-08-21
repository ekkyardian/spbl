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
                                        Halaman Peristiwa Bencana dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=peristiwa_bencana">Peristiwa Bencana</a></strong>.
                                        Berikut adalah beberapa aksi yang dapat anda lakukan pada halaman ini:
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>Tambah Data</strong>. Klik tombol <img src="../../assets/images/gallery/tambah_data.png" height="30">
                                            untuk membuka form input data peristiwa bencana. Lengkapi form isian kemudian klik tombol <strong>Simpan</strong>.
                                        </li>
                                        <li>
                                            <strong>Edit/Update Data</strong>. Klik tombol <img src="../../assets/images/gallery/edit.png" height="20">
                                            pada baris data yang ingin diubah. Form edit akan terbuka, kemudian perbarui data dan klik tombol <strong>Update</strong>.
                                        </li>
                                        <li>
                                            <strong>Hapus Data</strong>. Klik tombol <img src="../../assets/images/gallery/hapus.png" height="20">
                                            pada baris data yang ingin dihapus. Pada pop-up konfirmasi pilih <strong>Ok</strong> untuk melanjutkan eksekusi.
                                        </li>
                                        <li>
                                            <strong>Lihat Penanggung Jawab</strong>. Penanggung jawab di sini mengacu pada user (TRC) yang ditunjuk sebagai penanggung
                                            jawab dalam menginput Laporan Observasi Lapangan. Untuk melihat user penanggung jawab setiap peristiwa bencana gunakan tombol
                                            <img src="../../assets/images/gallery/penanggung_jawab.png" height="20"> pada baris data yang diinginkan.
                                        </li>
                                        <li>
                                            <strong>Pencarian Data</strong>. Gunakan fitur <img src="../../assets/images/gallery/search.png" height="30"> untuk mencari
                                            data berdasarkan kriteria tertentu. Tuliskan <i>key word</i> data yang ingin Anda cari, selanjutnya data akan otomatis
                                            ditampilkan pada tabel.
                                        </li>
                                        <li>
                                            <strong>Table Tools</strong>. Beberapa <i>tools</i> lain yang tersedia pada tabel diantaranya <i>show/hide columns,
                                            copy to clipboard, export to CSV</i>, dan <i>print</i> dapat Anda akses melalui fitur
                                            <img src="../../assets/images/gallery/tools_tabel.png" height="30">
                                        </li>
                                    </ul>
                                    <div class="alert alert-info" style="text-align: justify;">
                                        <strong>Informasi!</strong> Pada halaman lain Anda akan menemukan tombol dengan bentuk visual yang sama. Pada dasarnya
                                        tombol-tombol tersebut juga memiliki fungsi dasar yang sama seperti yang sudah dipaparkan di atas.
                                    </div>
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
                                    Halaman Observasi Lapangan dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=observasi_lapangan">Observasi Lapangan</a></strong>.
                                    Halaman Observasi Lapangan merupakan halaman dimana user (TRC) menginput data hasil observasi lapangan. Halaman ini secara otomatis dibuat
                                    oleh sisten ketika Anda menambah data <strong>Peristiwa Bencana</strong> baru.
                                    <br /> <br />
                                    <div class='alert alert-warning'>
                                        <strong>Perhatian!</strong> Apbila Anda menghapus data <strong>Peristiwa Bencana</strong>, maka sistem secara otomatis akan menghapus
                                        form isian observasi lapangan untuk peristiwa bencana terkait beserta dengan data hasil observasinya (jika ada). Maka dari itu,
                                        mohon berhati-hati ketika akan menghapus data peristiwa bencana.
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
                                    Halaman Laporan Analisis dapat diakses melalui <strong>Navigasi Menu > <a href="?pages=laporan_analisis">Laporan Analisis</a></strong>.
                                    Gunakan tombol <img src="../../assets/images/gallery/print.png" height="20"> untuk mencetak/melihat laporan analisis,  dan gunakan tombol
                                    <img src="../../assets/images/gallery/pdf.png" height="20"> untuk mendownload laporan analisis dalam bentuk PDF. 
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
                                    Halaman Kelola akun dibagi menjadi tiga kategori, yaitu <strong>Semua akun</strong>, <strong>Akun Pribadi</strong>, dan
                                    <strong>Akun LINE</strong>. Berikut ini adalah fungsi dari masing-masing kategori tersebut:
                                    <ol>
                                        <li style="margin-top: 8px;">
                                            <strong>Semua Akun</strong>. Dapat diakses melalui <strong>Navigasi Menu > Kelola Akun >
                                            <a href="?pages?=kelola_akun">Semua Akun</a></strong>. Gunakan halaman ini untuk mengelola semua akun yang
                                            digunakan user lain untuk mengakses sistem. Anda dapat menambah, menghapus, atau menedit data melalui halaman ini.
                                        </li>
                                        <li style="margin-top: 3px;">
                                            <strong>Akun Pribadi</strong>. Dapat diakses melalui <strong>Navigasi Menu > Kelola Akun >
                                            <a href="?pages?=profile">Akun Pribadi</a></strong>. Melalui halaman ini Anda dapat mengubah informasi profile pribadi Anda.
                                        </li>
                                        <li style="margin-top: 3px;">
                                            <strong>Akun LINE</strong>. Dapat diakses melalui <strong>Navigasi Menu > Akun LINE >
                                            <a href="?pages?=akun_line">Akun LINE</a></strong>. Pada halaman ini Anda dapat mengelola semua akun LINE yang terintegrasi
                                            dengan sistem (menambah, menghapus, dan mengedit data). Akan tetapi perlu diperhatikan, sebelum Anda hendak menghapus akun
                                            LINE tertentu, Anda harus memastikan bahwa akun LINE tersebut <strong>tidak</strong> sedang digunakan/disambungkan dengan
                                            Akun TRC manapun. Untuk memutus akun LINE dengan akun TRC dapat dilakukan melalui halaman
                                            <strong><a href="?pages=kelola_akun">Semua Akun</a></strong>.

                                            <div class="alert alert-info" style="margin-top: 8px;">
                                                <strong>Informasi!</strong> Hanya akun dengan <strong>Hak Akses/Level TRC</strong> yang dapat disambungkan dengan akun LINE.
                                            </div>
                                        </li>
                                    </ol> 
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
                                    Anda dapat keluar dari sistem melalui navigasi <strong>Welcome > Logout</strong> (lokasi: pojok kanan atas). Atau Anda juga dapat menemukan
                                    tombol Logout pada halaman Profile/Akun Pribadi: <strong>Menu Navigasi > Kelola Akun > <a href="?pages=profile">Akun Pribadi</a></strong>.
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