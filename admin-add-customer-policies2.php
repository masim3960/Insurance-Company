<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/signupstyles.css">
  
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<header>
    <nav id="header-nav" class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="images/insurance.jpg" alt="Logo" width="150" height="100" class="d-inline-block align-text-top">
          
        </a>
        <button id="collapsable-btn1 "class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="index.html">Home</a>
            <a class="nav-link" href="products.html">Products</a>
            <a class="nav-link" href="about.html">About Us</a>
            <a class="nav-link"href="contact.html">Contact</a>
          </div>
        </div>
      </div>
    </nav>
  </header>



  <h1 id="signup">Add a New Customer Policy</h1>

  <?php
    $empno = $_GET["empno"] ;
    $niccc = $_GET["nic"];
    $query30 = "SELECT * FROM `deals` WHERE `NIC`='$niccc'";
    $result30 = mysqli_fetch_assoc(mysqli_query($con,$query30));
    $type = $_GET["InsType"];
    if(!empty($type)){
       if($type==="Health"){
           ?>
    <form class="row g-3" method="post">
    <div class="col-md-6">
    <label for="inputBtype" class="form-label">Blood Type</label>
    <input type="text" name="btype" class="form-control" id="inputBtype" required>
  </div>
  <div class="col-md-6">
    <label for="inputDiseases" class="form-label">Diseases(Enter separated by comma with no spaces)</label>
    <input type="text" name="diseases" class="form-control" id="inputDiseases" required>
  </div>
  <div class="col-md-6">
    <label for="inputPolicyNo" class="form-label">Policy Number</label>
    <input type="number" name="polno" class="form-control" id="inputPolicyNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputDuration" class="form-label">Duration(Months)</label>
    <input type="number" name="duration" class="form-control" id="inputDuration" required>
  </div>
  <div class="col-md-6">
    <label for="inputNoOfInstallations" class="form-label">Number Of Installations</label>
    <input type="number" name="noofinstallations" class="form-control" id="inputNoOfInstallations" required>
  </div>
  <div class="col-md-6">
    <label for="inputTotalAmount" class="form-label">Total Amount</label>
    <input type="number" name="totalamount" class="form-control" id="inputTotalAmount" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    <!-- <button type="submit" id="subbtn" class="btn btn-primary">Sign in</button> -->
    </div>
  </form>
  <?php
      if(isset($_POST["submit"])){
        $policyno = $_POST['polno'];
        $duration = $_POST['duration'];
        $noofinstallations = $_POST['noofinstallations'];
        $totalamount =$_POST['totalamount'];
        $btype = $_POST["btype"];
        $diseases = explode(",",$_POST["diseases"]);
        $query01 = "SELECT * FROM `policy` WHERE `PolicyNo`='$policyno'";
        $result01 = mysqli_fetch_assoc(mysqli_query($con,$query01));
        if($result01){
          ?>
          <p>Policy already exists Please enter a different Policy Number</p>
          <?php
        }else{
          if($result30){
            $query31 = "UPDATE `deals` SET `D_O_LastMeeting`=SYSDATE() WHERE `EmpNo`='$empno' AND `NIC`='$niccc'";
            $result31 = mysqli_query($con,$query31);
          }else{
            $query4 = "INSERT INTO `deals`(`EmpNo`, `NIC`, `D_O_LastMeeting`) VALUES ('$empno','$niccc',SYSDATE())";
            $result4 = mysqli_query($con,$query4);
          }
          $query3 = "INSERT INTO `healthinsurancecustomer`(`NIC`, `BloodType`) VALUES ('$niccc','$btype')";
          $result3 = mysqli_query($con,$query3);
          $query35 = "INSERT INTO `policy`(`PolicyNo`, `Type`, `No_of_Installations`, `TotalAmount`) VALUES ('$policyno','Health Insurance','$noofinstallations','$totalamount')";
          $result35 = mysqli_query($con,$query35);
          $query5 = "INSERT INTO `takes`(`PolicyNo`, `NIC`, `Duration`) VALUES ('$policyno','$niccc','$duration')";
          $result5 = mysqli_query($con,$query5);
          foreach($diseases as $disease){
              $query = "INSERT INTO `diseases`(`NIC`, `Disease`) VALUES ('$niccc','$disease')";
              $result = mysqli_query($con,$query);
          }
          ?>
        <p>Policy Added</p>
        <?php
        }
      }
      }
      elseif($type==="Property"){
        ?>
    <form class="row g-3" method="post">
    <div class="col-md-6">
    <label for="inputPropertyNo" class="form-label">Property Number</label>
    <input type="number" name="propertyno" class="form-control" id="inputPropertyNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputMortage" class="form-label">Mortage Agreement</label>
    <select name="mortage" id="inputMortage">
    <option value="">Select Mortage Agreement</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputPropertyValue" class="form-label">Property Value</label>
    <input type="number" name="propertyvalue" class="form-control" id="inputPropertyValue" required>
  </div>
  <div class="col-md-6">
    <label for="inputPropertyAddress" class="form-label">Property Address</label>
    <input type="text" name="propertyaddress" class="form-control" id="inputPropertyAddress" required>
  </div>
  <div class="col-md-6">
    <label for="inputPolicyNo" class="form-label">Policy Number</label>
    <input type="number" name="polno" class="form-control" id="inputPolicyNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputDuration" class="form-label">Duration(Months)</label>
    <input type="number" name="duration" class="form-control" id="inputDuration" required>
  </div>
  <div class="col-md-6">
    <label for="inputNoOfInstallations" class="form-label">Number Of Installations</label>
    <input type="number" name="noofinstallations" class="form-control" id="inputNoOfInstallations" required>
  </div>
  <div class="col-md-6">
    <label for="inputTotalAmount" class="form-label">Total Amount</label>
    <input type="number" name="totalamount" class="form-control" id="inputTotalAmount" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
  <?php
   if(isset($_POST["submit"])){
    $policyno = $_POST['polno'];
    $duration = $_POST['duration'];
    $noofinstallations = $_POST['noofinstallations'];
    $totalamount =$_POST['totalamount'];
    $propertyno = $_POST["propertyno"];
    $mortage = $_POST["mortage"];
    $propertyvalue = $_POST["propertyvalue"];
    $propertyaddress = $_POST["propertyaddress"];
    $query01 = "SELECT * FROM `policy` WHERE `PolicyNo`='$policyno'";
    $result01 = mysqli_fetch_assoc(mysqli_query($con,$query01));
    if($result01){
          ?>
          <p>Policy already exists Please enter a different Policy Number</p>
          <?php
        }else{if($result30){
          $query31 = "UPDATE `deals` SET `D_O_LastMeeting`=SYSDATE() WHERE `EmpNo`='$empno' AND `NIC`='$niccc'";
          $result31 = mysqli_query($con,$query31);
        }else{
          $query6 = "INSERT INTO `deals`(`EmpNo`, `NIC`, `D_O_LastMeeting`) VALUES ('$empno','$niccc',SYSDATE())";
          $result6 = mysqli_query($con,$query6);
        }
        $query35 = "INSERT INTO `policy`(`PolicyNo`, `Type`, `No_of_Installations`, `TotalAmount`) VALUES ('$policyno','Property Insurance','$noofinstallations','$totalamount')";
        $result35 = mysqli_query($con,$query35);
        $query7 = "INSERT INTO `takes`(`PolicyNo`, `NIC`, `Duration`) VALUES ('$policyno','$niccc','$duration')";
        $result7 = mysqli_query($con,$query7);
        $query8 = "INSERT INTO `property`(`PropertyNo`, `PropertyValue`, `Addresss`) VALUES ('$propertyno','$propertyvalue','$propertyaddress')";
        $result8 = mysqli_query($con,$query8);
        $query9 = "INSERT INTO `propertyinsurancecustomer`(`NIC`, `PropertyNo`, `MortageAgreement`) VALUES ('$niccc','$propertyno','$mortage')";
        $result9 = mysqli_query($con,$query9);
        ?>
        <p>Policy Added</p>
        <?php
        }
  }
      }
      elseif($type==="Vehicle"){
        ?>
        <form class="row g-3" method="post">
        <div class="col-md-6">
        <label for="inputVehiclRegNo" class="form-label">Vehicle Registration Number</label>
        <input type="number" name="vregno" class="form-control" id="inputVehiclRegNo" required>
      </div>
      <div class="col-md-6">
        <label for="inputVehicleName" class="form-label">Vehicle Name</label>
        <input type="text" name="vehiclename" class="form-control" id="inputVehicleName" required>
      </div>
      <div class="col-md-6">
        <label for="inputColor" class="form-label">Vehicle Color</label>
        <input type="text" name="vehiclecolor" class="form-control" id="inputColor" required>
      </div>
      <div class="col-md-6">
        <label for="inputValue" class="form-label">Vehicle Value</label>
        <input type="text" name="vehiclevalue" class="form-control" id="inputValue" required>
      </div>
      <div class="col-md-6">
    <label for="inputPolicyNo" class="form-label">Policy Number</label>
    <input type="number" name="polno" class="form-control" id="inputPolicyNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputDuration" class="form-label">Duration(Months)</label>
    <input type="number" name="duration" class="form-control" id="inputDuration" required>
  </div>
  <div class="col-md-6">
    <label for="inputNoOfInstallations" class="form-label">Number Of Installations</label>
    <input type="number" name="noofinstallations" class="form-control" id="inputNoOfInstallations" required>
  </div>
  <div class="col-md-6">
    <label for="inputTotalAmount" class="form-label">Total Amount</label>
    <input type="number" name="totalamount" class="form-control" id="inputTotalAmount" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
      <?php
       if(isset($_POST["submit"])){
        $policyno = $_POST['polno'];
        $duration = $_POST['duration'];
        $noofinstallations = $_POST['noofinstallations'];
        $totalamount =$_POST['totalamount'];
        $vregno = $_POST["vregno"];
        $vehiclename = $_POST["vehiclename"];
        $vehiclecolor = $_POST["vehiclecolor"];
        $vehiclevalue = $_POST["vehiclevalue"];
        $query01 = "SELECT * FROM `policy` WHERE `PolicyNo`='$policyno'";
        $result01 = mysqli_fetch_assoc(mysqli_query($con,$query01));
        if($result01){
          ?>
          <p>Policy already exists Please enter a different Policy Number</p>
          <?php
        }else{
          if($result30){
            $query31 = "UPDATE `deals` SET `D_O_LastMeeting`=SYSDATE() WHERE `EmpNo`='$empno' AND `NIC`='$niccc'";
            $result31 = mysqli_query($con,$query31);
          }else{
            $query10 = "INSERT INTO `deals`(`EmpNo`, `NIC`, `D_O_LastMeeting`) VALUES ('$empno','$niccc',SYSDATE())";
            $result10 = mysqli_query($con,$query10);
          }
          $query35 = "INSERT INTO `policy`(`PolicyNo`, `Type`, `No_of_Installations`, `TotalAmount`) VALUES ('$policyno','Vehicle Insurance','$noofinstallations','$totalamount')";
          $result35 = mysqli_query($con,$query35);
          $query11 = "INSERT INTO `takes`(`PolicyNo`, `NIC`, `Duration`) VALUES ('$policyno','$niccc','$duration')";
          $result11 = mysqli_query($con,$query11);
          $query12 = "INSERT INTO `vehicle`(`VehicleRegNo`, `VehicleName`, `Color`, `VehicleValue`) VALUES ('$vregno','$vehiclename','$vehiclecolor','$vehiclevalue')";
          $result12 = mysqli_query($con,$query12);
          $query13 = "INSERT INTO `vehicleinsurancecustomer`(`NIC`, `VehicleRegNo`) VALUES ('$niccc','$vregno')";
          $result13 = mysqli_query($con,$query13);
          ?>
          <p>Policy Added</p>
          <?php
        }
      }
      }
      elseif($type==="Liability"){
        ?>
        <form class="row g-3" method="post">
        <div class="col-md-6">
        <label for="inputCCNo" class="form-label">Credit Card Number</label>
        <input type="number" name="ccno" class="form-control" id="inputCCNo" required>
      </div>
      <div class="col-md-6">
        <label for="inputBankName" class="form-label">Bank Name</label>
        <input type="text" name="bankname" class="form-control" id="inputBankName" required>
      </div>
      <div class="col-md-6">
        <label for="inputBankAccNo" class="form-label">Bank Account Number</label>
        <input type="number" name="bankaccno" class="form-control" id="inputBankAccNo" required>
      </div>
      <label for="inputPolicyNo" class="form-label">Policy Number</label>
    <input type="number" name="polno" class="form-control" id="inputPolicyNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputDuration" class="form-label">Duration(Months)</label>
    <input type="number" name="duration" class="form-control" id="inputDuration" required>
  </div>
  <div class="col-md-6">
    <label for="inputNoOfInstallations" class="form-label">Number Of Installations</label>
    <input type="number" name="noofinstallations" class="form-control" id="inputNoOfInstallations" required>
  </div>
  <div class="col-md-6">
    <label for="inputTotalAmount" class="form-label">Total Amount</label>
    <input type="number" name="totalamount" class="form-control" id="inputTotalAmount" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
      <?php
      if(isset($_POST["submit"])){
        $policyno = $_POST['polno'];
        $duration = $_POST['duration'];
        $noofinstallations = $_POST['noofinstallations'];
        $totalamount =$_POST['totalamount'];
        $ccno = $_POST["ccno"];
        $bankname = $_POST["bankname"];
        $bankaccno = $_POST["bankaccno"];
        $query01 = "SELECT * FROM `policy` WHERE `PolicyNo`='$policyno'";
        $result01 = mysqli_fetch_assoc(mysqli_query($con,$query01));
        if($result01){
          ?>
          <p>Policy already exists Please enter a different Policy Number</p>
          <?php
        }else{
          if($result30){
            $query31 = "UPDATE `deals` SET `D_O_LastMeeting`=SYSDATE() WHERE `EmpNo`='$empno' AND `NIC`='$niccc'";
            $result31 = mysqli_query($con,$query31);
          }else{
            $query14 = "INSERT INTO `deals`(`EmpNo`, `NIC`, `D_O_LastMeeting`) VALUES ('$empno','$niccc',SYSDATE())";
            $result14 = mysqli_query($con,$query14);
          }
          $query35 = "INSERT INTO `policy`(`PolicyNo`, `Type`, `No_of_Installations`, `TotalAmount`) VALUES ('$policyno','Liability Lines Insurance','$noofinstallations','$totalamount')";
          $result35 = mysqli_query($con,$query35);
          $query15 = "INSERT INTO `takes`(`PolicyNo`, `NIC`, `Duration`) VALUES ('$policyno','$niccc','$duration')";
          $result15 = mysqli_query($con,$query15);
          $query16 = "INSERT INTO `liabilitylinesinsurancecustomer`(`NIC`, `CreditCardNumber`, `BankName`, `BankAccountNumber`) VALUES ('$niccc','$ccno','$bankname','$bankaccno')";
          $result16 = mysqli_query($con,$query16);
          ?>
          <p>Policy Added</p>
          <?php
        }
      }
      }
    }else{
      ?>
      <br/>
      <p>Please select Insurance Type, Employee Number and Customer NIC</p>
      <?php
    }     
    ?>

<footer class="panel-footer">
    <div class="container">
      <div class="row text-center">
        <section id="sms" class="col-sm-4">
          <span>SMS</span><br>
          Your Query to <span>8858</span>
          <hr class="d-sm-none">
        </section>
        
        <section id="call" class="col-sm-4">
          <span>CALL US</span><br>
          Call our Contact Center<br>
          <span>(021) 111 111 111</span>
          <hr class="d-sm-none">
        </section>
        
        <section id="testimonials" class="col-sm-4">
          <span>FEEDBACK & COMPLAINTS</span><br>
          info@elitechoiceinsurance.com<br>
          complaints@elitechoiceinsurance.com
        </section>
      </div>
      <div id="copyright" class="text-center">&copy; 2023 Elite Choice Insurance. All rights reserved.</div>
    </div>
  </footer>
</body>
</html>