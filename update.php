<?php

$searchqueryparameter = $_GET["id"];

$servername="localhost";
$username="root";
$password="";
$dbname="whatsapp";
$connectingDB=new mysqli($servername,$username,$password,$dbname);

if($connectingDB->connect_error) {
	die("connection fail".$conn->connect_error);
}
	if(isset($_POST['submit'])) {
		$uname= $_POST["username"];
		$password= md5($_POST["password"]);
		$mobile= $_POST["mobile"];
		$email= $_POST["email"];

		$query="UPDATE sign_in SET uname='$uname',password='$password',mobile='$mobile', email='$email' WHERE id=".$searchqueryparameter;

		//$query= "UPDATE sign_in SET uname='".$_POST['username']."',
		//password=md5('".$_POST['password']."'),
		//mobile='".$_POST['mobile']."',
		//email='".$_POST['email']."' WHERE id=".$searchqueryparameter;

		$result1=$connectingDB->query($query);
		if($result1==true) {
			echo '<script>window.open("search_from_view_database.php?id=Data Updated Successfully","_self")</script>';
		}else{
			echo "Data not executed.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA SUBMIT IN DATABASE THROUGH INSERT QUERY.</title>
</head>
<body>
	<?php
		$sql="SELECT * FROM sign_in WHERE id=".$searchqueryparameter;
		//echo $sql;
		$result=$connectingDB->query($sql);
		//echo $result;
		$row= $result->fetch_assoc();
			//print_r($row);
			//die();
			$id = $row['id'];
			$username = $row['uname'];
			$password = $row['password'];
			$mobile = $row['mobile'];
			$email = $row['email'];

	?>
  <form action="update.php?id=<?php echo $searchqueryparameter; ?>" method="post">
	  <span>UserName:</span><br>
		<input type="text" name="username" value="<?php echo $username ?>"></input><br>
	  <span>Password:</span><br>
		<input type="password" name="password" value="<?php echo $password; ?>"></input><br>
	  <span>Mobile:</span><br>
		<input type="text" name="mobile" value="<?php echo $mobile ; ?>"></input><br>
	  <span>Email:</span><br>
		<input type="text" name="email" value="<?php echo $email; ?>"></input><br>
		<input type="submit" name="submit" value="Update"></input>
  </form>
</body>
</html>
