<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
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
                <li><img src="images/dashboard1.png"><p><a href="adminlogin.html">Dashboard</a></p></li>
				<li><img src="images/customer1.png"><p><a href="#">Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="admin-policies.php">Policies</a></p></li>
				<li><img src="images/employees.png"><p><a href="admin-employees.php">Employees</a></p></li>
				<li><img src="images/branches.png"><p><a href="admin-branches.php">Branches</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

	<div class="content">
		<h1>ADMIN LOGIN</h1>
		<p>Welcome Admin</p>
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
				<th>Details</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query6 = "SELECT * FROM `customer`";
				$result6 = mysqli_query($con,$query6);
				while($row=mysqli_fetch_assoc($result6)){
					?>
					<tr>
					<td><?=$row['NIC']?></td>
					<td><?=$row['FirstName']?></td>
					<td><?=$row['LastName']?></td>
					<td><?=$row['Email']?></td>
					<td><?=$row['Ph_No']?></td>
					<td><?=$row['PostalAddress']?></td>
					<td><?=$row['DOB']?></td>
					<td><?=$row['Gender']?></td>
					<td><?=$row['username']?></td>
					<?php
					$usn = $row['username'];
					$temp_query = "SELECT `password` FROM `customers_account` WHERE `username`='$usn'";
					$res = mysqli_fetch_assoc(mysqli_query($con,$temp_query));
					?>
					<td><?=$res['password']?></td>
					<td>
						<form action="admin-customer-category.php" method="get">
							<input id="val" type="text" name="NIC" value="<?=$row['NIC']?>">
							<input id="inp" type="submit" value="More Details of this customer">
					    </form>
					</td>
					<td>
						<form action="admin-edit-customer.php" method="get">
							<input id="val" type="text" name="NIC" value="<?=$row['NIC']?>">
							<input id="inp" type="submit" value="Edit">
					    </form>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
		<form action="admin-add-customer.php">
			<input type="submit" value="Add a New Customer" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
	</div>

</body>
</html>