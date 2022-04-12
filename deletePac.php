<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>delete packages</title>
<link rel="stylesheet" type="text/css" href="admin_css.css">

</head>
<body>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('function.php'); ?>




<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from package  where packid='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Delete');</script>";
    }
?>


<div class="main_home_div">
           <h1  id="top_heading_id" class="top_heading">tour and travels....</h1>
       </div>

<div>
<ul>
  <li><a href="#news">Logout</a></li>
  <li><a class="active" href="#home">Home</a></li>
  
 
</ul>

</div>



<form method="post" enctype="multipart/form-data">
<table border="0" width="400px" height="150px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete Package</td></tr>
<tr><td class="lefttxt">Select Packageid</td><td><select name="t1" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from package";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
		
			echo "<option value=$data[0]>$data[0]</option>";
		
	
}
mysqli_close($cn);
?>
</select>
</td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>

</table>
</form>

</div>


</div>
<button class="button button2">
	<a href="admin_page.php">Go Back</a>
</button>

</body>
</html>


             