CREATE VIEW view_karyawan_list AS
WITH t AS (
	SELECT 
	tr_krywn_workplace.id_krywn AS id_krywn,
	tr_krywn_workplace.id_tr_krywn AS id_tr_krywn , 
	tr_krywn_workplace.id_dprtmn AS id_dprtmn,
	departmen.name_dprtmn AS name_dprtmn,
	tr_krywn_workplace.assigned_at
	FROM
	departmen 
	LEFT JOIN tr_krywn_workplace ON departmen.id_dprtmn=tr_krywn_workplace.id_dprtmn
)
SELECT
	tk.id AS id_krywn,
	t.id_tr_krywn,
	t.id_dprtmn,
	t.name_dprtmn,
	tk.name_mhs AS name_mhs,
	tk.nik AS nik,
	tk.address AS address,
	tk.username AS username,
	t.assigned_at,
	tk.profile AS profile
FROM tbl_krywn tk
LEFT JOIN t ON tk.id=t.id_krywn
