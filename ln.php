<?php
include "loginfo.php"
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
        .FLP{
          margin-left: 4px;
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: -357px;
        margin-left: -50px;
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
        margin-left: 1em;
        margin-right: 1em;
        size: 90em;
        box-shadow: 5px 5px 4px 5px #888888;
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
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 5px;
        margin-left: 1em;
        margin-right: 1em;
        size: 90em;
        box-shadow: 5px 5px 4px 5px #888888;
        }
    }
    </style>
    <title>Login</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
  <div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
<div class="container mt-4">

<form action="loginfo.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
    <!-- <p class="FLP"><a href="changepassotp.php">Forgot Login Password</a></p> -->
  </div>
  <div class="form-group">
    <label for="exampleInputvkey">Vkey</label>
    <input type="text" name="vkey" class="form-control" id="exampleInputvkey" placeholder="Enter Vkey (Click here to know about Vkey)">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <p style="text-align: center;">New user?<br>Create Account <a href="register.php">Sign Up</a></p>
</form>

<div id="message">
  <h6>Know about your Vkey:</h6>
  <p class="optional">To get your Vkey you need to verify your business/firm/<br>industry with our executive. <a href="verify.php">Click here</a> and send your<br> name, company/firm name, email address and mobile<br> number. As soon as you send this information through<br> message box, our executive get back to you soon and<br> validate your details. Then you will get your Vkey. <br><h6>For now this feature is disabled, you can directly<br> login without vkey.</h6></p>
</div>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
var myInput = document.getElementById("exampleInputvkey");
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
