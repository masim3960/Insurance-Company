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
	<link rel="stylesheet" href="css/adminlogin.css" type="text/css">
</head>

<?php
		$usn = $_GET['username'];
		$query10 = "SELECT `EmpNo` FROM `agent` WHERE `username`='$usn'";
		$result10 = mysqli_fetch_assoc(mysqli_query($con,$query10));
		$empno = $result10['EmpNo'];
		$url1 = "agent-customer.php?empno=".$empno;
		$url2 = "agent-policies.php?empno=".$empno;
		?>

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
				<li><img src="images/dashboard1.png"><p><a href="#">Dashboard</a></p></li>
				<li><img src="images/customer1.png"><p><a href="<?=$urll?>">My Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="<?=$url2?>">My Customers Policies</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
		
	</header>
	<div class="content">
		<h1>AGENT LOGIN</h1>
		<p>Welcome Agent</p>
		<table>
			<tbody>
				<tr>
					<td><img src="images/customer1.png" class="image"><a href="<?=$url1?>" class="txt">My Customers</a></td>
				</tr>
				<tr>
					<td><img src="images/policy1.png" class="image"><a href="<?=$url2?>" class="txt">My Customers Policies</a></td>
				</tr>
			</tbody>
		</table>
	</div>

</body>
</html>