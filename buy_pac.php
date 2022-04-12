
<?php if(!isset($_SESSION)) { session_start(); } ?>


<!DOCTYPE html>
<html>
<head>
<title>details</title>

<link rel="stylesheet" type="text/css" href="admin_css.css">

<style>
div.main_image_div{
  margin-top:100px;
  resize: horizontal;
  

 
 }
   
h1.about_us{
   
   text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
   text-align:center;font-size: 50px;display: block;
 
}
span.about{
  
  width: 100%;
  max-width: 100%;
  
  background-image: linear-gradient(to right, red , yellow);
}

 
 div.main_home_div{
   margin: 50px;
 }
 
 
</style>
</head>
<body>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:login and registration.html");
}
?>

<?php include('function.php'); ?>



<div class="main_home_div">
           <h1  id="top_heading_id" class="top_heading">tour and travels....</h1>
       </div>

<div>
<ul>
  <li><a href="#news">Logout</a></li>
  <li><a class="active" href="#home">Home</a></li>
  
 
</ul>

<?php

$s="select * from package where packid='" . $_GET["packid"] ."'";
$result=mysqli_query($cn,$s);
$data=mysqli_fetch_array($result);
mysqli_close($cn);
?>
 
   <div  class="main_image_div">
      <img src= "packimages/<?php echo $data[4];?>" alt="img" width="100%" height="400px"  >
   </div>

   <div class="about" id="about_id" >
       <h1 class="about_us"><?php echo $data[1] ?></h1>
      <span class="about">

        <div style="max-width: 100%;">
        <?php echo $data[5] ?>

            </div>
            <br style="clear: left;" />
          </span>

<div>
<h2>Categoryid:
<?php echo $data[2] ?> </h2>
</div>

<div>
<h2>Price:
<?php echo $data[3] ?> </h2>
</div>


              <button class="button"><a href="buy.php">
              To buy click here</a></button>
</body>
</html>

