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
	<title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
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
					<h1 class="heading" data-aos="fade-up">계정 수정</h1>

					<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
						<ol class="breadcrumb text-center justify-content-center">
							<li class="breadcrumb-item "><a href="makeAccount.php">계정 생성</a></li>
							<li class="breadcrumb-item "><a href="changeAccount.php">계정 수정</a></li>
							<li class="breadcrumb-item "><a href="deleteAccount.php">계정 삭제</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<form action="changeAccount_user.php" method="post">
						<div class="row">
							<div class="col-12 mb-3">
								<text>가입시 입력한 아이디</text>
								<input type="text" class="form-control" name="user_id" placeholder="아이디">
							</div>

							<div class="col-6 mb-3">
								<text>이전 이름</text>
								<input type="text" class="form-control" name="before_name" placeholder="before_name">
							</div>
							
							<div class="col-6 mb-3">
								<text>바꿀 이름</text>
								<input type="text" class="form-control" name="after_name" placeholder="after_name">
							</div>
							
							<div class="col-6 mb-3">
								<text>이전 비밀번호</text>
								<input type="text" class="form-control" name="before_pw" placeholder="before_pw">
							</div>

							<div class="col-6 mb-3">
								<text>바꿀 비밀번호</text>
								<input type="text" class="form-control" name="after_pw" placeholder="after_pw">
							</div>

							<div class="col-12">
								<input type="submit" value="회원정보 수정하기" class="btn btn-primary">
								<input type="reset" value="Reset" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- /.untree_co-section -->

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