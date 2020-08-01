----- INPUT KRITERIA -----
INSERT INTO tb_kriteria
VALUES
	('KRT-001', 'Jml. Korban Terdampak'),
	('KRT-002', 'Jml. Korban Mengungsi'),
	('KRT-003', 'Jml. Korban Luka'),
	('KRT-004', 'Jml. Korban Meninggal dan Hilang'),
	('KRT-005', 'Kondisi Pasca Bencana');

----- INPUT SUB KRITERIA -----
INSERT INTO tb_sub_kriteria
VALUES
	('SKR-001', 'KRT-001', '1 s.d. 20', '25'),
	('SKR-002', 'KRT-001', '21 s.d. 30', '50'),
	('SKR-003', 'KRT-001', '31 s.d. 50', '75'),
	('SKR-004', 'KRT-001', '> 50', '100'),
	('SKR-005', 'KRT-002', '0', '0'),
	('SKR-006', 'KRT-002', '1 s.d. 10', '25'),
	('SKR-007', 'KRT-002', '11 s.d. 20', '50'),
	('SKR-008', 'KRT-002', '21 s.d. 30', '75'),
	('SKR-009', 'KRT-002', '> 30', '100'),
	('SKR-010', 'KRT-003', '0', '0'),
	('SKR-011', 'KRT-003', '1 s.d. 3', '25'),
	('SKR-012', 'KRT-003', '4 s.d. 5', '50'),
	('SKR-013', 'KRT-003', '6 s.d. 9', '75'),
	('SKR-014', 'KRT-003', '> 9', '100'),
	('SKR-015', 'KRT-004', '0', '0'),
	('SKR-016', 'KRT-004', '1', '25'),
	('SKR-017', 'KRT-004', '2', '50'),
	('SKR-018', 'KRT-004', '3', '75'),
	('SKR-019', 'KRT-004', '> 3', '100'),
	('SKR-020', 'KRT-005', 'Normal', '0'),
	('SKR-021', 'KRT-005', 'Waspada', '30'),
	('SKR-022', 'KRT-005', 'Siaga', '70'),
	('SKR-023', 'KRT-005', 'Awas', '100');

----- INPUT ALTERNATIF -----
INSERT INTO tb_alternatif
VALUES
	('ALT-001', 'Pangan'),
	('ALT-002', 'Sandang'),
	('ALT-003', 'Kematian'),
	('ALT-004', 'Lainnya');

----- INPUT BOBOT -----
INSERT INTO tb_bobot
VALUES
	('BBT-001', 'ALT-001', 'KRT-001', '30'),
	('BBT-002', 'ALT-001', 'KRT-002', '50'),
	('BBT-003', 'ALT-001', 'KRT-003', '0'),
	('BBT-004', 'ALT-001', 'KRT-004', '0'),
	('BBT-005', 'ALT-001', 'KRT-005', '20'),
	('BBT-006', 'ALT-002', 'KRT-001', '25'),
	('BBT-007', 'ALT-002', 'KRT-002', '60'),
	('BBT-008', 'ALT-002', 'KRT-003', '0'),
	('BBT-009', 'ALT-002', 'KRT-004', '0'),
	('BBT-010', 'ALT-002', 'KRT-005', '15'),
	('BBT-011', 'ALT-003', 'KRT-001', '5'),
	('BBT-012', 'ALT-003', 'KRT-002', '0'),
	('BBT-013', 'ALT-003', 'KRT-003', '5'),
	('BBT-014', 'ALT-003', 'KRT-004', '60'),
	('BBT-015', 'ALT-003', 'KRT-005', '30'),
	('BBT-016', 'ALT-004', 'KRT-001', '20'),
	('BBT-017', 'ALT-004', 'KRT-002', '30'),
	('BBT-018', 'ALT-004', 'KRT-003', '30'),
	('BBT-019', 'ALT-004', 'KRT-004', '0'),
	('BBT-020', 'ALT-004', 'KRT-005', '20');