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
				<li><img src="images/customer1.png"><p><a href="admin-customer.php">Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="admin-policies.php">Policies</a></p></li>
				<li><img src="images/employees.png"><p><a href="admin-employees.php">Employees</a></p></li>
				<li><img src="images/branches.png"><p><a href="#">Branches</a></p></li>
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
				<th>Branch Number</th>
				<th>Branch Address</th>
                <th>Branch Phone Number</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query6 = "SELECT * FROM `branch`";
				$result6 = mysqli_query($con,$query6);
				while($row=mysqli_fetch_assoc($result6)){
					?>
					<tr>
					<td><?=$row['BranchNo']?></td>
					<td><?=$row['BranchAddress']?></td>
					<td><?=$row['BranchPh_No']?></td>
					<td>
						<form action="admin-edit-branch.php" method="get">
							<input id="val" type="text" name="branchno" value="<?=$row['BranchNo']?>">
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
		<form action="admin-add-branch.php">
			<input type="submit" value="Add a New Branch" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
	</div>

</body>
</html>