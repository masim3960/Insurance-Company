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
				<th>Policy Number</th>
				<th>Customer NIC</th>
				<th>Customer Name</th>
				<th>Duration</th>
                <th>Payment Number</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
				<th>Dealed By</th>
				<th>Date of last meeting</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query15 = "SELECT * FROM `takes`";
				$result15 = mysqli_query($con,$query15);
				while($row4=mysqli_fetch_assoc($result15)){
					?>
					<tr>
                    <?php
                    $nic_=$row4['NIC'];
                    $query16 = "SELECT `FirstName` FROM `customer` WHERE `NIC`='$nic_'";
                    $result16=mysqli_fetch_assoc(mysqli_query($con,$query16));
                    $polno=$row4['PolicyNo'];
                    $query17 = "SELECT * FROM `payment` WHERE `PolicyNo`='$polno'";
                    $result17 = mysqli_query($con,$query17);
					$query18 = "SELECT * FROM `deals` WHERE `NIC`='$nic_'" ;
					$result18 = mysqli_fetch_assoc(mysqli_query($con,$query18));
                    while($row5=mysqli_fetch_assoc($result17)){
                        ?>
					<td><?=$row4['PolicyNo']?></td>
					<td><?=$row4['NIC']?></td>
					<td><?=$result16['FirstName']?></td>
					<td><?=$row4['Duration']?></td>
                    <td><?=$row5['PaymentNo']?></td>
                    <td><?=$row5['AmountPaid']?></td>
                    <td><?=$row5['payment_Date']?></td>
					<td><?="Employee ".$result18['EmpNo']?></td>
					<td><?=$result18['D_O_LastMeeting']?></td>
					<td>
						<form action="admin-edit-customer-policies.php" method="get">
							<input id="val" type="text" name="polno" value="<?=$row4['PolicyNo']?>">
							<input id="val" type="text" name="NIC" value="<?=$row4['NIC']?>">
							<input id="val" type="text" name="paymentno" value="<?=$row5['PaymentNo']?>">
							<input id="inp" type="submit" value="Edit">
					    </form>
					</td>
				    </tr>
				<?php
                    }
				}
				?>
			</tbody>
		</table>
		<br/>
		<form action="admin-add-customer-policies.php">
			<input type="submit" value="Add a New Customer Policy" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
		<br/>
		<form action="admin-add-customerpayment.php">
			<input type="submit" value="Add a New Customer Payment" style="background-color:black;color:white;padding:10px;border-radius:5px;">
		</form>
	</div>

</body>
</html>