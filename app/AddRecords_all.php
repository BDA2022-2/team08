<?php
	$db_host="localhost";
	$db_user="team08";
	$db_password="team08";
	$db_name="team08";

    //connect to the database
	$link=mysqli_connect($db_host,$db_user,$db_password,$db_name);
	
	//check connection
	if($link===false){
		die("error: could not connect".mysqli_connect_error());
	}else{
		//prepare an insert statement
        $sql="INSERT INTO `team08`.`mtn_review`(`mtn_idx`,`mtn_name`,`visit_date`,`mtn_rate`,`comment`,`user_id`) VALUES (?,?,?,?,?,?)";
		
		if($stmt=mysqli_prepare($link,$sql)){
			session_start();
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"ssssss",$mtn_idx,$mtn_name,$visit_date,$mtn_rate,$comment,$user_id);
			
			//set parameters
			$mtn_idx=trim($_POST['mtn_idx']);
			$mtn_name=trim($_POST['mtn_name']);
			$visit_date=trim($_POST['visit_date']);
			$mtn_rate=trim($_POST['mtn_rate']);
			$comment=trim($_POST['comment']);
			$user_id=trim($_SESSION["ss_id"]);

			if (!$mtn_idx) {
				echo "<script>alert('산 아이디를 확인 해 주세요');</script>";
				echo "<script>location.replace('AddRecords_mtn.php');</script>";
				exit;
			}
			
			//attempt to execute the prepared statement
			
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				echo "<script>alert('방문기록이 성공적으로 완료되었습니다');</script>";
				echo "<script>location.replace('AddRecords.php');</script>";
				exit;
			}else if(mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 이미 동일한 방문기록이 존재합니다');</script>";
				echo "<script>location.replace('AddRecords_mtn.php');</script>";
				exit;
			}else{
				echo "<script>alert('ERROR: Could not execute query');</script>";
				echo "<script>location.replace('AddRecords_mtn.php');</script>";
				exit;
			}
		}else{
			echo "<script>alert('ERROR: Could not prepare query');</script>";
			echo "<script>location.replace('AddRecords_mtn.php');</script>";
			exit;
		}
	}
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>