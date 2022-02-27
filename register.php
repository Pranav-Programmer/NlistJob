<?php
require_once "config.php";

$fullname = $email = $password = $number = $confirm_password = "";
$fullname_err = $email_err = $password_err = $number_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// Check for name
if(empty(trim($_POST['fullname']))){
    $fullname_err = "Name cannot be blank";
    echo "<p class='echocss'>Name cannot be blank.</p>";
}
elseif(strlen(trim($_POST['fullname'])) < 3){
    $fullname_err = "Name cannot be less than 3 characters";
    echo "<p class='echocss'>Name cannot be less than 3 characters.</p>";
}
else{
    $fullname = $_POST['fullname'];
}
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "email cannot be blank";
        echo "<p class='echocss1'>Email address cannot be blank.</p>";
    }
    elseif(!preg_match($pattern, trim(strip_tags($_POST['email'])))) { 
      $email_err = "Input valid email address";
      echo "<p class='echocss1'>Please input valid email address.</p>";
    }
    else{
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the value of param email
            $param_email = trim($_POST['email']);
            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already taken"; 
                    echo "<p class='echocss1'>This email address is already registered wiith us.</p>";
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

$vkey = md5(time().$email);
$otp = rand(100000,999999);
// Check for number
if(empty(trim($_POST['number']))){
    $number_err = "number cannot be blank";
    echo "<p class='echocss2'>Number cannot be blank.</p>";
}
elseif(strlen(trim($_POST['number'])) < 10){
    $number_err = "number cannot be less than 10 characters";
    echo "<p class='echocss2'>Number cannot be less than 10 digit.</p>";
}
elseif(strlen(trim($_POST['number'])) > 10){
  $number_err = "number cannot be greater than 10 characters";
  echo "<p class='echocss2'>Number cannot be greater than 10 digit.</p>";
}
else{
    $number = $_POST['number'];
}

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
    echo "<p class='echocss3'>Password cannot be blank.</p>";
}
elseif(strlen(trim($_POST['password'])) < 6){
    $password_err = "Password cannot be less than 6 characters";
    echo "<p class='echocss3'>Password cannot be less than 6 characters.</p>";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
    echo "<p class='echocss4'>Passwords should match.</p>";
}

// If there were no errors, go ahead and insert into the database
if(empty($fullname_err) && empty($email_err) && empty($password_err) && empty($number_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (fullname, email, password, number, vkey, otp) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssss", $param_fullname, $param_email, $param_password, $param_number,$param_vkey, $param_otp);

        // Set these parameters
        $param_fullname = $fullname;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_number = $number;
        $param_vkey = $vkey;
        $param_otp = $otp;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $to_email = $email;
          $subject = "Email Verification";
          $body = "Hi, your otp to verify your email address is " . $otp;
          $headers = "From: nlistjob@gmail.com";

          if (mail($to_email, $subject, $body, $headers)) {
             header("location: otp.php");
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            background-image: url("img/SiteBg.jpg");
            background-size: cover:
        }
        form{
            background-color: #E5E8E8;
            margin-top: 4em;
            margin-left: 30em;
            margin-right: 10em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        .echocss{
          margin-left: 50em;
          margin-right: 31em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss1{
          margin-left: 50em;
          margin-right: 10em;
          margin-top: 125px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 50em;
          margin-right: 21em;
          margin-top: 237px;
          position: absolute;
          color: red;
        }
        .echocss3{
          margin-left: 50em;
          margin-right: 31em;
          margin-top: 323px;
          position: absolute;
          color: red;
        }
        .echocss4{
          margin-left: 50em;
          margin-right: 31em;
          margin-top: 409px;
          position: absolute;
          color: red;
        }
        #message {
    display:none;
    background: #E5E7E9;
    color: #000;
    position: absolute;
    padding: 20px;
    margin-top: -345px;
    box-shadow: 5px 5px 4px 5px #888888;
    }

    #message p {    
        font-size: 15px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
    
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
    
    }
    .optional {
      color: grey;
    }
    .home{
      position: absolute;
      margin-top: -50px;
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
          margin-right: 3em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss1{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 125px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 237px;
          position: absolute;
          color: red;
        }
        .echocss3{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 323px;
          position: absolute;
          color: red;
        }
        .echocss4{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 409px;
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
          margin-right: 3em;
          margin-top: 37px;
          position: absolute;
          color: red;
        }
        .echocss1{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 125px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 237px;
          position: absolute;
          color: red;
        }
        .echocss3{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 323px;
          position: absolute;
          color: red;
        }
        .echocss4{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 409px;
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
        .echocss1{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 125px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 237px;
          position: absolute;
          color: red;
        }
        .echocss3{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 323px;
          position: absolute;
          color: red;
        }
        .echocss4{
          margin-left: 12em;
          margin-right: 3em;
          margin-top: 409px;
          position: absolute;
          color: red;
        }
    }
    </style>
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
</head>
<body>
  <div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
    <div class="container">
    <form method="POST">
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="exampleInputName" name="fullname" placeholder="Enter Name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputNumber" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" id="exampleInputNumber" name="number" placeholder="Enter Number without country code">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="confirm_password" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <br>
  Already Registered <a href="dashboard.php">Login</a>
  <br>
  Only recruiters needs to register and login, applicants no need to register and login they can directly apply for job from <a href="career.php">here</a>.
</form>
<div id="message">
  <h6>Password must contain the following:</h6>
  <p id="uppercase" class="invalid">A <b>capital</b> letter</p>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="specialCH" class="invalid">A <b> special character</b></p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="len" class="invalid">Minimum <b>8 characters</b></p>
  <p class="optional">Try not to use your <b>name, email address or <br> number</b> as it is in your password. And avoide<br> common passwords. Special character is optional.</p>
</div>
    </div>

    <script>
var myInput = document.getElementById("exampleInputPassword1");
var letter = document.getElementById("letter");
var specialCH = document.getElementById("specialCH");
var number = document.getElementById("number");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate uppercase letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    uppercase.classList.remove("invalid");
    uppercase.classList.add("valid");
  }
  else
  {  
    uppercase.classList.remove("valid");
    uppercase.classList.add("invalid");
  }
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  }
  else{  
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  // Validate special characters
  var specialCHs = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  if(myInput.value.match(specialCHs)) {  
    specialCH.classList.remove("invalid");
    specialCH.classList.add("valid");
  }
  else
  {
    specialCH.classList.remove("valid");
    specialCH.classList.add("invalid");
  }
  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  }
  else
  {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  // Validate length
  var length=myInput.value.length
  if(length>=8)
  {  
    len.classList.remove("invalid");
   len.classList.add("valid");
  }
  else
  {  
    len.classList.remove("valid");
   len.classList.add("invalid");
  }
}
</script>
</body>
</html>