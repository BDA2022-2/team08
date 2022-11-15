<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

$search_rest_name = $_POST['search_rest_name'];
$search_rest_id = $_POST['search_rest_id'];

$sql1 = "SELECT * FROM restaurants WHERE idx = '".$search_rest_id."'";
$res1 = mysqli_query($mysqli, $sql1);
if(!$res1) {}
else {
    $rest_row = mysqli_fetch_array($res1, MYSQLI_ASSOC);
    if($rest_row['rest_name'] == $search_rest_name) {
        $sql2 = "DELETE FROM restaurants WHERE idx = '".$search_rest_id."'";
        $res2 = mysqli_query($mysqli, $sql2);
        if($res2) {
            echo "<script>alert('음식점 정보를 삭제하였습니다.');</script>";
            echo "<script>location.replace('./admin_rest_delete.php');</script>";
        } else {
            echo "<script>alert('음식점 정보 삭제에 실패하였습니다.');</script>";
            echo "<script>location.replace('./admin_rest_delete.php');</script>";
        }
    }
}

mysqli_free_result($res1);
mysqli_free_result($res2);
mysqli_close($mysqli);
?>
