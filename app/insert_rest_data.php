<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

$rest_name = $_POST['rest_name'];
$road_base_add = $_POST['road_base_add'];
$address = $_POST['address'];
if($_POST['status'] == "Y") {
    $status_code = '1';
    $status = "영업";
} else {
    $status_code = '0';
    $status = "폐업";
}
$menu_type = $_POST['menu_type'];
$menu = $_POST['menu'];
$tel = $_POST['tel'];
$id = $_POST['ID'];

$sql = "INSERT INTO restaurants VALUES ('".$rest_name."', '".$road_base_add."', '".$address."', '".$status_code."', '".$status."', '".$menu_type."', '".$menu."', '".$tel."', '".$id."')";

$res = mysqli_query($mysqli, $sql);
if($res) {
    echo "<script>alert('새로운 음식점 정보가 등록되었습니다.');</script>";
    echo "<script>location.replace('./admin_rest_insert.php');</script>";
} else {
    echo "<script>alert('음식점 정보 등록에 실패하였습니다.');</script>";
    echo "<script>location.replace('./admin_rest_insert.php');</script>";
}

mysqli_free_result($res);
mysqli_close($mysqli);
?>