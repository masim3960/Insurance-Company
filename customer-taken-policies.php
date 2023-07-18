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
				<li><img src="images/policy1.png"><p><a href="#">Show My Policies</a></p></li>
                <li><img src="images/customer1.png"><p><a href="customer-details.php">My Details</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

	<div class="content">
		<h1>AGENT LOGIN</h1>
		<p>Welcome Agent</p>
		<table class="cust_table">
			<thead>
			<tr>
				<th>Policy Number</th>
				<th>Customer Name</th>
				<th>Duration</th>
                <th>Payment Number</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
                <th>Dealed By</th>
				<th>Date of last meeting</th>
			</tr>
			</thead>
			<tbody>
				<?php
                $usn = $_GET['username'];
                $query10 = "SELECT `NIC` FROM `customer` WHERE `username`='$usn'";
                $result10 = mysqli_fetch_assoc(mysqli_query($con,$query10));
                $nic__ = $result10['NIC'];
                $query11 = "SELECT * FROM `customer` WHERE `NIC`='$nic__'";
                $result11 = mysqli_fetch_assoc(mysqli_query($con,$query11));
                $name = $result11['FirstName']." ".$result11['LastName'];
                $query13 = "SELECT * FROM `deals` WHERE `NIC`='$nic__'";
                $result13 = mysqli_fetch_assoc(mysqli_query($con,$query13));
                $query17 = "SELECT * FROM `takes` WHERE `NIC` LIKE '$nic__'";
                $result17 = mysqli_query($con,$query17);
                while($row=mysqli_fetch_assoc($result17)){
                      $polno = $row['PolicyNo'];
                      $query12 = "SELECT * FROM `payment` WHERE `PolicyNo`=$polno";
                      $result12 = mysqli_query($con,$query12);
                      while($row1=mysqli_fetch_assoc($result12)){
                        ?>
                        <td><?=$row['PolicyNo']?></td>
                        <td><?=$name?></td>
                        <td><?=$row['Duration']?></td>
                        <td><?=$row1['PaymentNo']?></td>
                        <td><?=$row1['AmountPaid']?></td>
                        <td><?=$row1['payment_Date']?></td>
                        <td><?="Employee Number : ".$result13['EmpNo']?></td>
                        <td><?=$result13['D_O_LastMeeting']?></td>
                        <?php
                      }
                      ?>
                <?php
                }
                ?>
			</tbody>
		</table>
	</div>

</body>
</html>