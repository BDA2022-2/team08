<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
    <link rel="stylesheet" href="css/ny_style.css" />
    <script src="js/includeHTML.js"></script>

    <title>우산 &mdash; 산악 날씨 종합 정보 시스템</title>
  </head>
  <body>
    <?php
      include 'html/nav.php'
    ?>

    <div class="hero">
      <div class="hero-slide">
        <?php
          $mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
          if(mysqli_connect_errno()){
              printf("Connection failed: %s\n", mysqli_connect_error());
              exit();
          }
          else {
            #이미지 받아오기
              $sql = "SELECT url FROM img ORDER BY rand();";
              $res = mysqli_query($mysqli, $sql);
              if($res) {
                  $i = 0;
                  while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                    echo '<div
                          class="img overlay"
                          style="background-image: url('.$row["url"].')"
                        ></div>';
                    $i = $i + 1;
                    if ($i == 3) break;
                  }
              }
              else {
                  printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
              }
              mysqli_free_result($res);
          }
        ?>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
            <h1 class="heading">
              <img src="images/logo_main.png" class="img-icon">
            </h1>
            <div class="row justify-content-center align-items-center">
              <div
                onclick="location.href='near1.php'"
                class="col-6 col-lg-5"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <div class="box-feature">
                  <img src="images/mountain.svg" class="img-icon">
                  <p><a href="near1.php" class="learn-more"><h3>근처 산 둘러보기</h3></a></p>
                </div>
              </div>
              <div
                onclick="location.href='search.php'"
                class="col-6 col-lg-5"
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <div class="box-feature">
                  <img src="images/location.svg" class="img-icon">
                  <p><a href="search.php" class="learn-more"><h3>산 검색하기</h3></a></p>
                </div>
              </div>
            </div>
            <span class="text-white">
              <?php
                $rule_arr = [];
                $sql = "SELECT * FROM safety_rules ORDER BY rand();";
                $res = mysqli_query($mysqli, $sql);
                if($res) {
                    while($row = mysqli_fetch_array($res,MYSQLI_NUM)){
                      $i = 0;
                      while($i<count($row)-1)
                      {
                        if ($row[$i]) {
                          array_push($rule_arr, $row[$i]);
                        }
                        $i = $i + 1;
                      }
                    }
                }
                else {
                    printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
                }
                mysqli_free_result($res);
                mysqli_close($mysqli);
                echo $rule_arr[rand()%count($rule_arr)];
              ?>
            </span>
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
  </body>
</html>
