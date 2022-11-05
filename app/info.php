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

	<title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
</head>
<body>

	<div include-html="html/nav.html"></div>
    <script>
      includeHTML();
    </script>

<div class="hero overlay" style="background-image: url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');">

<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-9 text-center mt-5">
			<h1 class="heading" data-aos="fade-up">설악산</h1>

			<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
				<ol class="breadcrumb text-center justify-content-center">
					<li class="breadcrumb-item text-white">★★★★☆</li>
					<li class="breadcrumb-item active text-white-50" aria-current="page">최근 방문 수 1234</li>
				</ol>
			</nav>
			<div
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <div class="box-feature">
                  <p><h3 class="text-start">현재 날씨</h3></p>
				  <div class="row">
				  <?php
                  $SKY = "1";
                  $TMP = "11";
				  $TMN = "0";
				  $TMX = "13";
                  $RN1 = "0";
                  $REH = "46";
				  $POP = "20";
				  $PCP = "0";
                  $PTY = "0";
                  $WSD = "1";
                  if ($PTY == "0") {
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
					  printf('<div class="col-8 col-lg-4 text-black">
				  			<br>
							기온 %s℃(%s℃/%s℃)<br>
							습도 %s%%<br>
							</div>
							<div class="col-8 col-lg-4 text-black">
							<br>
							풍속 %sm/s<br>
							강수 확률 %smm
						  </div>', $TMP, $TMX, $TMN, $REH, $WSD, $PCP);
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
					else if($PTY=="2") {
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
					printf('<div class="col-8 col-lg-4">
				  			<br>
							기온 %s℃(%s℃/%s℃)<br>
							습도 %s%%<br>
							</div>
							<div class="col-8 col-lg-4 text-black">
							<br>
							풍속 %sm/s<br>
							강수량 %s%%
						  </div>', $TMP, $TMX, $TMN, $REH, $WSD, $POP);
				  }
                  ?>
				  </div>
                </div>
              </div>
		</div>
	</div>
</div>
</div>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">날씨 기반 안전 정보</h2>
				</div>
				<div class="col-8 col-lg-4"  data-aos="fade-up" data-aos-delay="500">
					<div class="box-feature">
						<h3 class="mb-3">산사태</h3>
						<div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
							<div class="counter-wrap mb-5 mb-lg-0">
								<span class="caption text-black-50">발생 횟수</span>
								<span class="number"><span class="countup text-primary">7191</span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-8 col-lg-4"  data-aos="fade-up" data-aos-delay="400">
					<div class="box-feature">
						<h3 class="mb-3">산불</h3>
						<div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
					<div class="counter-wrap mb-5 mb-lg-0">
					<span class="caption text-black-50">발생 횟수</span>
						<span class="number"><span class="countup text-primary">7191</span></span>
					</div>
				</div>
					</div>
				</div>
				<div class="col-8 col-lg-4"  data-aos="fade-up" data-aos-delay="600">
					<div class="box-feature">
						<h3 class="mb-3">산악 사고</h3>
						<div class="chartWrap">
  
						  <div class="chart">
						    <div class="chart-bar" data-deg="50"></div>
						    <div class="chart-bar" data-deg="95"></div>
						    <div class="chart-bar" data-deg="200"></div>
						    <div class="chart-bar" data-deg="15"></div>
						  </div>
						  
						</div>
					</div>
				</div>	
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

							<div class="property-item">

								<a class="img-fluid">
									<img src="https://mblogthumb-phinf.pstatic.net/20130703_21/lucky21_1372831705463jzptt_JPEG/%B9%CC%B1%B9%BD%C7%BB%F5%BB%EF8.JPG?type=w2" alt="Image" class="img-flower">
								</a>

								<div class="property-content">
									<div>
										<span class="city d-block mb-3">실새삼</span>
										<span class="d-block mb-2 text-black-50">메꽃과</span>
										<span class="d-block mb-2 text-black-50">길이 50cm 내외이다.</span>
									</div>
								</div>
							</div> <!-- .item -->

							<div class="property-item">

								<a class="img-fluid">
									<img src="https://mblogthumb-phinf.pstatic.net/20130703_21/lucky21_1372831705463jzptt_JPEG/%B9%CC%B1%B9%BD%C7%BB%F5%BB%EF8.JPG?type=w2" alt="Image" class="img-flower">
								</a>

								<div class="property-content">
									<div>
										<span class="city d-block mb-3">실새삼</span>
										<span class="d-block mb-2 text-black-50">메꽃과</span>
										<span class="d-block mb-2 text-black-50">길이 50cm 내외이다.</span>
									</div>
								</div>
							</div> <!-- .item -->

							<div class="property-item">

								<a class="img-fluid">
									<img src="https://mblogthumb-phinf.pstatic.net/20130703_21/lucky21_1372831705463jzptt_JPEG/%B9%CC%B1%B9%BD%C7%BB%F5%BB%EF8.JPG?type=w2" alt="Image" class="img-flower">
								</a>

								<div class="property-content">
									<div>
										<span class="city d-block mb-3">실새삼</span>
										<span class="d-block mb-2 text-black-50">메꽃과</span>
										<span class="d-block mb-2 text-black-50">길이 50cm 내외이다.</span>
									</div>
								</div>
							</div> <!-- .item -->

							<div class="property-item">

								<a class="img-fluid">
									<img src="https://mblogthumb-phinf.pstatic.net/20130703_21/lucky21_1372831705463jzptt_JPEG/%B9%CC%B1%B9%BD%C7%BB%F5%BB%EF8.JPG?type=w2" alt="Image" class="img-flower">
								</a>

								<div class="property-content">
									<div>
										<span class="city d-block mb-3">실새삼</span>
										<span class="d-block mb-2 text-black-50">메꽃과</span>
										<span class="d-block mb-2 text-black-50">길이 50cm 내외이다.</span>
									</div>
								</div>
							</div> <!-- .item -->
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
					<div class="item">
						<div class="testimonial">
							<h3 class="h5 text-primary mb-3">띵호와 식당</h3>
							<p class="text-black">중식</p>
							<blockquote>
								대표 메뉴 | 옛날짬뽕,삼선짬뽕<br>
								강원도 인제군 인제읍 상동리 258-4<br>
							</blockquote>
							<p class="text-black-50">전화번호) 334618582</p>
						</div>
					</div>

					<div class="item">
						<div class="testimonial">
							<h3 class="h5 text-primary mb-3">띵호와 식당</h3>
							<p class="text-black">중식</p>
							<blockquote>
								대표 메뉴 | 옛날짬뽕,삼선짬뽕<br>
								강원도 인제군 인제읍 상동리 258-4<br>
							</blockquote>
							<p class="text-black-50">전화번호) 334618582</p>
						</div>
					</div>

					<div class="item">
						<div class="testimonial">
							<h3 class="h5 text-primary mb-3">띵호와 식당</h3>
							<p class="text-black">중식</p>
							<blockquote>
								대표 메뉴 | 옛날짬뽕,삼선짬뽕<br>
								강원도 인제군 인제읍 상동리 258-4<br>
							</blockquote>
							<p class="text-black-50">전화번호) 334618582</p>
						</div>
					</div>

					<div class="item">
						<div class="testimonial">
							<h3 class="h5 text-primary mb-3">띵호와 식당</h3>
							<p class="text-black">중식</p>
							<blockquote>
								대표 메뉴 | 옛날짬뽕,삼선짬뽕<br>
								강원도 인제군 인제읍 상동리 258-4<br>
							</blockquote>
							<p class="text-black-50">전화번호) 334618582</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<footer include-html="html/footer.html"></footer>
	<script defer>
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
	<script src="js/chart.js"></script>
  </body>
  </html>
