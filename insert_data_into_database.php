<?php
	require_once("connectionfile.php");

	if(isset($_POST['submit'])) {
		//echo "hi";
		if(!empty($_POST['username']) && ($_POST['password'])) {
			$uname= $_POST["username"];
			$password= md5($_POST["password"]);
			$mobile= $_POST["mobile"];
			$email= $_POST["email"];

			$connectingDB;//global
			//$query= "INSERT INTO sign_in VALUES('','$uname',md5('$password'),'$mobile','$email')";
			//$result=$connectingDB->query($query);
			//if($result==true){
				//echo "Data Submitted.";
			//}else{
				//echo "Data Not Submitted.";
			//}
			$sql= "INSERT INTO sign_in(uname,password,mobile,email)
			VALUES(:unamE,:passworD,:mobilE,:emaiL)";//column name and in values use Dummy name.
			$stmt=$connectingDB->prepare($sql);
			$stmt->bindvalue(':unamE',$uname);
			$stmt->bindvalue(':passworD',$password);
			$stmt->bindvalue(':mobilE',$mobile);
			$stmt->bindvalue(':emaiL',$email);

			$Execute = $stmt->execute();
			if($Execute) {
				echo "Data executed succesfully.";
			} else {
				echo "Data not executed.";
			}

		}else{
			echo "atleast Add Username and Password.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA SUBMIT IN DATABASE THROUGH INSERT QUERY.</title>
</head>
<body>
  <form action="" method="post">
	  <span>UserName:</span><br>
	  <input type="text" name="username" value=""></input><br>
	  <span>Password:</span><br>
	  <input type="password" name="password" value=""></input><br>
	  <span>Mobile:</span><br>
	  <input type="text" name="mobile" value=""></input><br>
	  <span>Email:</span><br>
	  <input type="text" name="email" value=""></input><br>
	  <input type="submit" name="submit" value="SIGN IN"></input>
	  <button type="submit" name="submit" value="view inserted data"><a href="view_from_database.php">
		 view inserted data</a></button>
  </form>
</body>
</html>
