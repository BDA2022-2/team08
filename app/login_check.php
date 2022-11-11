<?php
include("./dbconn.php");

$user_id = trim($_GET['user_id']);
$user_pw = trim($_GET['user_pw']);

if(!$user_id || !$user_pw) {
    echo "<script>alert('회원아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

$sql = "SELECT * FROM user WHERE user_id = '$user_id' AND user_pw = '$user_pw'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if(!$user) {
    echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');</script>";
    echo "<script>location.replace('./login.php');</script>";
    exit;
}

$_SESSION['ss_user_id'] = $user_id; // 아이디, 비밀번호 확인 후 세션 생성

mysqli_close($conn); // 데이터베이스 접속 종료
// 세션이 있다면 회원목록 페이지로 이동
if(isset($_SESSION['ss_mb_id'])) {
    echo "<script>location.replace('index.php');</script>";
}
