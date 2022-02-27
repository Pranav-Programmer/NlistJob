<?php 
include "header.php";
?>
<title>Post Job</title>
<link rel="shortcut icon" type="image/x-icon" href="img/NLJ.png">
<style>
        .echocss{
          margin-left: 21em;
          margin-right: 21em;
          margin-top: 4px;
          position: absolute;
          color: red;
        }
</style>
<div class="content">
<p>
  <a class="btn btn-primary" href="post.php" role="button">
    Post Job 
  </a>
</p>
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Company Location</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
    </tr>
  </thead>
  
  <?php
    $sql="Select cname,location,position,CTC from jobs";
    $result=mysqli_query($conn,$sql);
    $i=0;

    if($result->num_rows>0){
      
      //output data of each row
      while($rows=$result->fetch_assoc()){
    
        echo"
        <tbody>
        <tr>
        <td>".++$i."</td>
           <td>".$rows['cname']." </td>
           <td>".$rows['location']." </td>
           <td>".$rows['position']." </td>
           <td>".$rows['CTC']." </td>
        </tr>";
    }}
    else{
      echo"";
    }
  ?>
  </tbody>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>