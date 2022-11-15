<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/includeHTML.js"></script>

    <title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
  </head>
  <body>
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
            <a href="index.html" class="logo m-0 float-start">
              <img
                src="images/logo_nav.png"
                alt="Image"
                object-fit="cover"
                height="40px"
              />
            </a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="admin_plant_insert.php">야생화 정보 생성하기</a></li>
              <li><a href="admin_rest_insert.php">음식점 정보 생성하기</a></li>
              <li><a href="admin_plant_delete.php">야생화 정보 삭제하기</a></li>
              <li><a href="admin_rest_delete.php">음식점 정보 삭제하기</a></li>
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <script>
      includeHTML();
    </script>
    <div
      class="hero page-inner overlay"
      style="
        background-image: url('https://images.unsplash.com/photo-1438786657495-640937046d18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');
      ">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">야생화 정보 생성하기</h1>
            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                </li>
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
            <form action="./insert_plant_data.php" method="GET">
              <div class="row">
                <input type="text" class="form-control" name="ID" placeholder="ID">
                <input type="text" class="form-control" name="kr_name" placeholder="국명">
                <input type="text" class="form-control" name="sci_name" placeholder="학명">
                <input type="text" class="form-control" name="kr_family_name" placeholder="과국명">
                <input type="text" class="form-control" name="sci_family_name" placeholder="과명">
                <input type="text" class="form-control" name="blossom" placeholder="개화기 시작(월)">
                <input type="text" class="form-control" name="falloff" placeholder="결실기(월)">
                <input type="text" class="form-control" name="is_protected" placeholder="보호식물여부(Y/N)">
                <input type="text" class="form-control" name="falloff" placeholder="특산식물여부(Y/N)">
                <input type="text" class="form-control" name="size" placeholder="크기 설명">
                <input type="submit" value="생성하기" class="btn btn-primary">               
              </div>
            </form>
          </div>
			</div>
		</div>
    <?php mysqli_close($mysqli); ?>

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

    <script src="js/search.js"></script>

    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>
