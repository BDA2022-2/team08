-- csv 파일 넣기
LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/mtn_location.csv"
INTO TABLE mtn_location FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/spot_no.csv" 
INTO TABLE spot_no FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/mtn_weather_time.csv"
INTO TABLE mtn_weather FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/mtn_accident.csv"
INTO TABLE mtn_accident FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/landslide_fc.csv"
INTO TABLE landslide_fc FIELDS TERMINATED BY "," IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/fire_fc.csv"
INTO TABLE fire_fc FIELDS TERMINATED BY "," IGNORE 1 LINES; 

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/restaurants.csv"
INTO TABLE restaurants FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/plant_species.csv" 
INTO TABLE plant_species FIELDS TERMINATED BY ","
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/safety_rules.csv" 
INTO TABLE safety_rules FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/user.csv" 
INTO TABLE user FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/mtn_review.csv" 
INTO TABLE mtn_review FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/team08/data/img.csv" 
INTO TABLE img FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;