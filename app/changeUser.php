<?php
	$db_host="localhost";
<<<<<<< HEAD
<<<<<<< HEAD
	$db_user="root";
	$db_password="";
=======
	$db_user="team08";
	$db_password="team08";
>>>>>>> bf36dd1848449fa30f2f858c831dd81c8d131ef2
=======
	$db_user="team08";
	$db_password="team08";
>>>>>>> bf36dd1848449fa30f2f858c831dd81c8d131ef2
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
			$before_name=$_POST['before_name'];
			$before_pw=$_POST['before_pw'];
			$after_name=$_POST['after_name'];
			$after_pw=$_POST['after_pw'];
			$user_id=$_POST['user_id'];
			
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