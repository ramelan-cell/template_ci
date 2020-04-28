SELECT a.kode_kantor,
       a.kode_cabang,
       b.nama_cabang,
       a.nama_kantor,
       a.area_kerja,
       a.initial,
       a.`alamat_kantor`
       
FROM `kantor` a LEFT JOIN cabang b
ON a.`kode_cabang` = b.`id`