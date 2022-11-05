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
      - 필터 버튼 누르면, 조건에 맞게 목록 보여주고, 버튼은 선택된 상태로 유지 (css로 표현할 듯)
      - select 값 누르면, 조건에 맞게 목록 보여주고, option 선택된 상태로 유지
      - 둘 다 선택되면, 어떻게 구성할지 생각해봐야 하는데 ...
    -->

    <!-- 더미 데이터 -->
    <?php
    $dummy_mtn_name = "도봉산";
    $dummy_mtn_height = "399.9m";
    $dummy_mtn_address = "대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉";
    $dummy_mtn_rate = "3.5";
    $keyword = "도봉산";
    ?>

    <!-- 결과 보여주는 영역 -->
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
          <form id="filter-rate" class="filter-rate" method="post">
            <input
              type="submit"
              name="filter_rate"              
              value="방문 평점 3.5 이상"
            />
          </form>
          <form id="filter-visitor" class="filter-visitor" method="post">
            <input
              type="submit"
              name="filter_visitor"              
              value="최근 방문 1K 이상"
            />
          </form>
          <form id="sort" class="sort" method="post">
            <select name="sort" onChange="this.form.submit();">
              <option value="sort_rating">별점 순</option>
              <option value="sort_visitor">방문자 순</option>
            </select>
          </form>
        </div>

        <!-- 디폴트 -->
        <?php
            if(!array_key_exists('filter_rate',$_POST) and !array_key_exists('filter_visitor',$_POST)){
            ?>
            <!-- 산 카드 리스트 -->
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>디폴트 화면</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>도봉산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>도봉산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
        <?php
            }
            ?>

        <!-- '방문 평점 3.5 이상' 필터링 결과 -->
        <?php
            if(array_key_exists('filter_rate',$_POST)){
            ?>
            <!-- 산 카드 리스트 -->
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>3.5 이상 필터</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>도봉산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>도봉산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
        <?php
            }
            ?>
        <!-- '최근 방문 1K 이상' 필터링 결과 -->
        <?php
            if(array_key_exists('filter_visitor',$_POST)){
            ?>
            <!-- 산 카드 리스트 -->
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>방문 1K이상 필터</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>인왕산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
            <div class="property-item" style="margin-top:120px; margin-bottom:120px">
              <div class="property-content">
                <div class="price mb-2"><span>인왕산</span></div>
                <div>
                  <span class="d-block mb-2 text-black-50">
                    대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉
                    </span>
                  <span class="city d-block mb-3">대한민국 서울특별시 도봉구 도봉동 산31 도봉산 선인봉</span>
                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">1234.56m</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">4.5</span>
                    </span>
                  </div>
                  <form action="info.php" method="get">
                    <input type="hidden" name="mtnname" value="도봉산"/>
                    <input
                      class="btn btn-primary py-2 px-3"
                      type="submit"
                      value="See details"
                    />
                  </form>
                </div>
              </div>
            </div>
        <?php
            }
            ?>
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
