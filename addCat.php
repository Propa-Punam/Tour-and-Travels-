<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>add category</title>
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
	$s="insert into category(Cat_name) values('" . $_POST["t1"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
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
<table border="0" width="400px" height="200px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Category</td></tr>
<tr><td class="lefttxt">Category Name</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,20}" title"Please Enter Only Characters between 3 to 10 for Category Name" /></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>
<button class="button button2">Go Back</button>

</body>
</html>