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
	<link rel="stylesheet" href="css/style.css">

	<script src="js/includeHTML.js"></script>
	<title>Property &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
</head>
<body>
<?php
    include 'html/nav.php'
?>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg');">

		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-9 text-center mt-5">
					<h1 class="heading" data-aos="fade-up">산행 기록 추가</h1>

					<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
						<ol class="breadcrumb text-center justify-content-center">			
							<li class="breadcrumb-item "><a href="MyRecords.php">나의 산행 기록</a></li>
							<li class="breadcrumb-item "><a href="AddRecords.php">산행 기록 추가</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<form action="AddRecords_mtn.php" method="post">
						<div class="row">
							<div class="col-12 mb-3">
								산이름
								<input type="text" name="mtn_name" class="form-control" placeholder="OO산">
							</div>
							
							<div class="col-12">
								<input type="submit" name="search_with_name" value="산 이름으로 검색" class="btn btn-primary">
								<input type="reset" value="Reset" class="btn btn-primary">
							</div>
						</div>
					</form>
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
   <script defer>
       includeHTML();
     </script>
  </body>
  </html>