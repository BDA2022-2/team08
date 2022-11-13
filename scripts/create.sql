-- DB 생성 ("team08")
CREATE DATABASE team08 default CHARACTER SET UTF8;

-- 사용자 추가 (user id: "team08", password: "team08")
GRANT ALL PRIVILEGES ON team08.* TO team08@localhost IDENTIFIED BY 'team08';
USE team08;

-- Tables 생성
CREATE TABLE `team08`.`mtn_location` (
  `idx` INT NOT NULL,
  `mtn_name` VARCHAR(25) NOT NULL,
  `mtn_height` DECIMAL(5,1) UNSIGNED NULL,
  `mtn_y_coord` DECIMAL(8,2) UNSIGNED NULL,
  `mtn_x_coord` DECIMAL(8,2) UNSIGNED NULL,
  `height_form` CHAR(3) NULL,
  `height_origin` CHAR(4) NULL,
  `map_no` INT UNSIGNED NULL,
  `map_name` CHAR(5) NULL,
  `mtn_degree_e` DECIMAL(13,10) NULL,
  `mtn_degree_n` DECIMAL(13,10) NULL,
  `mtn_address` TINYTEXT NULL,
  `mtn_rate` DECIMAL(3,2) UNSIGNED NULL,
  PRIMARY KEY (`idx`, `mtn_name`)
  );

CREATE TABLE `team08`.`spot_no` (
  `city` VARCHAR(10) NOT NULL,
  `mtn_name` VARCHAR(25) NOT NULL,
  `spot_no` INT NOT NULL PRIMARY KEY,  
  `mtn_degree_n` DECIMAL(10,6) NULL,
  `mtn_degree_e` DECIMAL(10,6) NULL,
  `mtn_altitude` INT NOT NULL
  );

CREATE TABLE `team08`.`mtn_weather` (
  `idx` INT NOT NULL PRIMARY KEY,
  `spot_no` INT NOT NULL,  
  `obsrt_mntn_nm` VARCHAR(10) NULL,
  `obsrt_spot_arcd` INT NULL,
  `ten_meter_tprt` DECIMAL(3,1) NULL,
  `ten_meter_hmdt` DECIMAL(5,2) NULL,
  `ten_meter_wndrc` DECIMAL(5,2) NULL,
  `ten_meter_wdsp` DECIMAL(2,1) NULL,
  `elrt_rain_qntt` DECIMAL(2,1) NULL,
  `wght_rain_qntt` DECIMAL(5,2) NULL,
  `spot_atmpr` DECIMAL(6,2) NULL,
  `esrf_tmprt` DECIMAL(3,1) NULL,
  `two_meter_tprt` DECIMAL(3,1) NULL,
  `two_meter_hmdt` DECIMAL(5,2) NULL,
  `two_meter_wndrc` DECIMAL(5,2) NULL,
  `two_meter_wdsp` DECIMAL(2,1) NULL,
  `occrr_dtm` BIGINT NULL,
  `df_obsrt_tm_date` DATE NULL,
  `df_obsrt_tm_time` TIME NULL,
  FOREIGN KEY (`spot_no`) REFERENCES `spot_no` (`spot_no`) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE `team08`.`mtn_accident` (
  `report_date` DATE NULL,
  `report_time` TIME NULL,
  `accident_spot` TEXT NULL,
  `accident_spot_code` VARCHAR(25) NULL,
  `accident_type` VARCHAR(6) NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  );

CREATE TABLE `team08`.`landslide_fc` (
  `fc_id` INT NULL,
  `administ_district` TINYTEXT NULL,
  `fc_type` VARCHAR(10) NULL,
  `start_date` DATE NULL,
  `start_time` TIME NULL,
  `end_date` DATE NULL,
  `end_time` TIME NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  );

CREATE TABLE `team08`.`fire_fc` (
  `fc_id` DATE NULL,
  `fc_time` TIME NULL,
  `address` TEXT NULL,
  `effective_humidity` DECIMAL(3,1) UNSIGNED NULL,
  `wind_speed` DECIMAL(2,1) UNSIGNED NULL,
  `fc_grade` VARCHAR(5) NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  );

CREATE TABLE `team08`.`restaurants` (
  `rest_name` VARCHAR(45) NULL,
  `road_base_add` TINYTEXT NULL,
  `address` TINYTEXT NULL,
  `status_code` INT UNSIGNED NULL,
  `status` VARCHAR(5) NULL,
  `menu_type` VARCHAR(20) NULL,
  `menu` VARCHAR(20) NULL,
  `tel` TEXT NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  );

CREATE TABLE `team08`.`plant_species` (
  `id` INT NULL,
  `kr_name` VARCHAR(45) NOT NULL PRIMARY KEY,
  `sci_name` TINYTEXT NULL,
  `kr_family_name` VARCHAR(45) NULL,
  `sci_family_name` VARCHAR(65) NULL,
  `blossom` INT UNSIGNED NULL,
  `falloff` INT UNSIGNED NULL,
  `is_protected` CHAR(1) NULL,
  `is_special` CHAR(1) NULL,
  `size` TINYTEXT NULL,
  `img_url` TINYTEXT NULL
  );

CREATE TABLE `team08`.`safety_rules` (
  `safety_rule` TEXT NULL,
  `season_spring` TEXT NULL,
  `season_summer` TEXT NULL,
  `season_fall` TEXT NULL,
  `season_winter` TEXT NULL,
  `frst_aid_frostbite` TEXT NULL,
  `frst_aid_hypothermy` TEXT NULL,
  `frst_aid_sunstroke` TEXT NULL,
  `frst_aid_venom` TEXT NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
  );

  CREATE TABLE `team08`.`user` (
  `user_id` VARCHAR(25) NOT NULL,
  `user_pw` VARCHAR(25) NOT NULL,
  `user_name` VARCHAR(25) NOT NULL,
  `search_mtn` VARCHAR(45) NULL,
  `search_location1` VARCHAR(45) NULL,
  `search_location2` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`)
  );

CREATE TABLE `team08`.`mtn_review` (
  `review_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mtn_idx` INT NOT NULL,
  `mtn_name` VARCHAR(25) NOT NULL,
  `user_id` VARCHAR(25) NULL,
  `visit_date` DATE NULL,
  `mtn_rate` INT NULL,
  `comment` TEXT NULL,
  `created` TIMESTAMP default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (`mtn_idx`, `mtn_name`) REFERENCES `mtn_location` (`idx`, `mtn_name`) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE `team08`.`img` (
  `img_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `url` TINYTEXT NULL
);

-- 인덱스 생성
CREATE INDEX mtn_loc_idx ON mtn_location (mtn_name, mtn_address);