<?php if(!isset($_SESSION)) { session_start(); } ?>


<html>
<head>
<title>Add packages</title>
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
	$f1=0;

	
	$target_dir = "packimages/";
	//t4
	$target_file = $target_dir.basename($_FILES["t4"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	
	
	

		if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} 	

}
	 
?>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="update package set Packname='" . $_POST["t1"] ."',Category='" . $_POST["t2"] . "',Packprice='" . $_POST["t8"] . "',Pic1='" .  basename($_FILES["t4"]["name"]) . "',Detail='" . $_POST["t7"] . "' where Packid='" . $_POST["s1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";
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



<form method="post" enctype="multipart/form-data"  >
<table border="0" width="500px" height="700px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Package</td></tr>
<tr><td class="lefttxt">Select Packageid</td><td><select name="s1" required/><option value="">Select</option>

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

<tr><td class="lefttxt">New Package Name</td><td><input type="text"   name="t1" ></td></tr>
<tr><td class="lefttxt">Select New Categoryid</td><td><select name="t2" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from category";
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


</select>

<tr><td class="lefttxt">New Package Price</td><td><input type="text" name="t8" ></td></tr>


<tr><td class="lefttxt">Upload New Pic</td><td><input type="file" name="t4"/></td></tr>

<tr><td class="lefttxt">Details</td><td><textarea name="t7" ></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>
<button class="button button2">
	<a href="admin_page.php">Go Back</a>
</button>


	
		


</body>
</html>