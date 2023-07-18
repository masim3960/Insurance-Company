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
	<link rel="stylesheet" href="css/adminlogin.css" type="text/css">
</head>

<?php
		$usn = $_GET['username'];
		$urll = "customer-taken-policies.php?username=".$usn;
		$url2 = "customer-details.php?username=".$usn;
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
				<li><img src="images/policy1.png"><p><a href="customer-policies.php">Show Available Policies</a></p></li>
				<li><img src="images/policy1.png"><p><a href="<?=$urll?>">Show My Policies</a></p></li>
				<li><img src="images/customer1.png"><p><a href="<?=$url2?>">My Details</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
		
	</header>
	<div class="content">
		<h1>CUSTOMER LOGIN</h1>
		<p>Welcome</p>
		<table>
			<tbody>
				<tr>
					<td><img src="images/policy1.png" class="image"><a href="customer-policies.php" class="txt">Show Available Policies</a></td>
				</tr>
				<tr>
				<td><img src="images/policy1.png" class="image"><a href="<?=$urll?>" class="txt">Show My Policies</a></td>
				</tr>
				<tr>
				<td><img src="images/customer1.png" class="image"><a href="<?=$url2?>" class="txt">My Details</a></td>
				</tr>
			</tbody>
		</table>
	</div>

</body>
</html>