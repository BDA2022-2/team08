<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

$id = $_GET['ID'];
$kr_name = $_GET['kr_name'];
$sci_name = $_GET['sci_name'];
$kr_family_name = $_GET['kr_family_name'];
$sci_family_name = $_GET['sci_family_name'];
$blossom = $_GET['blossom'];
$falloff = $_GET['falloff'];
$is_protected = $_GET['is_protected'];
$is_special = $_GET['is_special'];
$size = $_GET['size'];

$sql = "INSERT INTO plant_species VALUES ('".$id."', '".$kr_name."', '".$sci_name."', '".$kr_family_name."', '".$sci_family_name."', '".$blossom."', '".$falloff."', '".$is_protected."', '".$is_special."', '".$size."')";

$res = mysqli_query($mysqli, $sql);
if($res) {
    echo "<script>alert('새로운 야생화 정보가 등록되었습니다.');</script>";
    echo "<script>location.replace('./admin_plant_insert.php');</script>";
} else {
    echo "<script>alert('야생화 정보 등록에 실패하였습니다.');</script>";
    echo "<script>location.replace('./admin_plant_insert.php');</script>";
}

mysqli_free_result($res);
mysqli_close($mysqli);
?>