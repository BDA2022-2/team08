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
        $sql="INSERT IGNORE INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`) VALUES (?,?,?)";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"sss",$user_id,$user_pw,$user_name);
			
			//set parameters
			$user_id=trim($_POST['user_id']);
			$user_pw=trim($_POST['user_pw']);
			$user_name=trim($_POST['user_name']);

			if (!$user_id||!$user_pw||!$user_name) {
				echo "<script>alert('id, pw, name 모두 입력해 주세요');</script>";
				echo "<script>location.replace('./makeAccount.php');</script>";
				exit;
			}
			
			//attempt to execute the prepared statement
			
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				echo "<script>alert('회원가입이 성공적으로 완료되었습니다');</script>";
				echo "<script>location.replace('./login.php');</script>";
				exit;
			}else if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 이미 동일한 id가 존재합니다');</script>";
				echo "<script>location.replace('./makeAccount.php');</script>";
				exit;
			}else{
				echo "<script>alert('ERROR: Could not execute query');</script>";
				echo "<script>location.replace('./makeAccount.php');</script>";
				exit;
			}
		}else{
			echo "<script>alert('ERROR: Could not prepare query');</script>";
			echo "<script>location.replace('./makeAccount.php');</script>";
			exit;
		}
	}
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>