SELECT `a`.`id_nasabah` AS `id_nasabah`, `a`.`kode_kantor` AS `kode_kantor`, (SELECT `view_master_kantor`.`nama_kantor`
                                                                              FROM `template`.`view_master_kantor`
                                                                              WHERE (`view_master_kantor`.`kode_kantor` = `a`.`kode_kantor`)) AS `nama_kantor`, DATE_FORMAT(`a`.`created_date`,'%Y-%m-%d') AS `created_date`, `a`.`created_date` AS `tgl_registrasi`, DATE_FORMAT(`a`.`created_date`,'%d/%m/%Y') AS `tgl_register`, `a`.`created_by` AS `created_by`, (SELECT `dpm_online`.`user`.`nama`
                                                                                                                                                                                                                                                                                                                                                                                      FROM `dpm_online`.`user`
                                                                                                                                                                                                                                                                                                                                                                                      WHERE (`dpm_online`.`user`.`user_id` = `a`.`created_by`)) AS `nama_sm`, `a`.`jenis_identitas` AS `jenis_identitas_debitur`, `a`.`no_kk` AS `no_kk`, `a`.`no_identitas` AS `no_identitas`, `a`.`nama_lengkap` AS `nama_lengkap`, `a`.`nama_panggilan` AS `nama_panggilan`, `a`.`tempat_lahir` AS `tempat_lahir`, DATE_FORMAT(`a`.`tanggal_lahir`,'%d/%m/%Y') AS `tanggal_lahir`, `a`.`usia` AS `usia`, IF((`a`.`jenis_kelamin` = 'L'),'LAKI-LAKI','WANITA') AS `jenis_kelamin`, `a`.`status_perkawinan` AS `status_perkawinan`, CONCAT_WS(' - ',`a`.`agama`,`i`.`nama_agama`) AS `agama`, `a`.`nama_ibu_kandung` AS `nama_ibu_kandung`, `a`.`no_telp_1` AS `no_telp_1`, `a`.`no_telp_2` AS `no_telp_2`, `a`.`jumlah_tanggungan_anak` AS `jumlah_tanggungan_anak`, `a`.`jumlah_tanggungan_lainnya` AS `jumlah_tanggungan_lainnya`, CONCAT_WS(' - ',`a`.`pendidikan`,`j`.`nama_pendidikan`) AS `pendidikan`, `a`.`alamat_ktp` AS `alamat_ktp`, `a`.`rt_ktp` AS `rt_ktp`, `a`.`rw_ktp` AS `rw_ktp`, `a`.`id_kelurahan_ktp` AS `id_kelurahan_ktp`, `n`.`nama_kelurahan` AS `deskripsi_kelurahan_ktp`, `a`.`id_kecamatan_ktp` AS `id_kecamatan_ktp`, `m`.`nama_kecamatan` AS `deskripsi_kecamatan_ktp`, `a`.`id_kabupaten_ktp` AS `id_kabupaten_ktp`, `l`.`nama_kabupaten` AS `deskripsi_kabupaten_ktp`, `a`.`id_provinsi_ktp` AS `id_provinsi_ktp`, `k`.`nama_provinsi` AS `deskripsi_provinsi_ktp`, `a`.`kode_pos_ktp` AS `kode_pos_ktp`, `a`.`flag_domisili` AS `flag_domisili`, `a`.`alamat_domisili` AS `alamat_domisili`, `a`.`rt_domisili` AS `rt_domisili`, `a`.`rw_domisili` AS `rw_domisili`, `a`.`id_kelurahan_domisili` AS `id_kelurahan_domisili`, `e`.`nama_kelurahan` AS `deskripsi_kelurahan_domisili`, `a`.`id_kecamatan_domisili` AS `id_kecamatan_domisili`, `d`.`nama_kecamatan` AS `deskripsi_kecamatan_domisili`, `a`.`id_kabupaten_domisili` AS `id_kabupaten_domisili`, `c`.`nama_kabupaten` AS `deskripsi_kabupaten_domisili`, `a`.`id_provinsi_domisili` AS `id_provinsi_domisili`, `b`.`nama_provinsi` AS `deskripsi_provinsi_domisili`, `a`.`kode_pos_domisili` AS `kode_pos_domisili`, CONCAT(UCASE(`a`.`alamat_domisili`),', RT.',`a`.`rt_domisili`,', RW.',`a`.`rw_domisili`,', KELURAHAN ',`e`.`nama_kelurahan`,', KECAMATAN ',`d`.`nama_kecamatan`,', ',`c`.`nama_kabupaten`,', ',`b`.`nama_provinsi`) AS `alamat_lengkap_domisili`, CONCAT_WS('^',`a`.`id_nasabah`,`a`.`nama_lengkap`,CONCAT(UCASE(`a`.`alamat_domisili`),', RT.',`a`.`rt_domisili`,', RW.',`a`.`rw_domisili`,', KELURAHAN ',`e`.`nama_kelurahan`,', KECAMATAN ',`d`.`nama_kecamatan`,', ',`c`.`nama_kabupaten`,', ',`b`.`nama_provinsi`),`a`.`no_telp_1`,CONVERT(DATE_FORMAT(`a`.`created_date`,'%d/%m/%Y') USING latin1)) AS `ROWS`, `h`.`jenis_identitas` AS `jenis_identitas_pasangan`, `h`.`no_identitas` AS `no_identitas_pasangan`, `h`.`nama_lengkap` AS `nama_lengkap_pasangan`, `h`.`nama_panggilan` AS `nama_panggilan_pasangan`, `h`.`tempat_lahir` AS `tempat_lahir_pasangan`, DATE_FORMAT(`h`.`tanggal_lahir`,'%d/%m/%Y') AS `tanggal_lahir_pasangan`, `h`.`usia` AS `usia_pasangan`, `h`.`no_telp_1` AS `no_telp_pasangan`, `h`.`pekerjaan` AS `pekerjaan_pasangan`, `h`.`penghasilan` AS `penghasilan_pasangan`, `f`.`is_ktp_debitur` AS `is_ktp_debitur`, `f`.`file_ktp_debitur` AS `file_ktp_debitur`, `f`.`is_ktp_pasangan` AS `is_ktp_pasangan`, `f`.`file_ktp_pasangan` AS `file_ktp_pasangan`, `f`.`is_ktp_penjamin` AS `is_ktp_penjamin`, `f`.`file_ktp_penjamin` AS `file_ktp_penjamin`, `f`.`is_ktp_keluarga` AS `is_ktp_keluarga`, `f`.`file_ktp_keluarga` AS `file_ktp_keluarga`, `f`.`is_surat_nikah` AS `is_surat_nikah`, `f`.`file_surat_nikah` AS `file_surat_nikah`, `f`.`is_pbb` AS `is_pbb`, `f`.`file_pbb` AS `file_pbb`, `f`.`is_kk_debitur` AS `is_kk_debitur`, `f`.`file_kk_debitur` AS `file_kk_debitur`, `f`.`is_shm` AS `is_shm`, `f`.`file_shm` AS `file_shm`, `f`.`is_data_keuangan` AS `is_data_keuangan`, `f`.`file_data_keuangan` AS `file_data_keuangan`, `f`.`is_foto_usaha` AS `is_foto_usaha`, `f`.`file_foto_usaha` AS `file_foto_usaha`, `f`.`is_setengah_badan` AS `is_setengah_badan`, `f`.`file_setengah_badan` AS `file_setengah_badan`, `f`.`is_dalam_rumah` AS `is_dalam_rumah`, `f`.`file_dalam_rumah` AS `file_dalam_rumah`, `f`.`is_depan_rumah` AS `is_depan_rumah`, `f`.`file_depan_rumah` AS `file_depan_rumah`, `f`.`is_akte_cerai` AS `is_akte_cerai`, `f`.`file_akte_cerai` AS `file_akte_cerai`, `a`.`flag_kelengkapan` AS `flag_kelengkapan`, MAX(IF(ISNULL(`o`.`flag_verifikasi`),0,`o`.`flag_verifikasi`)) AS `flag_verifikasi`
FROM (((((((((((((`template`.`prm_aplikasi_nasabah` `a`
               LEFT JOIN `template`.`prm_master_provinsi` `b`
                 ON ((`a`.`id_provinsi_domisili` = `b`.`id_provinsi`)))
              LEFT JOIN `template`.`prm_master_kabupaten` `c`
                ON ((`a`.`id_kabupaten_domisili` = `c`.`id_kabupaten`)))
             LEFT JOIN `template`.`prm_master_kecamatan` `d`
               ON ((`a`.`id_kecamatan_domisili` = `d`.`id_kecamatan`)))
            LEFT JOIN `template`.`prm_master_kelurahan` `e`
              ON ((`a`.`id_kelurahan_domisili` = `e`.`id_kelurahan`)))
           LEFT JOIN `template`.`prm_aplikasi_dokumen` `f`
             ON ((`f`.`id_nasabah` = `a`.`id_nasabah`)))
          LEFT JOIN `template`.`prm_aplikasi_pasangan` `h`
            ON ((`h`.`id_nasabah` = `a`.`id_nasabah`)))
         LEFT JOIN `template`.`agama` `i`
           ON ((`i`.`id` = `a`.`agama`)))
        LEFT JOIN `template`.`pendidikan` `j`
          ON ((`j`.`id` = `a`.`pendidikan`)))
       LEFT JOIN `template`.`prm_master_provinsi` `k`
         ON ((`a`.`id_provinsi_ktp` = `k`.`id_provinsi`)))
      LEFT JOIN `template`.`prm_master_kabupaten` `l`
        ON ((`a`.`id_kabupaten_ktp` = `l`.`id_kabupaten`)))
     LEFT JOIN `template`.`prm_master_kecamatan` `m`
       ON ((`a`.`id_kecamatan_ktp` = `m`.`id_kecamatan`)))
    LEFT JOIN `template`.`prm_master_kelurahan` `n`
      ON ((`a`.`id_kelurahan_ktp` = `n`.`id_kelurahan`)))
   LEFT JOIN `template`.`prm_aplikasi` `o`
     ON ((`a`.`id_nasabah` = `o`.`id_nasabah`)))
GROUP BY `a`.`id_nasabah`
ORDER BY UNIX_TIMESTAMP(`a`.`created_date`)DESC