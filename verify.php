<?php 
require_once "config.php";

$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// Check for name
if(empty(trim($_POST['name']))){
    $name_err = "Name cannot be blank";
    echo "<p class='echocss'>Name cannot be blank.</p>";
}
elseif(strlen(trim($_POST['name'])) < 3){
    $name_err = "Name cannot be less than 3 characters";
    echo "<p class='echocss'>Name cannot be less than 3 characters.</p>";
}
else{
    $name = $_POST['name'];

        // Check if email is empty
        if(empty(trim($_POST["email"]))){
          $email_err = "email cannot be blank";
          echo "<p class='echocss'>Email address cannot be blank.</p>";
         }
         else{
                  $email = trim($_POST['email']);

                  // Check for message
              if(empty(trim($_POST['message']))){
                $message_err = "Message cannot be blank";
                echo "<p class='echocss'>Massage cannot be blank.</p>";
              }
              elseif(strlen(trim($_POST['message'])) < 10){
                $message_err = "Message cannot be less than 10 characters";
                echo "<p class='echocss'>Message cannot be less than 10 characters.</p>";
              }
              else{
                $message = trim($_POST['message']);
              }
          }
}


// If there were no errors, go ahead and insert into the database
if(empty($name_err) && empty($email_err) && empty($message_err))
{
    $sql = "INSERT INTO verification (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_message);

        // Set these parameters
        $param_name = $name;
        $param_email = $email;
        $param_message = $message;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          echo "<p class='echocss1'>Your massage successfully sent.</p>";
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
        .echocss{
          margin-left: 35em;
          margin-top: 50px;
          position: absolute;
          color: red;
          background: #000;
        }
        .echocss1{
          margin-left: 40em;
          margin-top: 50px;
          position: absolute;
          color: green;
          background: #000;
        }
        /*General */
        html{    
        background:url('img/contact.jpg') no-repeat;
        background-size: cover;
        height:100%;
        }
         body{
            background:url('img/contact.jpg') no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(48, 46, 46);
        }

        #feedback-page{
          text-align:center;
        }

        #form-main{
          width:100%;
          float:left;
          padding-top:0px;
        }

        #form-div {
          background-color:rgba(72,72,72,0.4);
          padding-left:35px;
          padding-right:35px;
          padding-top:35px;
          padding-bottom:50px;
          width: 450px;
          float: left;
          left: 50%;
          position: absolute;
          margin-top:30px;
          margin-left: -260px;
          border-radius: 7px;
          
        }
        .home{
            margin-top: 10px;
            margin-left: 10px;
        }
        .montform .feedback-input {
          color:#3c3c3c;
          font-family: Helvetica, Arial, sans-serif;
          font-weight:500;
          font-size: 18px;
          border-radius: 0;
          line-height: 22px;
          background-color: #fbfbfb;
          padding: 13px 13px 13px 54px;
          margin-bottom: 10px;
          width:100%;
          box-sizing: border-box;
          border: 3px solid rgba(0,0,0,0);
        }
        /*Inputs styles*/
        .montform .feedback-input:focus{
          background: #fff;
          border: 3px solid #3498db;
          color: #3498db;
          outline: none;
          padding: 13px 13px 13px 54px;
        }

        /* Icons ---------------------------------- */
        .montform  #name{
          background-image: url(https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-address-book.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
        }

        .montform  #name:focus{
          background-image: url(https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-address-book.svg);
          background-size: 30px 30px;
          background-position: 8px 5px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
        }

        .montform  #email{
          background-image: url(https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-mail.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
        }

        .montform  #email:focus{
          background-image: url(https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-mail.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
        }

        .montform  #comment{
          background-image: url(https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-pencil.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
        }

        .montform  textarea {
            width: 100%;
            height: 150px;
            line-height: 150%;
            resize:vertical;
        }

        .montform  input:hover, .montform  textarea:hover,
        .montform  input:focus, .montform  textarea:focus {
          background-color:#e6e6e6;
        }

        .button-blue{
          font-family: 'Montserrat', Arial, Helvetica, sans-serif;
          float:left;
          width: 100%;
          border: #fbfbfb solid 4px;
          cursor:pointer;
          background-color: #3498db;
          color:white;
          font-size:24px;
          padding-top:22px;
          padding-bottom:22px;
          transition: all 0.3s;
          margin-top:-4px;
          font-weight:700;
        }

        .button-blue:hover{
          background-color: rgba(0,0,0,0);
          color: #0493bd;
        }
          
        .montform  .submit:hover {
          color: #3498db;
        }
          
        .ease {
          width: 0px;
          height: 74px;
          background-color: #fbfbfb;
          transition: .3s ease;
        }

        .submit:hover .ease{
          width:100%;
          background-color:white;
        }

        /*Styles for small screens*/

        @media  only screen and (max-width: 580px) {
          #form-div{
            left: 3%;
            margin-right: 3%;
            width: 88%;
            margin-left: 0;
            padding-left: 3%;
            padding-right: 3%;
          }
        }
    </style>
    <title>Contact</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
  <div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
  <div id="form-main">
  <div id="form-div">
    <form class="montform" id="reused_form" action="" method="POST" >
      <p class="name">
      	<input name="name" type="text" class="feedback-input" required placeholder="Name" id="name" />
      </p>
      <p class="email">
        <input name="email" type="email" required  class="feedback-input" id="email" placeholder="Email" />
      </p>
      <p class="text">
      <textarea name="message" class="feedback-input" id="comment" placeholder="Message"></textarea>
      </p>
            <div class="submit">
        <button type="submit" class="button-blue">SUBMIT</button>
        <div class="ease"></div>
      </div>
    </form>
          <div id="error_message" style="width:100%; height:100%; display:none; ">
                <h4>Error</h4>
                Sorry there was an error sending your form.
          </div>
          <div id="success_message" style="width:100%; height:100%; display:none; ">
          <h2>Success! Your Message was Sent Successfully.</h2>
          </div>
    </div>
</div>
  </body>
</html>