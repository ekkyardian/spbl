----------| tambahPeristiwa: tb_peristiwa |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_tambahPeristiwa()
	RETURNS trigger AS
$BODY$
BEGIN
	INSERT INTO tb_observasi_lapangan
		(id_peristiwa, korban_terdampak, korban_mengungsi, korban_luka, korban_meninggal, korban_hilang, pasca_bencana,
		pengungsi_laki_laki, pl_balita, pl_anak_anak, pl_remaja, pl_dewasa, pl_lansia, pengungsi_perempuan, pp_balita,
		pp_anak_anak, pp_remaja, pp_dewasa, pp_lansia, laporan_tahap1, laporan_tahap2)
	VALUES
		(NEW.id_peristiwa, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

	INSERT INTO tb_analisis_prioritas
	  (id_peristiwa, paket_pangan, paket_sandang, paket_kematian, paket_lainnya)
	VALUES
	  (NEW.id_peristiwa, '0', '0', '0', '0');

	INSERT INTO tb_kebutuhan_logistik
    (id_peristiwa, beras, telur, mie_instan, air_minum, pakaian_balita, pakaian_anak_l, pakaian_anak_p, pakaian_remaja_l,
    pakaian_remaja_p, pakaian_dewasa_l, pakaian_dewasa_p, selimut, sleeping_bag, matras, sabun_mandi, sabun_cuci,
    paket_kesehatan, popok_bayi, susu_bayi, selimut_bayi, pembalut, kantong_mayat, kain_kafan)
	VALUES
	  (NEW.id_peristiwa, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
	  '0', '0', '0', '0');

	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_tambahPeristiwa
	AFTER INSERT
	ON tb_peristiwa
	FOR EACH ROW
	EXECUTE PROCEDURE function_tambahPeristiwa();



----------| hapusPeristiwa: tb_peristiwa |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_hapusPeristiwa()
	RETURNS trigger AS
$BODY$
BEGIN
	DELETE FROM tb_observasi_lapangan
		WHERE id_peristiwa = OLD.id_peristiwa;
		
	DELETE FROM tb_analisis_prioritas
		WHERE id_peristiwa = OLD.id_peristiwa;
	
	DELETE FROM tb_kebutuhan_logistik
		WHERE id_peristiwa = OLD.id_peristiwa;
	RETURN OLD;
END;
$BODY$
LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_hapusPeristiwa
	BEFORE DELETE
	ON tb_peristiwa
	FOR EACH ROW
	EXECUTE PROCEDURE function_hapusPeristiwa();



----------| obsLapUpdate: tb_observasi_lapangan |----------

-------------------- CREATE FUNCTION --------------------
CREATE OR REPLACE FUNCTION function_obsLapUpdate()
	RETURNS trigger AS
$BODY$
BEGIN
	IF
		(OLD.korban_terdampak != NEW.korban_terdampak OR OLD.korban_mengungsi != NEW.korban_mengungsi OR OLD.korban_luka != NEW.korban_luka OR OLD.korban_meninggal != NEW.korban_meninggal OR OLD.korban_hilang != NEW.korban_hilang OR OLD.pasca_bencana != NEW.pasca_bencana)
	THEN
		UPDATE tb_observasi_lapangan SET laporan_tahap1 = 2 WHERE id_observasi = OLD.id_observasi;
	END IF;
	
	IF
		(OLD.pengungsi_laki_laki != NEW.pengungsi_laki_laki OR OLD.pl_balita != NEW.pl_balita OR OLD.pl_anak_anak != NEW.pl_anak_anak OR OLD.pl_remaja != NEW.pl_remaja OR OLD.pl_dewasa != NEW.pl_dewasa OR OLD.pl_lansia != NEW.pl_lansia OR OLD.pengungsi_perempuan != NEW.pengungsi_perempuan OR OLD.pp_balita != NEW.pp_balita OR OLD.pp_anak_anak != NEW.pp_anak_anak OR OLD.pp_remaja != NEW.pp_remaja OR OLD.pp_dewasa != NEW.pp_dewasa OR OLD.pp_lansia != NEW.pp_lansia)
	THEN
		UPDATE tb_observasi_lapangan SET laporan_tahap2 = 2 WHERE id_observasi = OLD.id_observasi;
		END IF;
		
	RETURN NEW;
END;
$BODY$

LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_obsLapUpdate
	AFTER UPDATE
	ON tb_observasi_lapangan
	FOR EACH ROW
	EXECUTE PROCEDURE function_obsLapUpdate();



----------| stsLapPrioInsert: tb_analisis_prioritas |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_stsLapPrioInsert()
	RETURNS trigger AS
$BODY$
BEGIN
	UPDATE tb_observasi_lapangan SET laporan_tahap1 = 3 WHERE id_peristiwa = NEW.id_peristiwa;
RETURN NEW;
END;
$BODY$

LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_stsLapPrioInsert
	AFTER INSERT
	ON tb_analisis_prioritas
	FOR EACH ROW
	EXECUTE PROCEDURE function_stsLapPrioInsert();



----------| stsLapPrioUpdate: tb_analisis_prioritas |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_stsLapPrioUpdate()
	RETURNS trigger AS
$BODY$
BEGIN
	UPDATE tb_observasi_lapangan SET laporan_tahap1 = 3 WHERE id_peristiwa = OLD.id_peristiwa;
RETURN OLD;
END;
$BODY$

LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_stsLapPrioUpdate
	AFTER UPDATE
	ON tb_analisis_prioritas
	FOR EACH ROW
	EXECUTE PROCEDURE function_stsLapPrioUpdate();



----------| stsLapLogInsert: tb_analisis_logistik |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_stsLapLogInsert()
	RETURNS trigger AS
$BODY$
BEGIN
	UPDATE tb_observasi_lapangan SET laporan_tahap2 = 3 WHERE id_peristiwa = NEW.id_peristiwa;
RETURN NEW;
END;
$BODY$

LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_stsLapLogInsert
	AFTER INSERT
	ON tb_kebutuhan_logistik
	FOR EACH ROW
	EXECUTE PROCEDURE function_stsLapLogInsert();



----------| stsLapLogUpdate: tb_analisis_logistik |----------

-------------------- CREATE FUNCTION --------------------
CREATE FUNCTION function_stsLapLogUpdate()
	RETURNS trigger AS
$BODY$
BEGIN
	UPDATE tb_observasi_lapangan SET laporan_tahap2 = 3 WHERE id_peristiwa = OLD.id_peristiwa;
RETURN OLD;
END;
$BODY$

LANGUAGE plpgsql VOLATILE
COST 100;

-------------------- CREATE TRIGGER --------------------
CREATE TRIGGER trigger_stsLapLogUpdate
	AFTER UPDATE
	ON tb_kebutuhan_logistik
	FOR EACH ROW
	EXECUTE PROCEDURE function_stsLapLogUpdate();