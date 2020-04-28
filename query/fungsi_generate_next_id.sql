DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    FUNCTION `template`.`generate_next_id`(cDb VARCHAR(50),cTable VARCHAR(50))
    RETURNS INT(11)
    BEGIN
	DECLARE i INT;
	SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_schema=cdb AND table_name=ctable INTO i;
	RETURN i;
    END$$

DELIMITER ;