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
  <h1 id="signup">Add a New Employee</h1>

  <?php
    $empno = $_GET["empno"] ;
    $empname = $_GET["empname"];
    $empphno = $_GET["empphno"];
    $empemail = $_GET["empemail"];
    $empsal = $_GET["empsal"];
    $hoursworked = $_GET["hoursworked"];
    $hiredate = $_GET["hiredate"];
    $branchno = $_GET["branchno"];
    $type = $_GET["EmpType"];
    if(!empty($type)){
       if($type==="Accountant"){
           ?>
    <form class="row g-3" method="post">
    <div class="col-md-6">
    <label for="inputDeskNo" class="form-label">Desk Number</label>
    <input type="number" name="deskno" class="form-control" id="inputDeskNo" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
  </form>
  <?php
      if(isset($_POST["submit"])){
        $deskno = $_POST['deskno'];
        $query3 = "INSERT INTO `employee`(`EmpNo`, `EmpName`, `EmpPh_No`, `EmpEmail`, `Salary`, `HoursWorked`, `Hiredate`, `BranchNo`) VALUES ('$empno','$empname','$empphno','$empemail','$empsal','$hoursworked','$hiredate','$branchno')";
        $result3 = mysqli_query($con,$query3);
        $query4 = "INSERT INTO `accountant`(`EmpNo`, `DeskNo`) VALUES ('$empno','$deskno')";
        $result4 = mysqli_query($con,$query4);
        ?>
        <p>Employee Added</p>
        <?php
      }
      }
      elseif($type==="Agent"){
        ?>
    <form class="row g-3" method="post">
    <div class="col-md-6">
    <label for="inputAgentUsername" class="form-label">Agent Username</label>
    <input type="text" name="agentusername" class="form-control" id="inputAgentUsername" required>
  </div>
  <div class="col-md-6">
    <label for="inputAgentPassword" class="form-label">Agent Password</label>
    <input type="password" name="agentpassword" class="form-control" id="inputAgentPassword" required>
  </div>
  <div class="col-md-6">
    <label for="inputAgentID" class="form-label">Agent ID</label>
    <input type="number" name="agentid" class="form-control" id="inputAgentID" required>
  </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
  <?php
   if(isset($_POST["submit"])){
    $agentusername = $_POST['agentusername'];
    $agentusername = $_POST['agentpassword'];
    $agentid = $_POST['agentid'];
    $query5 = "INSERT INTO `employee`(`EmpNo`, `EmpName`, `EmpPh_No`, `EmpEmail`, `Salary`, `HoursWorked`, `Hiredate`, `BranchNo`) VALUES ('$empno','$empname','$empphno','$empemail','$empsal','$hoursworked','$hiredate','$branchno')";
    $result5 = mysqli_query($con,$query5);
    $query6 = "INSERT INTO `agent_account`(`username`, `password`) VALUES ('$agentusername','$agentusername')";
    $result6 = mysqli_query($con,$query6);
    $query7 = "INSERT INTO `agent`(`EmpNo`, `AgentID`, `username`) VALUES ('$empno','$agentid','$agentusername')";
    $result7 = mysqli_query($con,$query7);
    ?>
    <p>Employee Added</p>
    <?php
  }
      }
      elseif($type==="Clerk"){
        ?>
        <form class="row g-3" method="post">
        <div class="col-md-6">
        <label for="inputShiftTiming" class="form-label">Shift Timing</label>
        <input type="text" name="shifttiming" class="form-control" id="inputShiftTiming" required>
      </div>
    <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
      <?php
       if(isset($_POST["submit"])){
        $shifttiming = $_POST['shifttiming'];
        $query8 = "INSERT INTO `employee`(`EmpNo`, `EmpName`, `EmpPh_No`, `EmpEmail`, `Salary`, `HoursWorked`, `Hiredate`, `BranchNo`) VALUES ('$empno','$empname','$empphno','$empemail','$empsal','$hoursworked','$hiredate','$branchno')";
        $result8 = mysqli_query($con,$query8);
        $query9 = "INSERT INTO `clerk`(`EmpNo`, `ShiftTiming`) VALUES ('$empno','$shifttiming')";
        $result9 = mysqli_query($con,$query9);
        ?>
        <p>Employee Added</p>
        <?php
      }
      }
      elseif($type==="Manager"){
        ?>
        <form class="row g-3" method="post">
        <div class="col-md-6">
    <label for="inputTeamMembers" class="form-label">Team Members(Enter separated by comma with no spaces)</label>
    <input type="text" name="teammembers" class="form-control" id="inputTeamMembers" required>
  </div>
  <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
      <?php
      if(isset($_POST["submit"])){
        $teammembers = explode(",",$_POST["teammembers"]);
        $query10 = "INSERT INTO `employee`(`EmpNo`, `EmpName`, `EmpPh_No`, `EmpEmail`, `Salary`, `HoursWorked`, `Hiredate`, `BranchNo`) VALUES ('$empno','$empname','$empphno','$empemail','$empsal','$hoursworked','$hiredate','$branchno')";
        $result10 = mysqli_query($con,$query10);
        foreach($teammembers as $teammember){
            $query = "INSERT INTO `teammembers`(`EmpNo`, `TeamMember`) VALUES ('$empno','$teammember')";
            $result = mysqli_query($con,$query);
        }
        ?>
        <p>Employee Added</p>
        <?php
      }
      }
    elseif($type==="Salesman"){
        ?>
        <form class="row g-3" method="post">
        <div class="col-md-6">
    <label for="inputAreasOfWorking" class="form-label">Areas Of Working(Enter separated by comma with no spaces)</label>
    <input type="text" name="areasofworking" class="form-control" id="inputAreasOfWorking" required>
  </div>
  <div class="col-12">
    <input type="submit" name="submit" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
    </div>
    </form>
      <?php
      if(isset($_POST["submit"])){
        $areasofworking = explode(",",$_POST["areasofworking"]);
        $query10 = "INSERT INTO `employee`(`EmpNo`, `EmpName`, `EmpPh_No`, `EmpEmail`, `Salary`, `HoursWorked`, `Hiredate`, `BranchNo`) VALUES ('$empno','$empname','$empphno','$empemail','$empsal','$hoursworked','$hiredate','$branchno')";
        $result10 = mysqli_query($con,$query10);
        foreach($areasofworking as $areaofworking){
            $query = "INSERT INTO `areasofworking`(`EmpNo`, `Areas`) VALUES ('$empno','$areaofworking')";
            $result = mysqli_query($con,$query);
        }
        ?>
        <p>Employee Added</p>
        <?php
      }
      }
    }else{
      ?>
      <br/>
      <p>Please Enter all details</p>
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