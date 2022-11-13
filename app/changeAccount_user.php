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
		$sql="UPDATE `team08`.`user` SET user_name=?, user_pw=? WHERE user_name=? and user_pw=? and user_id=?";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"sssss",$after_name,$after_pw,$before_name,$before_pw,$user_id);
			
			//set parameters
			$before_name=trim($_POST['before_name']);
			$before_pw=trim($_POST['before_pw']);
			$after_name=trim($_POST['after_name']);
			$after_pw=trim($_POST['after_pw']);
			$user_id=trim($_POST['user_id']);

			if (!$user_id||!$before_pw||!$after_pw||!$before_name||!$after_name){
				echo "<script>alert('id, pw, name 모두 입력해 주세요');</script>";
				echo "<script>location.replace('./changeAccount.php');</script>";
				exit;
			}
			
			//attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				echo "<script>alert('Records changed successfully');</script>";
				echo "<script>location.replace('./changeAccount.php');</script>";
			}else if(mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 잘못된 유저정보 입니다');</script>";
				echo "<script>location.replace('./makeAccount.php');</script>";
				exit;
			}else{
				echo "<script>alert('ERROR: Could not execute query');</script>";
				echo "<script>location.replace('./changeAccount.php');</script>";
			}
		}else{
			echo "<script>alert('ERROR: Could not prepare query');</script>";
			echo "<script>location.replace('./changeAccount.php');</script>";
		}
	}
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>