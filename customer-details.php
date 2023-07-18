<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/admin-customer.css" type="text/css">
</head>
<body>
	<header class="header">
		<nav class="side-nav">
			<div class="user">
				<img src="images/user1.png" class="user-img">
				<div>
					<h2>Name</h2>
				</div>
			</div>
			<ul>
                <li><img src="images/dashboard1.png"><p><a href="customerlogin.php">Dashboard</a></p></li>
				<li><img src="images/policy1.png"><p><a href="customer-policies.php">Show Available Policies</a></p></li>
				<li><img src="images/policy1.png"><p><a href="customer-taken-policies.php">Show My Policies</a></p></li>
                <li><img src="images/customer1.png"><p><a href="#">My Details</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

	<div class="content">
		<h1>Customer LOGIN</h1>
		<p>Welcome</p>
		<table class="cust_table">
        <thead>
			<tr>
				<th>NIC</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Postal Address</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Username</th>
				<th>Password</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
                $usname = $_GET['username'];
				$query6 = "SELECT * FROM `customer` WHERE `username`='$usname'";
				$result6 = mysqli_fetch_assoc(mysqli_query($con,$query6));
					?>
					<tr>
					<td><?=$result6['NIC']?></td>
					<td><?=$result6['FirstName']?></td>
					<td><?=$result6['LastName']?></td>
					<td><?=$result6['Email']?></td>
					<td><?=$result6['Ph_No']?></td>
					<td><?=$result6['PostalAddress']?></td>
					<td><?=$result6['DOB']?></td>
					<td><?=$result6['Gender']?></td>
					<td><?=$result6['username']?></td>
					<?php
					$usn = $result6['username'];
					$temp_query = "SELECT `password` FROM `customers_account` WHERE `username`='$usn'";
					$res = mysqli_fetch_assoc(mysqli_query($con,$temp_query));
					?>
					<td><?=$res['password']?></td>
					<td>
						<form action="admin-edit-customer.php" method="get">
							<input id="val" type="text" name="NIC" value="<?=$result6['NIC']?>">
							<input id="inp" type="submit" value="Edit">
					    </form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

</body>
</html>