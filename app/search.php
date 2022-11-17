<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}
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
  <?php
    include 'html/nav.php'
  ?>

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

    <!--상세 검색(지역1, 지역2, 검색어)-->
    <div class="section">
      <div class="container">
        <form action="./result.php" method="POST">
          <div class="search_boxes">
            <span>지역별</span>
            <div class="search_box">
              <select name="region_1depth_name" id="" onchange="categoryChange(this)">
                <option value="">시/도 선택</option>
                <option value="서울">서울</option>
                <option value="부산">부산</option>
                <option value="대구">대구</option>
                <option value="인천">인천</option>
                <option value="광주">광주</option>
                <option value="대전">대전</option>
                <option value="울산">울산</option>
                <option value="세종">세종</option>
                <option value="경기">경기</option>
                <option value="강원">강원</option>
                <option value="충북">충북</option>
                <option value="충남">충남</option>
                <option value="전북">전북</option>
                <option value="전남">전남</option>
                <option value="경북">경북</option>
                <option value="경남">경남</option>
                <option value="제주">제주</option>
              </select>
            </div>
            <div class="search_box">
              <select name="region_2depth_name" id="state">
                <option value="">시/군/구 선택</option>
              </select>
            </div>
            <br><br>
            <div class="search_mtn">
              <input type="text" name="mtn_name" class="form-control px-4" id="input_text" placeholder="검색어를 입력하세요."/>
              <button type="submit" class="btn btn-primary">검색</button>
            </div>
          </div>
        </form>

        <!-- 최근 검색어 및 최근 방문 산 -->
        <?php
          $sql2 = "SELECT * FROM user WHERE user_id = '".$user_id."'";
          $res2 = mysqli_query($mysqli, $sql2);
          if($res2) {
            $user_info = mysqli_fetch_array($res2,MYSQLI_ASSOC);
            $mtn_name = $user_info["search_mtn"];
            $region_1depth_name = $user_info["search_location1"];
            $region_2depth_name = $user_info["search_location2"];
          }
          else {
            printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
          }
        ?>

        <div>최근 검색어</div>
        <form name="recent_search">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="region_1depth_name"/>
          <input type="hidden" name="region_2depth_name"/>
        </form>

        <a href="javascript:goPage1('<?php echo $mtn_name?>', '<?php echo $region_1depth_name?>', '<?php echo $region_2depth_name?>');"><?php echo $region_1depth_name." ".$region_2depth_name." ".$mtn_name?></a>
        <a href="./delete_search.php?del=<?php echo $user_id?>"> X</a>
        

        <script>

        function goPage1(mtn_name, region_1depth_name, region_2depth_name = 0) {
          var f = document.recent_search;
          f.mtn_name.value = mtn_name;
          f.region_1depth_name.value = region_1depth_name;
          f.region_2depth_name.value = region_2depth_name;
          f.action = "./result.php"
          f.method = "post"
          f.submit();
        };
        </script>

        <?php
          $sql3 = "SELECT * FROM mtn_review WHERE user_id = '".$user_id."' ORDER BY visit_date DESC LIMIT 1";
          $res3 = mysqli_query($mysqli, $sql3);
          if($res3) {
            $review_info = mysqli_fetch_array($res3,MYSQLI_ASSOC);
            $mtn_name = $review_info['mtn_name'];
            $mtn_index = $review_info['mtn_idx'];
          }
          else {
            printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
          }
        ?>

        <div>최근에 방문한 산</div>
        <form name="recent_visit">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
        </form>

        <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');"><?php echo $mtn_name?></a>

        <script>
          function goPage2(mtn_name, mtn_index = 0) {
            var f = document.recent_visit;
            f.mtn_name.value = mtn_name;
            f.mtn_index.value = mtn_index;
            f.action = "./info.php"
            f.method = "post"
            f.submit();
          };
        </script>

        <h3>사용자들이 가장 많이 방문한 산</h3>
          <?php
            $sql4 ="SELECT *, COUNT(*), RANK() OVER (ORDER BY COUNT(review_id) DESC) AS rank_num FROM mtn_review WHERE visit_date BETWEEN NOW() AND DATE_ADD(NOW(),INTERVAL 1 WEEK) GROUP BY mtn_idx";
            $res4 = mysqli_query($mysqli, $sql4);
            $mtn_rank = mysqli_fetch_array($res4,MYSQLI_ASSOC);
            $mtn_name = $mtn_rank["mtn_name"];
            $mtn_index = $mtn_rank["mtn_idx"];
          ?> 
          <form name="visit_trend">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
          </form>
          <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');">1. <?php echo $mtn_name?></a>
          
          <?php
            $mtn_rank = mysqli_fetch_array($res4,MYSQLI_ASSOC);
            $mtn_name = $mtn_rank["mtn_name"];
            $mtn_index = $mtn_rank["mtn_idx"];
          ?>
          <form name="visit_trend">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
          </form>
          <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');">2. <?php echo $mtn_name?></a>

          <?php
            $mtn_rank = mysqli_fetch_array($res4,MYSQLI_ASSOC);
            $mtn_name = $mtn_rank["mtn_name"];
            $mtn_index = $mtn_rank["mtn_idx"];
          ?>
          <form name="visit_trend">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
          </form>
          <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');">3. <?php echo $mtn_name?></a>

          <?php
            $mtn_rank = mysqli_fetch_array($res4,MYSQLI_ASSOC);
            $mtn_name = $mtn_rank["mtn_name"];
            $mtn_index = $mtn_rank["mtn_idx"];
          ?>
          <form name="visit_trend">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
          </form>
          <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');">4. <?php echo $mtn_name?></a>

          <?php
            $mtn_rank = mysqli_fetch_array($res4,MYSQLI_ASSOC);
            $mtn_name = $mtn_rank["mtn_name"];
            $mtn_index = $mtn_rank["mtn_idx"];
          ?>
          <form name="visit_trend">
          <input type="hidden" name="mtn_name"/>
          <input type="hidden" name="mtn_index"/>
          </form>
          <a href="javascript:goPage2('<?php echo $mtn_name?>', '<?php echo $mtn_index?>');">5. <?php echo $mtn_name?></a>

      </div>
    </div>
    <?php
      mysqli_free_result($res2);
      mysqli_free_result($res3);
      mysqli_free_result($res4);
      mysqli_close($mysqli);
    ?>

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

    <!-- <script>
      function submitAtag(){
        const b= document.getElementById("b");
          b.submit();
          for (let i = 0; i < positions.length; i++) {
          const content =
            '<div class="a">' +
            ` <form id="b" action="result.php" method="post">` +
            `   <input type="hidden" name="region_1depth_name" value = $region_1depth_name />` +
            `   <input type="hidden" name="region_2depth_name" value = $region_2depth_name />` +
            `   <input type="hidden" name="mtn_name" value = $mtn_name />` +
            " </form>" +
            ` <a href="javascript:submitAtag();">` +
            `   <span class="title">$region_1depth_name $region_2depth_name mtn_name</span>` +
            " </a>" +
            "</div>";
          }
      }
    </script> -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>\

    <script src="js/search.js"></script>

    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>