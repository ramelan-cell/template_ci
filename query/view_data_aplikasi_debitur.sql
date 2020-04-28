
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `template`.`view_data_aplikasi_debitur` 
    AS
(SELECT `a`.`id_nasabah` AS `id_nasabah`, `b`.`kode_kantor` AS `kode_kantor`, `b`.`created_date` AS `created_date`, DATE_FORMAT(`b`.`created_date`,'%d/%m/%Y') AS `tgl_register`, `a`.`created_by` AS `created_by`, `a`.`no_identitas` AS `no_identitas`, `a`.`nama_lengkap` AS `nama_lengkap`, `a`.`jenis_kelamin` AS `jenis_kelamin`, CONCAT(UCASE(`a`.`alamat_domisili`),', RT.',`a`.`rt_domisili`,', RW.',`a`.`rw_domisili`,', KELURAHAN ',`g`.`nama_kelurahan`,', KECAMATAN ',`f`.`nama_kecamatan`,', ',`e`.`nama_kabupaten`,', ',`d`.`nama_provinsi`) AS `alamat_domisili`, `a`.`no_telp_1` AS `no_telp_1`, CONCAT_WS('^',`a`.`id_nasabah`,`a`.`nama_lengkap`,CONCAT(UCASE(`a`.`alamat_domisili`),', RT.',`a`.`rt_domisili`,', RW.',`a`.`rw_domisili`,', KELURAHAN ',`g`.`nama_kelurahan`,', KECAMATAN ',`f`.`nama_kecamatan`,', ',`e`.`nama_kabupaten`,', ',`d`.`nama_provinsi`),`a`.`no_telp_1`,CONVERT(DATE_FORMAT(`a`.`created_date`,'%d/%m/%Y') USING latin1),`b`.`id_aplikasi`) AS `ROWS`, `b`.`id_aplikasi` AS `id_aplikasi`, DATE_FORMAT(`b`.`tanggal_survey`,'%d/%m/%Y') AS `tanggal_survey`, `b`.`status_debitur` AS `status_debitur`, `b`.`no_kontrak_lama` AS `no_kontrak_lama`, `b`.`kode_soa` AS `kode_soa`, `b`.`nasabah_id_soa` AS `nasabah_id_soa`, `m`.`deskripsi_group4` AS `nama_soa`, `b`.`sumber_aplikasi` AS `sumber_aplikasi`, `b`.`is_penggemukan` AS `is_penggemukan`, `h`.`penjualan_per_bulan` AS `penjualan_per_bulan`, `h`.`harga_pokok_penjualan` AS `harga_pokok_penjualan`, `h`.`biaya_operasional` AS `biaya_operasional`, `h`.`laba_bersih` AS `laba_bersih`, `h`.`persentase_laba_bersih` AS `persentase_laba_bersih`, `h`.`tujuan_dana` AS `tujuan_dana`, `h`.`angsuran_ditempat_lain` AS `angsuran_ditempat_lain`, `i`.`aktivitas` AS `aktivitas`, `i`.`prospek_usaha` AS `prospek_usaha`, `i`.`target_konsumen` AS `target_konsumen`, `i`.`kategori_penjualan` AS `kategori_penjualan`, `j`.`is_pemeriksaan` AS `is_pemeriksaan`, IF((`j`.`is_pemeriksaan` = '1'),'Ya','Tidak') AS `status_pemeriksaan`, `j`.`nama_supplier_1` AS `nama_supplier_1`, `j`.`no_telp_supplier_1` AS `no_telp_supplier_1`, `j`.`nama_supplier_2` AS `nama_supplier_2`, `j`.`no_telp_supplier_2` AS `no_telp_supplier_2`, `j`.`hasil_pemeriksaan` AS `hasil_pemeriksaan`, `k`.`status_tempat_usaha` AS `status_tempat_usaha`, `k`.`harga_sewa_tempat_usaha` AS `harga_sewa_tempat_usaha`, `k`.`masa_sewa_usaha` AS `masa_sewa_usaha`, DATE_FORMAT(`k`.`tgl_mulai_sewa_usaha`,'%d/%m/%Y') AS `tgl_mulai_sewa_usaha`, `k`.`lama_usaha_tahun` AS `lama_usaha_tahun`, `k`.`lama_usaha_bulan` AS `lama_usaha_bulan`, `k`.`status_rumah` AS `status_rumah`, `k`.`harga_sewa_rumah` AS `harga_sewa_rumah`, `k`.`masa_sewa_rumah` AS `masa_sewa_rumah`, DATE_FORMAT(`k`.`tgl_mulai_sewa_rumah`,'%d/%m/%Y') AS `tgl_mulai_sewa_rumah`, `k`.`lama_tinggal_tahun` AS `lama_tinggal_tahun`, `k`.`lama_tinggal_bulan` AS `lama_tinggal_bulan`, `k`.`jumlah_motor` AS `jumlah_motor`, `k`.`keterangan_motor` AS `keterangan_motor`, `k`.`jumlah_mobil` AS `jumlah_mobil`, `k`.`keterangan_mobil` AS `keterangan_mobil`, `c`.`id_produk` AS `id_produk`, IF((`c`.`id_produk` = '01'),'template New','template RO') AS `deskripsi_produk`, `c`.`id_paket` AS `id_paket`, CONCAT_WS(' - ',`c`.`id_paket`,`l`.`deskripsi`) AS `deskripsi_paket`, `c`.`jumlah_pinjaman` AS `jumlah_pinjaman`, `c`.`tenor` AS `tenor`, `c`.`utj` AS `utj`, `c`.`utj_plus` AS `utj_plus`, `c`.`angsuran` AS `angsuran`, `c`.`metode_pembayaran` AS `metode_pembayaran`, `c`.`rekomendasi_kredit` AS `rekomendasi_kredit`, `b`.`flag_verifikasi` AS `flag_verifikasi`, `b`.`file_tanda_tangan` AS `file_tanda_tangan`, `b`.`file_tanda_tangan_pasangan` AS `file_tanda_tangan_pasangan`, IF((`n`.`flag_realisasi` = '1'),'APPROVE DONE',(CASE WHEN ISNULL(`b`.`flag_verifikasi`) THEN 'LENGKAPI DATA' WHEN (`b`.`flag_verifikasi` = '0') THEN 'BELUM VERIFIKASI' WHEN (`b`.`flag_verifikasi` = '1') THEN 'REKOMENDASI' WHEN (`b`.`flag_verifikasi` = '2') THEN 'TIDAK REKOMENDASI' WHEN (`b`.`flag_verifikasi` = '3') THEN 'PENDING' WHEN (`b`.`flag_verifikasi` = '4') THEN 'APPROVE' WHEN (`b`.`flag_verifikasi` = '5') THEN 'REJECT' ELSE 'NO STATUS' END)) AS `status_verifikasi`, `n`.`flag_realisasi` AS `flag_realisasi`, IF((`o`.`is_foto_usaha` = '1'),'SUDAH UPLOAD','BELUM UPLOAD') AS `FOTO_USAHA`, `b`.`foto_validasi` AS `foto_validasi`
FROM ((((((((((((((`template`.`prm_aplikasi` `b`
                LEFT JOIN `template`.`prm_aplikasi_nasabah` `a`
                  ON ((`b`.`id_nasabah` = `a`.`id_nasabah`)))
               LEFT JOIN `template`.`prm_aplikasi_pembiayaan` `c`
                 ON ((`c`.`id_aplikasi` = `b`.`id_aplikasi`)))
              LEFT JOIN `template`.`prm_master_provinsi` `d`
                ON ((`a`.`id_provinsi_domisili` = `d`.`id_provinsi`)))
             LEFT JOIN `template`.`prm_master_kabupaten` `e`
               ON ((`a`.`id_kabupaten_domisili` = `e`.`id_kabupaten`)))
            LEFT JOIN `template`.`prm_master_kecamatan` `f`
              ON ((`a`.`id_kecamatan_domisili` = `f`.`id_kecamatan`)))
           LEFT JOIN `template`.`prm_master_kelurahan` `g`
             ON ((`a`.`id_kelurahan_domisili` = `g`.`id_kelurahan`)))
          LEFT JOIN `template`.`prm_aplikasi_kapasitas` `h`
            ON ((`h`.`id_aplikasi` = `b`.`id_aplikasi`)))
         LEFT JOIN `template`.`prm_aplikasi_kondisi` `i`
           ON ((`i`.`id_aplikasi` = `b`.`id_aplikasi`)))
        LEFT JOIN `template`.`prm_aplikasi_karakter` `j`
          ON ((`j`.`id_aplikasi` = `b`.`id_aplikasi`)))
       LEFT JOIN `template`.`prm_aplikasi_modal` `k`
         ON ((`k`.`id_aplikasi` = `b`.`id_aplikasi`)))
      LEFT JOIN `template`.`prm_master_paket` `l`
        ON ((`l`.`kode` = `c`.`id_paket`)))
     LEFT JOIN `dpm_online`.`kre_kode_group4` `m`
       ON ((`m`.`kode_group4` = `b`.`kode_soa`)))
    LEFT JOIN `template`.`prm_pwk_pengesahan` `n`
      ON ((`n`.`id_aplikasi` = `b`.`id_aplikasi`)))
   LEFT JOIN `template`.`prm_aplikasi_dokumen` `o`
     ON ((`a`.`id_nasabah` = `o`.`id_nasabah`)))
ORDER BY UNIX_TIMESTAMP(`a`.`created_date`)DESC);
