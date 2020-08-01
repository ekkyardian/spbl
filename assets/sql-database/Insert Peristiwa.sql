INSERT INTO tb_peristiwa
    (id_peristiwa, id_user, jenis_bencana, nama_inisial, cakupan_lokasi, tanggal_peristiwa, jam_peristiwa, status)
VALUES
    ('001/PRS/2019', 'USR-001', 'Kebakaran', 'Kebakaran di Kelurahan Kedung Badak, Tanah Sareal, Kota Bogor', 'Kp. Kedung Badak RT 01/RW 01 Kel. Kedung Badak, Kec. Tanah Sareal, Kota Bogor', '2019/09/01', '20:00', 'Closed'),
    ('002/PRS/2019', 'USR-004', 'Angin Kencang', 'Angin Kencang di Kelurahan Cibadak, Tanah Sareal', 'RW 10 dan RW 13 Kel. Cibadak, Kec. Tanah Sareal, Kota Bogor', '2019/09/12', '17:00', 'Closed'),
    ('003/PRS/2019', 'USR-004', 'Kebakaran', 'Kebakaran di Kelurahan Ciluar, Bogor Utara', 'Perumahan Taman Kenari Blok A1 No. 1 Kel. Ciluar, Kec. Bogor Utara, Kota Bogor', '2019/09/30', '17:00', 'Closed'),
    ('004/PRS/2019', 'USR-001', 'Kekeringan', 'Kekeringan di Kelurahan Bojongkerta, Bogor Selatan', 'Kp. Bojong Kidul RT 03, 05 dan 06 /RW 02 Kel. Bojongkerta, Kec. Bogor Selatan, Kota Bogor', '2019/10/07', '14:00', 'Closed'),
    ('005/PRS/2019', 'USR-001', 'Lainnya', 'Bangunan Roboh Di Kelurahan Gunung Batu, Bogor Barat', 'Gg. Rante RT 04 RW 13 Kel. Gunung Batu, Kec. Bogor Barat, Kota Bogor', '2019/10/08', '16:30', 'Closed'),
    ('006/PRS/2019', 'USR-004', 'Banjir', 'Banjir Lintasan di Kelurahan Kebon Kelapa, Bogor Tengah', 'Gg. Kepatihan RT 05 RW 01 Kel. Kebon Kelapa, Kec. Bogor Tengah, Kota Bogor', '2019/10/26', '15:30', 'Closed'),
    ('007/PRS/2019', 'USR-001', 'Angin Kencang', 'Angin Kencang di Kelurahan Kebon Kelapa, Bogor Tengah', 'RT 01 RW 05 Kel. Kebon Kelapa, Kec. Bogor Tengah, Kota Bogor', '2019/10/26', '15:30', 'Closed'),
    ('008/PRS/2019', 'USR-001', 'Angin Kencang', 'Angin Kencang di Kelurahan Pasir Jaya, Bogor Barat', 'Kp. Muara RT 01 RW 09 Kel. Pasir Jaya, Kec. Bogor Barat, Kota Bogor', '2019/10/26', '15:40', 'Closed'),
    ('009/PRS/2019', 'USR-001', 'Kebakaran', 'Kebakaran di Kelurahan Kedung Jaya, Tanah Sareal', 'Jl. Komplek Pertokoan 24 Jl. K.H. Sholeh Iskandar No. 2 H RT 01/RW 05 Kel. Kedung Jaya, Kec. Tanah Sareal, Kota ', '2019/10/28', '03:00', 'Closed'),
    ('010/PRS/2019', 'USR-001', 'Angin Kencang', 'Angin Kencang di Kelurahan Cilendek, Bogor Barat', 'Jl. Cemplang Baru RT 01 RW 10 Kel. Cilendek, Kec. Bogor Barat, Kota Bogor', '2019/11/13', '15:30', 'Closed'),
    ('011/PRS/2019', 'USR-001', 'Angin Kencang', 'Angin Kencang di Kelurahan Harjasari, Bogor Selatan', 'RT 02/RW 05 Kel. Harjasari, Kec. Bogor Selatan, Kota Bogor', '2019/12/08', '15:10', 'Closed'),
    ('012/PRS/2019', 'USR-001', 'Tanah Longsong', 'Tanah Longsor di Kelurahan Balungbang Jaya, Bogor Barat', 'Kp. Babakan lio RT 03/RW 11, Kel. Balungbang Jaya, Kec. Bogor Barat', '2019/12/14', '17:00', 'Closed'),
    ('013/PRS/2019', 'USR-004', 'Banjir', 'Banjir di Kelurahan Kayumanis, Tanah Sareal', 'Jl. Pool Bina Marga RT 01/RW 01 Kel. Kayumanis, Kec. Tanah Sareal, Kota Bogor', '2019/12/14', '18:00', 'Closed'),
    ('014/PRS/2019', 'USR-001', 'Lainnya', 'Pohon Tumbang di Kelurahan Bondongan, Bogor Selatan', 'Kp. Warung Bandrek, Rt. 04 / Rw. 15, Kelurahan Bondongan, Kecamatan Bogor Selatan, Kota Bogor', '2019/12/17', '20:31', 'Closed'),
    ('015/PRS/2019', 'USR-001', 'Tanah Longsor', 'Tanah Longsor di Kelurahan Cimahpar, Bogor Utara', 'Kp. Blok Paku RT 02/RW 10 Kel. Cimahpar, Kec. Bogor Utara, Kota Bogor', '2019/12/20', '17:00', 'Open');

UPDATE tb_observasi_lapangan SET
    korban_terdampak='', korban_mengungsi='', korban_luka='', korban_meninggal='', korban_hilang='', pasca_bencana='', pengungsi_laki_laki='', pl_balita='', pl_anak_anak='', pl_remaja='', pl_dewasa='', pl_lansia='', pengungsi_perempuan='', pp_balita='', pp_anak_anak='', pp_remaja='', pp_dewasa='', pp_lansia=''
WHERE
    id_peristiwa='';


UPDATE tb_observasi_lapangan SET
    korban_terdampak='74', korban_mengungsi='33', korban_luka='3', korban_meninggal='0', korban_hilang='0', pasca_bencana='Awas', pengungsi_laki_laki='31', pl_balita='3', pl_anak_anak='7', pl_remaja='6', pl_dewasa='11', pl_lansia='4', pengungsi_perempuan='43', pp_balita='5', pp_anak_anak='14', pp_remaja='9', pp_dewasa='8', pp_lansia='7'
WHERE
    id_peristiwa='007/PRS/2019';