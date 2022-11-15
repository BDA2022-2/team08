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
        $sql="DELETE FROM `team08`.`mtn_review` WHERE review_id=?";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"s",$review_id);
			
			//set parameters
			$review_id=trim($_POST['review_id']);
			
			//attempt to execute the prepared statement
			
			if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)>0){
				echo "<script>alert('기록 삭제가 성공적으로 이루어졌습니다. ');</script>";
				echo "<script>location.replace('./MyRecords.php');</script>";
			}else if(mysqli_stmt_execute($stmt)&&mysqli_affected_rows($link)<1){
				echo "<script>alert('ERROR: 잘못된 접근입니다');</script>";
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
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>