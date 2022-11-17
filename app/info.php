<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="css/tiny-slider.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/ny_style.css">
    <script src="js/includeHTML.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
</head>
<body>

<?php
    include 'html/nav.php'
?>

<div class="hero page-inner overlay" style="background-image: url('https://images.unsplash.com/photo-1438786657495-640937046d18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80");">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-9 text-center mt-5">
				<h1 class="heading" data-aos="fade-up">
					<?php
						$mtn_name = $_POST['mtn_name'];
						$mtn_index = $_POST['mtn_index'];
						echo($mtn_name);
					?>
				</h1>

				<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
					<ol class="breadcrumb text-center justify-content-center h5">
						<?php
							$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
							if(mysqli_connect_errno()){
								printf("Connection failed: %s\n", mysqli_connect_error());
								exit();
							}
							else {
								#location 테이블에서 산 정보 받아오기
								$sql1 = "SELECT * FROM mtn_location WHERE mtn_name = '".$mtn_name."' AND idx = '".$mtn_index."'";
								$res1 = mysqli_query($mysqli, $sql1);
								if($res1) {	
									$mtn_info = mysqli_fetch_array($res1,MYSQLI_ASSOC);
									$mtn_degree_e = (string)round((float)$mtn_info['mtn_degree_e']);
									$mtn_degree_n = (string)round((float)$mtn_info['mtn_degree_n']);
									$mtn_addr = $mtn_info['mtn_address'];
									$mtn_rate = $mtn_info['mtn_rate'];
								}
								else {
									printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
								}
								#review 테이블에서 리뷰 갯수 받아오기
								$sql2 = "SELECT count(*) AS review_count FROM mtn_review 
										WHERE mtn_name = '".$mtn_name."' AND mtn_idx = '".$mtn_index."'
										AND visit_date BETWEEN DATE_ADD(NOW(),INTERVAL -1 WEEK ) AND NOW()";
								$res2 = mysqli_query($mysqli, $sql2);
								if($res2) {
									$mtn_review = mysqli_fetch_array($res2,MYSQLI_ASSOC);
									$review_num = $mtn_review['review_count'];
								}
								else {
									printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
								}
								mysqli_free_result($res1);
								mysqli_free_result($res2);
							}

							#산 별점 출력
							if ($mtn_rate){
								$star_n = (int)$mtn_rate;
								echo '<li class="breadcrumb-item text-white">';
								for($i=0; $i<$star_n; $i=$i+1)
									{
										echo '<span class="icon-star text-white"></span>';
									}
								if ((float)$mtn_rate - $star_n >= 0.5){
									echo '<span class="icon-star-half-o text-white"></span>';
									for($i=0; $i<5-$star_n-1; $i=$i+1)
									{
										echo '<span class="icon-star-o text-white"></span>';
									}
								}
								else {
									for($i=0; $i<5-$star_n; $i=$i+1)
									{
										echo '<span class="icon-star-o text-white"></span>';
									}
								}
								echo ' (' . $mtn_rate . ')</li>';
							}
							else {
								echo '<li class="breadcrumb-item text-white-50">';
								for($i=0; $i<5; $i=$i+1)
									{
										echo '<span class="icon-star text-white-50"></span>';
									}
								echo ' (0.0)</li>';
							}
							echo '<li class="breadcrumb-item text-white text-opacity-75" aria-current="page">최근 리뷰 수 ' . $review_num . '</li>';
						?>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="section features-1">
		<div class="container col-8">
			<div class="row mb-5 align-items-center">
				<div class="col-lg-6">
					<h2 class="font-weight-bold text-start heading mt-5 mb-3">
						<?php
							echo($mtn_name);
						?> 기상 정보
					</h2>
				</div>
                <div class="box-feature mt-3">
				  <div class="row my-3">
					<?php
						date_default_timezone_set('Asia/Seoul');
						
						// #더미데이터-1. 설악산
						$SKY = "1";
						$T1H = "11";
						$TMN = "0";
						$TMX = "13";
						$RN1 = "0";
						$REH = "36";
						$POP = "10";
						$PCP = "0";
						$PTY = "0";
						$WSD = "7.3";
						
						#더미데이터-2
						// $SKY = "3";
						// $T1H = "11";
						// $TMN = "0";
						// $TMX = "13";
						// $RN1 = "0";
						// $REH = "70";
						// $POP = "100";
						// $PCP = "20";
						// $PTY = "4";
						// $WSD = "7.3";

						// #API로 날씨 받아오는 코드
						// if ((int)date("i",time()) < 45){
						// 	$H = (int)(date("H",time()))-1;
						// 	if ($H == -1) {
						// 		$H = 23;
						// 		$base_date = date('Ymd', time()-86400);
						// 	}
						// 	else {
						// 		$H = (string)$H;
						// 		$base_date = date("Ymd",time());
						// 	}
						// }
						// else {
						// 	$H = date("H",time());
						// 	$base_date = date("Ymd",time());
						// }
						// $ch = curl_init();
						// $url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtFcst'; /*URL*/
						// $queryParams = '?' . urlencode('serviceKey') . '=PLM%2FTnlUf%2BzzHw3XZNg97c1vQJ3frT%2BRyoCkq%2FtEoFplOMT0KjvIgVZFPwVTyD%2F8GctHGBnwLXiaHNAm9ZSqLA%3D%3D'; /*Service Key*/
						// $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
						// $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
						// $queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
						// $queryParams .= '&' . urlencode('base_date') . '=' . urlencode($base_date); /**/
						// $queryParams .= '&' . urlencode('base_time') . '=' . urlencode(str_pad($H, 2, "0", STR_PAD_LEFT)."30"); /**/
						// $queryParams .= '&' . urlencode('nx') . '=' . urlencode($mtn_degree_n); /**/
						// $queryParams .= '&' . urlencode('ny') . '=' . urlencode($mtn_degree_e); /**/

						// curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
						// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						// curl_setopt($ch, CURLOPT_HEADER, FALSE);
						// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
						// $response = curl_exec($ch);

						// $object = simplexml_load_string($response);
						// $items = $object->body->items->item;
						// $tmp = "";
						// foreach ($items as $item) {
						// 	if ($tmp != (string)$item->category){
						// 		$tmp = (string)$item->category;
						// 		${$tmp} = (string)$item->fcstValue;
						// 	}
						// }
						
						// $H = date("H",time());

						// $ch = curl_init();
						// $url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst'; /*URL*/
						// $queryParams = '?' . urlencode('serviceKey') . '=PLM%2FTnlUf%2BzzHw3XZNg97c1vQJ3frT%2BRyoCkq%2FtEoFplOMT0KjvIgVZFPwVTyD%2F8GctHGBnwLXiaHNAm9ZSqLA%3D%3D'; /*Service Key*/
						// $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
						// $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
						// $queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
						// $queryParams .= '&' . urlencode('base_date') . '=' . urlencode($base_date); /**/
						// $queryParams .= '&' . urlencode('base_time') . '=' . urlencode("0200"); /**/
						// $queryParams .= '&' . urlencode('nx') . '=' . urlencode($mtn_degree_n); /**/
						// $queryParams .= '&' . urlencode('ny') . '=' . urlencode($mtn_degree_e); /**/
						
						// curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
						// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						// curl_setopt($ch, CURLOPT_HEADER, FALSE);
						// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
						// $response = curl_exec($ch);
						// curl_close($ch);
						
						// $object = simplexml_load_string($response);
						// $items = $object->body->items->item;
						// $TMX = "";
						// $TMN = "";
						// $POP = "";
						// $PCP = "";
						// $ctgs = ["TMX", "TMN", "POP", "PCP"];

						// foreach ($items as $item) {
						// 	$tmp = (string)$item->category;
						// 	$f_time = (string)$item->fcstTime;
						// 	if (in_array($tmp, $ctgs)){
						// 		if ($tmp == "POP" | $tmp == "PCP"){
						// 			if($f_time == $H."00"){
						// 				${$tmp} = (string)$item->fcstValue;
						// 			}
						// 		}
						// 		else{
						// 			${$tmp} = (string)$item->fcstValue;
						// 		}
						// 	}
						// 	if ($TMX & $TMN & $POP & $PCP) {
						// 		break;
						// 	}
						// }

						if ($PTY == "0" | $PCP == "강수없음") {
							if ($SKY == "1") {
								print('<div class="col-8 col-lg-4">
											<img src="images/sunny.svg" class="weather-icon svg">
										</div>'
									);
							}
							else if ($SKY == "3") {
								print('<div class="col-8 col-lg-4">
										<img src="images/clear-sky.svg" class="weather-icon svg">
									</div>'
									);
							}
							else {
								print('<div class="col-8 col-lg-4">
										<img src="images/cloud.svg" class="weather-icon svg">
									</div>'
									);
							}
							printf('<div class="col-8 col-lg-4 text-black text-start">
										<br>
										<h6>'.date("H:i",time()).' 현재</h6>
										<h1>%s℃</h1>
										<h5>최고 %s℃ / 최저 %s℃<h5>
									</div>
									<div class="h7 col-8 col-lg-4 text-black text-start">
										<br>
										<span class="icon-opacity text-black-50"></span> 현재 습도 %s%%<br><br>
										<span class="icon-toys text-black-50"></span> 현재 풍속 %sm/s<br><br> 
										<span class="icon-tint text-black-50"></span> &nbsp강수 확률 %s%%
									</div>', $T1H, $TMX, $TMN, $REH, $WSD, $POP);
						}
						else {
							if($PTY=="1") {
								print('<div class="col-8 col-lg-4">
										<img src="images/rainy-day.svg" class="weather-icon svg">
									</div>'
									);
							}
							else if($PTY=="2") {
								print('<div class="col-8 col-lg-4">
										<img src="images/sleet.svg" class="weather-icon svg">
									</div>'
									);
							}
							else if($PTY=="3") {
								print('<div class="col-8 col-lg-4">
										<img src="images/snowfall.svg" class="weather-icon svg">
									</div>'
									);
							}
							else {
								print('<div class="col-8 col-lg-4">
										<img src="images/downpour.svg" class="weather-icon svg">
									</div>'
									);
							}
							printf('<div class="col-8 col-lg-4 text-black text-start">
										<br>
										<h6>'.date("H:i",time()).' 현재</h6>
										<h1>%s℃</h1>
										<h5>최고 %s℃ / 최저 %s℃<h5>
									</div>
									<div class="h7 col-8 col-lg-4 text-black text-start">
										<br>
										<span class="icon-opacity text-black-50"></span> 현재 습도 %s%%<br><br>
										<span class="icon-toys text-black-50"></span> 현재 풍속 %sm/s<br><br> 
										<span class="icon-tint text-black-50"></span> &nbsp강수량&nbsp %s
									</div>', $T1H, $TMX, $TMN, $REH, $WSD, $PCP);
						}
					?>
				  </div>
                </div>	
			</div>
			<div class="row">

			</div>
		</div>
	</div>


	<section class="section">
		<div class="container">
			<div class="row section-counter">
				<div class="col-md-12">
					<h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">날씨 기반 안전 정보</h2>
				</div>
				<div class="col-8 col-lg-4 mt-4"  data-aos="fade-up" data-aos-delay="400">
					<div class="box-feature">
						<h5 class="mb-3">산사태 예보</h5>
						<span class="caption text-black text-opacity-75">발생 횟수</span>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="400">
							<div class="counter-wrap mb-5 mb-lg-0">
									<?php
										#DB 연결 - 산사태 예보 발생횟수 가져오기
										$mtn_addr_arr = explode(' ', $mtn_addr);
										$T1H_L = [(int)$T1H - 2.5, (int)$T1H + 2.5]; 
										$sql = "SELECT
													tb_l.fc_type,
													COUNT(*) AS cou
												FROM
													landslide_fc AS tb_l
												JOIN(
													SELECT
														t.df_obsrt_tm_date AS dat,
														t.df_obsrt_tm_time AS hou
													FROM
														(
															(
															SELECT
																*
															FROM
																mtn_weather
															WHERE
																spot_no IN(
																SELECT
																	spot_no
																FROM
																	spot_no
																WHERE
																	city LIKE '%".$mtn_addr_arr[1]."%'
															) AND two_meter_tprt BETWEEN ".$T1H_L[0]." AND ".$T1H_L[1]." AND two_meter_wdsp <= ".$WSD." AND two_meter_hmdt <= ".$REH." AND wght_rain_qntt <= ".$PCP."
														) AS t
														)
													GROUP BY
														t.df_obsrt_tm_date,
														t.df_obsrt_tm_time
												) AS tb_w
												ON
													ADDTIME(tb_w.dat, tb_w.hou) BETWEEN ADDTIME(tb_l.start_date,tb_l.start_time
													) AND ADDTIME(tb_l.end_date, tb_l.end_time)
												AND tb_l.administ_district LIKE '%".$mtn_addr_arr[1]."%'";
										$res = mysqli_query($mysqli, $sql);
										if($res) {
											while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
												$type = $row["fc_type"];
												$count = $row["cou"];
												echo '<div class="mb-5 mb-lg-0">
														<span class="number">
															<span class="h5 my-5 text-black text-opacity-75">'.$type.' </span><span class="countup text-primary">'.$count.'</span><span class="h5 text-black text-opacity-75">회</span></span>
													</div>';
											}
										}
										else {
											printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
										}
										mysqli_free_result($res);
									?>
							</div>
						</div>
					</div>
					<div class="box-feature">
						<h5 class="mb-3">산불 예보</h5>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="400">
							<div class="counter-wrap mb-5 mb-lg-0">
								<span class="caption text-black text-opacity-75">발생 횟수</span>
									<?php
										#DB 연결 - 산불 예보 발생횟수 가져오기
										$WS_L = [(int)$WSD, (int)$WSD + 0.9];
										$sql = "SELECT COUNT(*) as cou FROM fire_fc WHERE address LIKE '".$mtn_addr_arr[1]."%' AND effective_humidity >= ".$REH." AND wind_speed BETWEEN ".$WS_L[0]." AND ".$WS_L[1].";";
										$res = mysqli_query($mysqli, $sql);
										if($res) {
											while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
												$count = $row["cou"];
											}
										}
										else {
											printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
										}
										mysqli_free_result($res);
										echo '<span class="number"><span class="countup text-primary">'.$count.'</span><span class="caption h5 text-black text-opacity-75">회</span>
											 </span>';
									?>
							</div>
						</div>
					</div>
				</div>
				<?php
					# DB 연결 - 산악 사고 관련 데이터 받아오기
					$arr = [["Accident_type","count"]];
					$sql = "SELECT accident_type, MONTH(report_date) AS acci_month, COUNT(*) AS cou FROM mtn_accident WHERE accident_spot LIKE '".$mtn_addr_arr[1]."%' GROUP BY acci_month, accident_type WITH ROLLUP;";
					$res = mysqli_query($mysqli, $sql);
					if($res) {
						while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
							$accident_type = $row["accident_type"];
							$acci_month = $row["acci_month"];
							$count = $row["cou"];
							if ($accident_type == null) {
								$total = $count;
							}
							else if((string)$acci_month == (string)(date("m",time()))) {
								array_push($arr, [$accident_type, (int)$count]);
							};
						}
					}
					else {
						printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
					}
					mysqli_free_result($res);
					//$res = [["Accident_type","count"],["실족추락",125],["저체온증",56],["개인질환",37],["기타산악",71],["탈진탈수",49],["일반조난",11]];
				?>
				<div class="col-8 col-lg-8"  data-aos="fade-up" data-aos-delay="600">
						<div id="acc_piechart" style="width: 900px; height: 500px;"></div>
						<script type="text/javascript">
							google.load("visualization", "1", {packages:["corechart"]});
							google.setOnLoadCallback(drawChart);
							var now = new Date();
							var month = now.getMonth() + 1;
							function drawChart() 
							{
								var data = google.visualization.arrayToDataTable(
									<?php
										echo json_encode($arr);
									?>
								);
								var options = {
									title: month+'월 산악 사고',
									titleTextStyle: {color: '#00462a', fontName: "Work Sans", fontSize: '20', bold: 0,},
									pieHole: 0.3,
									pieSliceText: 'label',
									sliceVisibilityThreshold: .05,
									legend: 'none',
									colors: ['#F19292','#2D604C','#697F69','#A0937D','#F0BB62', '#EFE5C5']
								};
								var chart = new google.visualization.PieChart(document.getElementById("acc_piechart"));
								chart.draw(data, options);
							}
						</script>
				</div>
			</div>
	</section>

	<div class="section features-1">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-lg-6">
					<h2 class="font-weight-bold text-start heading">이맘때 피는 꽃</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="property-slider-wrap">
						<div class="property-slider">
							<?php
								#DB 연결 - 식생종 정보 받아오는 코드
								$sql = "SELECT * FROM plant_species WHERE blossom <= ".(int)date("m",time())." AND falloff >= ".(int)date("m",time())."";
								$res = mysqli_query($mysqli, $sql);
								if($res) {
									while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
										//url만 수정하기
										$url = $row["img_url"];
										$kr_name = $row["kr_name"];
										$kr_family_name = $row["kr_family_name"];
										$size = $row["size"];
										if ($kr_name){
											echo '<div class="property-item">
												<a class="img-fluid">
													<img src="'.$url.'" alt="Image" class="img-flower">
												</a>
												<div class="property-content">
													<div>
														<span class="city d-block mb-3">'.$kr_name.'</span>
														<span class="d-block mb-2 text-black-50">'.$kr_family_name.'</span>
														<span class="d-block mb-2 text-black-50">'.$size.'</span>
													</div>
												</div>
											</div>';
										}
									}
								}
								else {
									printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
								}
								mysqli_free_result($res);
							?>
						</div>
						<div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
							<span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
							<span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="section sec-testimonials">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-md-6">
					<h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">인근 식당</h2>
				</div>
				<div class="col-md-6 text-md-end">
					<div id="testimonial-nav">
						<span class="prev" data-controls="prev">Prev</span>
						
						<span class="next" data-controls="next">Next</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					
				</div>
			</div>
			<div class="testimonial-slider-wrap">
				<div class="testimonial-slider">
					<?php
						#DB 연결 - 식당 정보 받아오는 코드
						$sql = "SELECT * FROM restaurants WHERE address LIKE '".$mtn_addr_arr[1]." ".$mtn_addr_arr[2]." ".$mtn_addr_arr[3]."%'";
						$res = mysqli_query($mysqli, $sql);
						if($res) {
							while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
								$rest_name = $row["rest_name"];
								$menu_type = $row["menu_type"];
								if ($menu_type == null) {
									$menu_type = "기타";
								}
								$menu = $row["menu"];
								if ($menu == null) {
									$menu = " ";
								}
								if ($menu == '한식' | $menu == '일식' | $menu == '중식' | $menu == '양식') {
									$menu_type = $menu;
									$menu = " ";
								}
								$address = $row["address"];
								$tel = $row["tel"];
								echo '<div class="item">
										<div class="testimonial">
											<h3 class="h5 text-primary mb-3">'.$rest_name.'</h3>
											<p class="text-black">'.$menu_type.'</p>
											<blockquote>
												대표 메뉴 | '.$menu.'<br>
												'.$address.'<br>
											</blockquote>
											<p class="text-black-50">전화번호) 0'.$tel.'</p>
										</div>
									</div>';
							}
						}
						else {
							printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
						}
						mysqli_free_result($res);
						mysqli_close($mysqli);
					?>
				</div>
			</div>
		</div>
	</div>

	<footer include-html="html/footer.html"></footer>
	<script>
    	includeHTML();
  	</script>




    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
  </html>
