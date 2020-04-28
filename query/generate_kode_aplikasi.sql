DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    FUNCTION `template`.`generate_kode_aplikasi`(vKodeKantor VARCHAR(4),cKodePaket CHAR (3))
    RETURNS VARCHAR(20)
    BEGIN
	DECLARE vINITIAL VARCHAR(5);
	DECLARE nonya INT(4) DEFAULT 0;
	SELECT IFNULL(MAX(ABS(RIGHT(id_aplikasi,5))),0) + 1 INTO nonya FROM `prm_aplikasi`
	WHERE YEAR(created_date)=YEAR(CURDATE()) AND MONTH(created_date)=MONTH(CURDATE())
	AND kode_kantor = vKodeKantor;
 
	RETURN CONCAT(cKodePaket,'-',vKodeKantor,'-',DATE_FORMAT(CURDATE(),'%y'),DATE_FORMAT(CURDATE(),'%m'),LPAD(nonya, 5,'00000'));
    END$$

DELIMITER ;