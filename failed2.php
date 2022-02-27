<?php
error_reporting(0);
require_once "loginfo.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: ln.php');
	exit;
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
            background-image: url("img/posted.jpg");
            background-size: cover;
        }
        .card-img{
            margin-left: -25em;
            margin-bottom: -130px;
        }
        .card-title{
            font-weight:bold;
        }
    </style>
    <title>Failed</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
<div class="container mt-4">
<div class="card text-center">
  <div class="card-header">
  <img src="img/fl.png"/><img src="img/fl.png"/><img src="img/fl.png"/><img src="img/fl.png"/><img src="img/fl.png"/>
  </div>
  <div class="card-body">
    <p class="card-img"><img src="img/failed.png"></p>
    <h5 class="card-title">You are failed to apply for this post</h5>
    <p class="card-text">Something went wrong, try again to apply for this post.</p>
    <a href="career.php" class="btn btn-primary">Apply here</a>
  </div>
  <div class="card-footer text-muted">
  <p><span id='date-time'></span>.</p>
  </div>
</div>

</div>
<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>
  </body>
</html>