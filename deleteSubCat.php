<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Subcategory</title>
<link rel="stylesheet" type="text/css" href="admin_css.css">
</head>
<body>

<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginForm.php");
}
?>

<?php include('function.php'); ?>




<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from subcategory  where subcatid='" . $_POST["s1"] . "'";
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


<form method="post" enctype="multipart/form-data"  style="margin-top:50px;">
<table border="0" width="400px" height="250px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete Subcategory</td></tr>
<tr><td class="lefttxt">Select Category</td><td><select name="t2" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
		if(isset($_POST["show"])&& $data[0]==$_POST["t2"])
		{
		echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
	
}
mysqli_close($cn);
?>
</select>
<input type="submit" value="Show" name="show" formnovalidate/>



<tr><td class="lefttxt">Select Subcategory</td><td><select name="s1" required/><option value="">Select</option>

<?php
if(isset($_POST["show"]))
{

$cn=makeconnection();
$s="select * from subcategory where catid='" . $_POST["t2"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
	
		echo "<option value=$data[0]>$data[1]</option>";
	
}
mysqli_close($cn);
}
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


             