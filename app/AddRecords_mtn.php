<?php
	$db_host="localhost";
	$db_user="team08";
	$db_password="team08";
	$db_name="team08";

    //connect to the database
	$link=mysqli_connect($db_host,$db_user,$db_password,$db_name);
	
	//check connection
	if($link===false){
		echo "<script>alert('ERROR: Could not connect');</script>";
		echo "<script>location.replace('./AddRecords.php');</script>";
	}else{
		$mtn_name=trim($_POST['mtn_name']);
		$sql="SELECT `mtn_name`,`idx` FROM `team08`.`mtn_location` WHERE `mtn_name`= '$mtn_name'";
		$result=mysqli_query($link,$sql);
		$rowcount=mysqli_num_rows($result);

		if (!$mtn_name){
			echo "<script>alert('산 이름을 입력해 주세요');</script>";
			echo "<script>location.replace('./AddRecords.php');</script>";
			exit;
		}

		if($result&&$rowcount>0){
			echo "<script>alert('$mtn_name 에 대한 총 $rowcount 개의 검색 결과를 찾았습니다');</script>";
			mysqli_query($link,"CREATE OR REPLACE VIEW `same_mtn` AS SELECT `mtn_name`,`idx` FROM `team08`.`mtn_location` WHERE `mtn_name`= '$mtn_name'");
			echo "<script>location.replace('./AddRecords.php');</script>";
		}else if($rowcount<1){
			echo "<script>alert('ERROR: $mtn_name 을 찾을 수 없습니다');</script>";
			echo "<script>location.replace('./AddRecords.php');</script>";
			exit;
		}else{
			echo "<script>alert('ERROR: Could not execute query');</script>";
			echo "<script>location.replace('./AddRecords.php');</script>";
		}

	}
	//close statement
	mysqli_free_result($result);
	//close connection
    mysqli_close($link);
?>