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
				<li><img src="images/employees.png"><p><a href="#">Employees</a></p></li>
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
				<th>Employee Number</th>
				<th>Employee Name</th>
				<th>Employee Phone Number</th>
				<th>Employee Email</th>
				<th>Employee Salary</th>
				<th>Hours Worked</th>
				<th>Hire Date</th>
				<th>Branch Number</th>
				<th>Details</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query1 = "SELECT * FROM `employee`";
				$result1 = mysqli_query($con,$query1);
				while($row=mysqli_fetch_assoc($result1)){
					?>
					<tr>
					<td><?=$row['EmpNo']?></td>
					<td><?=$row['EmpName']?></td>
					<td><?=$row['EmpPh_No']?></td>
					<td><?=$row['EmpEmail']?></td>
					<td><?=$row['Salary']?></td>
					<td><?=$row['HoursWorked']?></td>
					<td><?=$row['Hiredate']?></td>
					<td><?=$row['BranchNo']?></td>
					<td>
						<form action="employee-category.php" method="get">
							<input id="val" type="text" name="EMPNO" value="<?=$row['EmpNo']?>">
							<input id="inp" type="submit" value="More Details of this employee">
					    </form>
					</td>
					<td>
						<form action="admin-edit-employees.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$row['EmpNo']?>">
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
		<form action="admin-add-employees.php">
			<input type="submit" value="Add a New Employee" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
	</div>

</body>
</html>