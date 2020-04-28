
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `template`.`view_data_calon_debitur_usaha` 
    AS
(SELECT `a`.`id_nasabah` AS `id_nasabah`, `c`.`id` AS `kode_usaha`, `c`.`nama_jenis_usaha` AS `deskripsi_jenis_usaha`, CONCAT_WS(' - ',`c`.`id`,`c`.`nama_jenis_usaha`) AS `jenis_usaha`, `b`.`deskripsi_usaha` AS `deskripsi_usaha`, `b`.`lama_usaha_tahun` AS `lama_usaha_tahun`, `b`.`lama_usaha_bulan` AS `lama_usaha_bulan`, `b`.`no_telp_usaha` AS `no_telp_usaha`, `b`.`alamat_usaha` AS `alamat_usaha`, `b`.`rt_usaha` AS `rt_usaha`, `b`.`rw_usaha` AS `rw_usaha`, `b`.`id_kelurahan_usaha` AS `id_kelurahan_usaha`, `b`.`id_kecamatan_usaha` AS `id_kecamatan_usaha`, `b`.`id_kabupaten_usaha` AS `id_kabupaten_usaha`, `b`.`id_provinsi_usaha` AS `id_provinsi_usaha`, `b`.`kode_pos_usaha` AS `kode_pos_usaha`, `d`.`nama_provinsi` AS `deskripsi_provinsi_usaha`, `e`.`nama_kabupaten` AS `deskripsi_kabupaten_usaha`, `f`.`nama_kecamatan` AS `deskripsi_kecamatan_usaha`, `g`.`nama_kelurahan` AS `deskripsi_kelurahan_usaha`, CONCAT(UCASE(`b`.`alamat_usaha`),', RT.',`b`.`rt_usaha`,', RW.',`b`.`rw_usaha`,', KELURAHAN ',`g`.`nama_kelurahan`,', KECAMATAN ',`f`.`nama_kecamatan`,', ',`e`.`nama_kabupaten`,', ',`d`.`nama_provinsi`) AS `alamat_lengkap_usaha`
FROM ((((((`prm_aplikasi_nasabah` `a`
        LEFT JOIN `prm_aplikasi_usaha` `b`
          ON (`b`.`id_nasabah` = `a`.`id_nasabah`))
       LEFT JOIN `jenis_usaha` `c`
         ON (`c`.`id` = `b`.`kode_usaha`))
      LEFT JOIN `prm_master_provinsi` `d`
        ON (`b`.`id_provinsi_usaha` = `d`.`id_provinsi`))
     LEFT JOIN `prm_master_kabupaten` `e`
       ON (`b`.`id_kabupaten_usaha` = `e`.`id_kabupaten`))
    LEFT JOIN `prm_master_kecamatan` `f`
      ON (`b`.`id_kecamatan_usaha` = `f`.`id_kecamatan`))
   LEFT JOIN `prm_master_kelurahan` `g`
     ON (`b`.`id_kelurahan_usaha` = `g`.`id_kelurahan`)));
