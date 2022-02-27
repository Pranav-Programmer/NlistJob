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
            background-color: skyblue;
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
    <title>Successful</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
<div class="container mt-4">
<div class="card text-center">
  <div class="card-header">            
  <img style="width: 64px;" src="img/success.png"><img style="width: 64px;" src="img/success.png"><img style="width: 64px;" src="img/success.png"><img style="width: 64px;" src="img/success.png"><img style="width: 64px;" src="img/success.png">
  </div>
  <div class="card-body">
    <p class="card-img"><img style="width: 120px;" src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/64/000000/external-feedback-uxui-icongeek26-linear-colour-icongeek26-4.png"/></p>
    <h5 class="card-title">You are feedback successfully submited</h5>
    <p class="card-text">Thanks for giving rating and feedback, we will read it and improve our portal according<br> to your suugestion.</p>
    <a href="index.php" class="btn btn-primary"><div class="home"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a></div>
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