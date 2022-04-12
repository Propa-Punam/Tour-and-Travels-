<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>update category</title>
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
	$s="update category set Cat_name='" . $_POST["t2"] ."' where Cat_id='" . $_POST["t1"] . "'";
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



<form method="post" style="margin-top:50px;">
<table border="0" width="500px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Category</td></tr>
<tr><td class="lefttxt">Selected Category id</td><td><select name="t1" required/><option value="">Select</option>



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


</td></tr>
<tr><td class="lefttxt">New Category Name</td><td><input type="text" name="t2" ></td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<button class="button button2">Go Back</button>
</body>
</html>



