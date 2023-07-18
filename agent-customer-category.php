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
                <li><img src="images/dashboard1.png"><p><a href="agentlogin.php">Dashboard</a></p></li>
				<li><img src="images/customer1.png"><p><a href="agent-customer.php">My Customers</a></p></li>
				<li><img src="images/policy1.png"><p><a href="agent-policies.php">My Customers Policies</a></p></li>
			</ul>
			<ul>
				<li><img src="images/logout1.png"><p><a href="index.php">Logout</a></p></li>
			</ul>
		</nav>
	</header>

	<div class="content">
		<h1>AGENT LOGIN</h1>
		<p>Welcome Agent</p>
        <?php
                $nic = $_GET['NIC'];
                $query7 = "SELECT * FROM `vehicleinsurancecustomer` WHERE `NIC`='$nic'";
				$result7 = mysqli_fetch_assoc(mysqli_query($con,$query7));
                $query8 = "SELECT * FROM `propertyinsurancecustomer` WHERE `NIC`='$nic'";
				$result8 = mysqli_fetch_assoc(mysqli_query($con,$query8));
                $query9 = "SELECT * FROM `liabilitylinesinsurancecustomer` WHERE `NIC`='$nic'";
				$result9 = mysqli_fetch_assoc(mysqli_query($con,$query9));
                $query10 = "SELECT * FROM `healthinsurancecustomer` WHERE `NIC`='$nic'";
				$result10 = mysqli_fetch_assoc(mysqli_query($con,$query10));
                if ($result7){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Customer Type</th>
                        <th>NIC</th>
                        <th>Vehicle Registration Number</th>
                        <th>Vehicle Name</th>
                        <th>Color</th>
                        <th>Vehicle Value</th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php
                            $regno = $result7['VehicleRegNo'];
                            $query11 = "SELECT * FROM `vehicle` WHERE `VehicleRegNo`='$regno'";
                            $result11 = mysqli_query($con,$query11);
                            while($row1=mysqli_fetch_assoc($result11)){
                                ?>
                            <tr>
                            <td>Vehicle Insurance Customer</td>
                            <td><?=$nic?></td>
                            <td><?=$result7['VehicleRegNo']?></td>
                            <td><?=$row1['VehicleName']?></td>
                            <td><?=$row1['Color']?></td>
                            <td><?=$row1['VehicleValue']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php
                }elseif($result8){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Customer Type</th>
                        <th>NIC</th>
                        <th>Property Number</th>
                        <th>Mortage Agreement</th>
                        <th>Property Value</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                            <?php
                            $pno = $result8['PropertyNo'];
                            $query12 = "SELECT * FROM `property` WHERE `PropertyNo`='$pno'";
                            $result12 = mysqli_query($con,$query12);
                            while($row2=mysqli_fetch_assoc($result12)){
                            ?>
                            <tr>
                            <td>Property Insurance Customer</td>
                            <td><?=$nic?></td>
                            <td><?=$result8['PropertyNo']?></td>
                            <td><?=$result8['MortageAgreement']?></td>
                            <td><?=$row2['PropertyValue']?></td>
                            <td><?=$row2['Addresss']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php
                }elseif($result9){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Customer Type</th>
                        <th>NIC</th>
                        <th>Credit Card Number</th>
                        <th>Bank Name</th>
                        <th>Bank Account Number</th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr>
                            <td>Liability Lines Insurance Customer</td>
                            <td><?=$nic?></td>
                            <td><?=$result9['CreditCardNumber']?></td>
                            <td><?=$result9['Bank Name']?></td>
                            <td><?=$result9['BankAccountNumber']?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                }elseif($result10){
                    ?>
                    <table class="cust_table">
                    <thead>
                    <tr>
                        <th>Customer Type</th>
                        <th>NIC</th>
                        <th>Blood Type</th>
                        <th>Diseases</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query12 = "SELECT * FROM `healthinsurancecustomer` WHERE `NIC`='$nic'";
                            $result12 = mysqli_fetch_assoc(mysqli_query($con,$query12));
                            $blood_type = $result12['BloodType'];
                            $query13 = "SELECT * FROM `diseases` WHERE `NIC`='$nic'";
                            $result13 = mysqli_query($con,$query13);
                            while($row3=mysqli_fetch_assoc($result13)){
                            ?>
                            <tr>
                            <td>Health Insurance Customer</td>
                            <td><?=$nic?></td>
                            <td><?=$blood_type?></td>
                            <td><?=$row3['Diseases']?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                }
        ?>
	</div>

</body>
</html>