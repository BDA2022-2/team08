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
        $sql="DELETE FROM `team08`.`user` WHERE user_id=? and user_pw=? and user_name=?";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"sss",$user_id,$user_pw,$user_name);
			
			//set parameters
			$user_id=trim($_POST['user_id']);
			$user_pw=trim($_POST['user_pw']);
			$user_name=trim($_POST['user_name']);

			if (!$user_id||!$user_pw||!$user_name) {
				echo "<script>alert('id, pw, name 모두 입력해 주세요');</script>";
				echo "<script>location.replace('./login.php');</script>";
				exit;
			}
			
			//attempt to execute the prepared statement
			
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				$status = session_status();
				if($status == PHP_SESSION_ACTIVE){
					session_unset();
					session_destroy();
				}
				echo "<script>alert('회원 탈퇴가 성공적으로 이루어졌습니다. 이용해주셔서 감사합니다');</script>";
				echo "<script>location.replace('./index.php');</script>";
			}else if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 잘못된 유저정보 입니다');</script>";
				echo "<script>location.replace('./makeAccount.php');</script>";
				exit;
			}else{
				echo "<script>alert('ERROR: Could not execute query');</script>";
				echo "<script>location.replace('./deletemakeAccount.php');</script>";
			}
		}else{
			echo "<script>alert('ERROR: Could not prepare query');</script>";
			echo "<script>location.replace('./deletemakeAccount.php');</script>";
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