<?php 
error_reporting(0);
require_once "config.php";
require_once "loginfo.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: ln.php');
	exit;
}

$cname = $location = $position = $Jdesc = $skills = $CTC = "";
$cname_err = $location_err = $position_err = $Jdesc_err = $skills_err = $CTC_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

// Check for company name
if(empty(trim($_POST['cname']))){
    $cname_err = "Company name cannot be blank";
    echo "<p class='echocss'>Company name cannot be blank.</p>";
}
else{
    $cname = $_POST['cname'];
    // Check for location
    if(empty(trim($_POST['location']))){
      $location_err = "location cannot be blank";
      echo "<p class='echocss'>location cannot be blank.</p>";
    }
    else{
      $location = $_POST['location'];
    // Check for position
  if(empty(trim($_POST['position']))){
    $position_err = "position cannot be blank";
    echo "<p class='echocss'>Position cannot be blank.</p>";
  }
  else{
    $position = $_POST['position'];
    // Check for Job description
  if(empty(trim($_POST['Jdesc']))){
    $Jdesc_err = "Job description cannot be blank";
    echo "<p class='echocss'>Job description cannot be blank.</p>";
  }
  else{
    $Jdesc = $_POST['Jdesc'];
    // Check for skills
      if(empty(trim($_POST['skills']))){
        $skills_err = "skills cannot be blank";
        echo "<p class='echocss'>skills cannot be blank.</p>";
      }
      else{
        $skills = $_POST['skills'];
        // Check for CTC
        if(empty(trim($_POST['CTC']))){
          $CTC_err = "CTC cannot be blank";
          echo "<p class='echocss'>CTC cannot be blank.</p>";
        }
          else{
            $CTC = $_POST['CTC'];
          }
        }
      }
    }
  }
}

// If there were no errors, go ahead and insert into the database
if(empty($cname_err) && empty($location_err) && empty($position_err) && empty($Jdesc_err) && empty($skills_err) && empty($CTC_err))
{
    $sql = "INSERT INTO jobs (cname, location, position, Jdesc, skills, CTC) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssss", $param_cname, $param_location, $param_position, $param_Jdesc, $param_skills, $param_CTC);

        // Set these parameters
        $param_cname = $cname;
        $param_location = $location;
        $param_position = $position;
        $param_Jdesc = $Jdesc;
        $param_skills = $skills;
        $param_CTC = $CTC;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          header("location: successful.php");
        }
        else{
          header("location: failed.php");
          echo "Error: Failed to post the job $sql.".mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
}
}
?>
<title>Post Job</title>
<link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
        
         body{
            background:url('img/post.jpg') no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(48, 46, 46);
        }
        .echocss{
          margin-left: 40em;
          margin-top: -20px;
          position: absolute;
          color: red;
          font-weight: bold;
        }
        .card-body{
            background-color: light gray;
            margin-top: 25px; 
            width: 1001px; 
            margin-left: 259px; 
            height: 96%;
        }
        /* On screens that are less than 700px wide, make the sidebar into a topbar */
  @media screen and (max-width: 1156px) {
    .echocss{
          margin-left: 20em;
          margin-top: -20px;
          position: absolute;
          color: red;
          font-weight: bold;
        }
    body{
            background:url('img/post.jpg');
            width: 100%;
            background-size: cover;
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(48, 46, 46);
        }
    .card-body{
            background-color: #E5E8E8; 
            width: 70%; 
            margin-left:15%;
            margin-top: 10%;
            height: 700px;
        }
  }
</style>
<div>
  <div class="card card-body">
  <form action="" method="POST">
  <div class="mb-3">
    <label for="company name" class="form-label">Company Name</label>
    <input type="text" class="form-control" id="" name="cname" placeholder="Enter company name">
  </div>
  <div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" class="form-control" id="" name="location" placeholder="Enter company location">
  </div>
  <div class="mb-3">
    <label for="exampleInputPosition" class="form-label">Position</label>
    <input type="text" class="form-control" id="exampleInputPosition" name="position" placeholder="Enter position">
  </div>
  <div class="mb-3">
    <label for="JobDesc" class="form-label">Job Description</label>
    <textarea name="Jdesc" class="form-control" id="JobDesc" placeholder="Describe the position" style="height: 150px;"></textarea>
  </div>
  <div class="mb-3">
    <label for="Skills" class="form-label">Skills Required</label>
    <input type="text" class="form-control" id="skills" name="skills" placeholder="Enter skills">
  </div>
  <div class="mb-3">
    <label for="CTC" class="form-label">CTC</label>
    <input type="text" class="form-control" id="CTC" name="CTC" placeholder="Enter CTC">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
