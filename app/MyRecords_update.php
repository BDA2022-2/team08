<?php
	$db_host="localhost";
	$db_user="team08";
	$db_password="team08";
	$db_name="team08";

    //connect to the database
	$link=mysqli_connect($db_host,$db_user,$db_password,$db_name);
	$link->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
	
	try{
	//check connection
	if($link===false){
		die("error: could not connect".mysqli_connect_error());
	}else{
		//prepare an insert statement
        $sql="UPDATE `team08`.`mtn_review` SET mtn_rate=? WHERE review_id=? and user_id=?";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"sss",$mtn_rate,$review_id,$user_id);
			session_start();
			
			//set parameters
			$mtn_rate=trim($_POST['mtn_rate']);
			$review_id=trim($_POST['review_id']);
			$user_id=trim($_SESSION["ss_id"]);
			
			//attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				echo "<script>alert('평점 수정이 성공적으로 이루어졌습니다. ');</script>";
				echo "<script>location.replace('./MyRecords.php');</script>";
			}else if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 변경을 원하는 값이 이전 평점의 값과 동일합니다');</script>";
				echo "<script>location.replace('./MyRecords.php');</script>";
				exit;
			}else{
				echo "<script>alert('ERROR: Could not execute query');</script>";
				echo "<script>location.replace('./MyRecords.php');</script>";
			}
		}else{
			echo "<script>alert('ERROR: Could not prepare query');</script>";
			echo "<script>location.replace('./MyRecords.php');</script>";
		}
	}
	$link->commit();
	}catch (Exception $e) {
		$link->rollback();
	}
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>