-- CREATE TABLE tb_akun_line --
CREATE TABLE tb_akun_line (
	id_line VARCHAR (100) PRIMARY KEY,
	display_name VARCHAR (100) NOT NULL,
	url_foto VARCHAR (150)
);

-- CREATE TABLE tb_user --
CREATE TABLE tb_user (
	id_user VARCHAR (7) PRIMARY KEY,
	id_line VARCHAR (100),
	nama_lengkap VARCHAR (100) NOT NULL,
	jenis_kelamin VARCHAR (1) NOT NULL,
	jabatan VARCHAR (100) NOT NULL,
	username VARCHAR (30) NOT NULL,
	password VARCHAR (50) NOT NULL,
	hak_akses VARCHAR (5) NOT NULL,
	foto_akun VARCHAR (20)
);

-- CREATE TABLE tb_alternatif --
CREATE TABLE tb_alternatif (
	id_alternatif VARCHAR (7) PRIMARY KEY,
	nama_alternatif VARCHAR (8) NOT NULL
);

-- CREATE TABLE tb_analisis_prioritas --
CREATE TABLE tb_analisis_prioritas (
	id_analisis SERIAL PRIMARY KEY,
	id_peristiwa VARCHAR (12) NOT NULL,
	paket_pangan NUMERIC,
	paket_sandang NUMERIC,
	paket_kematian NUMERIC,
	paket_lainnya NUMERIC
);

-- CREATE TABLE tb_bobot --
CREATE TABLE tb_bobot (
	id_bobot VARCHAR (7) PRIMARY KEY,
	id_alternatif VARCHAR (7) NOT NULL,
	id_kriteria VARCHAR (7) NOT NULL,
	bobot INTEGER NOT NULL
);

-- CREATE TABLE tb_kebutuhan_logistik --
CREATE TABLE tb_kebutuhan_logistik (
	id_kebutuhan SERIAL PRIMARY KEY,
	id_peristiwa VARCHAR (12),
	beras DOUBLE PRECISION,
	telur DOUBLE PRECISION,
	mie_instan DOUBLE PRECISION,
	air_minum DOUBLE PRECISION,
	pakaian_balita DOUBLE PRECISION,
	pakaian_anak_l DOUBLE PRECISION,
	pakaian_anak_p DOUBLE PRECISION,
	pakaian_remaja_l DOUBLE PRECISION,
	pakaian_remaja_p DOUBLE PRECISION,
	pakaian_dewasa_l DOUBLE PRECISION,
	pakaian_dewasa_p DOUBLE PRECISION,
	selimut DOUBLE PRECISION,
	sleeping_bag DOUBLE PRECISION,
	matras DOUBLE PRECISION,
	sabun_mandi DOUBLE PRECISION,
	sabun_cuci DOUBLE PRECISION,
	paket_kesehatan DOUBLE PRECISION,
	popok_bayi DOUBLE PRECISION,
	susu_bayi DOUBLE PRECISION,
	selimut_bayi DOUBLE PRECISION,
	pembalut DOUBLE PRECISION,
	kantong_mayat DOUBLE PRECISION,
	kain_kafan DOUBLE PRECISION
);

-- CREATE TABLE tb_kriteria --
CREATE TABLE tb_kriteria (
	id_kriteria VARCHAR (7) PRIMARY KEY,
	nama_kriteria VARCHAR (50) NOT NULL
);

-- CREATE TABLE tb_observasi_lapangan --
CREATE TABLE tb_observasi_lapangan (
	id_observasi SERIAL PRIMARY KEY,
	id_peristiwa VARCHAR (12),
	korban_terdampak INTEGER,
	korban_mengungsi INTEGER,
	korban_luka INTEGER,
	korban_meninggal INTEGER,
	korban_hilang INTEGER,
	pasca_bencana VARCHAR (7),
	pengungsi_laki_laki INTEGER,
	pl_balita INTEGER,
	pl_anak_anak INTEGER,
	pl_remaja INTEGER,
	pl_dewasa INTEGER,
	pl_lansia INTEGER,
	pengungsi_perempuan INTEGER,
	pp_balita INTEGER,
	pp_anak_anak INTEGER,
	pp_remaja INTEGER,
	pp_dewasa INTEGER,
	pp_lansia INTEGER,
	laporan_tahap1 INTEGER,
	laporan_tahap2 INTEGER
);

-- CREATE TABLE tb_peristiwa --
CREATE TABLE tb_peristiwa (
	id_peristiwa VARCHAR (12) PRIMARY KEY,
	id_user VARCHAR (7) NOT NULL,
	jenis_bencana VARCHAR (50) NOT NULL,
	nama_inisial VARCHAR (100) NOT NULL,
	cakupan_lokasi TEXT,
	tanggal_peristiwa DATE,
	jam_peristiwa VARCHAR (5),
	status VARCHAR (6) 
);

-- CREATE TABLE tb_sub_kriteria --
CREATE TABLE tb_sub_kriteria (
	id_sub_kriteria VARCHAR (7) PRIMARY KEY,
	id_kriteria VARCHAR (7) NOT NULL,
	deskripsi VARCHAR (20) NOT NULL,
	utility INTEGER NOT NULL
);