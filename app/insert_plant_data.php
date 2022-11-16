<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

$id = $_POST['ID'];
$kr_name = $_POST['kr_name'];
$sci_name = $_POST['sci_name'];
$kr_family_name = $_POST['kr_family_name'];
$sci_family_name = $_POST['sci_family_name'];
$blossom = $_POST['blossom'];
$falloff = $_POST['falloff'];
$is_protected = $_POST['is_protected'];
$is_special = $_POST['is_special'];
$size = $_POST['size'];
$img_url = $_POST['url'];

$sql = "INSERT INTO plant_species VALUES ('".$id."', '".$kr_name."', '".$sci_name."', '".$kr_family_name."', '".$sci_family_name."', '".$blossom."', '".$falloff."', '".$is_protected."', '".$is_special."', '".$size."', '".$url."')";

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