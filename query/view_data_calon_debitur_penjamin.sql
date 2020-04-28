
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `template`.`view_data_calon_debitur_penjamin` 
    AS
(SELECT `a`.`id_nasabah` AS `id_nasabah`, `b`.`hubungan` AS `hubungan`, `b`.`jenis_identitas` AS `jenis_identitas`, `b`.`no_identitas` AS `no_identitas`, `b`.`nama_lengkap` AS `nama_lengkap`, `b`.`nama_panggilan` AS `nama_panggilan`, `b`.`tempat_lahir` AS `tempat_lahir`, DATE_FORMAT(`b`.`tanggal_lahir`,'%d/%m/%Y') AS `tanggal_lahir`, `b`.`usia` AS `usia`, `b`.`jenis_kelamin` AS `jenis_kelamin`, IF(`b`.`jenis_kelamin` = 'L','Pria','Wanita') AS `jenis_kelamin_penjamin`, `b`.`no_telp_1` AS `no_telp_1`, `b`.`alamat_domisili` AS `alamat_domisili`, `b`.`rt_domisili` AS `rt_domisili`, `b`.`rw_domisili` AS `rw_domisili`, `b`.`id_kelurahan_domisili` AS `id_kelurahan_domisili`, `b`.`id_kecamatan_domisili` AS `id_kecamatan_domisili`, `b`.`id_kabupaten_domisili` AS `id_kabupaten_domisili`, `b`.`id_provinsi_domisili` AS `id_provinsi_domisili`, `b`.`kode_pos_domisili` AS `kode_pos_domisili`, `f`.`nama_kelurahan` AS `deskripsi_kelurahan_penjamin`, `e`.`nama_kecamatan` AS `deskripsi_kecamatan_penjamin`, `d`.`nama_kabupaten` AS `deskripsi_kabupaten_penjamin`, `c`.`nama_provinsi` AS `deskripsi_provinsi_penjamin`, CONCAT(UCASE(`b`.`alamat_domisili`),', RT.',`b`.`rt_domisili`,', RW.',`b`.`rw_domisili`,', KELURAHAN ',`f`.`nama_kelurahan`,', KECAMATAN ',`e`.`nama_kecamatan`,', ',`d`.`nama_kabupaten`,', ',`c`.`nama_provinsi`) AS `alamat_lengkap_domisili`
FROM (((((`prm_aplikasi_nasabah` `a`
       LEFT JOIN `prm_aplikasi_penjamin` `b`
         ON (`b`.`id_nasabah` = `a`.`id_nasabah`))
      LEFT JOIN `prm_master_provinsi` `c`
        ON (`b`.`id_provinsi_domisili` = `c`.`id_provinsi`))
     LEFT JOIN `prm_master_kabupaten` `d`
       ON (`b`.`id_kabupaten_domisili` = `d`.`id_kabupaten`))
    LEFT JOIN `prm_master_kecamatan` `e`
      ON (`b`.`id_kecamatan_domisili` = `e`.`id_kecamatan`))
   LEFT JOIN `prm_master_kelurahan` `f`
     ON (`b`.`id_kelurahan_domisili` = `f`.`id_kelurahan`)));
