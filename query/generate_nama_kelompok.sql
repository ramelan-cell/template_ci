DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    FUNCTION `template`.`generate_nama_kelompok`(vKdKntr INT(2),vKdKec INT(11),vKdKel VARCHAR(11))
    RETURNS VARCHAR(100)
    /*LANGUAGE SQL
    | [NOT] DETERMINISTIC
    | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }
    | SQL SECURITY { DEFINER | INVOKER }
    | COMMENT 'string'*/
    BEGIN
	    DECLARE vInKntr VARCHAR(5);
	    DECLARE vInKec VARCHAR(25);
	    DECLARE vInKel VARCHAR(25);
	    DECLARE vThn VARCHAR(2);
	    DECLARE nNoUrut INT (4);
	    
	    SELECT initial INTO vInKntr FROM view_prm_master_data_kode_kantor WHERE kode_kantor = vKdKntr;
	    SELECT nama_kecamatan INTO vInKec FROM `prm_master_kecamatan` WHERE id_kecamatan = vKdKec;
	    SELECT nama_kelurahan INTO vInKel FROM `prm_master_kelurahan` WHERE id_kelurahan = vKdKel;
	    SELECT DATE_FORMAT(CURDATE(),'%y') INTO vThn;
	    
	    SELECT IF(id_kelurahan = '','0',COUNT(id_kelurahan)) + 1 INTO nNoUrut  FROM `prm_master_kelompok`
		WHERE id_kelurahan = vKdKel;
	    
	   # SELECT IFNULL(MAX(ABS(id)),0) + 1 into nNoUrut  FROM prm_master_kelompok;
	    
	    RETURN CONCAT(vInKntr,"-",vInKec,"-",vInKel,"-",nNoUrut);
    END$$

DELIMITER ;