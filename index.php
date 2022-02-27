<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/e29773696d.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            background-image: url("img/home.jpg");
            background-size: cover:
        }
        .navbar{
        overflow: hidden;
        background-color: #333;
        position: relative;
        top: 0;
        width: 100%;
        }
        .navbar-brand img{
            width: 160px;
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
            width: 40%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            min-width: 250px;
            
        }
        .customer-care{
            height: 720px;
            box-shadow: 0 15px 15px #9900CC;
            border: 1px solid #9900CC;
        }
        .write-us{
            height: 720px;
            box-shadow: 0 20px 20px #9F000F;
            border: 1px solid #9F000F;
        }
        .sales-market{
            height: 290px;
            box-shadow: 0 15px 15px #FF6600;
            border: 1px solid #FF6600;
        }
        p{
            font-size: 15px;
            margin-left: -10px;
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
            background: #9900CC;
            box-shadow: 0 0 5px black;
        }
        #write{
            background: #9F000F;
            box-shadow: 0 0 5px black;
        }
        #sales{
            background: #FF6600;
            box-shadow: 0 0 5px black;
        }
        a{
            font-size: 16px;
        }
        .customer-care a{
            color: blue;
            text-shadow: 0 0 2px rgba(73, 129, 80, 0.637);
        }
        .sales-market a{
            color: blue;
            text-shadow: 0 0 2px rgba(76, 62, 158, 0.637);
        }
        .footer{
            background: #000;
            color: #8a8a8a;
            font-size: 18px;
            padding: 10px 0 0px;
            margin-bottom: -40px;
        }
        .footer .footer-col-2 img{
            width: 300px;
            height: 100px;
        }
        .footer p{
            color: #8a8a8a;
        }
        .footer h3{
            color: #fff;
            margin-bottom: 20px;
        }
        .footer-col-1, .footer-col-2, .footer-col-3, .footer-col-4{
            min-width: 250px;
            margin-bottom: -20px;
        }
        .footer-col-1{
            flex-basis: 30%;
        }
        .footer-col-2{
            flex: 1;
            text-align: center;
        }
        .footer-col-2 img{
            width: 180px;
            margin-bottom: 10px;
        }
        .footer-col-3, .footer-col-4{
            flex-basis: 12%;
            text-align: center;
        }
        ul{
            list-style-type: none;
        }
        .app-logo{
            margin-top: 20px;
        }
        .app-logo img{
            width: 150px;
        }
        .footer hr{
            border: none;
            background: #b5b5b5;
            height: 1px;
            margin-bottom: 10px;
        }
        .copyright{
            text-align: center;
            padding-bottom: 20px;
        }
        .menu-icon{
            width: 28px;
            margin-left: 20px;
        }
        .footlogo{
            margin-top: 20px;
        }  
        .myBtn {  
        position: relative; /* Fixed/sticky position */
        right: 20%;
        width: -50px;
        background: transperent; /* Set a background color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 0px;
        border: none;
        width: 1px;
        } 
        /*Styles for small screens*/

     @media screen and (max-width: 1455px) {
            .customer-care{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 95%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            height: 95%;
        }
        .sales-market{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 95%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px;
            height: 95%;
        }
        .write-us{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 95%;
            margin: 30px auto;
            padding: 35px 15px;
            border-radius: 15px; 
            height: 95%;
        }
        .app-logo img{
            width: 150px;
            margin-bottom: 20px;
        }
        .footer{
            background: #000;
            color: #8a8a8a;
            font-size: 18px;
            padding: 10px 0 0px;
            margin-bottom: -40px;
            width: 100%;
        }
        .footer-col-4{
            min-width: 40%;
            margin-bottom: -20px;
        }
        .footer-col-3{
            min-width: 60%;
            margin-bottom: -20px;
        }
        .footer-col-2{
            min-width: 40%;
            margin-left: 10px;
        }
        .footer-col-1{
            min-width: 80%;
            margin-left: 60px;
        }
        .navbar{
        background-color: #DCDCDC;
        position: relative;
        top: 0;
        width: 100%;
        }
        .myBtn{
              position: relative; /* Fixed/sticky position */
              right: -20%; /* Place the button 30px from the right */
              width: 1px;
              background: transperent; /* Set a background color */
              cursor: pointer; /* Add a mouse pointer on hover */
              padding: 0px;
              border: none;
            }
    }

    </style>
    <title>NListJob</title> 
    <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
  </head>
  <body>
<div class="container" style="background-color: #33FFFF">
<nav class="navbar navbar-expand-lg bg-light" style="background-color: #33FFFF">
  <div class="container-fluid" style="background-color: #33FFFF">
    <a class="navbar-brand" href="index.php"><img src="img/logo.jpg"></a> <button onclick="topFunction()" id="myBtn" class="myBtn" title="Go to top"><i style="color: black;" class="fa-solid fa-bars"></i></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" onclick="homeFunction()" id="myBtn2" href="#" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/material-rounded/24/000000/home.png"/> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="career.php" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/ios/50/000000/resume-website.png" style="width: 24px;"/> Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/fluency-systems-filled/48/000000/about-us-male.png" style="width: 24px;"/> About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/external-justicon-lineal-justicon/64/000000/external-email-notifications-justicon-lineal-justicon.png" style="width: 24px;"/> Contact Us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="register.php" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-sign-up-call-to-action-bearicons-glyph-bearicons-1.png" style="width: 24px;"/> Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php" style="color: #000; font-weight: bold; margin-right: 20px;"><img src="https://img.icons8.com/external-bearicons-detailed-outline-bearicons/64/000000/external-sign-in-call-to-action-bearicons-detailed-outline-bearicons.png" style="width: 24px;"/> Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
       <div class="contact-items">
            <div class="customer-care">
                <h3>For Recruiters</h3>
                <p>1. To post job on our portal you need to first register with us. <br>2. After registration for login you need Vkey, this for your business/firm  <br>verification. <br>3. To get your Vkey you need to verify your business/firm/industry with <br>our executive. After registration you need to send your name, company <br>or firm  name, email address and mobile number. As soon as you send <br>this information through message box, our executive get back to you <br>soon and validate your details. Then you will get your Vkey through mail <br>on your registered mail id. <br>4. You will get link on login page to submit above mention information. <br>5. Please submit your information before 5 pm from monday to friday, <br>else you may have to register again. <br>6. Please provide only valide information to our executive at the the <br>of verification, otherwise you won't get your vkey and you won't be able <br>to register with us in future, if we find any misleading information <br>about you. <br>7. We don't share our registered organizations data with anyother people, <br>their data is always cofidential. <br>8. If you recruit any candidate and you will find any false information <br>provided on our portal by your recruited any candidate, then we are <br>not responsible for this fraudulent activity. <br>9. Please <a href="verify.php">Click here</a> to provide your information after registring with us. <br>10. <a href="dashboard.php">Click here</a> to login, if you get your vkey. <br>11. Register here to get employees for your firm smoothly and fastly.</p>
                <a href="register.php"><button id="cust-care"> Register </button></a>
            </div>
            <div class="write-us">
                <h3>For Applicants</h3>
                <p>1. To apply for job from our portal you need not to register with us. <br>2. You can directly apply from jobs page by filling your personal and educational <br>details in form. <br>3. Make sure your educational and personal details that you filled in job application <br>form is correct and verified, because your application form may get rejected after it <br>appears that there is some false personal or educational details in your applied form <br>by the respective organization/s.<br>4. If some organization/s reject your applications due to some public or private <br>reason then our we are not responsible for this, you may ask about this to <br>respective organization/s. <br>5. Our policy for sharing your data with registered organizations is strict and we <br>share that data only after full verification. <br>6. We don't share our registered organizations data with anyother people, their <br>data is always cofidential. So if you want to contact with them, then you can only<br> contact through the details provided by organizations on their posted job on jobs<br> page.<br><h6 style="margin-bottom: -20px; margin-top: -20px">Some Important:</h6><br> We don't ask any charge to a job applicants. We will never ask you to pay a single penny for the post you applied in some organization on our portal. This service is free of cost for all the job applicants who are looking for job on our portal. If someone ask you to pay money for the job you applied through our portal, then please share their information by clicking on share your thought. Other than this, if you feel anything wrong then also you suggest us. we are always respect other people thoughts.</p>
               <a href="contact.php"><button id="write">Share Your Thoughts</button></a>
          <!-- <a href="./contact-form.html"> <button id="write">Write</button></a>  u-->
            </div>
            <div class="sales-market">
                <h3> Step Towards Your Career</h3>
                <p>Are you looking for a job! Then what are you waiting for go on our jobs page and start applying for jobs avaible there. We know you are a hard worker but for now show some smart work and apply very smoothly and fastly from our portal and get a best job which match with your skills. Recruiters are looking for smart and hard working candidates, are you? then click on jobs for you.</p>
                <a href="career.php"><button id="sales">Jobs For You</button></a>
            </div>
        </div>
        <div class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-col-1">
						<h3 style="margin-top: 20px;">Download</h3>
						<p style="margin-left: 5px;">We will soon lounch our app on</p>
						<div class="app-logo">
							<img src="img/PlayStore.jpg"> & 
							<img src="img/AppStore.png">
						</div>
					</div>
					<div class="footer-col-2">
						<a href="#"><img class="footlogo" src="img/logo.jpg"></a>
						<p>Our vison is to connect job recruiters to their employee and vice versa in a faster and smoother way.</p>
					</div>
					<div class="footer-col-3">
						<h3 style="margin-top: 20px;">Links for you</h3>
						<ul>
                            <li><a href="career.php">Jobs</a></li>
							<li><a href="register.php">Register</a></li>
							<li><a href="dashboard.php">Login</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="about.php">About Us</a></li>
					</div>
					<div class="footer-col-4">
						<h3 style="margin-top: 20px;">Reach us at</h3>
						<ul>
							<li><a href="https://m.facebook.com/100010850562845/"><img src="https://img.icons8.com/color/48/000000/facebook-circled.png" style="width: 24px;"/>Facebook</a></li>
							<li><a href="https://www.instagram.com/pranav_dharme_/"><img src="https://img.icons8.com/fluency/48/000000/instagram-new.png" style="width: 24px;"/>Instagram</a></li>
							<li><a href="https://twitter.com/dMXQOHAcKG47mjT"><img src="https://img.icons8.com/fluency/48/000000/twitter.png" style="width: 24px;"/>Twitter</a></li>
							<li><a href="https://www.linkedin.com/in/pranav-dharme/"><i class="fab fa-linkedin"></i>Linkdin</a></li>
							<li><a href="https://www.youtube.com/"><img src="https://img.icons8.com/color/48/000000/youtube-play.png" style="width: 24px;"/>YouTube</a></li>
						</ul>
					</div>
				</div>
				<hr>
				<p class="copyright">© 2022 NListJob Inc.All rights reserved</p>
			</div>
		</div>
        <script>
            //Get the button:
      mybutton = document.getElementById("myBtn");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 5000; // For Safari
        document.documentElement.scrollTop = 5000; // For Chrome, Firefox, IE and Opera
      }
    </script>
    <script>
            //Get the button:
      mybutton = document.getElementById("myBtn2");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      // When the user clicks on the button, scroll to the top of the document
      function homeFunction() {
        document.body.scrollTop = 200; // For Safari
        document.documentElement.scrollTop = 130; // For Chrome, Firefox, IE and Opera
      }
    </script>
  </body>
</html>
