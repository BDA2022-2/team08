/*
<?php
	$db_host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="team08";

    //connect to the database
	$connect=mysqli_connect($db_host,$db_user,$db_password);	
	$db=mysqli_select_db($connect,$db_name);
	
    //utf-8 for korean
	mysqli_query($connect,"set session character_set_connection=utf8");
	mysqli_query($connect,"set session character_set_results=utf8");
	mysqli_query($connect,"set session character_set_client=utf8");

    
    if($connect===false){ //connection failed
        die("error: could not connect".mysqli_connect_error());
    }else{ //conncection succeed
        //prepared stmt
        $sql="INSERT INTO `team08`.`user`(`user_id`,`user_pw`,`user_name`,`user_info`)";
        $sql.="VALUES (?,?,?)";
		$stmt=mysqli_prepare($connect,$sql);
		
		//bind params with prepared stmt
		if($stmt){
			mysqli_stmt_bind_param($stmt,"sss",$user_id,$user_pw,$user_name,$user_info);
			$user_id=$_POST['user_id'];
			$user_pw=$_POST['user_pw'];
			$user_name=$_POST['user_name'];
			$user_info=$_POST['user_info'];
			
			mysqli_stmt_execute($stmt);
			
			echo"records inserted successfully";
		}
		else{
			echo"error: could not prepare query:$sql".mysqli_error($connect);
		}
		
        mysqli_stmt_close($res);
        mysqli_close($connect);
    }
?>
*/