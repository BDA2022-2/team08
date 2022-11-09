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
    <link rel="stylesheet" href="css/near.css" />
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
            <h1 class="heading" data-aos="fade-up">근처 산 찾기</h1>
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
                  현재 위치와 가까운 산들을 방문해보세요!
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- 카카오 REST API로 사용자 좌표>주소 변경 -->
    <?php
    require("coord2address.php");
    ?>
    <!-- db에서 해당 주소값으로 근처 산 검색 -->
    <?php
    $mysqli = mysqli_connect("localhost","team08","team08","team08");
    if (mysqli_connect_errno()) {
      printf("Connect failed");
      exit();
    } else {
      $sql = "select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, mtn_rate from mtn_location
      where mtn_address like '%".$region_1depth_name."%'
      and mtn_address like '%".$region_2depth_name."%';";
      $res = mysqli_query($mysqli, $sql);
      
      if ($res) {
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          $mtn_index = $newArray['idx']; 
          $mtn_name = $newArray['mtn_name']; 
          $mtn_degree_e = $newArray['mtn_degree_e']; 
          $mtn_degree_n = $newArray['mtn_degree_n']; 
          $mtn_address = $newArray['mtn_address']; 
          $mtn_height = $newArray['mtn_height']; 
          $mtn_rate = $newArray['mtn_rate'];
          echo "<div>".$mtn_index."</div>";
          echo "<div>".$mtn_name."</div>";
          echo "<div>".$mtn_degree_e."</div>";
          echo "<div>".$mtn_degree_n."</div>";
          echo "<div>".$mtn_address."</div>";
          echo "<div>".$mtn_height."</div>";
          echo "<div>".$mtn_rate."</div>";
        }
      } else {
        printf("error");
      }
    }
    ?>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <!-- 지도 api-->
              <div
                id="map"
                style="
                  width: 90%;
                  height: 450px;
                  margin-top: 13px;
                  margin-left: 30px;
                  position: relative;
                "
              ></div>
              <script
                type="text/javascript"
                src="//dapi.kakao.com/v2/maps/sdk.js?appkey=15e943182d95f8be236a9aceddd8c896&libraries=clusterer,services,drawing"
              ></script>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- 산 리스트 카드 -->
            <div
              class="property-item"
              style="margin-top: 120px; margin-bottom: 120px;"
            >
              <!-- db에서 해당 주소값으로 근처 산 검색, 출력 -->
              <?php
              $mysqli = mysqli_connect("localhost","team08","team08","team08");
              if (mysqli_connect_errno()) {
                printf("Connect failed");
                exit();
              } else {
                $sql = "select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, mtn_rate from mtn_location
                where mtn_address like '%".$region_1depth_name."%'
                and mtn_address like '%".$region_2depth_name."%';";
                $res = mysqli_query($mysqli, $sql);
                
                if ($res) {
                  while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    $mtn_index = $newArray['idx']; 
                    $mtn_name = $newArray['mtn_name']; 
                    $mtn_degree_e = $newArray['mtn_degree_e']; 
                    $mtn_degree_n = $newArray['mtn_degree_n']; 
                    $mtn_address = $newArray['mtn_address']; 
                    $mtn_height = $newArray['mtn_height']; 
                    $mtn_rate = $newArray['mtn_rate'];
                    echo "<div class=\"property-content\" style=\"margin-bottom:120px\">
                    <div class=\"price mb-2\"><span>".$mtn_name."</span></div>
                    <div>
                      <span class=\"d-block mb-2 text-black-50\">
                        ".$mtn_address."
                      </span>
                      <div class=\"specs d-flex mb-4\">
                        <span class=\"d-block d-flex align-items-center me-3\">
                          <span class=\"icon-bed me-2\"></span>
                          <span class=\"caption\">".$mtn_height."m</span>
                        </span>
                        <span class=\"d-block d-flex align-items-center\">
                          <span class=\"icon-bath me-2\"></span>
                          <span class=\"caption\">".$mtn_rate."</span>
                        </span>
                      </div>
                      <!-- info.php에 mtn_name, mtn_index 보내기 -->
                      <form action=\"info.php\" method=\"get\">
                        <input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\" />
                        <input type=\"hidden\" name=\"mtn_index\" value=\"".$mtn_index."\" />
                        <input
                          class=\"btn btn-primary py-2 px-3\"
                          type=\"submit\"
                          value=\"See details\"
                        />
                      </form>
                    </div>
                  </div>";
                  }
                } else {
                  printf("error");
                }
              }
              ?>
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

    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/map.js"></script>
  </body>
</html>
