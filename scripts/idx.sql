-- 인덱스 생성
CREATE INDEX mtn_loc_idx ON mtn_location (mtn_name, mtn_address);

-- 인덱스 확인
SHOW INDEX FROM mtn_location;

-- 인덱스 삭제
ALTER TABLE mtn_location DROP INDEX mtn_loc_idx;

-- 인덱스 타는지 확인
explain
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by idx) as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_name like '%도봉산%'
and mtn_address like '%서울특별시%'
and mtn_address like '%도봉구%'
and ifnull(avg_rate,0) >= 0
and ifnull(cnt,0) >= 0;
