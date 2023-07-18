<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agent</title>
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
                <li><img src="images/dashboard1.png"><p><a href="agent-login.php">Dashboard</a></p></li>
				<li><img src="images/customer1.png"><p><a href="agent-customer.php">My Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="#">My Customers Policies</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

    <?php
    $empno = $_GET['empno'];
    $urll = "agent-customer-policies.php?empno=".$empno;
    ?>

	<div class="content">
		<h1>AGENT LOGIN</h1>
		<p>Welcome Agent</p>
        <h2 id="policy-head" style="margin-top:20px;font-size:50px;">Availabe Policies</h2>
		<table class="cust_table">
			<thead>
			<tr>
				<th>Policy Number</th>
				<th>Policy Type</th>
				<th>No of Installations</th>
				<th>Total Amount</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query14 = "SELECT * FROM `policy`";
				$result14 = mysqli_query($con,$query14);
				while($row3=mysqli_fetch_assoc($result14)){
					?>
					<tr>
					<td><?=$row3['PolicyNo']?></td>
					<td><?=$row3['Type']?></td>
					<td><?=$row3['No_of_Installations']?></td>
					<td><?=$row3['TotalAmount']?></td>
					<td>
						<form action="admin-edit-policies.php" method="get">
							<input id="val" type="text" name="polno" value="<?=$row3['PolicyNo']?>">
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
        <a href="<?=$urll?>">Show Policies taken by my Customers</a>
	</div>

</body>
</html>