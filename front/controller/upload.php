<?php	
	date_default_timezone_set("Etc/GMT-8");
	require_once 'conn.php';
 
	if(ISSET($_POST['upload'])){
		$file_name = $_FILES['file']['name'];

		$location="upload/".$file_name;
		if($file_size < 5242880){
			if(move_uploaded_file($file_temp, $location)){
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO `blogs`(file_name)  VALUES ('$file_name')";
					$conn->exec($sql);
				}catch(PDOException $e){
					echo $e->getMessage();
				}
 
				$conn = null;
				header('location: index.php');
			}
		}else{
			echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
		}
	}
?>