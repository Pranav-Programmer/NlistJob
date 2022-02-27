<?php include "header.php"?>
<title>Jobs</title>
<link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
<div class="content">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Applied In</th>
      <th scope="col">Location</th>
      <th scope="col">Position</th>
      <th scope="col">Year of Passout</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once "config.php";
    $sql="Select name,apply,apply_in,location,year from candidates";
    $result=mysqli_query($conn,$sql);
    $i=0;
    if($result->num_rows>0){
      while($rows=$result->fetch_assoc()){
        echo'
      <tr>
        <th scope="row">'.++$i.'</th>
        <td>'.$rows['name'].'</td>
        <td>'.$rows['apply_in'].'</td>
        <td>'.$rows['location'].'</td>
        <td>'.$rows['apply'].'</td>
        <td>'.$rows['year'].'</td>
    </tr>';}}
    else{
      echo"";
    }
?>
  </tbody>
</table>
</div>