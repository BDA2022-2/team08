<?php
	$db_host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="team08";

    //connect to the database
	$link=mysqli_connect($db_host,$db_user,$db_password,$db_name);
	
	//check connection
	if($link===false){
		die("error: could not connect".mysqli_connect_error());
	}else{
		//sql stmt
        $sql="INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`,`user_info`) VALUES (?,?,?,?)";
		$stmt=mysqli_prepare($link,$sql);
		if($stmt){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"ssss",$user_id,$user_pw,$user_name,$user_info);
			
			$user_id=$_POST['user_id'];
			$user_pw=$_POST['user_pw'];
			$user_name=$_POST['user_name'];
			$user_info=$_POST['user_info'];
			
			$res=mysqli_stmt_execute($stmt);
			if($res===false){
				echo "ERROR: Could not execute query: $sql".mysqli_error($link);
			}else{
				echo "Records inserted successfully";
			}
			
		}else{
			echo "ERROR: Could not prepare query: $sql".mysqli_error($link);
		}
	}
	
	mysqli_stmt_close($stmt);
    mysqli_close($link);
?>