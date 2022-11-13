<?php
$mysqli = mysqli_connect("localhost", "team08", "team08", "team08");
if(mysqli_connect_errno()){
  printf("Connection failed: %s\n", mysqli_connect_error());
  exit();
}

$id_input = trim($_GET['user_id']);
$pw_input = trim($_GET['user_pw']);

if (!$id_input || !$pw_input) {
    echo "<script>alert('회원아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

// 회원 테이블에서 해당 아이디가 존재하는지 체크
$sql = "SELECT * FROM user WHERE user_id = '".$id_input."'";
$result = mysqli_query($mysqli, $sql);
if(!($result)) {
    echo "<script>alert('가입된 회원아이디가 아닙니다.');</script>";
} else {
    $user = mysqli_fetch_assoc($result);
}

// 존재하는 아이디인지, 입력한 패스워드가 회원 테이블에 저장된 패스워드와 동일한지 체크
if (!$user['user_id'] || !$user['user_pw']) {
    echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n(비밀번호는 대소문자를 구분합니다.)');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
} else {
    echo "<script>location.replace('./index.html');</script>";
    $_SESSION['ss_id'] = $user['user_id'];
}

mysqli_close($mysqli); // 데이터베이스 접속 종료
?>