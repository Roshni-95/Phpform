<?php
$servername="localhost";
$username="root";
$password="";
$dbname="whatsapp";

$connectingDB=new mysqli($servername,$username,$password,$dbname);

if($connectingDB->connect_error) {
	die("connection fail".$connectingDB->connect_error);
}

		$sql="select * from sign_in";
		$result=$connectingDB->query($sql);
		if($result->num_rows>0)	{
		?>
			<table border="5" width="1000" align="center">
			<tr>
				<th> Id</th>
				<th> User Name</th>
				<th>Password</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Update</th>
				<th>Delete</th>
				<th>Go Back to insert page</th>
			</tr>
			<?php
			while($row=$result->fetch_assoc()) {
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
				<td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
				<td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
				<td><a href="insert_data_into_database.php">Go Back to insert page</a></td>
			</tr>
			 <?php
		  }
			?>
			</table>
		 <?php
	  }
		?>
