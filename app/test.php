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
    <link rel="stylesheet" href="css/result.css" />
    <script src="js/includeHTML.js"></script>

    <title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
  </head>
  <body>
    <div include-html="html/nav.html"></div>
    <script>
      includeHTML();
    </script>

    <div
      class="hero page-inner overlay"
      style="
        background-image: url('https://images.unsplash.com/photo-1438786657495-640937046d18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');
      "
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">검색 결과</h1>
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
                  검색하신 ~~~~ 결과입니다 교수님~~~~~
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- 
      플로우
      디폴트 : 검색어=도봉산, sort=별점순.
      if sort가 onchange : 검색어=도봉산, sort=방문자순.
    -->
    
    <?php
    $dummy_mtn_name = "도봉산";
    $dummy_mtn_height = "399.9m";
    $dummy_mtn_address = "대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉";
    $dummy_mtn_rate = "3.5";

    $keyword = "도봉산";

    ?>

    <div class="section">
      <div class="container">
        <div class="col-lg-6">
          <?php
          echo"<h2 class=\"font-weight-bold text-primary heading\">
          검색어: ".$keyword."</h2>";          
          ?>
        </div>

        <!-- 필터링 버튼 & 정렬 드롭다운박스 -->
        <div class="filter-and-sort">
          <form class="filter-rate" method="post">
            <input
              type="submit"
              name="filter_rate"
              id="filter-rate"
              value="방문 평점 3.5 이상"
            />
          </form>
          <form class="filter-visitor" method="post">
            <input
              type="submit"
              name="filter_visitor"
              id="filter-visitor"
              value="최근 방문 1K 이상"
            />
          </form>
          <!--
          <form class="sort" method="post">
            <select name="sort" onChange="this.form.submit();">
              <option value="sort_rating">별점 순</option>
              <option value="sort_visitor">방문자 순</option>
            </select>
          </form>
  -->
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

    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>
