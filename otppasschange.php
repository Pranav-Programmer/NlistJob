<?php

require_once "config.php";


$otp = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['otp'])))
    {
        $err = "Please enter an OTP";
        echo "<p class='echocss'>Please enter an OTP.</p>";
    }
    elseif(strlen(trim($_POST['otp'])) < 6){
      $err = "Please enter a correct otp.";
      echo "<p class='echocss'>Please enter a correct otp.</p>";
    }
    elseif(strlen(trim($_POST['otp'])) > 6){
      $err = "Please enter a correct otp.";
      echo "<p class='echocss'>Please enter a correct otp.</p>";
    }
    else{
        $otp = trim($_POST['otp']);
    }
}
if(empty($err))
{
  $sql = "SELECT id, email, otp FROM changepass WHERE otp = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $param_otp);
  $param_otp = $otp;
  
  // Try to execute this statement
  if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1)
        {
          mysqli_stmt_bind_result($stmt, $id, $email, $otp);
          if(mysqli_stmt_fetch($stmt))
          {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $id;
            $_SESSION["loggedin"] = true;
            //Redirect user to welcome page
            $_SESSION['login_user']=$email;
            
            header("location: changepass2.php");     
          } 
      }
      else{
        echo "<p class='echocss2'>Please enter a correct otp else you will not redirect to login page.</p>";
      }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body{
            background-image: url("img/SiteBg.jpg");
            background-size: cover:
        }
        form{
            background-color: #E5E8E8;
            margin-left: 24em;
            margin-right: 4em;
            margin-top: 6em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        .echocss{
          margin-left: 50em;
          margin-right: 31em;
          margin-top: 5px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 44em;
          margin-right: 20em;
          margin-top: 200px;
          position: absolute;
          color: #000;
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 10px;
        margin-left: 385px;
        width: 660px;
        box-shadow: 5px 5px 4px 5px #888888;
        }

        #message p {    
            font-size: 15px;
        }
        .home{
          position: absolute;
          margin-top: -80px;
          margin-left: 10px;
        }
        /*Styles for small screens*/

    @media screen and (max-width: 700px) {
      form{
            background-color: #E5E8E8;
            margin-left: -2em;
            margin-right: -4em;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 5px;
        margin-left: -1em;
        margin-right: 1em;
        width: 460px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
        .echocss{
          margin-left: 12em;
          margin-right: 7em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 8em;
          margin-right: 2em;
          margin-top: 200px;
          position: absolute;
          color: #000;
        }
        
    }
    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
      form{
            background-color: #E5E8E8;
            margin-left: -2em;
            margin-right: -4em;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        .echocss{
          margin-left: 12em;
          margin-right: 7em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 8em;
          margin-right: 2em;
          margin-top: 200px;
          position: absolute;
          color: #000;
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 5px;
        margin-left: -1em;
        margin-right: 1em;
        width: 460px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
    }
    @media screen and (max-width: 1156px) {
      form{
            background-color: #E5E8E8;
            margin-left: -2em;
            margin-right: -4em;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        .echocss{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 8em;
          margin-right: 2em;
          margin-top: 200px;
          position: absolute;
          color: #000;
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 5px;
        margin-left: -1em;
        margin-right: 1em;
        width: 660px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
    }
    </style>
    <title>Verification</title> 
  </head>
  <body>
  <div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
<div class="container mt-4">

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputnumber">OTP</label>
    <input type="number" name="otp" class="form-control" id="exampleInputnumber" placeholder="Enter OTP (Click here to know about OTP)">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <p style="text-align: center;">OTP not recived?<br>Registered again <a href="register.php">Sign Up</a></p>
</form>

<div id="message">
  <h6>Email Verification:</h6>
  <p class="optional">We send one time password on your registered email address. Please enter that here.</p>
</div>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
var myInput = document.getElementById("exampleInputnumber");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
