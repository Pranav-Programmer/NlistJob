<!DOCTYPE html>
  <html lang="en">
<?php include 'config.php';

$name = $apply = $apply_in = $location = $qual = $year = $email = $number ="";
$name_err = $apply_err = $apply_in_err = $location_err = $qual_err = $year_err = $email_err = $number_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// Check for name
if(empty(trim($_POST['name']))){
    $name_err = "Name cannot be blank";
    echo "<p class='echocss'>Name cannot be blank.</p>";
}
else{
    $name = $_POST['name'];

    // Check for apply for
    if(empty(trim($_POST['apply']))){
      $apply_err = "Apply field cannot be blank";
      echo "<p class='echocss'>Apply field cannot be blank.</p>";
    }
    else{
      $apply = $_POST['apply'];

      // Check for apply in
      if(empty(trim($_POST['apply_in']))){
        $apply_in_err = "Apply in field cannot be blank";
        echo "<p class='echocss'>Apply in field cannot be blank.</p>";
      }
      else{
        $apply_in = $_POST['apply_in'];

        // Check for Qualification
        if(empty(trim($_POST['qual']))){
          $qual_err = "Qualification cannot be blank";
          echo "<p class='echocss'>Qualification cannot be blank.</p>";
        }
        else{
          $qual = $_POST['qual'];

          // Check for Passout year
          if(empty(trim($_POST['year']))){
            $year_err = "Passout year cannot be blank";
            echo "<p class='echocss'>Passout year cannot be blank.</p>";
          }
          else{
            $year = $_POST['year'];

            // Check if email is empty
            if(empty(trim($_POST["email"]))){
              $email_err = "email cannot be blank";
              echo "<p class='echocss1'>Email address cannot be blank.</p>";
            }
            else{
              $email = trim($_POST['email']);

              // Check for number
              if(empty(trim($_POST['number']))){
                $number_err = "number cannot be blank";
                echo "<p class='echocss2'>Number cannot be blank.</p>";
              }
              elseif(strlen(trim($_POST['number'])) < 10){
                $number_err = "number cannot be less than 10 characters";
                echo "<p class='echocss2'>Number cannot be less than 10 digit.</p>";
              }
              else{
                $number = $_POST['number'];

                // Check for location
              if(empty(trim($_POST['location']))){
                $location_err = "Location cannot be blank";
                echo "<p class='echocss2'>Location cannot be blank.</p>";
              }
              else{
                $location = $_POST['location'];
              }
              }
            }
          }
        }
      }
    }
}

// If there were no errors, go ahead and insert into the database
if(empty($name_err) && empty($apply_err) && empty($apply_in_err) && empty($location_err) && empty($qual_err) && empty($year_err) && empty($email_err) && empty($number_err))
{
    $sql = "INSERT INTO candidates (name, apply, apply_in, location, qual, year, email, number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_apply, $param_apply_in, $param_location, $param_qual, $param_year, $param_email, $param_number);

        // Set these parameters
        $param_name = $name;
        $param_apply = $apply;
        $param_apply_in = $apply_in;
        $param_location = $location;
        $param_qual = $qual;
        $param_year = $year;
        $param_email = $email;
        $param_number = $number;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $to_email = $email;
          $subject = "Copy of Your Job Application to " . $apply_in . " ";
          $body = "Hi, your successfully applied for job at " . $apply_in . " through NLISTJOB.\n\n        [Your Job Application Copy] \n\nName: " . $name . "\nApplying For: " . $apply . "\nApplying In: " . $apply_in . "\nJob Location: " . $location . "\nQualification: " . $qual . "\nPassout Year: " . $year . "\nMobile Number: " . $number . "\n\nPlease keep this mail for future reference. \n\n" . $apply_in . " will contact you soon if your qualification and skills satisified their requirement. \n\nThanks \nNLISTJOB \n\nThis is system generated email, do not reply to this email ";
          $headers = "From: nlistjob@gmail.com";

          //if (mail($to_email, $subject, $body, $headers)) {             //remove comment on line 113 and 115
              header("location: successful2.php");
        //}
        }
        else{
          header("location: failed2.php");
          echo "Error: Failed to apply for this post $sql.".mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
}
}
?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
              .feedback-input{
                    height: 25px; 
                    width: 100%; 
                    font-size:15px; 
                    margin-right: -100px;
                    border: none;
                }
              .feedback-input1{
                height: 75px; 
                width: 100%; 
                font-size:15px; 
                margin-right: -100px;
                border: none;
              }
              .feedback-input2{
                  height: 50px; 
                  width: 100%; 
                  font-size:15px; 
                  margin-right: -100px;
                  border: none;
               }
               .feedback-input3{
                  height: 50px; 
                  width: 100%; 
                  font-size:15px; 
                  margin-right: -100px;
                  border: none;
                  font-weight: bold;
                  font-size: 20px;
               }
            .echocss{
              margin-left: 1em;
              margin-right: 21em;
              margin-top: 257px;
              font-size: 20px;
              font-weight: bold;
              position: absolute;
              color: red;
            }
            .navbar{
                overflow:hidden;
                background-color: #aaa;
                position: fixed;
                top:0;
                width:100%;
            }
            h1,
            p {
                color: #fff;
            }
            .jobs{
                border:1px solid black;
                box-shadow: 5px 5px 4px 5px grey;
                margin: 10px;
                padding: 10px;
            }
            .home{
              position: absolute;
              margin-top: -270px;
              margin-left: 10px;
            }
            .btn-close{
              background-color: red;
              font-weight: bold;
              color: #000;
            }
            #myBtn {
              display: none; /* Hidden by default */
              position: fixed; /* Fixed/sticky position */
              bottom: 20px; /* Place the button at the bottom of the page */
              right: 30px; /* Place the button 30px from the right */
              z-index: 99; /* Make sure it does not overlap */
              background: transperent; /* Set a background color */
              cursor: pointer; /* Add a mouse pointer on hover */
              padding: 0px;
              border: none;
            }
            @media  only screen and (max-width: 580px) {
              .echocss{
              margin-top: 190px;
              position: absolute;
              margin-right:2px;
              color: red;
            }
            .home{
              position: absolute;
              margin-top: -215px;
              margin-left: 10px;
            }
            .display-4{
              margin-top: 22px;
            }
          }
        </style>
        <title>Jobs</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
    </head>
    <body>
<div class="row">
    <div class="col-12">
    <div class="sticky-sm-top">
        <div class="jumbotron jumbotron-fluid" style="background-image: url('img/CareerPg4.jpg'); background-size:cover; position: relative;">
            <div class="container">
                <h1 class="display-4">NListJob</h1>
                <p class="lead">Apply to a job best for your skills here</p>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="home">
  <a href="index.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
  </div>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="img/btt.png"></button>
<div class="row">
    <?php
    $sql="SELECT cname,location,position,Jdesc,CTC,skills from jobs";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows>0){
        while($rows=$result->fetch_assoc()){
            echo'
            <div class="col-md-4">
               <div class="jobs">
               <h5><textarea class="feedback-input3">'.$rows['position'].'</textarea></h5>
               <h5 style="text-align: center; border: true;">'.$rows['cname'].'</h5>
               <p style="color: black;"><b>Location:</b></p><textarea class="feedback-input">'.$rows['location'].'</textarea>
               <p style="color: black;"><b>Job Description:</b></p><textarea class="feedback-input1">'.$rows['Jdesc'].'</textarea>
               <p style="color: black;"><b>Skills Required:</b></p><textarea class="feedback-input2">'.$rows['skills'].'</textarea>
               <p style="color: black;"><b>CTC:</b>'.$rows['CTC'].'</p>
               <p>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Apply Now
                 </a>
                </p>
                </div>
            </div>';
        }
    }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your full name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label" style="margin-top: -20px;">Applying For:</label>
            <select type="text" class="form-control" name="apply">
            <option></option>
            <?php
                include "config.php";  // Using database connection file here
                $records = mysqli_query($conn, "SELECT position From jobs");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['position'] ."'>" .$data['position'] ."</option>";  // displaying data in option menu
                }	
            ?>
          </select>
         <br>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Applying In:</label>
            <select class="form-control" name="apply_in">
            <option></option>
            <?php
                include "config.php";  // Using database connection file here
                $records = mysqli_query($conn, "SELECT cname From jobs");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['cname'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                }	
            ?>  
          </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Job Location:</label>
            <select class="form-control" name="location">
            <option></option>
            <?php
                include "config.php";  // Using database connection file here
                $records = mysqli_query($conn, "SELECT location From jobs");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['location'] ."'>" .$data['location'] ."</option>";  // displaying data in option menu
                }	
            ?>  
          </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Qualification:</label>
            <input type="text" class="form-control" name="qual" placeholder="Enter your highest qualification">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Passout Year:</label>
            <select class="form-control" name="year" required>
              			<option></option>
              			<option>1983</option>
              			<option>1984</option>
              			<option>1985</option>
              			<option>1986</option>
              			<option>1987</option>
              			<option>1988</option>
              			<option>1989</option>
                    <option>1990</option>
              			<option>1991</option>
              			<option>1992</option>
              			<option>1993</option>
              			<option>1994</option>
              			<option>1995</option>
              			<option>1996</option>
                    <option>1997</option>
              			<option>1998</option>
              			<option>1999</option>
              			<option>2000</option>
              			<option>2001</option>
              			<option>2002</option>
              			<option>2003</option>
                    <option>2004</option>
              			<option>2005</option>
              			<option>2006</option>
              			<option>2007</option>
              			<option>2008</option>
              			<option>2009</option>
              			<option>2010</option>
                    <option>2011</option>
              			<option>2012</option>
              			<option>2013</option>
              			<option>2014</option>
                    <option>2015</option>
              			<option>2016</option>
              			<option>2017</option>
              			<option>2018</option>
              			<option>2019</option>
              			<option>2020</option>
              			<option>2021</option>
                    <option>2022</option>
              			<option>2023</option>
              		</select><br>
          </div>
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputNumber" class="form-label">Mobile Number</label>
          <input type="number" class="form-control" id="exampleInputNumber" name="number" placeholder="Enter number">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
            //Get the button:
      mybutton = document.getElementById("myBtn");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      }
    </script>
    </body>
    </html>