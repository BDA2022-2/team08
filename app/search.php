<?php
include("./dbconn.php");
?>
<html>
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

    <link rel="stylesheet" href="css/search.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/includeHTML.js"></script>

    <title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
  </head>
  <body>
    <div include-html="html/nav.html"></div>
    <script>
      includeHTML();
    </script>

    <!--image부분-->
    <div
      class="hero page-inner overlay"
      style="
        background-image: url('https://images.unsplash.com/photo-1438786657495-640937046d18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');
      "
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">산 검색하기</h1>
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
                  지역이나 검색어로 산을 찾을 수 있습니다.
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!--상세 검색 페이지-->
    <div class="section">
      <div class="container">
        <form action="./result.php" method="GET">
          <div class="search_boxes">
            <span>지역별</span>
            <div class="search_box">
              <select name="region_1depth_name" id="" onchange="categoryChange(this)">
                <option value="">시/도 선택</option>
                <option value="all">전체</option>
                <option value="seoul">서울</option>
                <option value="busan">부산</option>
                <option value="daegu">대구</option>
                <option value="incheon">인천</option>
                <option value="gwangju">광주</option>
                <option value="daejeon">대전</option>
                <option value="ulsan">울산</option>
                <option value="sejong">세종</option>
                <option value="gyeonggi">경기</option>
                <option value="gangwon">강원</option>
                <option value="chungbuk">충북</option>
                <option value="chungnam">충남</option>
                <option value="jeonbuk">전북</option>
                <option value="jeonnam">전남</option>
                <option value="gyeongbuk">경북</option>
                <option value="gyeongnam">경남</option>
                <option value="jeju">제주</option>
              </select>
            </div>
            <div class="search_box">
              <select name="region_2depth_name" id="state">
                <option value="">시/군/구 선택</option>
              </select>
            </div>

            <span>산 검색</span>
            <input type="text" name="mtn_name" class="form-control px-4" />
            <button type="submit" class="btn btn-primary">검색</button>
          </div>
        </form>
  
        <?php
          $mtn_name = "ㄱ산";
          $mtn_index = "234";
          //[sql]최근 검색한 산 $recent_search 불러오기
          echo '<div>최근에 검색한 산</div>';
          echo '<a href="./info.php?mtn_name='.$mtn_name.'&mtn_index='.$mtn_index.'">'.$mtn_name.'</a>';
          //[sql]최근 방문한 산 $recent_visit 불러오기
          echo '<div>최근에 방문한 산</div>';
          echo '<a href="./info.php?mtn_name='.$mtn_name.'&mtn_index='.$mtn_index.'">'.$mtn_name.'</a>';
        ?>

        <h2>현재 사용자들이 많이 방문한 산</h2>
          <ol>
            <?php
              $mtn_name = "ㄱ산";
              $mtn_index = "234";
              $i=1;
              while($i<6) {
                //방문 $i위 산 mtn_name, mtn_idx 불러오기
                echo '<li><a href="./info.php?mtn_name='.$mtn_name.'&mtn_index='.$mtn_index.'">'.$mtn_name.'</a></li>';
                $i++;
              }
            ?>
            </ol>
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
    <script src="js/aos.js"></script>\

    <script src="js/search.js"></script>

    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>