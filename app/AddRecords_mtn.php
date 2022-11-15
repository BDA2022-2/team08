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
					<h1 class="heading" data-aos="fade-up"><?php echo $_POST['mtn_name']; ?> 산행기록 적기</h1>

					<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
						<ol class="breadcrumb text-center justify-content-center">			
							<li class="breadcrumb-item "><a href="MyRecords.php">나의 산행기록</a></li>
							<li class="breadcrumb-item "><a href="AddRecords.php">산행기록 적기</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<div class="section">
		<div class="container">
			<div class="col-lg-8">
				<?php
					if(array_key_exists('search_with_name', $_POST)) {
						search_with_name_func();
					}
					function search_with_name_func() {
						$db_host="localhost";
						$db_user="team08";
						$db_password="team08";
						$db_name="team08";
					
						//connect to the database
						$link=mysqli_connect($db_host,$db_user,$db_password,$db_name);
						
						//check connection
						if($link===false){
							echo "<script>alert('ERROR: Could not connect');</script>";
							echo "<script>location.replace('./AddRecords.php');</script>";
						}else{
							$mtn_name=trim($_POST['mtn_name']);
							$sql="SELECT `mtn_name`,`idx` FROM `team08`.`mtn_location` WHERE `mtn_name`= '$mtn_name'";
							
							/* Start transaction */
							mysqli_begin_transaction($link);
							try{
							$result=mysqli_query($link,$sql);
							$rowcount=mysqli_num_rows($result);
					
							if (!$mtn_name){
								echo "<script>alert('산 이름을 입력해 주세요');</script>";
								echo "<script>location.replace('./AddRecords.php');</script>";
								exit;
							}
					
							if($result&&$rowcount>0){
								echo "<script>alert('$mtn_name 에 대한 총 $rowcount 개의 검색 결과를 찾았습니다');</script>";
								$sql2 ="CREATE OR REPLACE VIEW `same_mtn` AS SELECT `idx`,`mtn_address` FROM `team08`.`mtn_location` WHERE `mtn_name`= '$mtn_name'";
								$res2 = mysqli_query($link,$sql2);

								$sql3 ="SELECT * FROM same_mtn";
								$res3 = mysqli_query($link,$sql3);
								echo "<br/>".$mtn_name." 산행 기록";
								echo "<br/>"."$mtn_name 에 대한 총 $rowcount 개의 동일한 검색 결과를 찾았습니다";
								echo "<br/>"."=============================================";
								
								

								if ($res3) {
									while ($newArray = mysqli_fetch_array($res3,MYSQLI_ASSOC)) {
										$same_idx = $newArray['idx'];
										$mtn_address = $newArray['mtn_address'];
										echo "<br/>"."> 산 아이디: ".$same_idx.", 위치: ".$mtn_address;
									}
									echo "<br/>"."=============================================";
								} 
								else {
									printf("Could not retrieve records: %s\n",mysqli_error($link));
									echo "<script>location.replace('./AddRecords.php');</script>";
									exit;
								}
									
							}else if($rowcount<1){
								echo "<script>alert('ERROR: $mtn_name 을 찾을 수 없습니다');</script>";
								echo "<script>location.replace('./AddRecords.php');</script>";
								exit;
							}else{
								echo "<script>alert('ERROR: Could not execute query');</script>";
								echo "<script>location.replace('./AddRecords.php');</script>";
							}
					
						}
						} catch (mysqli_sql_exception $exception) {
							mysqli_rollback($link);
						
							throw $exception;
						}
						//close statement
						mysqli_free_result($result);
						//close connection
						mysqli_close($link);
					}
				?>
			</div>
		</div>

		<div class="container">
			<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
				<form method="post" action="AddRecords_all.php">
						<div class="row">
							<div class="col-6 mb-3">
								산아이디
								<input type="text" name="mtn_idx" class="form-control" placeholder="상단의 산 아이디를 참고해 주세요">
							</div>
							<div class="col-6 mb-3">
								별점
								<select id="별점" name="mtn_rate" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
							<div class="col-6 mb-3">
								방문날짜
								<input type="date" name="visit_date" class="form-control" placeholder="visited date">
							</div>
							<div class="col-12 mb-3">
								<textarea name="comment" cols="30" rows="7" class="form-control" placeholder="weather comment"></textarea>
							</div>

							<div class="col-12">
								<input type="submit" value="Add Record" class="btn btn-primary">
								<input type="reset" value="Reset" class="btn btn-primary">
							</div>

							<div>
								<input type = "hidden" name = "mtn_name" value ="<?php echo $_POST['mtn_name']; ?>" />
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>

	<div class="site-footer">
		<div class="container">

			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3>Contact</h3>
						<address>43 Raymouth Rd. Baltemoer, London 3910</address>
						<ul class="list-unstyled links">
							<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
							<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
							<li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3>Sources</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3>Links</h3>
						<ul class="list-unstyled links">
							<li><a href="#">Our Vision</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>

						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
					<!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </p>

          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->


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
	<footer include-html="html/footer.html"></footer>
   <script defer>
       includeHTML();
     </script>
  </body>
  </html>