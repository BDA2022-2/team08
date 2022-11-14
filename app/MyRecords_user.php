<html>

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
				$sql="select * from `team08`.`mtn_review`";
				$res=mysqli_query($link,$sql);
				
				if($res){			
					if($res){
						while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
							$mtn_idx=$newArray['mtn_idx'];
							$mtn_name=$newArray['mtn_name'];
							$user_id=$newArray['user_id'];
							$visit_date=$newArray['visit_date'];
							$mtn_rate=$newArray['mtn_rate'];
							$comment=$newArray['comment'];
							$created=$newArray['created'];
							
							echo "	name={$mtn_name}";
							echo "	comment={$comment}";
							echo "	created={$created}";
							echo "	<br>\n";
							
						}
					}
				}else{
					echo "ERROR: Could not retrieve records: $sql".mysqli_error($link);
				}
			}
			//close statement
			mysqli_free_result($res);
			//close connection
			mysqli_close($link);
		?>
	</body>

</html>