<html>
	<head>makeInput.php</head>

<body>
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
			$sql="INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`,`recent_search`) VALUES (?,?,?,?)";
			
			if($stmt=mysqli_prepare($link,$sql)){
				//bind variables to the prepared stmt as parameters
				mysqli_stmt_bind_param($stmt,"ssss",$user_id,$user_pw,$user_name,$recent_search);
				
				//set parameters
				$user_id=$_POST['user_id'];
				$user_pw=$_POST['user_pw'];
				$user_name=$_POST['user_name'];
				$recent_search=$_POST['recent_search'];
				
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
</body>

</html>