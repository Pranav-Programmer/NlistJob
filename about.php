<?php 
require_once "config.php";

$feedback = $rating = "";
$feedback_err = $rating_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// Check for feedback
if(empty(trim($_POST['feedback']))){
    $feedback_err = "Feedback cannot be blank";
    echo "<p class='echocss'>Feedback cannot be blank.</p>";
}
elseif(strlen(trim($_POST['feedback'])) < 2){
    $feedback_err = "Feedback cannot be less than 2 characters";
    echo "<p class='echocss'>Feedback cannot be less than 2 characters.</p>";
}
else{
    $feedback = $_POST['feedback'];

    // Check for rating
    if(empty(trim($_POST['rating']))){
        $rating_err = "Rating cannot be blank";
        echo "<p class='echocss'>Rating cannot be blank.</p>";
    }
    else{
        $rating = $_POST['rating'];
    }
}

// If there were no errors, go ahead and insert into the database
if(empty($feedback_err) && empty($rating_err))
{
    $sql = "INSERT INTO feedback (feedback, rating) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_feedback, $param_rating);

        // Set these parameters
        $param_feedback = $feedback;
        $param_rating = $rating;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            echo "<p class='echocss2'>Your feedback successfully submited!.</p>";
            header("location: successful3.php"); 
        }
        else{
            echo "<p class='echocss2'>Something went wrong... your feedback can not submited!</p>";
        }
    }
    mysqli_stmt_close($stmt);
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
    <style>
        .echocss{
          margin-left: 70em;
          margin-top: 240px;
          position: absolute;
          color: red;
        }
        .echocss2{
          margin-left: 76em;
          margin-top: 520px;
          position: absolute;
          color: green;
        }
        html{    
        background-image :url('img/contact.jpg');
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
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px;
        }
        hr{
            width: 80%;
        }
        h2{
            font-size: 20px;
        }
        .contact-items{
            display: flex;
            margin: 30px auto;
            flex-wrap: wrap;
            align-items: center;

        }
        .customer-care,.write-us,.sales-market{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 28%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 250px;
            background-color: #fff;
            
        }
        .customer-care{
            height: 250px;
            box-shadow: 0 15px 15px #00FF00;
            border: 1px solid #00FF00;
        }
        .write-us{
            height: 250px;
            box-shadow: 0 15px 15px #800000;
            border: 1px solid #800000;
        }
        .sales-market{
            height: 250px;
            box-shadow: 0 15px 15px purple;
            border: 1px solid purple;
        }
        p{
            font-size: 15px;
        }
        button{
            padding: 8px 16px;
            font-size: 17px;
            border-radius: 25px;
            border: none;
            margin: 15px auto;
            cursor: pointer;
            color: rgb(255, 255, 255);
        }
        button:hover{
            color: gray;
        }
        #cust-care{
            background: #00FF00;

            box-shadow: 0 0 5px black;
        }
        #write{
            background: #800000;

            box-shadow: 0 0 5px black;
        }
        #sales{
            background: purple;
            box-shadow: 0 0 5px black;
        }
        a{
            font-size: 16px;
        }
        .customer-care a{
            color: green;
            text-shadow: 0 0 2px rgba(73, 129, 80, 0.637);
        }
        .sales-market a{
            color: blue;
            text-shadow: 0 0 2px rgba(76, 62, 158, 0.637);
        }
        #message {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: 310px;
        box-shadow: 5px 5px 4px 5px #888888;
        }

        #message p {    
            font-size: 15px;
        }
        #message2 {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: -40px;
        margin-right: 58px;
        margin-left: 40px;
        height: 290px;
        box-shadow: 5px 5px 4px 5px #888888;
        }

        #message2 p {    
            font-size: 15px;
        }
        .feedback-input{
            height: 260px; 
            width: 400px; 
            font-size:20px; 
            margin-right: -100px;
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
            margin-top: 55px;
            font-weight:700;
        }

        .button-blue:hover{
            background-color: rgba(0,0,0,0);
            color: #0493bd;
        }
        .home{
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: -60px;
        }
        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .echocss{
            margin-left: 2em;
            margin-top: 1080px;
            position: absolute;
            color: red;
            }
            .customer-care,.sales-market{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
        }
        .write-us{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
            height: 300px;
        }
        #message2 {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: -40px;
        margin-right: 13px;
        margin-left: 1px;
        height: 290px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
        .feedback-input{
            height: 260px; 
            width: 350px; 
            font-size:20px; 
            margin-right: -100px;
        }
        }
        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .echocss{
          margin-left: 2em;
          margin-top: 1080px;
          position: absolute;
          color: red;
        }
            .customer-care,.sales-market{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
        }
        .write-us{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
            height: 300px;
        }
        #message2 {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: -40px;
        margin-right: 13px;
        margin-left: 1px;
        height: 290px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
        .feedback-input{
            height: 260px; 
            width: 350px; 
            font-size:20px; 
            margin-right: -100px;
        }
        }
        /* On screens that are less than 1156px wide, make the sidebar into a topbar */
        @media screen and (max-width: 1156px) {
            .echocss{
          margin-left: 2em;
          margin-top: 1080px;
          position: absolute;
          color: red;
        }
            .customer-care,.sales-market{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
        }
        .write-us{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 350px; 
            height: 300px;
        }
        #message2 {
        display:none;
        background: #E5E7E9;
        color: #000;
        position: absolute;
        padding: 20px;
        margin-top: -40px;
        margin-right: 13px;
        margin-left: 1px;
        height: 290px;
        box-shadow: 5px 5px 4px 5px #888888;
        }
        .feedback-input{
            height: 260px; 
            width: 350px; 
            font-size:20px; 
            margin-right: -100px;
        }
        }
    </style>

</head>
<body>
<div class="home">
<a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
</div>
    <div class="container">
        <h1 style="color: #fff;">About Us</h1>
        <hr>
        <h2 style="color: #fff;">Want to know about us? then read here.</h2>
        <div class="contact-items">
            <div class="customer-care">
                <h3>Frequently asked Questions</h3>
                <p>We will improve our site daily by reading your questions and try to make this portal friendly for all. So if you have any question then feel free to write here, we will definetly give, your relevant and unique questions answers. And please first see previous question answer, because there is a chance that someone already asked your question.</p>
                <div id="message">
                <p class="optional">We are still working on this page, we will soon launch this page. <br>Upto then please use our contact us page for your questions.</p>
                </div>
                <button id="cust-care">Ask Questions</button>
            </div>
            <div class="write-us">
                <h3 style="margin-top: -20px;">Our Thoughts</h3>
                <p> We are observing many peoples who are just complete there graduation, peoples after 5 years of there graduation and peoples who are at age of leaving job but still want to do something because of their passion, because of fear of lonelyness after their job and because of money problems. So at the end of our observation we are at the conclusion of that in this century everyone want do something or everyone had to do something for their family. But many peoples not able to find a perfect job for their skills. Also there are many business, big firms, companies, industries and organizations who are not getting perfect candidates for there vacant post. So we came with a solution where all the recruiters get a skilled candidates and all hard working candidates get good valuation of their work.</p>
          <!-- <a href="./contact-form.html"> <button id="write">Write</button></a>  u-->
            </div>
            <div class="sales-market">
                <h3>Feedback</h3>
                <p>Give your anonymous and valuable feedback here!</p>
                <button id="sales">Feedback box</button>
                <div id="message2">
                <form action="" method="POST">
                <label for="exampleInputNumber" style="margin-bottom: 200px;">Rating</label>
                <select style="margin-right: 50px; margin-bottom: 10px;" name="rating"><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select><img style="width: 24px; margin-left: -50px; margin-bottom: -5px;" src="https://img.icons8.com/color/48/000000/christmas-star.png"/>
                <textarea name="feedback" class="feedback-input"  placeholder="Feedback"></textarea>
                <button type="submit" class="button-blue">SUBMIT</button>
                </form>
                </div>
                <?php
                //sql query to find average cost of food items in food table
                $sql = "SELECT  AVG(rating) FROM feedback";
                $result = $conn->query($sql);
                //display data on web page
                while($row = mysqli_fetch_array($result)){
                    $rt = $row['AVG(rating)'];
                    echo "Rating :".sprintf("%.1f", $rt);
                    echo "<br />";
                }
                //close the connection
                $conn->close();
                ?>
                <img style="width: 24px; margin-left: 100px; margin-top: -23px;" src="https://img.icons8.com/color/48/000000/christmas-star.png"/>
            </div>
        </div>
    </div>
<script>
var myInput = document.getElementById("cust-care");
var userInput = document.getElementById("sales");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
userInput.onfocus = function() {
    document.getElementById("message2").style.display = "block";
}
</script>
</body>
</html>