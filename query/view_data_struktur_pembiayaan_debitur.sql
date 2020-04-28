
CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `template`.`view_data_struktur_pembiayaan_debitur` 
    AS
(SELECT `a`.`id_nasabah` AS `id_nasabah`,`a`.`id_aplikasi` AS `id_aplikasi`,`a`.`jumlah_pinjaman` AS `pokok`,`a`.`tenor` AS `tenor`,`a`.`angsuran` AS `angsuran_perminggu`,ROUND(`a`.`angsuran` * `a`.`tenor`,2) AS `pokok_plus_bunga`,ROUND(`a`.`angsuran` * `a`.`tenor`,2) - `a`.`jumlah_pinjaman` AS `bunga`,ROUND(`a`.`jumlah_pinjaman` / `a`.`tenor`,2) AS `pokok_perminggu`,ROUND((`a`.`angsuran` * `a`.`tenor` - `a`.`jumlah_pinjaman`) / `a`.`tenor`,2) AS `bunga_perminggu` FROM (`prm_aplikasi_pembiayaan` `a` LEFT JOIN `prm_pwk_pengesahan` `b` ON(`a`.`id_aplikasi` = `b`.`id_aplikasi`)) WHERE `b`.`id_aplikasi` = `a`.`id_aplikasi`);
