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

  <?php
if(isset($_POST["submit"])){
  $empno = $_GET["empno"];
  $policyno = $_POST["policyno"];
  $paymentnumber = $_POST["paymentnumber"];
  $amountpaid = $_POST["amountpaid"];
  $paymentdate = $_POST["paymentdate"];
  $query4 = "SELECT * FROM `payment` WHERE `PolicyNo`='$policyno' AND `PaymentNo`='$paymentnumber'";
  $result4 = mysqli_fetch_assoc(mysqli_query($con,$query4));
  if($result4){
    ?>
    <p>This Payment Number for this Policy already exists. Please try entering another payment/policy number </p>
    <?php
  }else{
    $queryy = "SELECT `EmpNo` FROM `deals` WHERE `NIC`=(SELECT `NIC` FROM `takes` WHERE `PolicyNo`='$policyno')";
    $resultt = mysqli_fetch_assoc(mysqli_query($con,$queryy));
    if($resultt['EmpNo']===$empno){
        $query5 = "INSERT INTO `payment`(`PolicyNo`, `PaymentNo`, `AmountPaid`, `payment_Date`) VALUES ('$policyno','$paymentnumber','$amountpaid','$paymentdate')";
    $result5 = mysqli_query($con,$query5);  
  ?><h2 style="margin-left:50px;text-align:center">Payment Added</h2><?php
    }else{
        ?>
        <p>You can only add payments of Your Customers</p>
        <?php
    }
  }
};
?>

  <h1 id="signup">Add a New Customer Payment</h1>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="inputPolicyNo" class="form-label">Policy Number</label>
    <select name="policyno">
        <option value="">Select Policy Number</option>
        <?php
      $query1 = "SELECT * FROM `policy`";
      $result1 = mysqli_query($con,$query1);
        while($optpol=mysqli_fetch_assoc($result1)){
          ?>
          <option value="<?=$optpol["PolicyNo"]?>"><?=$optpol["PolicyNo"]?></option>
          <?php
      }
      ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputPaymentNumber" class="form-label">Payment Number</label>
    <input type="number" name="paymentnumber" class="form-control" id="inputPaymentNumber" required>
  </div>
  <div class="col-md-6">
    <label for="inputAmountPaid" class="form-label">Amount Paid</label>
    <input type="number" name="amountpaid" class="form-control" id="inputAmountPaid" required>
  </div>
  <div class="col-md-6">
    <label for="inputPaymentDate" class="form-label">Payment Date</label>
    <input type="date" name="paymentdate" class="form-control" id="inputPaymentDate" required>
  </div>
  
  <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
  </div>
</form>

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