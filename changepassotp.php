<?php
require_once "config.php";

$email = "";
$email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "email cannot be blank";
        echo "<p class='echocss'>Email address cannot be blank.</p>";
    }
    else{
        $sql = "SELECT id FROM changepass WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the value of param email
            $param_email = trim($_POST['email']);   
            $email = trim($_POST['email']);    
        }
    }

$otp = rand(100000,999999);

// If there were no errors, go ahead and insert into the database
if(empty($email_err))
{
    $sql = "INSERT INTO changepass (email,otp) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss",$param_email,$param_otp);

        // Set these parameters
        $param_email = $email;
        $param_otp = $otp;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $to_email = $email;
          $subject = "Email Verification";
          $body = "Hi, your otp to change your account password is " . $otp;
          $headers = "From: nlistjob@gmail.com";

          if (mail($to_email, $subject, $body, $headers)) {
             header("location: otppasschange.php");
        }
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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
        .echocss{
          margin-left: 12em;
          margin-right: 7em;
          margin-top: 37px;
          position: absolute;
          color: red;
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
    }
    </style>
    <title>Change Password</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
  <div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
<div class="container mt-4">

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <button type="submit" class="btn btn-primary">Send OTP</button>
  <p style="text-align: center;">New user?<br>Create Account <a href="register.php">Sign Up</a></p>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
