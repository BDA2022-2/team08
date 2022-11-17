-- 'root'로 로그인
mysql -u root

-- DB 생성 ("team08")
CREATE DATABASE team08 default CHARACTER SET UTF8;

-- 사용자 추가 (user id: "team08", password: "team08")
GRANT ALL PRIVILEGES ON team08.* TO 'team08'@'localhost' IDENTIFIED BY 'team08';

----------------------------------------------------------------------------------
-- 'team08'로 로그인
mysql -u team08 -p

-- encoding 상태 체크
status

-- 데이터베이스 선택
USE team08;

-- run 'create.sql'
source C:\xampp\htdocs\team08\scripts\create.sql
show tables;

-- run 'insert.sql'
source C:\xampp\htdocs\team08\scripts\insert.sql

----------------------------------------------------------------------------------
-- 'dump.sql' 생성
exit;
mysqldump -u team08 -p team08 > C:\xampp\htdocs\team08\scripts\dump.sql

----------------------------------------------------------------------------------
-- 'team08'로 로그인
mysql -u team08 -p

-- 데이터베이스 선택
USE team08;

-- run 'drop.sql'
source C:\xampp\htdocs\team08\scripts\drop.sql

----------------------------------------------------------------------------------
-- import 'dump.sql'
exit;
mysql -u team08 -p team08 < C:\xampp\htdocs\team08\scripts\dump.sql