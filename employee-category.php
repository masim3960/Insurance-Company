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
        <?php
                $empno = $_GET['EMPNO'];
                $query14 = "SELECT * FROM `accountant` WHERE `EmpNo`='$empno'";
				$result14 = mysqli_fetch_assoc(mysqli_query($con,$query14));
                $query15 = "SELECT * FROM `agent` WHERE `EmpNo`='$empno'";
				$result15 = mysqli_fetch_assoc(mysqli_query($con,$query15));
                $query16 = "SELECT * FROM `clerk` WHERE `EmpNo`='$empno'";
				$result16 = mysqli_fetch_assoc(mysqli_query($con,$query16));
                $query17 = "SELECT * FROM `areasofworking` WHERE `EmpNo`='$empno'";  #for salesman 
				$result17 = mysqli_query($con,$query17);
                $query18 = "SELECT * FROM `teammembers` WHERE `EmpNo`='$empno'";  #for manager
				$result18 = mysqli_query($con,$query18);
                if ($result14){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Desk Number</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Accountant</td>
                            <td><?=$result14['DeskNo']?></td>
                            <td>
						    <form action="edit-accountant.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$empno?>">
							<input id="inp" type="submit" value="Edit">
					        </form>
					        </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }elseif($result15){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Agent ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agent</td>
                            <td><?=$result15['AgentID']?></td>
                            <td><?=$result15['username']?></td>
                            <?php
                            $usn = $result15['username'];
                            $query19 = "SELECT `password` FROM `agent_account` WHERE `username`='$usn'";
                            $result19 = mysqli_fetch_assoc(mysqli_query($con,$query19));
                            ?>
                            <td><?=$result19['password']?></td>
                            <td>
						    <form action="edit-agent.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$empno?>">
							<input id="inp" type="submit" value="Edit">
					        </form>
					        </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }elseif($result16){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Shift Timing</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr>
                            <td>Clerk</td>
                            <td><?=$result16['ShiftTiming']?></td>
                            <td>
						    <form action="edit-clerk.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$empno?>">
							<input id="inp" type="submit" value="Edit">
					        </form>
					        </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }elseif($result17){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Areas of Working</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query20 = "SELECT * FROM `areasofworking` WHERE `EmpNo`='$empno'";
                            $result20 = mysqli_query($con,$query20);
                            while($row4=mysqli_fetch_assoc($result20)){
                            ?>
                            <tr>
                            <td>Salesman</td>
                            <td><?=$row4['Areas']?></td>
                            <?php
                        }
                        ?>
                            <td>
						    <form action="edit-salesman.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$empno?>">
							<input id="inp" type="submit" value="Edit">
					        </form>
					        </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }
                elseif($result18){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Team Members</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query21 = "SELECT * FROM `teammembers` WHERE `EmpNo`='$empno'";
                            $result21 = mysqli_query($con,$query21);
                            while($row5=mysqli_fetch_assoc($result21)){
                            ?>
                            <tr>
                            <td>Manager</td>
                            <td><?=$row5['TeamMember']?></td>
                            <?php
                        }
                        ?>
                        <td>
						    <form action="edit-manager.php" method="get">
							<input id="val" type="text" name="empno" value="<?=$empno?>">
							<input id="inp" type="submit" value="Edit">
					        </form>
					        </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }
        ?>
	</div>

</body>
</html>