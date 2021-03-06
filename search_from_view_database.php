<?php
	require_once("connectionfile.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>View From Our Database.</title>
</head>
<body>
	<div style=" width: 455px; height: 30px; border-color: black; margin: 0px 0px 83px 306px;">
		<fieldset>
			<form action="search_from_view_database.php" method="get">
			  <input type="text" name="search" value="" placeholder="search by username or mobile" align="center" style=" width: 315px; margin: 0px 0px 8px 33px; height: 28px; padding: 0px 0px 0px 14px;"><br>
			  <input type="submit" name="searchbutton" value="Search Data" style=" width: 166px; margin: 0px 0px 8px 33px; height: 28px; font-weight: bold;">
			</form>
		</fieldset>
	</div>
	<?php
	if(isset($_GET["searchbutton"])) {
		$connectingDB;
		$search = $_GET["search"];
		$sql= "SELECT * FROM sign_in WHERE uname=:searcH or mobile=:searcH";
		$stmt=$connectingDB->prepare($sql);
		$stmt->bindvalue(':searcH',$search);
		$stmt->execute();
		while($datarows = $stmt->fetch()) {
			$id       = $datarows["id"];
			$uname    = $datarows['uname'];
			$password = $datarows['password'];
			$mobile   = $datarows['mobile'];
			$email    = $datarows['email'];
		?>
		<table border="1" style="margin: 0px 0px 57px 221px; font-size: 20px;">
			<caption style="color:green; font-size:24px;">Search Result.</caption>
			<tr>
				<th>Id</th>
				<th>UserName</th>
				<th>Password</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Search Again</th>
			</tr>
			<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $uname ?></td>
				<td><?php echo $password ?></td>
				<td><?php echo $mobile ?></td>
				<td><?php echo $email ?></td>
				<td><a href="search_from_view_database.php">search again </a></td>
			</tr>
		</table>
		<?php
		}
	}
	?>

	<div style=" width: 455px; height: 30px; border-color: black; margin: 0px 0px 64px 139px;">
	<table width="1000" border="5" align="center">
		<tr>
			<th>Id</th>
			<th>User Name</th>
			<th>Password</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>UPDATE</th>
			<th>DELETE</th>
			<th>Go Back to insert page</th>
		</tr>
		<?php
		$sql="SELECT * FROM sign_in";
		$stmt=$connectingDB->query($sql);

			while($row=$stmt->fetch()) {
				$id = $row["id"];
				$username = $row["uname"];
				$password = $row["password"];
				$mobile = $row["mobile"];
				$email = $row["email"];
			?>
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $username; ?></td>
				<td><?php echo $password; ?></td>
				<td><?php echo $mobile; ?></td>
				<td><?php echo $email; ?></td>
				<td><a href="update_data.php?id=<?php echo $id; ?>">Update</a></td>
				<td><a href="delete_data.php?id=<?php echo $id; ?>">Delete</a></td>
				<td><a href="insert_data_into_database.php">Go Back to insert page</a></td>
			</tr>
			<?php
			}
			?>
			</table>
		</div>


</body>
</html>
