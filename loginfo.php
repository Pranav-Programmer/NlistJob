<?php
//This script will handle login
session_start();
require_once "config.php";

$email = $password = $vkey = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])))
    {
        $err = "Please enter an email";
    }
    elseif(empty(trim($_POST['password'])))
    {
      $err = "Please enter a password";
      echo "<p class='echocss'>Please enter a password.</p>";
    }
    //elseif(empty(trim($_POST['vkey'])))                  //remove comment to enable vkey feature 
   // {
      //$err = "Please enter a Vkey";               
    //  echo "<p class='echocss'>Please enter a Vkey.</p>";
    //}
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
       // $vkey = trim($_POST['vkey']);                        //remove comment to enable vkey feature 
    }

if(empty($err))
//{              //remove comment to enable vkey feature 
 // $sql = "SELECT id, email, vkey FROM users WHERE vkey = ?";
 // $stmt = mysqli_prepare($conn, $sql);
 // mysqli_stmt_bind_param($stmt, "s", $param_vkey);
 // $param_vkey = $vkey;
  
  // Try to execute this statement
 // if(mysqli_stmt_execute($stmt)){
   //   mysqli_stmt_store_result($stmt);
   // if(mysqli_stmt_num_rows($stmt) == 1)
    {
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email);
    $param_email = $email;
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["email"] = $email;
                            $_SESSION["id"] = $id;
                            $_SESSION["vkey"] = $vkey;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            $_SESSION['login_user']=$email;
                            
                            header("location: dashboard.php");   
                            exit;
                        }
                        
                        else{
                          echo "<p class='echocss'>Please enter a correct Password.</p>";
                        }
                    } 
                }
                else{
                  echo "<p class='echocss'>Please enter a correct email.</p>";
                }
    }
}
//else{   //remove comment to enable vkey feature 
//  echo "<p class='echocss'>Please enter a correct Vkey.</p>";
//}
}
//}
//}
?>