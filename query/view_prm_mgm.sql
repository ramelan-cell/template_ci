SELECT `a`.`nasabah_id` AS `nasabah_id`, `b`.`nama_lengkap` AS `nama_lengkap`, `b`.`alamat_ktp` AS `alamat`
FROM (`prm_aplikasi` `a`
   LEFT JOIN `prm_aplikasi_nasabah` `b`
     ON ((`a`.`id_nasabah` = `b`.`id_nasabah`)))
WHERE ((`a`.`nasabah_id` IS NOT NULL)
       AND (`a`.`flg_lunas` = '2'))
ORDER BY `b`.`nama_lengkap`