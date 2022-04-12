<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>View Packages</title>
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




<div class="main_home_div">
           <h1  id="top_heading_id" class="top_heading">tour and travels....</h1>
       </div>

<div>
<ul>
  <li><a href="#news">Logout</a></li>
  <li><a class="active" href="#home">Home</a></li>
  
 
</ul>

</div>


<form method="post">
<table border="0" width="90%" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Package</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>

<td style="font-size:15px; padding:5px; font-weight:bold;">Package Name</td>

<td style="font-size:15px; padding:5px; font-weight:bold;">Category</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Price</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Pic</td>
</tr>

<?php

$s="select * from package where Category='" .$_GET["catid"] . "'";
$result=mysqli_query($cn,$s);
while($data=mysqli_fetch_array($result))
{
	
		echo "<tr><td style=' padding:5px;'>$data[0]</td>
		
		
		<td style=' padding:5px;'><b><a href='buy_pac.php?packid=$data[0]'>$data[1]</td>
		</a></b>
		<td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$data[3]</td>
		<td style=' padding:5px;'><IMG src='packimages/$data[4]' style='height:50PX' /></td>
		</tr>";

}


?>

</table>
</td></tr></table>

</form>



</div>


</div>
<button class="button button2" style="right:5%;">
	<a href="admin_page.php">Go Back</a>
</button>
</body>
</html>