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
    <!-- result.php로 넘어오는 변수들 -->
    <?php
      // 세션에서 user_id 받아오기
      // $status = session_status();
      // if($status == PHP_SESSION_NONE){
      //     //There is no active session
      //     session_start();
      // }else
      // if($status == PHP_SESSION_DISABLED){
      //     //Sessions are not available
      // }else
      // if($status == PHP_SESSION_ACTIVE){
      //     //Destroy current and start new one
      //     session_destroy();
      //     session_start();
      // }
      // $user_id = $_SESSION['ss_id'];

      // result.php로 넘어오는 변수들
      $mtn_name = $_GET['mtn_name'];
      $region_1depth_name = $_GET['region_1depth_name'];
      $region_2depth_name = $_GET['region_2depth_name'];
      if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
      } else {$sort = "idx";}
      if (isset($_GET['filter_rate'])) {
        $filter_rate = 3.5;
      } else {$filter_rate = 0;}
      if (isset($_GET['filter_visitor'])) {
        $filter_visitor = 5;
      } else {$filter_visitor = 0;}
    ?>

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
                  <?php echo $user_name ?>님이 검색하신 결과입니다.
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- 결과 보여주는 영역 -->
    <div class="section">
      <div class="container">
        <div class="col-lg-6">
          <?php
          echo"<h2 class=\"font-weight-bold text-primary heading\">".$region_1depth_name." ".$region_2depth_name." ".$mtn_name."</h2>";
          ?>
        </div>
        <!-- 필터링 버튼 & 정렬 드롭다운박스 -->
        <div class="filter-and-sort">
          <form id="undo" class="undo" method="get" <?php echo (($filter_rate==0 and $filter_visitor==0) ? "style=\"display: none\"" : "");?>>
            <?php
              echo "<input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\" />";
              echo "<input type=\"hidden\" name=\"region_1depth_name\" value=\"".$region_1depth_name."\" />";
              echo "<input type=\"hidden\" name=\"region_2depth_name\" value=\"".$region_2depth_name."\" />";
              echo "<input type=\"hidden\" name=\"sort\" value=\"".$sort."\" />"
            ?>
            <span class="icon-undo me-2"></span>
            <button
              type="button"
              onClick = "this.form.submit();"
            >초기화
            </button>
          </form>
          <form id="filter-rate" class="filter-rate" method="get">
            <?php
              echo "<input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\" />";
              echo "<input type=\"hidden\" name=\"region_1depth_name\" value=\"".$region_1depth_name."\" />";
              echo "<input type=\"hidden\" name=\"region_2depth_name\" value=\"".$region_2depth_name."\" />";
              echo "<input type=\"hidden\" name=\"sort\" value=\"".$sort."\" />"
            ?>
            <input
              <?php echo (array_key_exists('filter_rate',$_GET) ? "style=\"background-color: #f1eee9; color: #a37551; border: 1px solid #f1eee9;\"" : "");?>
              type="submit"
              name="filter_rate"              
              value="방문 평점 3.5 이상"
            />
          </form>
          <form id="filter-visitor" class="filter-visitor" method="get">
            <?php
              echo "<input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\" />";
              echo "<input type=\"hidden\" name=\"region_1depth_name\" value=\"".$region_1depth_name."\" />";
              echo "<input type=\"hidden\" name=\"region_2depth_name\" value=\"".$region_2depth_name."\" />";
              echo "<input type=\"hidden\" name=\"sort\" value=\"".$sort."\" />"
            ?>
            <input
              <?php echo (array_key_exists('filter_visitor',$_GET) ? "style=\"background-color: #f1eee9; color: #a37551; border: 1px solid #f1eee9;\"" : "");?>
              type="submit"
              name="filter_visitor"              
              value="방문 리뷰 5개 이상"
            />
          </form>
          <form id="sort" class="sort" method="get">
            <?php
            echo "<input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\" />";
            echo "<input type=\"hidden\" name=\"region_1depth_name\" value=\"".$region_1depth_name."\" />";
            echo "<input type=\"hidden\" name=\"region_2depth_name\" value=\"".$region_2depth_name."\" />";
            echo ($filter_rate ? "<input type=\"hidden\" name=\"filter_rate\" value=\"".$filter_rate."\" />" : "");
            echo ($filter_visitor ? "<input type=\"hidden\" name=\"filter_rate\" value=\"".$filter_visitor."\" />" : "");
            ?>
            <select name="sort" onChange="this.form.submit();">
              <option value="idx">-- 정렬 --</option>
              <option value="avg_rate desc" <?php echo ($sort == "avg_rate desc" ? "selected" : "");?>>방문 평점 순</option>
              <option value="cnt desc" <?php echo ($sort == "cnt desc" ? "selected" : "");?>>방문 리뷰 순</option>
            </select>
          </form>
        </div>

        <!-- 산 카드 리스트 -->        
        <div class="property-item" style="margin-top:120px; margin-bottom:120px">
          <!-- db에서 데이터 출력 -->
          <?php
          $mysqli = mysqli_connect("localhost","team08","team08","team08");
          if (mysqli_connect_errno()){
            printf("Connect failed");
            exit();
          } else {
            $sql1 = "
            UPDATE user 
            SET search_mtn = '".$mtn_name."', search_location1 = '".$region_1depth_name."', search_location2 = '".$region_2depth_name."'
            WHERE user_id = '".$user_id."';
            ";
            $res1 = mysqli_query($mysqli, $sql1);

            $sql2 = "
            SELECT idx, mtn_name, mtn_degree_e, mtn_degree_n, mtn_address, mtn_height, ifnull(avg_rate,0) AS avg_rate, ifnull(cnt,0) AS cnt, DENSE_RANK() OVER (ORDER BY ".$sort.") AS ranking
            FROM mtn_location
            LEFT JOIN (SELECT mtn_idx, avg(mtn_review.mtn_rate) AS avg_rate, count(*) AS cnt 
              FROM mtn_review
              GROUP BY mtn_idx) AS agg
            ON agg.mtn_idx = mtn_location.idx
            WHERE mtn_name like '%".$mtn_name."%'
            AND mtn_address like '%".$region_1depth_name."%'
            AND mtn_address like '%".$region_2depth_name."%'
            AND ifnull(avg_rate,0) >= ".$filter_rate."
            AND ifnull(cnt,0) >= ".$filter_visitor.";
            ";
            $res2 = mysqli_query($mysqli, $sql2);

            if ($res2) {
              while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                $mtn_index = $newArray['idx'];
                $mtn_name = $newArray['mtn_name']; 
                $mtn_degree_e = $newArray['mtn_degree_e']; 
                $mtn_degree_n = $newArray['mtn_degree_n']; 
                $mtn_address = $newArray['mtn_address']; 
                $mtn_height = $newArray['mtn_height']; 
                $mtn_rate = number_format($newArray['avg_rate'],2);
                $review_count = $newArray['cnt'];
                $ranking = $newArray['ranking'];

                echo "
                <div class=\"property-content\" style=\"margin-bottom:120px\">
                  <div class=\"price mb-2\"><span>".$mtn_name."</span></div>
                  <div>
                    <span class=\"d-block mb-2 text-black-50\">".$mtn_address."</span>
                    <div class=\"specs d-flex mb-4\">
                      <span class=\"d-block d-flex align-items-center me-3\">
                        <span class=\"icon-arrow-circle-up me-2\"></span>
                        <span class=\"caption\">".$mtn_height."m</span>
                      </span>
                      <span class=\"d-block d-flex align-items-center\" style=\"margin-right:20px;\">
                        <span class=\"icon-star2 me-2\"></span>
                        <span class=\"caption\" style=\"margin-left:-4px;\">".$mtn_rate."점</span>
                      </span>
                      <span class=\"d-block d-flex align-items-center\">
                        <span class=\"icon-pencil me-2\"></span>
                        <span class=\"caption\">".$review_count."개</span>
                      </span>
                    </div>
                    <form action=\"info.php\" method=\"get\">
                    <input type=\"hidden\" name=\"mtn_index\" value=\"".$mtn_index."\"/>
                    <input type=\"hidden\" name=\"mtn_name\" value=\"".$mtn_name."\"/>
                      <input
                        class=\"btn btn-primary py-2 px-3\"
                        type=\"submit\"
                        value=\"See details\"
                      />
                    </form>
                  </div>
                </div>
                ";
              }
            } else {
              printf("error");
            }
          }
          //mysqli_free_result($res1);
          mysqli_free_result($res2);
          mysqli_close($mysqli);
          ?>
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
