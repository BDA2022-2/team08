<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}
session_start();
$user_id = $_SESSION["ss_id"];

$del = $_GET['del'];

$sql = "UPDATE user SET search_mtn = '', search_location1 = '', search_location2 = '' WHERE user_id = '".$del."'";
$res = mysqli_query($mysqli, $sql);
if($res) {
    echo "<script>location.replace('./search.php');</script>";
} else {
    echo "<script>alert('검색어 삭제에 실패하였습니다.');</script>";
    echo "<script>location.replace('./search.php');</script>";
}

mysqli_free_result($res);
mysqli_close($mysqli); 
?>