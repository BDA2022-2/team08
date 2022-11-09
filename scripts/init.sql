-- DB 생성 ("team08")
CREATE DATABASE team08 default CHARACTER SET UTF8;

-- 사용자 추가 (user id: "team08", password: "team08")
GRANT ALL PRIVILEGES ON team08.* TO team08@localhost IDENTIFIED BY 'team08';
USE team08;

-- Tables 생성
CREATE TABLE `team08`.`mtn_location` (
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mtn_name` VARCHAR(25) NULL,
  `mtn_height` DECIMAL(5,1) UNSIGNED NULL,
  `mtn_y_coord` DECIMAL(8,2) UNSIGNED NULL,
  `mtn_x_coord` DECIMAL(8,2) UNSIGNED NULL,
  `height_form` CHAR(3) NULL,
  `height_origin` CHAR(4) NULL,
  `map_no` INT UNSIGNED NULL,
  `map_name` CHAR(5) NULL,
  `mtn_degree_e` DECIMAL(10,6) NULL,
  `mtn_degree_n` DECIMAL(10,6) NULL,
  `mtn_address` TEXT NULL,
  `mtn_rate` DECIMAL(3,2) UNSIGNED NULL);

CREATE TABLE `team08`.`mtn_weather` (
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `spot_no` INT NULL,
  `obsrt_mntn_nm` VARCHAR(10) NULL,
  `obsrt_spot_arcd` INT NULL,
  `ten_meter_tprt` DECIMAL(2,1) NULL,
  `ten_meter_hmdt` DECIMAL(5,2) NULL,
  `ten_meter_wndrc` DECIMAL(5,2) NULL,
  `ten_meter_wdsp` DECIMAL(2,1) NULL,
  `elrt_rain_qntt` DECIMAL(2,1) NULL,
  `wght_rain_qntt` DECIMAL(5,2) NULL,
  `spot_atmpr` DECIMAL(5,2) NULL,
  `esrf_tmprt` DECIMAL(2,1) NULL,
  `two_meter_tprt` DECIMAL(2,1) NULL,
  `two_meter_hmdt` DECIMAL(5,2) NULL,
  `two_meter_wndrc` DECIMAL(5,2) NULL,
  `two_meter_wdsp` DECIMAL(2,1) NULL,
  `occrr_dtm` INT NULL,
  `df_obsrt_tm_date` DATE NULL,
  `df_obsrt_tm_time` TIME NULL);

CREATE TABLE `team08`.`mtn_accident` (
  `report_date` DATE NULL,
  `report_time` TIME NULL,
  `accident_spot` TEXT NULL,
  `accident_spot_code` VARCHAR(25) NULL,
  `accident_type` VARCHAR(6) NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

CREATE TABLE `team08`.`landslide_fc` (
  `fc_id` INT NULL,
  `administ_district` TINYTEXT NULL,
  `fc_type` VARCHAR(10) NULL,
  `start_date` DATE NULL,
  `start_time` TIME NULL,
  `end_date` DATE NULL,
  `end_time` TIME NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

CREATE TABLE `team08`.`fire_fc` (
  `fc_id` DATE NULL,
  `fc_time` TIME NULL,
  `address` TEXT NULL,
  `effective_humidity` DECIMAL(3,1) UNSIGNED NULL,
  `wind_speed` DECIMAL(2,1) UNSIGNED NULL,
  `fc_grade` VARCHAR(5) NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

CREATE TABLE `team08`.`restaurants` (
  `rest_name` VARCHAR(25) NULL,
  `road_base_add` TINYTEXT NULL,
  `address` TINYTEXT NULL,
  `status_code` INT UNSIGNED NULL,
  `status` VARCHAR(5) NULL,
  `menu_type` VARCHAR(20) NULL,
  `menu` VARCHAR(20) NULL,
  `tel` INT UNSIGNED NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

CREATE TABLE `team08`.`plant_species` (
  `id` INT NULL,
  `kr_name` VARCHAR(45) NOT NULL PRIMARY KEY,
  `sci_name` VARCHAR(65) NULL,
  `kr_family_name` VARCHAR(45) NULL,
  `sci_family_name` VARCHAR(65) NULL,
  `blossom` INT UNSIGNED NULL,
  `falloff` INT UNSIGNED NULL,
  `is_protected` CHAR(1) NULL,
  `is_special` CHAR(1) NULL,
  `size` TINYTEXT NULL);

CREATE TABLE `team08`.`safety_rules` (
  `safety_rule` TINYTEXT NULL,
  `season_spring` TINYTEXT NULL,
  `season_summer` TINYTEXT NULL,
  `season_fall` TINYTEXT NULL,
  `season_winter` TINYTEXT NULL,
  `frst_aid_frostbite` TINYTEXT NULL,
  `frst_aid_hypothermy` TINYTEXT NULL,
  `frst_aid_sunstroke` TINYTEXT NULL,
  `frst_aid_venom` TINYTEXT NULL,
  `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY);

  CREATE TABLE `team08`.`user` (
  `user_id` VARCHAR(25) NOT NULL,
  `user_pw` VARCHAR(25) NOT NULL,
  `user_name` VARCHAR(25) NOT NULL,
  `recent_search` VARCHAR(50) NULL,
  PRIMARY KEY (`user_id`));

CREATE TABLE `team08`.`mtn_review` (
  `review_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mtn_name` VARCHAR(25) NULL,
  `user_id` VARCHAR(25) NULL,
  `visit_date` DATE NULL,
  `mtn_rate` INT NULL,
  `comment` TEXT NULL,
  `created` TIMESTAMP default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE ON DELETE SET NULL
);

CREATE TABLE `team08`.`img` (
  `img_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `url` TINYTEXT NULL
);

-- csv 파일 넣기
LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/mtn_location.csv"
INTO TABLE mtn_location FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/mtn_weather.csv"
INTO TABLE mtn_weather FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/mtn_accident.csv"
INTO TABLE mtn_accident FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/landslide_fc.csv"
INTO TABLE landslide_fc FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/fire_fc.csv"
INTO TABLE fire_fc FIELDS TERMINATED BY "," IGNORE 1 LINES; 

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/restaurants.csv"
INTO TABLE restaurants FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/plant_species.csv" 
INTO TABLE plant_species FIELDS TERMINATED BY ","
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/safety_rules.csv" 
INTO TABLE safety_rules FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/img.csv" 
INTO TABLE img FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

-- 데이터 확인
select * from mtn_location;
select * from mtn_weather;
select * from mtn_accident;
select * from landslide_fc;
select * from fire_fc;
select * from restaurants;
select * from plant_species;
select * from safety_rules;
select * from img;