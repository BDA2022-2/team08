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
    <?php
    include 'html/nav.php'
    ?>
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

    <!-- near1.php에서 geolocation으로 사용자 위치 좌표 받아와 near.php로 POST, php 변수로 저장 -->
    <!-- info.php에서 뒤로가기로 접근 시, near.php의 사용자 위치 좌표 유지를 위해 세션에 저장한 후, 세션 변수 사용 -->
    <?php
    if (isset($_POST['userLat'])) {
      $userLat = $_POST['userLat'];
      $_SESSION["userLat"] = $userLat;
    } else { // 뒤로가기로 접근시
      $userLat = $_SESSION["userLat"];
    }
    if (isset($_POST['userLon'])) {
      $userLon = $_POST['userLon'];
      $_SESSION["userLon"] = $userLon;
    } else { // 뒤로가기로 접근시
      $userLon = $_SESSION["userLon"];
    }
    ?>
    <!-- 카카오 REST API로 사용자 좌표>주소 변경 -->
    <?php
    $_POST['userLat'] = $userLat;
    $_POST['userLon'] = $userLon;
    include "coord2address.php";
    ?>
    <!-- db에서 해당 주소값으로 근처 산 검색 -->
    <?php
    $mysqli = mysqli_connect("localhost","team08","team08","team08");
    if (mysqli_connect_errno()) {
      printf("Connect failed");
      exit();
    } else {
      $sql = "select idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) as avg_rate, ifnull(cnt,0) as cnt
      from mtn_location
      left join (select mtn_idx, avg(mtn_review.mtn_rate) as avg_rate, count(*) as cnt
        from mtn_review
        group by mtn_idx) as agg
      on agg.mtn_idx = mtn_location.idx
      where mtn_address like '%".$region_1depth_name."%'
      and mtn_address like '%".$region_2depth_name."%';";
      $res = mysqli_query($mysqli, $sql);
      // 지도 위에 오버레이 올리기 위해 sql 실행 결과값을 php 배열 $positions에 저장.
      $positions = array();
      if ($res) {
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
          array_push($positions, [$newArray['idx'], $newArray['mtn_name'], $newArray['mtn_degree_e'], $newArray['mtn_degree_n'], $newArray['mtn_address'], $newArray['mtn_height'], $newArray['avg_rate'], $newArray['cnt']]);
        }
        //echo var_dump($positions);
      } else {
        printf("error");
      }
    }
    mysqli_free_result($res);
    mysqli_close($mysqli);
    ?>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <!-- 카카오 지도 api -->
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
              style="margin-top: 112px; margin-bottom: 120px;"
            >
              <!-- $positions arr에서 foreach로 값 출력 -->
              <?php
              foreach ($positions as $position) {
                $mtn_index = $position[0]; 
                $mtn_name = $position[1]; 
                $mtn_degree_e = $position[2]; 
                $mtn_degree_n = $position[3]; 
                $mtn_address = $position[4]; 
                $mtn_height = $position[5]; 
                $mtn_rate = number_format((float)$position[6],2);
                $review_count = (int) $position[7];                    
                printf('
                <div class="property-content" style="margin-bottom:45px">
                  <div class="price mb-2"><span>%s</span></div>
                  <div>
                    <span class="d-block mb-2 text-black-50">%s</span>
                    <div class="specs d-flex mb-4">
                      <span class="d-block d-flex align-items-center me-3">
                        <span class="icon-arrow-circle-up me-2"></span>
                        <span class="caption">%sm</span>
                      </span>
                      <span class="d-block d-flex align-items-center" style="margin-right:20px;">
                        <span class="icon-star2 me-2"></span>
                        <span class="caption" style="margin-left:-4px;">%s점</span>
                      </span>
                      <span class="d-block d-flex align-items-center">
                        <span class="icon-pencil me-2"></span>
                        <span class="caption">%d개</span>
                      </span>
                    </div>
                    <form action="info.php" method="post">
                    <input type="hidden" name="mtn_index" value="%d"/>
                    <input type="hidden" name="mtn_name" value="%s"/>
                      <input
                        class="btn btn-primary py-2 px-3"
                        type="submit"
                        value="See details"
                      />
                    </form>
                  </div>
                </div>
                ', $mtn_name, $mtn_address, $mtn_height, $mtn_rate, $review_count, $mtn_index, $mtn_name);
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
    <!-- 카카오 지도 표시 js script -->
    <script>
      const userLat = "<?php echo $userLat; ?>";
      const userLon = "<?php echo $userLon; ?>";
      const positions = <?php echo json_encode($positions); ?>;
      //console.log(positions);
      const userPosition = new kakao.maps.LatLng(userLat, userLon);
      // 지도 생성
      const mapContainer = document.getElementById("map");
      const mapOption = {
        center: new kakao.maps.LatLng(userLat, userLon),
        level: 7,
      };
      const map = new kakao.maps.Map(mapContainer, mapOption);
      // 사용자 위치 마커
      displayMarker(positions, userPosition);
      function displayMarker(positions, userPosition) {
        const marker = new kakao.maps.Marker({
          map: map,
          position: userPosition,
        });
        marker.setMap(map);
      }
      // 근처 산들 커스텀 오버레이
      for (let i = 0; i < positions.length; i++) {
        const content =
          '<div class="customoverlay">' +
          ` <form id="customoverlay_form" action="info.php" method="post">` +
          `   <input type="hidden" name="mtn_index" value = ${Number(positions[i][0])} />` +
          `   <input type="hidden" name="mtn_name" value = ${positions[i][1]} />` +
          " </form>" +
          ` <a href="javascript:submitAtag();">` +
          `   <span class="title">${positions[i][1]}</span>` +
          " </a>" +
          "</div>";
        const latlng = new kakao.maps.LatLng(Number(positions[i][3]), Number(positions[i][2]));
        const customOverlay = new kakao.maps.CustomOverlay({
          map: map,
          position: latlng,
          content: content,
          yAnchor: 1,
        });
        customOverlay.setMap(map);
      }
      map.setCenter(userPosition);

      // form 제출 위한 js function
      function submitAtag(){
        const customoverlay_form = document.getElementById("customoverlay_form");
        customoverlay_form.submit();
      }
    </script>
    <!-- <script src="js/map.js"></script> -->
  </body>
</html>
