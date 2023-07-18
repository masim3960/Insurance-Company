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
  $empno = $_GET['empno'];
  $query7 = "SELECT * FROM `teammembers` WHERE `EmpNo`='$empno'";
  $result7 = mysqli_query($con,$query7);
  $members = array();
  while($row=mysqli_fetch_assoc($result7)){
    $member = $row['TeamMember'];
    array_push($members,$member);
  }
if(isset($_POST["submit"])){
  $members = $_POST["areasofworking"];
  $teammembers = explode(",",$members);
  $query1 = "DELETE FROM `areasofworking` WHERE `EmpNo`='$empno'";
  $result1 = mysqli_query($con,$query1);
  foreach($teammembers as $teammember){
    $query4 = "INSERT INTO `teammembers`(`EmpNo`, `TeamMember`) VALUES ('$empno','$teammember')";
    $result4 = mysqli_query($con,$query4); 
  }
  ?><h2 style="margin-left:50px;text-align:center">Successfully Edited</h2><?php
};
?>

<h1 id="signup">Edit Manager Information</h1>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="inputTeamMembers" class="form-label">Team Members</label>
    <input type="text" name="teammembers" class="form-control" id="inputTeamMembers" value="<?=implode(",",$members)?>" required>
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