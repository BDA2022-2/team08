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
        //$sql="INSERT INTO `team08`.`mtn_review`(`review_id`,`mtn_idx`,`mtn_name`,`user_id`,`visit_date`,`mtn_rate`,`comment`,`created`) VALUES (?,?,?,?,?,?,?,?)";
		$sql="INSERT INTO `team08`.`mtn_review`(`mtn_idx`,`mtn_name`,`user_id`,`visit_date`,`mtn_rate`,`comment`,`created`) VALUES (?,?,?,?,?,?,?)";
		
		if($stmt=mysqli_prepare($link,$sql)){
			//bind variables to the prepared stmt as parameters
			mysqli_stmt_bind_param($stmt,"sssssss",$mtn_idx,$mtn_name,$user_id,$visit_date,$mtn_rate,$comment,$created);
			
			//set parameters
			$mtn_name=$_POST['mtn_name']; //user input by post
			$visit_date=$_POST['visit_date']; //user input by post
			$mtn_rate=$_POST['mtn_rate']; //user input by post
			$comment=$_POST['comment']; //user input by post
			
			$mtn_idx='1234'; 
			$user_id='1234';
			
			//attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
				echo "Records inserted successfully";
			}else{
				echo "ERROR: Could not execute query: $sql".mysqli_error($link);
			}
		}else{
			echo "ERROR: Could not prepare query: $sql".mysqli_error($link);
		}
	}
	//close statement
	mysqli_stmt_close($stmt);
	//close connection
    mysqli_close($link);
?>