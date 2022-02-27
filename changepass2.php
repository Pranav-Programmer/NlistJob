<?php
include "loginfo.php";
// Initialize the session

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_email);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_email = $_SESSION["email"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ln.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
            margin-top: 4em;
            margin-left: 45em;
            margin-right: 10em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    #message3 {
    display:none;
    background: #E5E7E9;
    color: #000;
    position: absolute;
    padding: 20px;
    margin-top: -300px;
    margin-left: 300px;
    box-shadow: 5px 5px 4px 5px #888888;
    }

    #message3 p {    
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
            margin-top: 4em;
            margin-left: 4em;
            margin-right: 5em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    }
    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
      form{
            background-color: #E5E8E8;
            margin-top: 4em;
            margin-left: 4em;
            margin-right: 5em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    }
    @media screen and (max-width: 1400px) {
      form{
            background-color: #E5E8E8;
            margin-top: 4em;
            margin-left: 4em;
            margin-right: 5em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    }
    </style>
    <title>Change Password</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
           <form action="" method="post">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" id="exampleInputPassword1" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="ln.php">Cancel</a>
            </div>
</form>
</div>

<div id="message3">
  <h6>Password must contain the following:</h6>
  <p id="uppercase" class="invalid">A <b>capital</b> letter</p>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="specialCH" class="invalid">A <b> special character</b></p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="len" class="invalid">Minimum <b>8 characters</b></p>
  <p class="optional">Try not to use your <b>name, email address or <br> number</b> as it is in your password. And avoide<br> common passwords.Special character is optional.</p>
</div>

    <script>
var myInput = document.getElementById("exampleInputPassword1");
var letter = document.getElementById("letter");
var specialCH = document.getElementById("specialCH");
var number = document.getElementById("number");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message3").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message3").style.display = "none";
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
