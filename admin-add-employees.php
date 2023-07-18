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
<form class="row g-3" method="get" action="admin-add-employees2.php">
  <div class="col-md-6">
    <label for="inputEmpno" class="form-label">Employee Number</label>
    <input type="number" name="empno" class="form-control" id="inputEmpno" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmpName" class="form-label">Employee Name</label>
    <input type="text" name="empname" class="form-control" id="inputEmpName" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmpPhNo" class="form-label">Employee Phone Number</label>
    <input type="number" name="empphno" class="form-control" id="inputEmpPhNo" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmpEmail" class="form-label">Employee Email</label>
    <input type="email" name="empemail" class="form-control" id="inputEmpEmail" required>
  </div>
  <div class="col-md-6">
    <label for="inputSalary" class="form-label">Employee Salary</label>
    <input type="number" name="empsal" class="form-control" id="inputSalary" required>
  </div>
  <div class="col-md-6">
    <label for="inputHoursWorked" class="form-label">Hours Worked</label>
    <input type="number" name="hoursworked" class="form-control" id="inputHoursWorked" required>
  </div>
  <div class="col-md-6">
    <label for="inputHireDate" class="form-label">Hire Date</label>
    <input type="date" name="hiredate" class="form-control" id="inputHireDate" required>
  </div>
  <div class="col-md-6">
    <label for="inputBranchNo" class="form-label">Branch Number</label>
    <select name="branchno" id="inputBranchNo">
      <option value="">Select Branch Number</option>
      <?php
      $query1 = "SELECT * FROM `branch`";
      $result1 = mysqli_query($con,$query1);
        while($optbno=mysqli_fetch_assoc($result1)){
          ?>
          <option value="<?=$optbno["BranchNo"]?>"><?=$optbno["BranchNo"]?></option>
          <?php
      }
      ?>
    </select>
  </div>
  <div class="col-md-6">
    <select name="EmpType">
        <option value="">Select Employee Type</option>
        <option value="Accountant">Accountant</option>
        <option value="Agent">Agent</option>
        <option value="Clerk">Clerk</option>
        <option value="Manager">Manager</option>
        <option value="Salesman">Salesman</option>
    </select>
  </div>
    <div class="col-12">
    <input type="submit" name="done" style="background-color: black;color:white;border-radius: 5px;padding:0.5%">
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