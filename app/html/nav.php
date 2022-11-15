<?php
	session_start();
	$login = false;
	if (isset($_SESSION["ss_id"])) {
		$login = TRUE;
		$user_id = $_SESSION["ss_id"];
		$user_name = $_SESSION["ss_name"];#마지막에 수정
	}
?>

<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
	<div class="container">
				<div class="menu-bg-wrap">
					<div class="site-navigation">
						
						<a href="index.php" class="logo m-0 float-start">
							<img src="images/logo_nav.png" alt="Image" object-fit="cover" height="40px">
						</a>

						<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="near1.php">근처 산 찾기</a></li>
							<li><a href="search.php">산 검색하기</a></li>
							<li class="has-children">
								<a href="MyRecords.php">산행 기록</a>
								<ul class="dropdown">
									<li><a href="MyRecords.php">나의 산행 기록</a></li>
									<li><a href="AddRecords.php">산행 기록 추가</a></li>
								</ul>
							</li>
							<?php
								if ($login) {
									echo '<li class="has-children">
											<a href="#">'.$user_name.'님</a>
											<ul class="dropdown">
												<li><a href="changeAccount.php">회원정보 수정</a></li>
												<li class="active"><a href="login.php">로그아웃</a></li>
												<li class="active"><a href="deleteAccount.php">회원 탈퇴</a></li>
											</ul>
										</li>';
								}
								else {
									echo '<li><a href="login.php">로그인하기</a></li>';
								}
							?>
						</ul>
						<a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
							<span></span>
						</a>

					</div>
				</div>
	</div>
</nav>
