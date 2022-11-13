<?php
	//initialize session
	session_start();
	$id=session_id();
	
	echo "<br>세션 아이디.....[<b>{$id}</b>]<hr>";
	echo "<<<<<-세션 사용중->>>>>";
	
	echo "세션에 등록된 내용<br><br>";
	
	echo ".....1)차종 <b>";
	echo $_SESSION['car'];
	echo "</b><p>";
	
	//enroll session
	$_SESSION['user_id']='user_id';
	$_SESSION['user_pw']='user_pw';
	
	echo "<br><b>session creation program</b><hr>";
	
	echo "1. 세션 초기화......<b>session_start()</b>함수 사용<br>";
	echo "2. 세션 등록......<b>\$SESSION['변수명']</b>정의<hr>";
	
	echo "<br><b>->>>>> session 등록 성공 <<<<<-</b><hr>";
	
	echo "> 이 프로그램에서는 세션만 생성됩니다.<br>";
	echo "> 세션을 사용하려면 []프로그램이 존재해야 합니다<br>";
?>