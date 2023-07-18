<?php
include "site_db_con.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elite Choice Insurance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <header>
    <nav id="header-nav" class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="images/insurance.jpg" alt="Logo" width="150" height="100" class="d-inline-block align-text-top">
          
        </a>
        <button id="collapsable-btn "class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            <a class="nav-link" href="products.html">Products</a>
            <a class="nav-link" href="about.html">About Us</a>
            <a class="nav-link"href="contact.html">Contact</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div id="main-content" class="container">
    <div class="jumbotron">
      <img src="images/jumbotron_768.jpg" class="img-fluid d-block d-sm-none avatar" opacity="0.7">
    </div>
    <div class="loginbox">
          <h1>Login Here</h1>
          <form method="post" action="#">
          <p>Username</p> <input type="text" name="username" placeholder="Enter Username">
          <p>Password</p> <input type="password" name="password" placeholder="Enter Password">
          <input type="submit" name="admin" value="Login as Admin">
          <input type="submit" name="agent" value="Login as Agent">
          <input type="submit" name="customer" value="Login as Customer">
          <a href="signup.php" style="color:black;">Don't have an account?</a>
          </form>

          <?php
          $pass_admin = "";
          $pass_agent = "";
          $pass_cust = "";
          if(isset($_POST["admin"]) or isset($_POST["agent"]) or isset($_POST["customer"])){
            $username = $_POST["username"] ;
            $query1 = "SELECT `password` FROM `admin_account` WHERE `username` = '$username'";
            $result1 = mysqli_fetch_assoc(mysqli_query($con,$query1));
            if($result1){
              $pass_admin = $result1['password'];
            }
            $query2 = "SELECT `password` FROM `agent_account` WHERE `username` = '$username'";
            $result2 = mysqli_fetch_assoc(mysqli_query($con,$query2));
            if($result2){
              $pass_agent = $result2['password'];
            }
            $query3 = "SELECT `password` FROM `customers_account` WHERE `username` = '$username'";
            $result3 = mysqli_fetch_assoc(mysqli_query($con,$query3));
            if($result3){
              $pass_cust = $result3['password'];
            }
          }

          if(isset($_POST["admin"])){
            if($_POST["password"]===$pass_admin && $pass_admin){
              header("Location:adminlogin.html");
            }else{
              ?><p>Please Enter Correct username/password</p> <?php
            }
          }elseif(isset($_POST["agent"])){
            if($_POST["password"]===$pass_agent && $pass_agent){
              $url = "agentlogin.php?username=".$username;
              header("Location:".$url);
            }else{
              ?><p>Please Enter Correct username/password</p> <?php
            }
          }elseif(isset($_POST["customer"])){
            if($_POST["password"]===$pass_cust && $pass_cust){
              $url = "customerlogin.php?username=".$username;
              header("Location:".$url);
            }else{
              ?><p>Please Enter Correct username/password</p> <?php
            }
          }
          ?>

    </div><!----End of Login-------->
  </div><!----End of main content-------->

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