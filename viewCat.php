<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<title>view category</title>
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

<form method="post"  style="margin-top:50px;">
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Category</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="70%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">Category Id</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Category Name</td></tr>

<?php

$s="select * from category";
$result=mysqli_query($cn,$s);



while($data=mysqli_fetch_array($result))
{
	

	echo "<b><tr><td style=' padding:5px;'>$data[0]</td><td style=' padding:5px;'><a href='view_pack.php?catid=$data[0]'>$data[1]</a></td></tr></b>";


}




?>

</table>
</td></tr></table>

</form>



</div>


</div>
<button class="button button2">Go Back</button>
</body>
</html>