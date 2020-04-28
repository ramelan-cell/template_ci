DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    FUNCTION `template`.`generate_kode_kelompok`(pKdKantor VARCHAR(10))
    RETURNS VARCHAR(30)
    /*LANGUAGE SQL
    | [NOT] DETERMINISTIC
    | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }
    | SQL SECURITY { DEFINER | INVOKER }
    | COMMENT 'string'*/
    BEGIN
	DECLARE vINITIAL VARCHAR(5);
	DECLARE nonya INT(4) DEFAULT 0;
	SELECT IFNULL(MAX(ABS(RIGHT(kode,4))),0) + 1 INTO nonya FROM prm_master_kelompok
	WHERE YEAR(created_date)=YEAR(CURDATE())
	AND kode_kantor = pKdKantor;
 
	RETURN CONCAT(YEAR(CURDATE()),'-',pKdKantor,'-',LPAD(nonya, 4,'0000'));
    END$$

DELIMITER ;