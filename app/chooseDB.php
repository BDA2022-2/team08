<?php
	echo "<h3>mysqli_select_db <br> 데이터베이스 선택하기</h3>";
	echo "<hr>";
	
	$db_host="localhost";
	$db_user="root";
	$db_password="";

	$conn=mysqli_connect($db_host,$db_user,$db_password);
	
	$dbname='team08';
	
	$db=mysqli_select_db($conn,$dbname);
	
	if($db){
		echo"<hr>";
		echo"데이터베이스 선택 성공<br>";
		echo"선택한 데이터베이스: $dbname<br>";
		echo"<hr>";

		echo"user_id:<b>{$_POST['user_id']}</b><br>";
		echo"user_pw:<b>{$_POST['user_pw']}</b><br>";
		echo"user_name:<b>{$_POST['user_name']}</b><br>";
		echo"user_info:<b>{$_POST['user_info']}</b><br>";
	}
	
	else{
		echo"<hr>";
		echo"데이터베이스 선택 실패<br>";
	}
	
	mysqli_close($conn);
	echo"";
?>