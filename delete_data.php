<?php
	require_once("connectionfile.php");
	$searchqueryparameter = $_GET["id"];
	if(isset($_POST['submit'])) {
		console.log($_GET["id"]);

			$uname= $_POST["username"];
			$password= md5($_POST["password"]);
			$mobile= $_POST["mobile"];
			$email= $_POST["email"];
			$connectingDB;
			$sql= "DELETE FROM sign_in WHERE id='$searchqueryparameter'";
			$Execute=$connectingDB->query($sql);
			if($Execute) {
				echo '<script>window.open("view_from_our_database.php?id=Data Deleted successfully","_self")</script>';
			} else{
				echo "Data not deleted.";
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA DELETE IN DATABASE THROUGH DELETE QUERY.</title>
</head>
<body>
	<?php
	$connectingDB;
	$query= "SELECT * FROM sign_in WHERE id ='$searchqueryparameter'";
	$stmt=$connectingDB->query($query);
	while($row= $stmt->fetch()){
		$id = $row["id"];
		$username = $row["uname"];
		$password = $row["password"];
		$mobile = $row["mobile"];
		$email = $row["email"];
	}
	?>
  <form action="delete_data.php?id=<?php echo $searchqueryparameter; ?>" method="post">
	  <span>UserName:</span><br>
	  <input type="text" name="username" value="<?php echo $username; ?>"></input><br>
	  <span>Password:</span><br>
		<input type="password" name="password" value="<?php echo $password; ?>"></input><br>
	  <span>Mobile:</span><br>
		<input type="text" name="mobile" value="<?php echo $mobile; ?>"></input><br>
	  <span>Email:</span><br>
		<input type="text" name="email" value="<?php echo $email; ?>"></input><br>
		<input type="submit" name="submit" value="Delete  Data"></input>
  </form>
</body>
</html>
