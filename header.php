<?php
   include "loginfo.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: ln.php');
	exit;
}

$stmt = $con->prepare('SELECT email FROM users WHERE email = ?');
$stmt->bind_param('i', $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #DCDCDC;
    position: fixed;
    height: 100%;
    overflow: auto;
  }
  
  /* Sidebar links */
  .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }

  /* Links on mouse-over */
  .sidebar a:hover{
    background-color: #555;
    color: white;
  }
  #message {
    display:none;
    border: transperent;
    background: none;
    position: fixed;
    margin-top: 120px;
    margin-left: 500px;
    }
    #message p {    
    font-size: 15px;
    }
    #message2 {
    display:none;
    border: transperent;
    background: none;
    position: fixed;
    margin-top: 120px;
    margin-left: 500px;
    }
    #message2 p {    
    font-size: 15px;
    }
    .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px;
        }
        .contact-items{
            display: flex;
            margin: -60px -60px;
            margin-top: -180px;
            flex-wrap: wrap;
            align-items: center;
        }
        .customer-care{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 0px;
            margin-top: 100px;
            padding: 20px 0px;
            border-radius: 15px;
            min-width: 600px;
            background-color: skyblue;
        }
        .customer-care2{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 830px;
            margin-top: -10px;
            padding: 20px 0px;
            min-width: 100px;
            height: 5px;
            background-color: skyblue;
        }
        .customer-care{
            height: 250px;
            box-shadow: 0 15px 15px #888888;
            border: 1px solid #888888;
        }
        .cbtn{
            padding: 8px 16px;
            font-size: 17px;
            border: none;
            margin: 15px auto;
            cursor: pointer;
            color: rgb(255, 255, 255);
        }
        .cbtn:hover{
            color: #000;
        }
        .YNbtn{
            padding: 8px 16px;
            font-size: 17px;
            border-radius: 25px;
            border: none;
            margin: 15px auto;
            cursor: pointer;
            color: rgb(255, 255, 255);
        }
        .YNbtn:hover{
            color: gray;
        }
        #cust-care{
            background: #6960EC;
            box-shadow: 0 0 5px black;
        }
        a{
            font-size: 16px;
        }
        .customer-care a{
            color: navy;
            text-shadow: 0 0 2px rgba(73, 129, 80, 0.637);
        }
        .YNbtn{
            padding: 8px 16px;
            font-size: 17px;
            border-radius: 25px;
            border: none;
            margin: 15px auto;
            cursor: pointer;
            color: rgb(255, 255, 255);
        }
        .YNbtn:hover{
            color: #000;
        }
        .btn-close{
          margin-left: 550px;
          margin-top: -10px
        }
        .logout{
          margin-top: 5px;
          background-color: #DCDCDC;
          border: none;
        }
        .usermail{
          background-color: #DCDCDC;
          border: none;
          margin-left: 780px; 
          margin-top: 10px; 
          margin-top: -1000px;
        }
  
  /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }
  
  /* On screens that are less than 700px wide, make the sidebar into a topbar */
  @media screen and (max-width: 700px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
    .usermail{
          background-color: #DCDCDC;
          border: none;
          margin-left: -1px; 
          margin-top: 15px; 
          
        }
  }
  /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
  @media screen and (max-width: 400px) {
    .sidebar a {
      text-align: center;
      float: none;
    }
    .navbar{
      overflow: hidden;
      background-color: #DCDCDC;
      position: relative;
      top: 0;
      width: 100%;
    }
    .usermail{
          background-color: #DCDCDC;
          border: none;
          margin-left: -1px; 
          margin-top: 15px; 
          
        }
  }
   /* On screens that are less than 1156px wide, make the sidebar into a topbar */
   @media screen and (max-width: 1156px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
    .usermail{
          background-color: #DCDCDC;
          border: none;
          margin-left: -1px; 
          margin-top: 15px; 
          
        }
  }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <div>
<div class="sticky-sm-top">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" style="background-color:#DCDCDC;">
    <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="career.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        </li>
        <li class="nav-item" >
        <button id="logout" class="logout">Logout</button>
        </li>
        <li class="nav-item" >
         <button id="user" class="usermail">Welcome <?=$_SESSION['email']?></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div id="message">
<div class="container">
        <div class="contact-items">
            <div class="customer-care">
                <button type="button" class="btn-close" id="close"></button>
                <h2>Do you want to Logout?</h2>
                <a href="logout.php"><button class="YNbtn" id="cust-care">Yes</button></a>
                <a href="dashboard.php"><button class="YNbtn" id="cust-care">No</button></a>
            </div>
        </div>
    </div>
</div>
<div id="message2">
<div class="container">
        <div class="contact-items">
            <div class="customer-care2">
                <a href="changepass.php"><button class="cbtn" id="cust-care">Change Password</button></a><button style="margin-top: -45px; margin-right: -190px; background:red; font-weight:Bold;" id="close2">X</button>
            </div>
        </div>
    </div>
</div>
<div class="sidebar">
    <a class="active" href="dashboard.php">Post</a>
    <a href="jobs.php">Candidates Applied</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
</div>
<script>
var myInput = document.getElementById("logout");
var myClick = document.getElementById("close");
var userInput = document.getElementById("user");
var userClick = document.getElementById("close2");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myClick.onfocus = function() {
    document.getElementById("message").style.display = "none";
}
// When the user clicks on the password field, show the message box
userInput.onfocus = function() {
    document.getElementById("message2").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
userClick.onfocus = function() {
    document.getElementById("message2").style.display = "none";
}
</script>

