SELECT DISTINCT `a`.`id_nasabah` AS `id_nasabah`, `a`.`flag_kelengkapan` AS `flag_kelengkapan_debitur`, `b`.`flag_kelengkapan` AS `flag_kelengkapan_pasangan`, `c`.`flag_kelengkapan` AS `flag_kelengkapan_keluarga`, `d`.`flag_kelengkapan` AS `flag_kelengkapan_dokumen`, `e`.`flag_kelengkapan` AS `flag_kelengkapan_penjamin`, `f`.`flag_kelengkapan` AS `flag_kelengkapan_tanggungan`, `a`.`flag_kelengkapan` AS `flag_kelengkapan_usaha`
FROM ((((((`prm_aplikasi_nasabah` `a`
        LEFT JOIN `prm_aplikasi_pasangan` `b`
          ON ((`a`.`id_nasabah` = `b`.`id_nasabah`)))
       LEFT JOIN `prm_aplikasi_keluarga` `c`
         ON ((`a`.`id_nasabah` = `c`.`id_nasabah`)))
      LEFT JOIN `prm_aplikasi_dokumen` `d`
        ON ((`a`.`id_nasabah` = `d`.`id_nasabah`)))
     LEFT JOIN `prm_aplikasi_penjamin` `e`
       ON ((`a`.`id_nasabah` = `e`.`id_nasabah`)))
    LEFT JOIN `prm_aplikasi_tanggungan` `f`
      ON ((`a`.`id_nasabah` = `f`.`id_nasabah`)))
   LEFT JOIN `prm_aplikasi_usaha` `g`
     ON ((`a`.`id_nasabah` = `g`.`id_nasabah`)))