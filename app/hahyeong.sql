-- login_check.php
SELECT * FROM user WHERE user_id = '.$id_input.'

-- search.php
SELECT * FROM user WHERE user_id = '.$user_id.'
SELECT * FROM mtn_review WHERE user_id = '.$user_id.' ORDER BY visit_date DESC LIMIT 1
SELECT *, COUNT(*), RANK() OVER (ORDER BY COUNT(review_id) DESC) AS rank_num FROM mtn_review WHERE visit_date BETWEEN DATE_ADD(NOW(),INTERVAL 1 WEEK) AND NOW() GROUP BY mtn_idx

-- delete_search.php
UPDATE user SET search_mtn = '', search_location1 = '', search_location2 = '' WHERE user_id = '.$del.'

-- insert_plant_data.php
INSERT INTO plant_species VALUES ('.$id.', '.$kr_name.', '.$sci_name.', '.$kr_family_name.', '.$sci_family_name.', '.$blossom.', '.$falloff.', '.$is_protected.', '.$is_special.', '.$size.')

-- insert_rest_data.php
INSERT INTO restaurants VALUES ('.$rest_name.', '.$road_base_add.', '.$address.', '.$status_code.', '.$status.', '.$menu_type.', '.$menu.', '.$tel.', '.$id.')

-- delete_plant_data.php
SELECT * FROM plant_species WHERE id = '.$search_flower_id.'

-- delete_rest_data.php
SELECT * FROM restaurants WHERE idx = '.$search_rest_id.'