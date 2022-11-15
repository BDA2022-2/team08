<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

session_start();

$id_input = trim($_POST['user_id']);
$pw_input = trim($_POST['user_pw']);

if (!$id_input || !$pw_input) { // 하나라도 안 적으면 안됨
    echo "<script>alert('회원아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
} // ==> 여기까지 OK

// 회원 테이블에서 해당 아이디가 존재하는지 체크
$sql = "SELECT * FROM user WHERE user_id = '".$id_input."'";
$res = mysqli_query($mysqli, $sql);
if($res) { //만약 아이디가 존재하면
    $user_row = mysqli_fetch_array($res,MYSQLI_ASSOC);
    if ($pw_input == $user_row['user_pw']) { //PW가 맞으면
        $_SESSION["ss_id"] = $user_row['user_id'];
        $_SESSION["ss_name"] = $user_row['user_name'];
        if($id_input == "admin" && $pw_input == "1111") {
            echo "<script>location.replace('./admin_plant_insert.php');</script>";
        } else {
            echo "<script>location.replace('./index.php');</script>";
        }
    } else { //PW가 틀리면
        echo "<script>alert('아이디 혹은 비밀번호가 틀립니다.');</script>";
        echo "<script>location.replace('./login.php');</script>";
    }
} else { //아이디가 없으면
    echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
}

mysqli_free_result($res);
mysqli_close($mysqli);
?>