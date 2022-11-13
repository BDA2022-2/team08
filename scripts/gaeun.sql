-- near.php
-- mtn_location에 outer join으로 avg(mtn_rate) 같이 뽑기 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_address like '%".$region_1depth_name."%'
and mtn_address like '%".$region_2depth_name."%';


-- result.php
-- 검색결과 통합 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by ".$sort.") as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_name like '%".$mtn_name."%'
and mtn_address like '%".$region_1depth_name."%'
and mtn_address like '%".$region_2depth_name."%'
and ifnull(avg_rate,0) >= ".$filter_rate."
and ifnull(cnt,0) >= ".$filter_visitor.";


-- 검색결과 기본값 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by idx) as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_name like '%%'
and mtn_address like '%%'
and mtn_address like '%%'
and ifnull(avg_rate,0) >= 0
and ifnull(cnt,0) >= 0;


-- 검색결과 정렬: "avg_rate" / "cnt"만 다름.
-- 검색결과 정렬: 별점순 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by "avg_rate desc") as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_name like '%%'
and mtn_address like '%%'
and mtn_address like '%%'
and ifnull(avg_rate,0) >= 0
and ifnull(cnt,0) >= 0;

-- 검색결과 정렬: 방문자순 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by "cnt desc") as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_name like '%%'
and mtn_address like '%%'
and mtn_address like '%%'
and ifnull(avg_rate,0) >= 0
and ifnull(cnt,0) >= 0;


-- 검색결과 필터: avg_rate, cnt 값만 다름.
-- 검색결과 필터: 별점 3.5 이상 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by "idx") as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_location.mtn_name like '%%'
and mtn_address like '%%'
and mtn_address like '%%'
and ifnull(avg_rate,0) >= 3.5
and ifnull(cnt,0) >= 0;

-- 검색결과 필터: 방문리뷰 5개 이상 (완)
select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt, dense_rank() over (order by "idx") as ranking
from mtn_location
left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt 
	from mtn_review
	group by mtn_idx) as agg
on agg.mtn_idx = mtn_location.idx
where mtn_location.mtn_name like '%%'
and mtn_address like '%%'
and mtn_address like '%%'
and ifnull(avg_rate,0) >= 0
and ifnull(cnt,0) >= 5;