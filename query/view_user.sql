SELECT a.user_id,
       a.username,
       a.`password`,
       a.nik,
       a.id_kantor,
       b.`nama_kantor`,
       a.`id_divisi`,
       c.`nama_divisi`,
       a.`id_jabatan`,
       d.`nama_jabatan`,
       a.`tgl_expired`,
       a.`flg_block`,
       a.`user_id_induk`,
       a.`group_menu`,
       a.`email`
FROM USER a LEFT JOIN kantor b
ON a.`id_kantor` = b.`kode_kantor` LEFT JOIN divisi c
ON a.`id_divisi` = c.`id` LEFT JOIN jabatan d
ON a.`id_jabatan` = d.`id`