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

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/user.csv" 
INTO TABLE user FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE "C:/xampp/htdocs/data/mtn_review.csv" 
INTO TABLE mtn_review FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;