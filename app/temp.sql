  CREATE TABLE `team08`.`user` (
  `user_id` VARCHAR(25) NOT NULL,
  `user_pw` VARCHAR(25) NOT NULL,
  `user_name` VARCHAR(25) NOT NULL,
  `recent_search` VARCHAR(50) NULL,
  PRIMARY KEY (`user_id`));


  default charset=utf8;

DELETE FROM `team08`.`user`
WHERE user_id="1234";

INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`)
VALUES ('0000','0000','ADMIN');
INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`)
VALUES ('1234','1234','sujin');
INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`)
VALUES ('0823','0823','mutjin');
