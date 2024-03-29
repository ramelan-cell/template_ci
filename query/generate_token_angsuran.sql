DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    FUNCTION `template`.`generate_token_angsuran`(dTglTrans DATETIME, cIDCM INT(11), nTotal DOUBLE(20,2), nJmlRec INT(11))
    RETURNS CHAR(6)
    /*LANGUAGE SQL
    | [NOT] DETERMINISTIC
    | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }
    | SQL SECURITY { DEFINER | INVOKER }
    | COMMENT 'string'*/
    BEGIN
	RETURN UPPER(RIGHT(MD5(CONCAT(dTglTrans, cIDCM, 3825000,45)),6));
    END$$

DELIMITER ;