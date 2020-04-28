SELECT DISTINCT `a`.`id_aplikasi` AS `id_aplikasi`, `a`.`flag_kelengkapan` AS `flag_kelengkapan_aplikasi`, `b`.`flag_kelengkapan` AS `flag_kelengkapan_kondisi`, `c`.`flag_kelengkapan` AS `flag_kelengkapan_modal`, `d`.`flag_kelengkapan` AS `flag_kelengkapan_kapasitas`, `e`.`flag_kelengkapan` AS `flag_kelengkapan_karakter`, `f`.`flag_kelengkapan` AS `flag_kelengkapan_pembiayaan`
FROM (((((`prm_aplikasi` `a`
       LEFT JOIN `prm_aplikasi_kondisi` `b`
         ON ((`a`.`id_aplikasi` = `b`.`id_aplikasi`)))
      LEFT JOIN `prm_aplikasi_modal` `c`
        ON ((`a`.`id_aplikasi` = `c`.`id_aplikasi`)))
     LEFT JOIN `prm_aplikasi_kapasitas` `d`
       ON ((`a`.`id_aplikasi` = `d`.`id_aplikasi`)))
    LEFT JOIN `prm_aplikasi_karakter` `e`
      ON ((`a`.`id_aplikasi` = `e`.`id_aplikasi`)))
   LEFT JOIN `prm_aplikasi_pembiayaan` `f`
     ON ((`a`.`id_aplikasi` = `f`.`id_aplikasi`)))